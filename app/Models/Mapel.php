<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
	// Deklarasi dari table database
    protected $table = 'mapel';
    protected $fillable = [
      'kode', 'nama', 'semester'
    ];

    public function siswa()
    {
    	// untuk merelasikan antara siswa dengan mapel
    	// dan fungsi withPivot ini untuk mengambil nilai pada table mapel_siswa
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
}
