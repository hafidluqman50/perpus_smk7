<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $table = 'barcode_scan';
    protected $guarded = [];
    protected $primaryKey = 'id_barcode';

    public function buku() {
    	return $this->belongsTo('App\Models\BukuModel','id_buku');
    }
}
