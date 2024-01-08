<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\LetterType;
use App\Models\User;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasurat = Letter::all();
        return view('staff.datasurat.index', compact('datasurat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klarifikasi = LetterType::all();
        $user = User::all();

        return view('staff.datasurat.create', compact('klarifikasi', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $newName = '';

    if ($request->hasFile('file_upload')) {
        $gambarNameExtension = $request->file('file_upload')->getClientOriginalExtension();
        $newName = $request->letter_perihal.'-'.$request->letter_type_id.'-'.now()->timestamp.'.'.$gambarNameExtension;
        $request->file('file_upload')->storeAs('img', $newName);
    }

    // Inisialisasi $arrayDistinct sebagai array kosong
    $arrayDistinct = [];

    if ($request->has('recipients') && is_array($request->recipients)) {
        $arrayDistinct = array_count_values($request->recipients);
    }

    $arrayAssoc = [];
    foreach ($arrayDistinct as $id => $count) {
        $user = User::find($id);

        if ($user) {
            $arrayItem = [
                "id" => $id,
                "name" => $user->name,
            ];
            array_push($arrayAssoc, $arrayItem);
        }
    }

    $request['attachment'] = $newName;
    $request['recipients'] = json_encode($arrayAssoc);

    $result = Letter::create($request->all());

    return redirect()->route('staff.datasurat.show', $result->id)->with('message', 'Berhasil Menambahkan Data Surat!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $letter = Letter::findOrFail($id);
        return view('staff.datasurat.show', compact('letter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
