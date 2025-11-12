<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public $timestamps = false;
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    //Ha létrehozunk egy új terméket, akkor milyen adatokat tudunk megadni
    //Ez kötelező, a többit nem engedi
    protected $fillable = [
        'name',
        'description',
        'brand',
        'price',
        'quantity',
    ];
}
