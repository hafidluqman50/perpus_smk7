<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
  	protected $table = 'siswa';
  	protected $primaryKey = 'id_siswa';
  	protected $guarded = [];

  	public function users()
  	{
  		$this->belongsTo('App\User','username');
  	}
}
