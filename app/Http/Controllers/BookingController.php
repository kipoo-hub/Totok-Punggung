<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Halaman utama (info + form booking)
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Proses booking & redirect ke WhatsApp
     */
    public function submit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'keluhan' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P'
        ]);
        $bentrok = Booking::where('tanggal', $request->tanggal)
            ->where('jam', $request->jam)
            ->exists();

        if ($bentrok) {
            return back()->with('error', 'Jam tersebut sudah dibooking, silakan pilih jam lain.');
        }

        // Simpan booking
        Booking::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keluhan' => $request->keluhan,
        ]);
        // Nomor WhatsApp (PAKAI FORMAT 62)
        $waAyah = '6281365101312'; // ganti nomor ayah
        $waIbu = '628127500434'; // ganti nomor ibu

        // Tentukan nomor tujuan
        $nomor = $request->jenis_kelamin === 'L'
            ? $waAyah
            : $waIbu;

        // Ubah L / P jadi teks
        $jk = $request->jenis_kelamin === 'L'
            ? 'Laki-laki'
            : 'Perempuan';

        // Format pesan WhatsApp
        $pesan = urlencode(
            "Halo, saya ingin booking terapi totok punggung.\n\n" .
            "Nama: {$request->nama}\n" .
            "Tanggal: {$request->tanggal}\n" .
            "Jam: {$request->jam}\n" .
            "Jenis Kelamin: {$jk}\n" .
            "Keluhan: {$request->keluhan}"
        );

        return redirect("https://wa.me/{$nomor}?text={$pesan}");
    }
}
