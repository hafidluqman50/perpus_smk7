<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiBukuModel extends Model
{
    protected $table = 'transaksi_buku';
    protected $guarded = [];
    protected $primaryKey = 'id_transaksi';
    public function transaksi()
    {
    	$this->belongsTo('App\Models\BukuModel','id_buku');
    }
}
