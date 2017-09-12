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
  		return $this->belongsTo('App\User','username');
  	}

    public function kelas()
    {
        return $this->belongsTo('App\Models\Siswa\KelasSiswa','id_kelas');
    }
}
