<?php

namespace App\Http\Controllers;

use App\Exports\KlarifikasiSuratExport;
use App\Models\LetterType;
use App\Models\Notif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klarifikasi = LetterType::all();
        return view('staff.klarifikasi.index', compact('klarifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klarifikasi = LetterType::all();
        return view('staff.klarifikasi.create', compact('klarifikasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => ['required', 'string'],
            'name_type' => ['required', 'string'],
        ]);

        // Menggunakan query builder untuk menghitung jumlah data surat
        $jumlahDataSurat = DB::table('lettertypes')->count();

        // Membuat Kode Surat
        $request['surat_tertaut'] = $jumlahDataSurat + 1;
        $request['letter_code'] = $request['letter_code'] . '-' . $request['surat_tertaut'];

        LetterType::create($request->all());
        Notif::create([
            'user' => Auth::user()->name,
            'waktu' => date("Y-m-d h:i:s"),
            'aktivitas' => 'Menambah Data Klarifikasi Surat',
        ]);

        return redirect()->route('klarifikasi.index')->with('success', 'Berhasil Menambahkan Data Klarifikasi Surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterType $klarifikasi)
    {
        // $klarifikasi = LetterType::with('letter')->findOrFail($id);

        return view('staff.klarifikasi.show', compact('klarifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LetterType $klarifikasi)
    {
        return view('staff.klarifikasi.edit', compact('klarifikasi'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LetterType $klarifikasi)
    {
        $request->validate([
            'letter_code' => ['required', 'string'],
            'name_type' => ['required', 'string'],

        ]);
        // Menggunakan query builder untuk menghitung jumlah data
        $jumlahDataSurat = LetterType::count();

        // Membuat Kode Surat
        $request['letter_code'] = $request['letter_code'] . '-' . $jumlahDataSurat;

        $klarifikasi->update($request->all());
        Notif::create([
            'user' => Auth::user()->name,
            'waktu' => date("Y-m-d h:i:s"),
            'aktivitas' => 'Mengedit Data Klarifikasi Surat',
        ]);
        return to_route('klarifikasi.index')->with('success', 'Berhasil Mengedit Data Klarifikasi Surat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $klarifikasi = LetterType::findOrFail($id);
        if ($klarifikasi) {
            $klarifikasi->delete();
            Notif::create([
                'user' => Auth::user()->name,
                'waktu' => date("Y-m-d h:i:s"),
                'aktivitas' => 'Menghapus Data Klarifikasi Surat',
            ]);
            return redirect()->route('klarifikasi.index')->with('success', 'Berhasil Menghapus data Klarifikasi Surat');
        }
    }

    public function export()
    {
        return Excel::download(new KlarifikasiSuratExport(), 'Klarifikasi-surat.xlsx');
    }
}
