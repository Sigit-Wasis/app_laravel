<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	protected $table = 'siswa';
	protected $fillable = [
      'nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'
    ];

    public function getAvatar()
    {
    	if(!$this->avatar) {
    		return asset('images/default.png');
    	} 
    	
    	return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        // untuk merelasikan antara siswa dengan mapel
        // dan fungsi withPivot ini untuk mengambil nilai pada table mapel_siswa
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }
}
