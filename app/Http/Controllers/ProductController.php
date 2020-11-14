<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->paginate(10);

    	return view('product', ['product' => $product]);
    }

    public function create()
    {
        return view('create_product');
    }

    public function store(Request $request)
    {

        $messages = [
            'required' => ':Isian tidak boleh kosong!',
            'min' => ':Isian harus diisi minimal :min karakter!'
        ];

        $this->validate($request,[
    		'sku' => 'required|min:5',
            'productname' => 'required|min:5',
            'stock' => 'required',
            'point' => 'required',
            'price' => 'required',
        ]);

        Product::create([
    		'sku' => $request->sku,
            'productname' => $request->productname,
            'price' => $request->price,
            'point' => $request->point,
            'stock' => $request->stock
        ]);

    	return redirect('/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit-product', ['product' => $product]);
    }

    public function update($id, Request $request)
    {
        $messages = [
            'required' => ':Isian tidak boleh kosong!',
            'min' => ':Isian harus diisi minimal :min karakter!'
        ];

        $this->validate($request,[
    		'sku' => 'required|min:5',
            'productname' => 'required|min:5',
            'point' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);
        $product->sku = $request->sku;
        $product->productname = $request->productname;
        $product->point = $request->point;
        $product->price = $request->price;
        $product->save();

        return redirect('/product');

    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;

    		// mengambil data dari table pegawai sesuai pencarian data
		$product = DB::table('product')
		->where('productname','like',"%".$search."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('product',['product' => $product]);

	}
}
