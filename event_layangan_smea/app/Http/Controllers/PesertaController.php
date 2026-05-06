<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    /**
     * Dashboard Peserta
     */
    public function index()
    {
        // ambil karya milik user login
        $karya = Karya::where('user_id', Auth::id())->get();

        return view('peserta.dashboard', compact('karya'));
    }

    /**
     * Upload karya
     */
   public function upload(Request $request)
{
    $request->validate([
        'file'  => 'required|image|mimes:jpg,jpeg,png|max:10240',
        'judul' => 'required|string|max:255',
    ]);

    $path = $request->file('file')->store('karya', 'public');

    Karya::create([
        'user_id' => auth()->id(),
        'judul'   => $request->judul,
        'file'    => $path,
    ]);

    return back()->with('success', 'Karya berhasil diupload!');
}
    /**
     * Hapus karya (opsional)
     */
    public function delete($id)
    {
        $karya = Karya::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // hapus file dari storage
        if ($karya->file && file_exists(storage_path('app/' . $karya->file))) {
            unlink(storage_path('app/' . $karya->file));
        }

        // hapus data
        $karya->delete();

        return back()->with('success', 'Karya berhasil dihapus');
    }
}