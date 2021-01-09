<?php

namespace Units\SystemCalendar\Http\Controllers;

use Parents\Controllers\WebController as Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\Domains\Operations\Models\Operation',
            'date_field' => 'done_at',
            'field'      => 'description',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.operations.edit',
        ],
    ];

    public function index(): \Illuminate\View\View
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
