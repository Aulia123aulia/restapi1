<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Anggota::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->email = $request->email;
        $anggota->hp = $request->hp;
        $anggota->save();

        return "Data anggota berhasil ditambahkan";
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama = $request->nama;
        $alamat = $request->alamat;
        $email = $request->email;
        $hp = $request->hp;

        $anggota = Anggota::find($id);
        $anggota->nama = $nama;
        $anggota->alamat = $alamat;
        $anggota->email = $email;
        $anggota->hp = $hp;
        $anggota->save();

        return "Data anggota berhasil diubah";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $anggota = Anggota::find($id);
        $anggota->delete();

        return "Data anggota berhasil dihapus";
    }
}
