<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produks.index', compact('produks'));
    }

    public function create()
    {
        return view('produks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        Produk::create($request->all());

        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(Produk $produk)
    {
        return view('produks.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produks.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        $produk->update($request->all());

        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus');
    }
}
