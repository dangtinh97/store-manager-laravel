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
}
