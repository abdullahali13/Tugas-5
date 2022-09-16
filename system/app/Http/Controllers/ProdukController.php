<?php

namespace App\Http\Controllers;

use App\Models\Produk;


class ProdukController extends Controller
{
    function index()
    {
        $data['list_produk'] = Produk::all();
        return view('template-admin.produk.index', $data);
    }
    function create()
    {
        return view('template-admin.produk.create');
    }
    function store()
    {
        $produk = new Produk;
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->kondisi = request('kondisi');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
    }
    function show(Produk $produk)
    {
        $data['produk'] = $produk;
        return view('template-admin.produk.show', $data);
    }
    function edit(Produk $produk)
    {
        $data['produk'] = $produk;
        return view('template-admin.produk.edit', $data);
    }
    function update(Produk $produk)
    {
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->kondisi = request('kondisi');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect('admin/produk')->with('warning', 'Data Berhasil Ditambahkan');
    }
    function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect('admin/produk')->with('danger', 'Data Berhasil Dihapus');
    }
}
