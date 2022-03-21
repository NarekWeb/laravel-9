<?php

namespace helpers;

use JetBrains\PhpStorm\NoReturn;

class Helper
{
    public function __construct()
    {
        dump(111);
    }


    #[NoReturn] public static function stringToPogos()
    {
        dd(111);
    }
}
