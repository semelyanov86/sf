<?php

namespace Domains\CardTypes\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\CardTypes\Http\Requests\MassDestroyCardTypeRequest;
use Domains\CardTypes\Http\Requests\StoreCardTypeRequest;
use Domains\CardTypes\Http\Requests\UpdateCardTypeRequest;
use Domains\CardTypes\Models\CardType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardTypesController extends Controller
{
    use CsvImportTrait;

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('card_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardTypes = CardType::all();

        return view('frontend.cardTypes.index', compact('cardTypes'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('card_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.cardTypes.create');
    }

    public function store(StoreCardTypeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $cardType = CardType::create($request->all());

        return redirect()->route('frontend.card-types.index');
    }

    public function edit(CardType $cardType): \Illuminate\View\View
    {
        abort_if(Gate::denies('card_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.cardTypes.edit', compact('cardType'));
    }

    public function update(UpdateCardTypeRequest $request, CardType $cardType): \Illuminate\Http\RedirectResponse
    {
        $cardType->update($request->all());

        return redirect()->route('frontend.card-types.index');
    }

    public function show(CardType $cardType): \Illuminate\View\View
    {
        abort_if(Gate::denies('card_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.cardTypes.show', compact('cardType'));
    }

    public function destroy(CardType $cardType): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('card_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCardTypeRequest $request): \Illuminate\Http\Response
    {
        CardType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
