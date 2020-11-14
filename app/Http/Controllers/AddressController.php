<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {
    	$address = DB::table('addresses')->paginate(10);

    	return view('address', ['address' => $address]);
    }

    public function create()
    {
        return view('create_address');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Isian tidak boleh kosong!',
            'min' => ':Isian harus diisi minimal :min karakter!'
        ];

        $this->validate($request,[
    		'name' => 'required|min:5',
            'phonenumber' => 'required|min:5',
            'address' => 'required'
        ]);

        Address::create([
    		'name' => $request->name,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address
        ]);

    	return redirect('/address');
    }

    public function edit($id)
    {
        $address = Address::find($id);
        return view('edit-address', ['address' => $address]);
    }

    public function delete($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect('/address');
    }

    public function update($id, Request $request)
    {
        $messages = [
            'required' => ':Isian tidak boleh kosong!',
            'min' => ':Isian harus diisi minimal :min karakter!'
        ];

        $this->validate($request,[
    		'name' => 'required|min:5',
            'phonenumber' => 'required|min:5',
            'address' => 'required'
        ]);

        $address = Address::find($id);
        $address->name = $request->name;
        $address->phonenumber = $request->phonenumber;
        $address->address = $request->address;
        $address->save();

        return redirect('/address');

    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;

    		// mengambil data dari table pegawai sesuai pencarian data
		$address = DB::table('address')
		->where('address','like',"%".$search."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('address',['address' => $address]);

	}
}
