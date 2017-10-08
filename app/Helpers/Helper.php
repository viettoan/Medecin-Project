<?php
namespace App\Helpers;


class Helper
{
	public static function handleSearchkeyword($keyword)
    {
        $character = [
            '%',
            '_',
            '\\',
        ];
        $replace = [
            '\%',
            '\_',
            '\\\\',
        ];
        $keyword = str_replace($character, $replace, $keyword);
        
        return $keyword;
    }
}