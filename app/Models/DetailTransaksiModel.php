<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $guarded = [];
    protected $primaryKey = 'id_detail_transaksi';
}
