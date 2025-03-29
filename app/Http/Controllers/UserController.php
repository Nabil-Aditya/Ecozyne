<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Komunitas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:user,username',
            'email' => 'required|string|email|max:255|unique:user,email',
            'password' => 'required|string|min:6',
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|min:10|max:12|unique:komunitas,no_telp',
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
        ]);

        // Jika validasi gagal, tampilkan pesan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat User dengan role default "komunitas"
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'komunitas', // Otomatis isi role sebagai komunitas
        ]);

        // Debugging untuk memastikan id_user valid
        if (!$user->id_user) {
            return redirect()->back()->with('error', 'Registrasi gagal: ID user tidak valid.');
        }

        // Buat Komunitas terkait user yang baru dibuat
        Komunitas::create([
            'id_user' => $user->id_user, 
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
        ]);

        // Jika registrasi berhasil, kirim pesan sukses
        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id, 'role' => $user->role]);

            switch ($user->role) {
                case 'admin':
                    return redirect('/admin/index');
                case 'komunitas':
                    return redirect('index' . $user->id);
                default:
                    return redirect('/login')->with('error', 'Role tidak dikenali.');
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    
    public function data_pengguna()
    {
       
        $komunitas = Komunitas::whereHas('user', function ($query) {
            $query->where('role', 'komunitas');
        })->get();
     
        return view('/admin/index', compact('komunitas')); 
    }
    
    public function data_komunitas()
    {
        // Ambil hanya pengguna yang memiliki role 'komunitas'
        $komunitas = Komunitas::whereHas('user', function ($query) {
            $query->where('role', 'komunitas');
        })->get();
    
        return view('/admin/view-komunitas', compact('komunitas')); 
    }
}