<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoriharga extends Model
{
    //
    protected $table = 'categories_harga_pangan';
    protected $fillable = ['category','name_categorys'];
}
