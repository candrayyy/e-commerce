<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\Ongkir;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get()->all();
        $kategori = Kategori::get()->all();
        $dtProduk = Produk::orderBy('id', 'desc')->paginate(5);
        return view('user.beranda', compact('dtProduk', 'user', 'kategori'));
    }

    public function hasil(Request $request)
    {
        $kategoris = Produk::select('kategori_id')->get()->sort();

        $produk = Produk::query();
        if($request->filled('kategori_id')){
            $produk->whereIn('kategori_id', $request->kategori_id);
        }
        // dd($request->kategori_id);
        $checked = $_GET['kategori_id'];

        return view('user.hasil', [
            'kategoris' => $checked,
            'produks' => $produk->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($slug)
    {
        $detail = Produk::where('slug', $slug)->first();
        //dd($detail);
        return view('user.detail', compact('detail'));
    }
}
