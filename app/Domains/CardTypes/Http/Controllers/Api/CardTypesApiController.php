<?php

namespace Domains\CardTypes\Http\Controllers\Api;

use Domains\CardTypes\Actions\GetAllCardTypesAction;
use Domains\CardTypes\Actions\StoreCardTypeAction;
use Domains\CardTypes\Actions\UpdateCardTypeAction;
use Domains\CardTypes\DataTransferObjects\CardTypeData;
use Domains\CardTypes\Http\Requests\DeleteCardTypesRequest;
use Domains\CardTypes\Http\Requests\IndexCardTypesRequest;
use Domains\CardTypes\Http\Requests\ShowCardTypesRequest;
use Domains\CardTypes\Transformers\CardTypeTransformer;
use Parents\Controllers\ApiController as Controller;
use Domains\CardTypes\Http\Requests\StoreCardTypeRequest;
use Domains\CardTypes\Http\Requests\UpdateCardTypeRequest;
use Domains\CardTypes\Http\Resources\CardTypeResource;
use Domains\CardTypes\Models\CardType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardTypesApiController extends Controller
{
    public function index(IndexCardTypesRequest $request, GetAllCardTypesAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->cardTypes(), new CardTypeTransformer())->respond();
    }

    public function store(StoreCardTypeRequest $request, StoreCardTypeAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(CardTypeData::fromRequest($request));
        return fractal($viewModel->cardType(), new CardTypeTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowCardTypesRequest $request, CardType $cardType): \Illuminate\Http\JsonResponse
    {
        return fractal(CardTypeData::fromModel($cardType), new CardTypeTransformer())->respond();
    }

    public function update(UpdateCardTypeRequest $request, CardType $cardType, UpdateCardTypeAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($cardType, CardTypeData::fromRequest($request));
        return fractal($viewModel->cardType(), new CardTypeTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteCardTypesRequest $request, CardType $cardType): \Illuminate\Http\Response
    {
        $cardType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
