<?php

namespace App;

class Util
{
    public static function intToHexChar($n)
    {
        if ($n>=0 && $n<=9)
            return chr(ord('0')+$n);
        if ($n>=10 && $n<=16)
            return chr(ord('a')+$n-10);
        return '';
    }

    public static function randomCode()
    {
        $code = '';
        for ($i=0;$i<64;$i++)
            $code = $code.Util::intToHexChar(rand()%16);
        return $code;
    }
}
