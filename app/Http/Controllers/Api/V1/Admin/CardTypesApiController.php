<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardTypeRequest;
use App\Http\Requests\UpdateCardTypeRequest;
use App\Http\Resources\Admin\CardTypeResource;
use App\Models\CardType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('card_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CardTypeResource(CardType::all());
    }

    public function store(StoreCardTypeRequest $request)
    {
        $cardType = CardType::create($request->all());

        return (new CardTypeResource($cardType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CardType $cardType)
    {
        abort_if(Gate::denies('card_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CardTypeResource($cardType);
    }

    public function update(UpdateCardTypeRequest $request, CardType $cardType)
    {
        $cardType->update($request->all());

        return (new CardTypeResource($cardType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CardType $cardType)
    {
        abort_if(Gate::denies('card_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
