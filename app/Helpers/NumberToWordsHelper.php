<?php

namespace App\Helpers;

use NumberToWords\NumberToWords;

class NumberToWordsHelper
{
    public static function convert($number)
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en'); // 'en' for English
        return $numberTransformer->toWords($number);
    }
}
