<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Juri – Festival Layang-Layang</title>
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
            background: rgba(255,215,0,0.15);
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
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 26px;
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

        /* ===== SECTION LABEL ===== */
        .sec-label {
            font-size: 10px; font-weight: 700;
            color: rgba(255,215,0,0.7);
            letter-spacing: 2px; text-transform: uppercase;
            margin-bottom: 6px;
        }

        .sec-heading {
            font-size: 16px; font-weight: 700; color: #fff;
            margin-bottom: 16px;
        }

        /* ===== KARYA CARDS ===== */
        .karya-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .karya-card {
            background: #0b1a30;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            overflow: hidden;
            transition: border-color .2s;
        }

        .karya-card:hover {
            border-color: rgba(255,215,0,0.25);
        }

        .karya-card-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
            background: #1a3a6e;
        }

        .karya-card-img-ph {
            width: 100%;
            height: 180px;
            background: #1a3a6e;
            display: flex; align-items: center; justify-content: center;
            font-size: 48px;
        }

        .karya-card-body { padding: 16px 18px; }

        .karya-judul {
            font-size: 14px; font-weight: 700; color: #fff;
            margin-bottom: 4px;
        }

        .karya-peserta {
            font-size: 11px; color: rgba(255,255,255,0.4);
            margin-bottom: 14px;
            display: flex; align-items: center; gap: 5px;
        }

        .karya-divider {
            height: 0.5px;
            background: rgba(255,255,255,0.07);
            margin-bottom: 14px;
        }

        /* ===== FORM NILAI ===== */
        .nilai-label {
            font-size: 10px; font-weight: 600;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1px; text-transform: uppercase;
            margin-bottom: 10px;
        }

        .nilai-inputs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 14px;
        }

        .nilai-field label {
            font-size: 10px; color: rgba(255,255,255,0.45);
            display: block; margin-bottom: 5px;
        }

        .nilai-field input {
            width: 100%;
            background: rgba(255,255,255,0.05);
            border: 0.5px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            padding: 9px 10px;
            color: #fff;
            font-size: 13px; font-weight: 600;
            font-family: 'Poppins', sans-serif;
            outline: none; transition: border-color .2s;
            text-align: center;
        }

        .nilai-field input:focus {
            border-color: rgba(255,215,0,0.5);
        }

        .nilai-field input::placeholder { color: rgba(255,255,255,0.2); }

        /* Tampilkan nilai yang sudah ada */
        .existing-score {
            background: rgba(255,215,0,0.08);
            border: 0.5px solid rgba(255,215,0,0.2);
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 14px;
            display: flex; align-items: center; justify-content: space-between;
        }

        .existing-score-label { font-size: 11px; color: rgba(255,255,255,0.5); }
        .existing-score-val   { font-size: 18px; font-weight: 700; color: #ffd700; }

        .simpan-btn {
            width: 100%;
            background: #ffd700;
            color: #5a3a00;
            border: none;
            border-radius: 8px;
            padding: 11px;
            font-size: 12px; font-weight: 700;
            cursor: pointer; font-family: 'Poppins', sans-serif; transition: .2s;
        }

        .simpan-btn:hover { background: #ffe94d; }

        /* ===== RANKING ===== */
        .panel {
            background: #0b1a30;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            overflow: hidden;
        }

        .ph {
            padding: 14px 20px;
            border-bottom: 0.5px solid rgba(255,255,255,0.06);
            display: flex; justify-content: space-between; align-items: center;
        }

        .ph-title { font-size: 13px; font-weight: 600; color: #fff; }
        .ph-tag   { font-size: 10px; color: rgba(255,255,255,0.3); }

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
        @media (max-width: 900px) {
            .sidebar      { display: none; }
            .stats-grid   { grid-template-columns: 1fr 1fr; }
            .karya-grid   { grid-template-columns: 1fr; }
            .content      { padding: 16px; }
            .rank-row     { grid-template-columns: 40px 1fr 60px; }
            .rank-row > div:nth-child(3) { display: none; }
        }
    </style>
</head>
<body>

{{-- ===== SIDEBAR ===== --}}
<div class="sidebar">
    <div class="sb-logo">
        <div class="sb-brand">🪁 FESTIVAL</div>
        <div class="sb-sub">Panel Juri</div>
    </div>

    <div class="sb-section">Menu</div>
    <ul class="sb-nav">
        <li>
            <a href="{{ route('juri.dashboard') }}" class="active">
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
                    <path d="M2 4h12v1H2zm0 4h12v1H2zm0 4h8v1H2z"/>
                </svg>
                Daftar Karya
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
            {{ strtoupper(substr(auth()->user()->name ?? 'JR', 0, 2)) }}
        </div>
        <div>
            <div class="sb-un">{{ auth()->user()->name ?? 'Juri' }}</div>
            <div class="sb-ur">Juri Penilai</div>
        </div>
    </div>
</div>

{{-- ===== MAIN ===== --}}
<div class="main">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div>
            <div class="tb-title">Panel Juri</div>
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
            $totalKarya   = $karya->count();
            $sudahDinilai = $karya->filter(fn($k) => $k->penilaian->where('user_id', auth()->id())->count() > 0)->count();
            $belumDinilai = $totalKarya - $sudahDinilai;
        @endphp

        <div class="stats-grid">
            <div class="s-card">
                <div class="s-label">Total Karya</div>
                <div class="s-val">{{ $totalKarya }}</div>
                <span class="s-badge bg-blue">Karya masuk</span>
            </div>
            <div class="s-card">
                <div class="s-label">Sudah Dinilai</div>
                <div class="s-val">{{ $sudahDinilai }}</div>
                <span class="s-badge bg-green">Selesai</span>
            </div>
            <div class="s-card">
                <div class="s-label">Belum Dinilai</div>
                <div class="s-val">{{ $belumDinilai }}</div>
                <span class="s-badge bg-gold">Menunggu</span>
            </div>
        </div>

        {{-- DAFTAR KARYA --}}
        <div class="sec-label">Penilaian</div>
        <div class="sec-heading">Daftar Karya Peserta</div>

        @if($karya->isEmpty())
            <div style="background:#0b1a30;border:0.5px solid rgba(255,255,255,0.08);border-radius:14px;padding:40px;text-align:center;">
                <div style="font-size:36px;margin-bottom:12px;">🪁</div>
                <div style="font-size:13px;color:rgba(255,255,255,0.4);">Belum ada karya yang masuk</div>
            </div>
        @else
        <div class="karya-grid">
            @foreach($karya as $k)
                @php
                    $nilaiku = $k->penilaian->firstWhere('user_id', auth()->id());
                @endphp
                <div class="karya-card">

                    {{-- Gambar Karya --}}
                    @if($k->file)
                        <img class="karya-card-img"
                             src="{{ asset('storage/' . $k->file) }}"
                             alt="{{ $k->judul }}">
                    @else
                        <div class="karya-card-img-ph">🪁</div>
                    @endif

                    <div class="karya-card-body">
                        <div class="karya-judul">{{ $k->judul }}</div>
                        <div class="karya-peserta">
                            <svg width="12" height="12" viewBox="0 0 16 16" fill="rgba(255,255,255,0.4)">
                                <path d="M8 8a3 3 0 100-6 3 3 0 000 6zm-5 6a5 5 0 0110 0H3z"/>
                            </svg>
                            {{ $k->user->name ?? '-' }}
                        </div>

                        <div class="karya-divider"></div>

                        {{-- Tampilkan nilai jika sudah dinilai --}}
                        @if($nilaiku)
                            <div class="existing-score">
                                <div>
                                    <div class="existing-score-label">Nilai kamu</div>
                                    <div style="font-size:10px;color:rgba(255,255,255,0.3);margin-top:2px;">Sudah dinilai</div>
                                </div>
                                <div class="existing-score-val">{{ $nilaiku->total }}</div>
                            </div>
                        @endif

                        {{-- Form Input Nilai --}}
                        <form method="POST" action="{{ route('juri.nilai', $k->id) }}">
                            @csrf
                            <div class="nilai-label">
                                {{ $nilaiku ? 'Perbarui Nilai' : 'Masukkan Nilai' }}
                            </div>

                            <div class="nilai-inputs">
                                <div class="nilai-field">
                                    <label>Kreativitas</label>
                                    <input type="number" name="kreativitas"
                                           min="0" max="100"
                                           placeholder="0–100"
                                           value="{{ $nilaiku->kreativitas ?? '' }}"
                                           required>
                                </div>
                                <div class="nilai-field">
                                    <label>Keindahan</label>
                                    <input type="number" name="keindahan"
                                           min="0" max="100"
                                           placeholder="0–100"
                                           value="{{ $nilaiku->keindahan ?? '' }}"
                                           required>
                                </div>
                                <div class="nilai-field">
                                    <label>Keunikan</label>
                                    <input type="number" name="keunikan"
                                           min="0" max="100"
                                           placeholder="0–100"
                                           value="{{ $nilaiku->keunikan ?? '' }}"
                                           required>
                                </div>
                            </div>

                            <button type="submit" class="simpan-btn">
                                {{ $nilaiku ? '↺ Perbarui Nilai' : '✓ Simpan Nilai' }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        {{-- RANKING --}}
        <div class="sec-label">Hasil</div>
        <div class="sec-heading">Ranking Peserta</div>

        <div class="panel">
            <div class="ph">
                <span class="ph-title">Ranking Sementara</span>
                <span class="ph-tag">Live update</span>
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