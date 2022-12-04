<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'type',
        'detail',
        'quantity'
    ];


    const TYPE_LIST = [
        //key=>value
        1 => '衣服',
        2 => 'バッグ',
        3 => 'アクセサリー',
        4 => 'シューズ',
        5 => 'アクセサリー',
        6 => '傘',

    ];

}
