<?php


namespace Domains\Users\Enums;


class SmsDayBefore extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const SAME_DAY = 0;
    
    const BEFORE_ONE = 1;
    
    const BEFORE_TWO = 2;
    
    const BEFORE_THREE = 3;
    
    const BEFORE_WEEK = 7;
    
    const BEFORE_MONTH = 31;
}
