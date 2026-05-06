<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peserta – Festival Layang-Layang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: #0a1628; color: #fff; min-height: 100vh; display: flex; }

        /* SIDEBAR */
        .sidebar { width: 220px; background: #0d1e38; border-right: 1px solid rgba(255,255,255,0.06); display: flex; flex-direction: column; flex-shrink: 0; min-height: 100vh; position: sticky; top: 0; height: 100vh; }
        .sb-logo { padding: 22px 22px 20px; border-bottom: 1px solid rgba(255,255,255,0.06); margin-bottom: 16px; }
        .sb-logo-brand { font-size: 14px; font-weight: 700; color: #ffd700; letter-spacing: 1.5px; }
        .sb-logo-sub { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 3px; }
        .sb-nav { list-style: none; padding: 0 10px; flex: 1; }
        .sb-nav li { margin-bottom: 2px; }
        .sb-nav li a { display: flex; align-items: center; gap: 10px; padding: 10px 14px; font-size: 12px; color: rgba(255,255,255,0.5); text-decoration: none; border-radius: 8px; transition: .2s; }
        .sb-nav li a:hover { color: #fff; background: rgba(255,255,255,0.05); }
        .sb-nav li a.active { color: #ffd700; background: rgba(255,215,0,0.08); font-weight: 600; }
        .sb-nav li a svg { width: 15px; height: 15px; flex-shrink: 0; }
        .sb-user { display: flex; align-items: center; gap: 10px; padding: 16px 22px; border-top: 1px solid rgba(255,255,255,0.06); }
        .sb-avatar { width: 36px; height: 36px; border-radius: 50%; background: #1a3a6e; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: #ffd700; flex-shrink: 0; }
        .sb-uname { font-size: 12px; color: #fff; font-weight: 500; }
        .sb-urole { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }

        /* MAIN */
        .main { flex: 1; display: flex; flex-direction: column; min-width: 0; overflow-y: auto; }
        .topbar { background: #0d1e38; border-bottom: 1px solid rgba(255,255,255,0.06); padding: 16px 28px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; }
        .topbar-title { font-size: 16px; font-weight: 700; color: #fff; }
        .topbar-sub { font-size: 11px; color: rgba(255,255,255,0.35); margin-top: 2px; }
        .logout-btn { background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.3); color: #f87171; font-size: 12px; font-weight: 600; padding: 9px 18px; border-radius: 8px; cursor: pointer; font-family: 'Poppins', sans-serif; transition: .2s; }
        .logout-btn:hover { background: rgba(239,68,68,0.22); }
        .content { padding: 28px; flex: 1; }

        /* FLASH */
        .flash { padding: 12px 16px; border-radius: 8px; font-size: 12px; font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
        .flash-success { background: rgba(34,197,94,0.1); border: 0.5px solid rgba(34,197,94,0.3); color: #4ade80; }
        .flash-error { background: rgba(239,68,68,0.1); border: 0.5px solid rgba(239,68,68,0.3); color: #f87171; }

        /* STATS */
        .stats-row { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; margin-bottom: 24px; }
        .stat-card { background: #0d1e38; border: 0.5px solid rgba(255,255,255,0.08); border-radius: 14px; padding: 20px 22px; }
        .stat-label { font-size: 10px; font-weight: 600; color: rgba(255,255,255,0.4); letter-spacing: 1.2px; text-transform: uppercase; margin-bottom: 10px; }
        .stat-value { font-size: 28px; font-weight: 700; color: #fff; margin-bottom: 8px; }
        .stat-badge { display: inline-block; font-size: 10px; font-weight: 600; padding: 3px 10px; border-radius: 6px; }
        .badge-gold { background: rgba(255,215,0,0.12); color: #ffd700; }
        .badge-blue { background: rgba(59,130,246,0.12); color: #60a5fa; }
        .badge-green { background: rgba(34,197,94,0.12); color: #4ade80; }

        /* TWO COL */
        .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; }
        .panel { background: #0d1e38; border: 0.5px solid rgba(255,255,255,0.08); border-radius: 14px; overflow: hidden; }
        .panel-header { padding: 14px 20px; border-bottom: 0.5px solid rgba(255,255,255,0.06); display: flex; justify-content: space-between; align-items: center; }
        .panel-title { font-size: 13px; font-weight: 600; color: #fff; }
        .panel-tag { font-size: 10px; color: rgba(255,255,255,0.3); }
        .panel-body { padding: 20px; }

        /* ===== UPLOAD — FIXED ===== */
        .upload-zone {
            position: relative;
            background: rgba(255,255,255,0.03);
            border: 1.5px dashed rgba(255,255,255,0.15);
            border-radius: 10px;
            padding: 24px 20px;
            text-align: center;
            margin-bottom: 14px;
            cursor: pointer;
            transition: .2s;
            overflow: hidden;
        }
        .upload-zone:hover { border-color: rgba(255,215,0,0.5); background: rgba(255,215,0,0.04); }
        .upload-zone.has-file { border-color: rgba(255,215,0,0.4); background: rgba(255,215,0,0.04); }

        /* File input menutupi seluruh area zone — KUNCI FIX */
        .upload-zone input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            font-size: 0;
        }

        .upload-icon { font-size: 30px; margin-bottom: 8px; }
        .upload-text { font-size: 12px; color: rgba(255,255,255,0.55); margin-bottom: 4px; }
        .upload-hint { font-size: 10px; color: rgba(255,255,255,0.25); }
        .upload-filename { font-size: 11px; color: #ffd700; margin-top: 8px; font-weight: 600; display: none; }

        .form-input { width: 100%; background: rgba(255,255,255,0.05); border: 0.5px solid rgba(255,255,255,0.12); border-radius: 8px; padding: 11px 14px; color: #fff; font-size: 12px; font-family: 'Poppins', sans-serif; outline: none; margin-bottom: 12px; transition: border-color .2s; }
        .form-input::placeholder { color: rgba(255,255,255,0.28); }
        .form-input:focus { border-color: rgba(255,215,0,0.45); }

        .submit-btn { width: 100%; background: #ffd700; color: #5a3a00; border: none; border-radius: 8px; padding: 12px; font-size: 13px; font-weight: 700; cursor: pointer; font-family: 'Poppins', sans-serif; transition: .2s; }
        .submit-btn:hover { background: #ffe94d; }
        .submit-btn:disabled { opacity: 0.5; cursor: not-allowed; }

        /* KARYA LIST */
        .karya-item { display: flex; align-items: center; gap: 14px; padding: 12px 0; border-bottom: 0.5px solid rgba(255,255,255,0.05); }
        .karya-item:last-child { border-bottom: none; }
        .karya-thumb { width: 48px; height: 48px; border-radius: 8px; object-fit: cover; flex-shrink: 0; }
        .karya-thumb-ph { width: 48px; height: 48px; border-radius: 8px; background: #1a3a6e; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
        .karya-name { font-size: 12px; font-weight: 600; color: #fff; }
        .karya-date { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 3px; }
        .karya-status { margin-left: auto; font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 6px; white-space: nowrap; }
        .status-ok { background: rgba(34,197,94,0.12); color: #4ade80; }
        .status-pending { background: rgba(251,191,36,0.12); color: #fbbf24; }
        .empty-state { text-align: center; padding: 24px 0; font-size: 12px; color: rgba(255,255,255,0.3); }

        /* RANKING */
        .ranking-panel { background: #0d1e38; border: 0.5px solid rgba(255,255,255,0.08); border-radius: 14px; overflow: hidden; }
        .rank-row { display: grid; grid-template-columns: 52px 1fr 90px 80px; align-items: center; padding: 13px 20px; border-bottom: 0.5px solid rgba(255,255,255,0.05); transition: background .15s; }
        .rank-row:last-child { border-bottom: none; }
        .rank-row:hover { background: rgba(255,255,255,0.03); }
        .rank-head { background: rgba(255,255,255,0.03); font-size: 10px; color: rgba(255,255,255,0.3); letter-spacing: 1px; text-transform: uppercase; font-weight: 600; }
        .rank-num { font-size: 16px; font-weight: 700; }
        .rank-num-text { font-size: 15px; color: rgba(255,255,255,0.25); font-weight: 600; }
        .rank-name { font-size: 12px; font-weight: 600; color: #fff; }
        .rank-title-sub { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }
        .rank-score { font-size: 15px; font-weight: 700; color: #fff; text-align: right; }
        .rank-score-sub { font-size: 10px; color: rgba(255,255,255,0.3); text-align: right; margin-top: 1px; }
        .rank-karya { font-size: 11px; color: rgba(255,255,255,0.35); text-align: right; }
        .you-row { background: rgba(255,215,0,0.05) !important; border-left: 2px solid #ffd700; }
        .you-badge { font-size: 9px; font-weight: 700; background: rgba(255,215,0,0.15); color: #ffd700; padding: 2px 6px; border-radius: 4px; margin-left: 6px; vertical-align: middle; }

        @media (max-width: 900px) {
            .sidebar { display: none; }
            .stats-row { grid-template-columns: 1fr 1fr; }
            .two-col { grid-template-columns: 1fr; }
            .rank-row { grid-template-columns: 40px 1fr 60px; }
            .rank-row > div:nth-child(3) { display: none; }
        }
        @media (max-width: 600px) {
            .content { padding: 16px; }
            .stats-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sb-logo">
        <div class="sb-logo-brand">🪁 FESTIVAL</div>
        <div class="sb-logo-sub">Layang-Layang Nusantara</div>
    </div>
    <ul class="sb-nav">
        <li><a href="{{ route('peserta.dashboard') }}" class="active">
            <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
            Dashboard
        </a></li>
        <li><a href="#">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 4h12v1H2zm0 4h12v1H2zm0 4h8v1H2z"/></svg>
            Karya Saya
        </a></li>
        <li><a href="#">
            <svg viewBox="0 0 16 16" fill="currentColor"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M8 5v3.5l2 1"/></svg>
            Jadwal
        </a></li>
        <li><a href="#">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1l1.8 4.5H15l-3.9 2.8 1.5 4.7L8 10.2l-4.6 2.8 1.5-4.7L1 5.5h5.2z"/></svg>
            Ranking
        </a></li>
    </ul>
    <div class="sb-user">
        <div class="sb-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
        <div>
            <div class="sb-uname">{{ auth()->user()->name }}</div>
            <div class="sb-urole">Peserta</div>
        </div>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div>
            <div class="topbar-title">Dashboard Peserta</div>
            <div class="topbar-sub">Festival Layang-Layang Nusantara 2026 — SMKN 1 Wonosobo</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">Logout</button>
        </form>
    </div>

    <div class="content">

        @if(session('success'))
            <div class="flash flash-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">⚠ {{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="flash flash-error">⚠ {{ $errors->first() }}</div>
        @endif

        {{-- STATS --}}
        @php
            $rankingAll = \App\Models\Karya::with('user')
                ->withSum('penilaian','total')
                ->orderByRaw('penilaian_sum_total IS NULL ASC')
                ->orderByDesc('penilaian_sum_total')
                ->get();
            $myRank  = $rankingAll->search(fn($r) => $r->user_id == auth()->id());
            $myRank  = $myRank !== false ? $myRank + 1 : '-';
            $myScore = $rankingAll->firstWhere('user_id', auth()->id())?->penilaian_sum_total ?? 0;
        @endphp

        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-label">Karya Diupload</div>
                <div class="stat-value">{{ $karya->count() }}</div>
                <span class="stat-badge badge-blue">Karya</span>
            </div>
            <div class="stat-card">
                <div class="stat-label">Ranking Saat Ini</div>
                <div class="stat-value">#{{ $myRank }}</div>
                <span class="stat-badge badge-gold">Dari {{ $rankingAll->count() }} Peserta</span>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Nilai</div>
                <div class="stat-value">{{ $myScore }}</div>
                <span class="stat-badge badge-green">Poin</span>
            </div>
        </div>

        <div class="two-col">

            {{-- Upload Form --}}
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title">Upload Karya</span>
                    <span class="panel-tag">JPG/PNG maks. 10MB</span>
                </div>
                <div class="panel-body">
                    <form method="POST"
                          action="{{ route('peserta.upload') }}"
                          enctype="multipart/form-data"
                          id="uploadForm">
                        @csrf

                        {{-- UPLOAD ZONE — input file menutupi seluruh area --}}
                        <div class="upload-zone" id="uploadZone">
                            <input type="file"
                                   name="file"
                                   id="fileInput"
                                   accept="image/jpeg,image/png,image/jpg,image/gif"
                                   required>
                            <div class="upload-icon">🖼️</div>
                            <div class="upload-text">Klik di sini untuk pilih foto karya</div>
                            <div class="upload-hint">Format: JPG, PNG, JPEG • Maks 10MB</div>
                            <div class="upload-filename" id="uploadFilename"></div>
                        </div>

                        <input class="form-input"
                               type="text"
                               name="judul"
                               placeholder="Judul karya layangan..."
                               value="{{ old('judul') }}"
                               required>

                        <button type="submit" class="submit-btn" id="submitBtn">
                            ↑ Upload Karya
                        </button>
                    </form>
                </div>
            </div>

            {{-- Karya List --}}
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title">Karya Saya</span>
                    <span class="panel-tag">{{ $karya->count() }} karya</span>
                </div>
                <div class="panel-body">
                    @forelse($karya as $k)
                        <div class="karya-item">
                            @if($k->file)
                                <img class="karya-thumb" src="{{ asset('storage/'.$k->file) }}" alt="{{ $k->judul }}">
                            @else
                                <div class="karya-thumb-ph">🪁</div>
                            @endif
                            <div>
                                <div class="karya-name">{{ $k->judul }}</div>
                                <div class="karya-date">Diupload {{ $k->created_at->format('d M Y') }}</div>
                            </div>
                            <div class="karya-status {{ $k->is_approved ? 'status-ok' : 'status-pending' }}">
                                {{ $k->is_approved ? 'Disetujui' : 'Menunggu' }}
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">Belum ada karya yang diupload</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- RANKING --}}
        <div class="ranking-panel">
            <div class="panel-header">
                <span class="panel-title">Ranking Peserta</span>
                <span class="panel-tag">Live update</span>
            </div>
            <div class="rank-row rank-head">
                <div>#</div>
                <div>Peserta</div>
                <div style="text-align:right">Karya</div>
                <div style="text-align:right">Nilai</div>
            </div>
            @forelse($rankingAll as $index => $r)
                @php $no = $index + 1; @endphp
                <div class="rank-row {{ $r->user_id == auth()->id() ? 'you-row' : '' }}">
                    <div class="rank-num">
                        @if($no==1) 🥇 @elseif($no==2) 🥈 @elseif($no==3) 🥉
                        @else <span class="rank-num-text">{{ $no }}</span>
                        @endif
                    </div>
                    <div>
                        <div class="rank-name">
                            {{ $r->user->name ?? '-' }}
                            @if($r->user_id == auth()->id())
                                <span class="you-badge">KAMU</span>
                            @endif
                        </div>
                        <div class="rank-title-sub">{{ $r->judul }}</div>
                    </div>
                    <div class="rank-karya">{{ optional($r->user)->karya()->count() ?? 0 }} karya</div>
                    <div>
                        <div class="rank-score">{{ $r->penilaian_sum_total ?? 0 }}</div>
                        <div class="rank-score-sub">poin</div>
                    </div>
                </div>
            @empty
                <div style="padding:24px;text-align:center;font-size:12px;color:rgba(255,255,255,0.3);">
                    Belum ada data penilaian
                </div>
            @endforelse
        </div>

    </div>
</div>

<script>
const fileInput     = document.getElementById('fileInput');
const uploadZone    = document.getElementById('uploadZone');
const uploadFilename= document.getElementById('uploadFilename');
const submitBtn     = document.getElementById('submitBtn');
const uploadForm    = document.getElementById('uploadForm');

// Tampilkan nama file saat dipilih
fileInput.addEventListener('change', function () {
    if (this.files && this.files[0]) {
        const f = this.files[0];
        const kb = (f.size / 1024).toFixed(0);
        uploadFilename.textContent = '✓ ' + f.name + ' (' + kb + ' KB)';
        uploadFilename.style.display = 'block';
        uploadZone.classList.add('has-file');
    }
});

// Loading state saat submit
uploadForm.addEventListener('submit', function (e) {
    if (!fileInput.files || fileInput.files.length === 0) {
        e.preventDefault();
        alert('Pilih file gambar terlebih dahulu!');
        return;
    }
    submitBtn.disabled = true;
    submitBtn.textContent = '⏳ Mengupload...';
});

// Drag & Drop support
uploadZone.addEventListener('dragover', function (e) {
    e.preventDefault();
    this.style.borderColor = 'rgba(255,215,0,0.6)';
});

uploadZone.addEventListener('dragleave', function () {
    this.style.borderColor = '';
});

uploadZone.addEventListener('drop', function (e) {
    e.preventDefault();
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        fileInput.files = files;
        uploadFilename.textContent = '✓ ' + files[0].name;
        uploadFilename.style.display = 'block';
        this.classList.add('has-file');
    }
});
</script>

</body>
</html>