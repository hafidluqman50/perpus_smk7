<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBukuModel extends Model
{
    protected $table = 'kategori_buku';
    protected $guarded = [];
    protected $primaryKey = 'id_kategori_buku';
}
