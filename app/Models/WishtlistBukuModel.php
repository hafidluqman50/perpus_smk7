<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishtlistBukuModel extends Model
{
    protected $table = 'wishtlist_buku';
    protected $guarded = [];
    protected $primaryKey = 'id_wishtlist';
    public $timestamps = false;
}
