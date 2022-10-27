<?php

namespace App\Http\Controllers;

use App\Models\AdminAppTuh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminAppTuhController extends Controller
{
    public function register_admin_app_tuh(){
        return view('register.register_admin_app_tuh');
    }

    public function simpan_data_admin_app_tuh_baru(Request $request){
        $request->validate([
            'nik_admin_app'=>'required|unique:admin_app_tuhs',
            'nama_admin_app'=>'required',
            'password_admin_app'=>'required',
            'kode_validasi'=>'required',
        ],[
            'nik_admin_app.required'=>'Data tidak boleh kosong',
            'nama_admin_app.required'=>'Data tidak boleh kosong',
            'password_admin_app.required'=>'Data tidak boleh kosong',
            'kode_validasi.required'=>'Data tidak boleh kosong',
        ]);
        $kode_validasi = $request->kode_validasi;
        if($kode_validasi === '6yfdh3&n-S7X#E@E'){
            $data_baru = new AdminAppTuh();
            $data_baru->nik_admin_app = $request->nik_admin_app;
            $data_baru->nama_admin_app = $request->nama_admin_app;
            $data_baru->password_admin_app = Hash::make($request->password_admin_app);
            $data_baru->save();
            $notification = array(
                'success' => 'Data Admin '.$request->nama_admin_app.' berhasil disimpan!',
            );
            return Redirect::to('register_admin_app_tuh')->with($notification);
        }
        
    }
}