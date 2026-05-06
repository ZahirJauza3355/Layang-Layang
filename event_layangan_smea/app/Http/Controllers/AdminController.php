<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karya;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function index()
    {
        // semua peserta
        $users = User::where('role', 'peserta')->get();

        // semua karya + user
        $karya = Karya::with('user')->get();

        // ranking berdasarkan total nilai
        $ranking = Karya::with('user')
            ->withSum('penilaian', 'total')
            ->orderByDesc('penilaian_sum_total')
            ->get();

        return view('admin.dashboard', compact('users', 'karya', 'ranking'));
    }

    /**
     * ACC peserta
     */
    public function approve($id)
    {
        $user = User::findOrFail($id);

        $user->is_approved = true;
        $user->save();

        return back()->with('success', 'Peserta berhasil di-ACC');
    }

    /**
     * Hapus peserta (opsional)
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Peserta berhasil dihapus');
    }
}