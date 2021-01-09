<?php

namespace Support\CsvImport\Traits;

use Illuminate\Support\Pluralizer;
use Parents\Exceptions\InternalErrorException;
use Parents\Requests\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SpreadsheetReader;
use Support\CsvImport\Exceptions\InvalidFileException;

trait CsvImportTrait
{
    public function processCsvImport(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/csv_import/' . $filename);

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            $fields = array_flip(array_filter($fields));

            $modelName = $request->input('modelName', false);
            $model     = "App\Models\\" . $modelName;

            $reader = new SpreadsheetReader($path);
            $insert = [];

            foreach ($reader as $key => $row) {
                if ($hasHeader && $key == 0) {
                    continue;
                }

                $tmp = [];

                foreach ($fields as $header => $k) {
                    if (isset($row[$k])) {
                        $tmp[$header] = $row[$k];
                    }
                }

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }

            $for_insert = array_chunk($insert, 100);

            foreach ($for_insert as $insert_item) {
                $model::insert($insert_item);
            }

            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input("redirect"));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     * @psalm-suppress PossiblyInvalidMethodCall
     */
    public function parseCsvImport(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $file = $request->file('csv_file');
        if (!$file) {
            throw new InvalidFileException('Error in getting file!');
        }
        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path      = $file?->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader  = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines   = [];
        $lines[] = $reader->next();
        $lines[] = $reader->next();

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        $modelName     = $request->input('model', false);
        $resourceKey = Pluralizer::plural($modelName);
        $fullModelName = "\Domains\\" . $resourceKey . "Models\\" . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport';

        return view('csvImport.parseInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
    }
}
