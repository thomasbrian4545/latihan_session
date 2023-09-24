<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        echo '<ul>';
        echo '<li><a href=/buat-session>Buat Session</a></li>';
        echo '<li><a href=/akses-session>Akses Session</a></li>';
        echo '<li><a href=/hapus-session>Hapus Session</a></li>';
        echo '<li><a href=/flash-session>Flash Session</a></li>';
        echo '</ul>';
    }
    public function buatSession()
    {
        session(['hakAkses' => 'admin', 'nama' => 'Anto']);
        return "Session sudah dibuat";
    }
    public function aksesSession(Request $request)
    {
        // echo session('hakAkses');
        // echo session('nama');
        // dump(session()->all());
        // $isiSession = $request->session()->get('kota', 'Jakarta');
        // echo "Isi session adalah $isiSession";
        if (session()->has('hakAkses')) {
            echo "Session 'hakAkses' terdeteksi: " . session('hakAkses');
        }
    }
    public function hapusSession()
    {
        session()->flush();
        echo "Semua session sudah dihapus";
    }
    public function flashSession()
    {
        session()->flash('hakAkses', 'admin');
        echo "Flash session hakAkses sudah dibuat";
    }
}
