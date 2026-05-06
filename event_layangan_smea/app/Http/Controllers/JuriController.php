<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class JuriController extends Controller
{
    // HAPUS constructor middleware kalau sudah ada di route
    // public function __construct() { ... } // ← hapus ini

    public function index()
    {
        $karya = Karya::with(['user', 'penilaian'])->get();

        $ranking = Karya::with('user')
            ->withSum('penilaian', 'total')
            ->orderByRaw('penilaian_sum_total IS NULL ASC')
            ->orderByDesc('penilaian_sum_total')
            ->get();

        return view('juri.dashboard', compact('karya', 'ranking'));
    }

    public function simpanNilai(Request $request, $karya_id)
    {
        $request->validate([
            'kreativitas' => 'required|numeric|min:0|max:100',
            'keindahan'   => 'required|numeric|min:0|max:100',
            'keunikan'    => 'required|numeric|min:0|max:100',
        ]);

        $total = $request->kreativitas + $request->keindahan + $request->keunikan;

        $karya = Karya::findOrFail($karya_id);

        Penilaian::updateOrCreate(
            [
                'karya_id' => $karya->id,
                'user_id'  => auth()->id(),
            ],
            [
                'kreativitas' => $request->kreativitas,
                'keindahan'   => $request->keindahan,
                'keunikan'    => $request->keunikan,
                'total'       => $total,
            ]
        );

        return back()->with('success', "Nilai karya \"{$karya->judul}\" berhasil disimpan! Total: {$total}");
    }
}