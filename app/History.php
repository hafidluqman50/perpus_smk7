<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'catatan_transaksi';
    protected $guarded = [];
    protected $primaryKey = 'id_catat';
}
