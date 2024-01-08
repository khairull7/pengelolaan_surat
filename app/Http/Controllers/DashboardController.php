<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\LetterType;
use App\Models\Notif;
use App\Models\Siswa;
use App\Models\Tunggakan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Retrieve users with role 'staff'
        $user = User::where('role', 'Staff')->get()->count();

        // Retrieve users with role 'guru'
        $guru = User::where('role', 'Guru')->get()->count();

        $klarifikasi = LetterType::all()->count();


        $notif = Notif::latest()->limit(5)->get();

        return view('staff.index', compact('user', 'guru', 'klarifikasi', 'notif'));
    }
    public function guru()
    {
        // Retrieve users with role 'staff'
        $user = User::where('role', 'Staff')->get()->count();

        // Retrieve users with role 'guru'
        $guru = User::where('role', 'Guru')->get()->count();

        $klarifikasi = LetterType::all()->count();


        $notif = Notif::latest()->limit(5)->get();

        return view('guru.index', compact('user', 'guru', 'klarifikasi', 'notif'));
    }
}
