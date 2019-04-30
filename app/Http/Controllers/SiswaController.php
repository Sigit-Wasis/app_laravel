<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	if($request->has('cari')) {
    		$data_siswa = \App\Models\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
    	}else {
    		$data_siswa = \App\Models\Siswa::all();	
    	}
    	
        return view ('siswa.index', ['data_siswa' => $data_siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_depan'    => 'required|min:5',
            'nama_belakang' => 'required',
            'email'         => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'avatar'        => 'mimes:jpg,png'
        ]);

        // Insert ke table Users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        // Insert ke table Siswa
        $request->request->add(['user_id' => $user->id]);
    	$siswa = \App\Models\Siswa::create($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        } 

    	return redirect ('/siswa')->with('sukses', 'Data berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $siswa = \App\Models\Siswa::find($id);
        $siswa->update($request->all()); 

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        } 

        return redirect('/siswa')->with('sukses', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = \App\Models\Siswa::find($id);
    	$siswa->delete();
    	return redirect('/siswa')->with('sukses', 'Data berhasil di hapus!');
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.profile',['siswa' => $siswa]);
    }
}
