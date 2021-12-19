<?php

namespace App\Helpers;

use App\Models\Counter;
use Illuminate\Support\Facades\DB;

class StrHelper
{
    public static function counter($name)
    {
        $counter = Counter::query();
        $find = $counter->firstOrCreate(['name'=>$name]);
        $find->increment('number',1);
       return $counter->where('name',$name)->orderByDesc('id')->first()->number;
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
