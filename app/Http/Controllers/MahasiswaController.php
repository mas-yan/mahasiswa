<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
	public function index()
	{
		$mahasiswa = DB::table('mahasiswa')->get();
		return view('mahasiswa',['mahasiswa' => $mahasiswa]);
	}

	public function add(Request $request)
	{
		$request->validate([
			'nim' => 'required',
			'nama' => 'required',
			'fakultas' => 'required',
			'prodi' => 'required',
			]);

		DB::table('mahasiswa')->insert([
			'nim' => $request -> nim,
			'nama' => $request -> nama,
			'fakultas' => $request -> fakultas,
			'prodi' => $request -> prodi,
			]);
		return redirect('mahasiswa')->with('status','Mahasiswa Added!');
	}

	public function edit(Request $request)
	{
		$request->validate([
			'nim' => 'required',
			'nama' => 'required',
			'fakultas' => 'required',
			'prodi' => 'required',
			]);

		DB::table('mahasiswa')->where('id',$request->id)->update([
			'nim' => $request -> nim,
			'nama' => $request -> nama,
			'fakultas' => $request -> fakultas,
			'prodi' => $request -> prodi,
			]);
		return redirect('mahasiswa')->with('status','Mahasiswa Update!');
	}

	public function hapus($id)
	{
		DB::table('mahasiswa')->where('id',$id)->delete();
		return redirect('mahasiswa')->with('status','Mahasiswa Deleted!');
	}
}
