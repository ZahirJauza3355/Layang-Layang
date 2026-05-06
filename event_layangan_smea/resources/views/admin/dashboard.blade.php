<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin – Festival Layang-Layang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #060e1a;
            color: #fff;
            min-height: 100vh;
            display: flex;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 220px;
            background: #0b1a30;
            border-right: 1px solid rgba(255,255,255,0.06);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            min-height: 100vh;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .sb-logo {
            padding: 22px 22px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            margin-bottom: 14px;
        }

        .sb-brand { font-size: 14px; font-weight: 700; color: #ffd700; letter-spacing: 1.5px; }
        .sb-sub   { font-size: 10px; color: rgba(255,255,255,0.3); margin-top: 3px; }

        .sb-section {
            font-size: 9px; font-weight: 700;
            color: rgba(255,255,255,0.22);
            letter-spacing: 1.8px; text-transform: uppercase;
            padding: 0 20px; margin: 12px 0 6px;
        }

        .sb-nav { list-style: none; padding: 0 10px; }
        .sb-nav li { margin-bottom: 2px; }

        .sb-nav li a {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 13px;
            font-size: 12px; color: rgba(255,255,255,0.5);
            text-decoration: none; border-radius: 8px; transition: .15s;
        }

        .sb-nav li a:hover  { color: #fff; background: rgba(255,255,255,0.05); }
        .sb-nav li a.active { color: #ffd700; background: rgba(255,215,0,0.08); font-weight: 600; }
        .sb-nav li a svg    { width: 15px; height: 15px; flex-shrink: 0; }

        .sb-bottom {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.06);
            display: flex; align-items: center; gap: 10px;
        }

        .sb-av {
            width: 36px; height: 36px; border-radius: 50%;
            background: #1a3a6e;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: #ffd700; flex-shrink: 0;
        }

        .sb-un { font-size: 12px; color: #fff; font-weight: 500; }
        .sb-ur { font-size: 10px; color: rgba(255,255,255,0.3); margin-top: 2px; }

        /* ===== MAIN ===== */
        .main { flex: 1; display: flex; flex-direction: column; min-width: 0; overflow-y: auto; }

        .topbar {
            background: #0b1a30;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            padding: 15px 28px;
            display: flex; justify-content: space-between; align-items: center;
            position: sticky; top: 0; z-index: 100;
        }

        .tb-title { font-size: 15px; font-weight: 700; color: #fff; }
        .tb-sub   { font-size: 11px; color: rgba(255,255,255,0.3); margin-top: 2px; }

        .logout-btn {
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #f87171;
            font-size: 12px; font-weight: 600;
            padding: 9px 18px; border-radius: 8px;
            cursor: pointer; font-family: 'Poppins', sans-serif; transition: .2s;
            display: flex; align-items: center; gap: 6px;
        }

        .logout-btn:hover { background: rgba(239,68,68,0.22); }

        .content { padding: 26px 28px; flex: 1; }

        /* ===== FLASH ===== */
        .flash {
            padding: 12px 16px; border-radius: 8px;
            font-size: 12px; font-weight: 500;
            margin-bottom: 20px;
            display: flex; align-items: center; gap: 8px;
        }
        .flash-success { background: rgba(34,197,94,0.1);  border: 0.5px solid rgba(34,197,94,0.3);  color: #4ade80; }
        .flash-error   { background: rgba(239,68,68,0.1);  border: 0.5px solid rgba(239,68,68,0.3);  color: #f87171; }

        /* ===== STATS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .s-card {
            background: #0b1a30;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 13px;
            padding: 18px 20px;
        }

        .s-label {
            font-size: 10px; font-weight: 600;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1.1px; text-transform: uppercase;
            margin-bottom: 8px;
        }

        .s-val   { font-size: 28px; font-weight: 700; color: #fff; margin-bottom: 8px; }

        .s-badge {
            display: inline-block;
            font-size: 10px; font-weight: 600;
            padding: 3px 10px; border-radius: 6px;
        }

        .bg-gold   { background: rgba(255,215,0,0.12);   color: #ffd700; }
        .bg-blue   { background: rgba(59,130,246,0.12);  color: #60a5fa; }
        .bg-green  { background: rgba(34,197,94,0.12);   color: #4ade80; }
        .bg-purple { background: rgba(167,139,250,0.12); color: #a78bfa; }

        /* ===== TWO COL ===== */
        .two-col {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        /* ===== PANEL ===== */
        .panel {
            background: #0b1a30;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 13px;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .panel:last-child { margin-bottom: 0; }

        .ph {
            padding: 13px 20px;
            border-bottom: 0.5px solid rgba(255,255,255,0.06);
            display: flex; justify-content: space-between; align-items: center;
        }

        .ph-title { font-size: 13px; font-weight: 600; color: #fff; }
        .ph-tag   { font-size: 10px; color: rgba(255,255,255,0.3); }

        /* ===== TABLE ===== */
        .ptable { width: 100%; border-collapse: collapse; }

        .ptable th {
            font-size: 10px; font-weight: 600;
            color: rgba(255,255,255,0.3);
            letter-spacing: 1px; text-transform: uppercase;
            padding: 10px 20px; text-align: left;
            background: rgba(255,255,255,0.02);
            border-bottom: 0.5px solid rgba(255,255,255,0.05);
        }

        .ptable td {
            font-size: 12px; color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-bottom: 0.5px solid rgba(255,255,255,0.04);
            vertical-align: middle;
        }

        .ptable tr:last-child td { border-bottom: none; }
        .ptable tr:hover td     { background: rgba(255,255,255,0.02); }

        .td-name  { font-weight: 600; color: #fff; font-size: 12px; }
        .td-email { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }

        /* ===== STATUS ===== */
        .status-yes {
            background: rgba(34,197,94,0.12); color: #4ade80;
            font-size: 10px; font-weight: 600;
            padding: 4px 10px; border-radius: 6px; white-space: nowrap;
        }

        .status-no {
            background: rgba(239,68,68,0.12); color: #f87171;
            font-size: 10px; font-weight: 600;
            padding: 4px 10px; border-radius: 6px; white-space: nowrap;
        }

        /* ===== TOMBOL ===== */
        .btn-acc {
            background: rgba(34,197,94,0.1);
            border: 0.5px solid rgba(34,197,94,0.3);
            color: #4ade80;
            font-size: 11px; font-weight: 600;
            padding: 6px 13px; border-radius: 6px;
            cursor: pointer; font-family: 'Poppins', sans-serif; transition: .15s;
        }

        .btn-acc:hover { background: rgba(34,197,94,0.22); }

        .btn-del {
            background: rgba(239,68,68,0.08);
            border: 0.5px solid rgba(239,68,68,0.2);
            color: #f87171;
            font-size: 11px; font-weight: 600;
            padding: 6px 11px; border-radius: 6px;
            cursor: pointer; font-family: 'Poppins', sans-serif; transition: .15s;
        }

        .btn-del:hover { background: rgba(239,68,68,0.18); }

        .aksi-wrap { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
        .aksi-wrap form { display: inline; }

        /* ===== KARYA ===== */
        .karya-item {
            display: flex; align-items: center; gap: 13px;
            padding: 12px 20px;
            border-bottom: 0.5px solid rgba(255,255,255,0.04);
        }

        .karya-item:last-child { border-bottom: none; }

        .karya-ph {
            width: 44px; height: 44px; border-radius: 8px;
            background: #1a3a6e;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; flex-shrink: 0;
        }

        .karya-thumb {
            width: 44px; height: 44px;
            border-radius: 8px; object-fit: cover; flex-shrink: 0;
        }

        .karya-name  { font-size: 12px; font-weight: 600; color: #fff; }
        .karya-owner { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }

        /* ===== RANKING ===== */
        .rank-row {
            display: grid;
            grid-template-columns: 50px 1fr 80px 70px;
            align-items: center;
            padding: 12px 20px;
            border-bottom: 0.5px solid rgba(255,255,255,0.04);
            transition: background .15s;
        }

        .rank-row:hover      { background: rgba(255,255,255,0.02); }
        .rank-row:last-child { border-bottom: none; }

        .rank-head {
            background: rgba(255,255,255,0.02);
            font-size: 10px; color: rgba(255,255,255,0.3);
            letter-spacing: 1px; text-transform: uppercase; font-weight: 600;
        }

        .rn     { font-size: 18px; }
        .rn-num { font-size: 13px; color: rgba(255,255,255,0.25); font-weight: 600; }
        .r-name { font-size: 12px; font-weight: 600; color: #fff; }
        .r-title{ font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }
        .r-score{ font-size: 15px; font-weight: 700; color: #fff; text-align: right; }
        .r-sub  { font-size: 10px; color: rgba(255,255,255,0.3); text-align: right; }
        .r-karya{ font-size: 11px; color: rgba(255,255,255,0.3); text-align: right; }

        .empty-state {
            padding: 28px; text-align: center;
            font-size: 12px; color: rgba(255,255,255,0.3);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .two-col    { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .sidebar    { display: none; }
            .content    { padding: 16px; }
            .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
            .rank-row   { grid-template-columns: 40px 1fr 60px; }
            .rank-row > div:nth-child(3) { display: none; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

{{-- ===== SIDEBAR ===== --}}
<div class="sidebar">
    <div class="sb-logo">
        <div class="sb-brand">🪁 FESTIVAL</div>
        <div class="sb-sub">Admin Panel</div>
    </div>

    <div class="sb-section">Menu Utama</div>
    <ul class="sb-nav">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="active">
                <svg viewBox="0 0 16 16" fill="currentColor">
                    <rect x="1" y="1" width="6" height="6" rx="1"/>
                    <rect x="9" y="1" width="6" height="6" rx="1"/>
                    <rect x="1" y="9" width="6" height="6" rx="1"/>
                    <rect x="9" y="9" width="6" height="6" rx="1"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">
                <svg viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 8a3 3 0 100-6 3 3 0 000 6zm-5 6a5 5 0 0110 0H3z"/>
                </svg>
                Kelola Peserta
            </a>
        </li>
        <li>
            <a href="#">
                <svg viewBox="0 0 16 16" fill="currentColor">
                    <path d="M2 4h12v1H2zm0 4h12v1H2zm0 4h8v1H2z"/>
                </svg>
                Kelola Karya
            </a>
        </li>
        <li>
            <a href="#">
                <svg viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 1l1.8 4.5H15l-3.9 2.8 1.5 4.7L8 10.2l-4.6 2.8 1.5-4.7L1 5.5h5.2z"/>
                </svg>
                Ranking
            </a>
        </li>
    </ul>

    <div class="sb-bottom">
        <div class="sb-av">
            {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
        </div>
        <div>
            <div class="sb-un">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="sb-ur">Administrator</div>
        </div>
    </div>
</div>

{{-- ===== MAIN ===== --}}
<div class="main">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div>
            <div class="tb-title">Panel Admin</div>
            <div class="tb-sub">Festival Layang-Layang Nusantara 2026 – SMKN 1 Wonosobo</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn"
                    onclick="return confirm('Yakin ingin logout?')">
                <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M10 2H3a1 1 0 00-1 1v10a1 1 0 001 1h7v-2H4V4h6V2zm3.7 6l-3-3-.7.7 2 2H6v1h6l-2 2 .7.7 3-3z"/>
                </svg>
                Logout
            </button>
        </form>
    </div>

    <div class="content">

        {{-- FLASH --}}
        @if(session('success'))
            <div class="flash flash-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">⚠ {{ session('error') }}</div>
        @endif

        {{-- STATS --}}
        @php
            $belumAcc   = $users->where('is_approved', false)->count();
            $sudahNilai = $ranking->whereNotNull('penilaian_sum_total')->count();
        @endphp

        <div class="stats-grid">
            <div class="s-card">
                <div class="s-label">Total Peserta</div>
                <div class="s-val">{{ $users->count() }}</div>
                <span class="s-badge bg-blue">Terdaftar</span>
            </div>
            <div class="s-card">
                <div class="s-label">Belum Di-ACC</div>
                <div class="s-val">{{ $belumAcc }}</div>
                <span class="s-badge bg-gold">Menunggu</span>
            </div>
            <div class="s-card">
                <div class="s-label">Total Karya</div>
                <div class="s-val">{{ $karya->count() }}</div>
                <span class="s-badge bg-green">Karya</span>
            </div>
            <div class="s-card">
                <div class="s-label">Sudah Dinilai</div>
                <div class="s-val">{{ $sudahNilai }}</div>
                <span class="s-badge bg-purple">Penilaian</span>
            </div>
        </div>

        {{-- PESERTA + KARYA --}}
        <div class="two-col">

            {{-- Daftar Peserta --}}
            <div class="panel">
                <div class="ph">
                    <span class="ph-title">Daftar Peserta</span>
                    <span class="ph-tag">{{ $users->count() }} peserta</span>
                </div>
                <table class="ptable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $u)
                        <tr>
                            <td>
                                <div class="td-name">{{ $u->name }}</div>
                                <div class="td-email">{{ $u->email }}</div>
                            </td>
                            <td>
                                @if($u->is_approved)
                                    <span class="status-yes">Disetujui</span>
                                @else
                                    <span class="status-no">Belum</span>
                                @endif
                            </td>
                            <td>
                                <div class="aksi-wrap">
                                    {{-- Tombol ACC --}}
                                    @if(!$u->is_approved)
                                        <form method="POST"
                                              action="{{ route('admin.approve', $u->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-acc">✓ ACC</button>
                                        </form>
                                    @endif

                                    {{-- Tombol Hapus --}}
                                    <form method="POST"
                                          action="{{ route('admin.delete', $u->id) }}"
                                          onsubmit="return confirm('Hapus peserta ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-del">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="empty-state">Belum ada peserta terdaftar</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Karya Masuk --}}
            <div class="panel">
                <div class="ph">
                    <span class="ph-title">Karya Masuk</span>
                    <span class="ph-tag">{{ $karya->count() }} karya</span>
                </div>

                @forelse($karya as $k)
                <div class="karya-item">
                    @if($k->file)
                        <img class="karya-thumb"
                             src="{{ asset('storage/' . $k->file) }}"
                             alt="{{ $k->judul }}">
                    @else
                        <div class="karya-ph">🪁</div>
                    @endif
                    <div style="flex:1; min-width:0;">
                        <div class="karya-name" style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                            {{ $k->judul }}
                        </div>
                        <div class="karya-owner">{{ $k->user->name ?? '-' }}</div>
                    </div>
                    <span class="status-yes">OK</span>
                </div>
                @empty
                <div class="empty-state">Belum ada karya masuk</div>
                @endforelse
            </div>
        </div>

        {{-- RANKING --}}
        <div class="panel">
            <div class="ph">
                <span class="ph-title">Ranking Peserta</span>
                <span class="ph-tag">Berdasarkan total penilaian juri</span>
            </div>

            <div class="rank-row rank-head">
                <div>#</div>
                <div>Peserta</div>
                <div style="text-align:right">Karya</div>
                <div style="text-align:right">Nilai</div>
            </div>

            @forelse($ranking as $index => $r)
                @php $no = $index + 1; @endphp
                <div class="rank-row">
                    <div class="rn">
                        @if($no == 1) 🥇
                        @elseif($no == 2) 🥈
                        @elseif($no == 3) 🥉
                        @else <span class="rn-num">{{ $no }}</span>
                        @endif
                    </div>
                    <div>
                        <div class="r-name">{{ $r->user->name ?? '-' }}</div>
                        <div class="r-title">{{ $r->judul }}</div>
                    </div>
                    <div class="r-karya">
                        {{ optional($r->user)->karya()->count() ?? 0 }} karya
                    </div>
                    <div>
                        <div class="r-score">{{ $r->penilaian_sum_total ?? 0 }}</div>
                        <div class="r-sub">poin</div>
                    </div>
                </div>
            @empty
            <div class="empty-state">Belum ada data penilaian</div>
            @endforelse
        </div>

    </div>
</div>

</body>
</html>