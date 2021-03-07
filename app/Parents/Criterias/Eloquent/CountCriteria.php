<?php


namespace Parents\Criterias\Eloquent;

use Parents\Criterias\Criteria;
use Parents\QueryBuilder\QB;
use Prettus\Repository\Contracts\RepositoryInterface;

final class CountCriteria extends Criteria
{
    public function __construct(
        private string $field
    )
    {}

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return  mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
//        return QB::
    }
}
