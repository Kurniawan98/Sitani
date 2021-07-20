<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class HargaPangan extends Model
{
    protected $table = 'hargapangan';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id_category', 'namapangan', 'harga', 'tanggal'
    ];
}