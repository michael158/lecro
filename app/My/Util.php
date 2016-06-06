<?php

/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 04/06/2016
 * Time: 21:07
 */

namespace App\My;

class Util
{

    public static function dateFormat($date){
        $date = strtotime($date);
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        return strftime('%d de %B de %Y', $date);
    }

}