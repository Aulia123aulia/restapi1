<?php

namespace App\Http\Controllers;

use App\Models\DaftarBuku;
use Illuminate\Http\Request;

class DaftarBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DaftarBuku::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $daftarbuku = new DaftarBuku();
        $daftarbuku->kode = $request->kode;
        $daftarbuku->judul = $request->judul;
        $daftarbuku->pengarang = $request->pengarang;
        $daftarbuku->tahun = $request->tahun;
        $daftarbuku->deskripsi = $request->deskripsi;
        $daftarbuku->stock = $request->stock;
        $daftarbuku->save();

        return "Data Buku berhasil ditambahkan";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kode = $request->kode;
        $judul = $request->judul;
        $pengarang = $request->pengarang;
        $tahun = $request->tahun;
        $deskripsi = $request->deskripsi;
        $stock = $request->stock;

        $daftarbuku= DaftarBuku::find($id);
        $daftarbuku->kode = $kode;
        $daftarbuku->judul = $judul;
        $daftarbuku->pengarang = $pengarang;
        $daftarbuku->tahun = $tahun;
        $daftarbuku->deskripsi = $deskripsi;
        $daftarbuku->stock = $stock;
        $daftarbuku->save();

        return "Data Buku berhasil diubah";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarBuku  $daftarBuku
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $daftarbuku = DaftarBuku::find($id);
        $daftarbuku->delete();

        return "Data Buku berhasil dihapus";
    }
}
