<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //GET /admin : tampil semua data
    public function index()
    {
        $data['judul']  = 'Data Admin';
        $data['admins'] = Admin::orderBy('id_admin', 'asc')->get();
        return view('tampildata_admin', $data);
    }

    //GET /admin/create : form tambah
    public function create()
    {
        $data['judul'] = 'Tambah Admin';
        return view('create_admin', $data);
    }

    //POST /admin : simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|integer|unique:admins,id_admin',
            'username' => 'required|max:100',
            'password' => 'required|min:4|max:100',
        ]);

        $admin = new Admin;
        $admin->id_admin = $request->id_admin;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect('/admin')->with('success', 'Data admin berhasil ditambahkan.');
    }

    //GET /admin/{admin} : detail (diarahkan ke form edit)
    public function show(Admin $admin)
    {
        return redirect('/admin/' . $admin->id_admin . '/edit');
    }

    //GET /admin/{admin}/edit : form edit
    public function edit(Admin $admin)
    {
        $data['judul'] = 'Edit Admin';
        $data['admin'] = $admin;
        return view('edit_admin', $data);
    }

    //PUT /admin/{admin} : simpan perubahan
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'username' => 'required|max:100',
            'password' => 'nullable|min:4|max:100',
        ]);

        $admin->username = $request->username;

        //password hanya diubah kalau diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect('/admin')->with('success', 'Data admin berhasil diubah.');
    }

    //DELETE /admin/{admin} : hapus data
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('/admin')->with('success', 'Data admin berhasil dihapus.');
    }
}
