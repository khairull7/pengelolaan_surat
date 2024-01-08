<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notif;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Middleware\Petugas;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('staff.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('staff.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
        Notif::create([
            'user' => Auth::user()->name,
            'waktu' => date("Y-m-d h:i:s"),
            'aktivitas' => 'Menambahkan Data User',
        ]);
        return redirect()->route('user.index')->with('success', 'Berhasil Menambahkan Data User');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('staff.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $user->update($request->all());
        Notif::create([
            'user' => Auth::user()->name,
            'waktu' => date("Y-m-d h:i:s"),
            'aktivitas' => 'Mengedit Data User',
        ]);
        return redirect()->route('user.index')->with('success', 'Berhasil Mengedit Data User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        if ($petugas) {
            $petugas->delete();
            Notif::create([
                'user' => Auth::user()->name,
                'waktu' => date("Y-m-d h:i:s"),
                'aktivitas' => 'Menghapus Data User',
            ]);
            return redirect()->route('user.index')->with('success', 'Berhasil Menghapus Data User');
        }
    }
}
