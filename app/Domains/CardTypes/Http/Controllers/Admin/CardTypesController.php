<?php

namespace Domains\CardTypes\Http\Controllers\Admin;

use Domains\CardTypes\Actions\GetAllCardTypesAction;
use Domains\CardTypes\Actions\StoreCardTypeAction;
use Domains\CardTypes\Actions\UpdateCardTypeAction;
use Domains\CardTypes\DataTransferObjects\CardTypeData;
use Domains\CardTypes\Http\Requests\CreateCardTypesRequest;
use Domains\CardTypes\Http\Requests\DeleteCardTypesRequest;
use Domains\CardTypes\Http\Requests\EditCardTypesRequest;
use Domains\CardTypes\Http\Requests\IndexCardTypesRequest;
use Domains\CardTypes\Http\Requests\ShowCardTypesRequest;
use Parents\Controllers\WebController as Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\CardTypes\Http\Requests\MassDestroyCardTypeRequest;
use Domains\CardTypes\Http\Requests\StoreCardTypeRequest;
use Domains\CardTypes\Http\Requests\UpdateCardTypeRequest;
use Domains\CardTypes\Models\CardType;
use Symfony\Component\HttpFoundation\Response;

class CardTypesController extends Controller
{
    use CsvImportTrait;

    public function index(IndexCardTypesRequest $request, GetAllCardTypesAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.cardTypes.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateCardTypesRequest $request): \Illuminate\View\View
    {
        return view('admin.cardTypes.create');
    }

    public function store(StoreCardTypeRequest $request, StoreCardTypeAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(CardTypeData::fromRequest($request));

        return redirect()->route('admin.card-types.index');
    }

    public function edit(EditCardTypesRequest $request, CardType $cardType): \Illuminate\View\View
    {
        return view('admin.cardTypes.edit', compact('cardType'));
    }

    public function update(UpdateCardTypeRequest $request, CardType $cardType, UpdateCardTypeAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($cardType, CardTypeData::fromRequest($request));

        return redirect()->route('admin.card-types.index');
    }

    public function show(ShowCardTypesRequest $request, CardType $cardType): \Illuminate\View\View
    {
        return view('admin.cardTypes.show', compact('cardType'));
    }

    public function destroy(DeleteCardTypesRequest $request, CardType $cardType): \Illuminate\Http\RedirectResponse
    {
        $cardType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCardTypeRequest $request): \Illuminate\Http\Response
    {
        CardType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
