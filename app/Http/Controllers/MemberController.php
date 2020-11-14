<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
    	$member = DB::table('members')->paginate(10);

    	return view('member', ['member' => $member]);
    }

    public function create()
    {
        return view('create_member');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Isian tidak boleh kosong!',
            'min' => ':Isian harus diisi minimal :min karakter!'
        ];

        $this->validate($request,[
    		'idmember' => 'required|min:5',
            'ktp' => 'required|min:16',
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required|min:5',
            'phonenumber' => 'required|min:5',
            'address' => 'required',
            'upline' => 'required',
            'firstproduct' => 'required',
            'joindate' => 'required'
        ]);

        Member::create([
    		'idmember' => $request->idmember,
            'ktp' => $request->ktp,
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
            'upline' => $request->upline,
            'firstproduct' => $request->firstproduct,
            'joindate' => $request->joindate
        ]);

    	return redirect('/member');
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('edit_member', ['member' => $member]);
    }

    public function update($id, Request $request)
    {
        $messages = [
            'required' => ':Isian tidak boleh kosong!',
            'min' => ':Isian harus diisi minimal :min karakter!'
        ];

        $this->validate($request,[
    		'idmember' => 'required|min:5',
            'ktp' => 'required|min:16',
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required|min:5',
            'phonenumber' => 'required|min:5',
            'address' => 'required',
            'upline' => 'required',
            'firstproduct' => 'required',
            'joindate' => 'required',
        ]);

        $member = Member::find($id);
        $member->idmember = $request->idmember;
        $member->ktp = $request->ktp;
        $member->name = $request->name;
        $member->dob = $request->dob;
        $member->email = $request->email;
        $member->phonenumber = $request->phonenumber;
        $member->address = $request->address;
        $member->upline = $request->upline;
        $member->firstproduct = $request->firstproduct;
        $member->joindate = $request->joindate;
        $member->save();

        return redirect('/member');

    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/member');
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;

    		// mengambil data dari table pegawai sesuai pencarian data
		$member = DB::table('member')
		->where('name','like',"%".$search."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('member',['member' => $member]);

	}
}
