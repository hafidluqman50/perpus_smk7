<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    protected $table = 'kelas_siswa';
    protected $primaryKey = 'id_kelas';
    protected $guarded = []; 
}
