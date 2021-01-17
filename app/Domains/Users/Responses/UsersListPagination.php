<?php


namespace Domains\Users\Responses;


class UsersListPagination extends \Parents\DataTransferObjects\ResponsePaginationData
{
    public function toResponse($request): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        return response()->json(
            [
                'data' => $this->collection->toArray(),
                'meta' => [
                    'currentPage' => $this->paginator->currentPage(),
                    'lastPage' => $this->paginator->lastPage(),
                    'path' => $this->paginator->path(),
                    'perPage' => $this->paginator->perPage(),
                    'total' => $this->paginator->total(),
                ],
            ],
            $this->status
        );
    }
}
