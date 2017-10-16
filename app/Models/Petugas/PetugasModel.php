<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $guarded = [];
    protected $primaryKey = 'id_petugas';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
