<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'id_users', 'image','description','price','categories_id','stok'];
}
