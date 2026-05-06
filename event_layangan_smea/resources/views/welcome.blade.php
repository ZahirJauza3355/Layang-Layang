<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Festival Layang-Layang Nusantara</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Poppins', sans-serif;
      background: #0a1628;
      color: #fff;
    }

    /* ========== NAVBAR ========== */
    nav {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      background: rgba(10, 22, 40, 0.92);
      backdrop-filter: blur(8px);
      z-index: 1000;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .nav-container {
      max-width: 1200px;
      margin: auto;
      padding: 14px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nav-logo {
      font-size: 15px;
      font-weight: 700;
      color: #ffd700;
      letter-spacing: 2px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 24px;
    }

    nav ul li a {
      font-size: 13px;
      color: rgba(255,255,255,0.8);
      text-decoration: none;
      font-weight: 500;
      transition: color .3s;
    }

    nav ul li a:hover { color: #ffd700; }

    .nav-btn {
      background: #ffd700;
      color: #5a3a00 !important;
      padding: 8px 20px;
      border-radius: 20px;
      font-weight: 600 !important;
    }

    .nav-btn:hover {
      background: #fff;
      color: #0a1628 !important;
    }

    /* ========== HERO / SKY ========== */
    header {
      min-height: 100vh;
      background: linear-gradient(180deg, #0a1628 0%, #1a3a6e 45%, #2d6bb5 75%, #5ba3e0 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 100px 20px 60px;
      position: relative;
      overflow: hidden;
    }

    /* Decorative clouds */
    header::before {
      content: '';
      position: absolute;
      top: 18%; left: 5%;
      width: 180px; height: 40px;
      background: rgba(255,255,255,0.07);
      border-radius: 50px;
    }
    header::after {
      content: '';
      position: absolute;
      top: 12%; right: 8%;
      width: 140px; height: 32px;
      background: rgba(255,255,255,0.06);
      border-radius: 50px;
    }

    .sun-glow {
      position: absolute;
      top: 60px; right: 120px;
      width: 100px; height: 100px;
      background: radial-gradient(circle, #ffd70099 0%, #ff8c0066 50%, transparent 70%);
      border-radius: 50%;
    }

    .hero-badge {
      display: inline-block;
      background: #ffd700;
      color: #5a3a00;
      font-size: 11px;
      font-weight: 700;
      padding: 6px 20px;
      border-radius: 20px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 20px;
      position: relative;
      z-index: 2;
    }

    header h1 {
      font-size: 3.4rem;
      font-weight: 800;
      line-height: 1.15;
      color: #fff;
      text-shadow: 0 4px 24px rgba(0,0,0,0.4);
      margin-bottom: 16px;
      position: relative;
      z-index: 2;
    }

    header p.tagline {
      font-size: 1.1rem;
      color: rgba(255,255,255,0.75);
      max-width: 600px;
      margin: 0 auto 32px;
      position: relative;
      z-index: 2;
    }

    /* ---- Kite SVG ---- */
    .kite-scene {
      width: 100%;
      max-width: 900px;
      height: 280px;
      position: relative;
      z-index: 2;
      margin: 0 auto;
    }

    /* ========== INFO STRIP ========== */
    .info-strip {
      background: #ffd700;
      display: flex;
      justify-content: center;
      gap: 50px;
      padding: 16px 32px;
      flex-wrap: wrap;
    }

    .info-strip-item {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      font-weight: 700;
      color: #5a3a00;
    }

    /* ========== SECTIONS ========== */
    section {
      padding: 80px 20px;
    }

    .container {
      max-width: 1100px;
      margin: auto;
    }

    .section-label {
      font-size: 11px;
      font-weight: 700;
      color: #5ba3e0;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .section-heading {
      font-size: 2rem;
      font-weight: 700;
      color: #0a1628;
      margin-bottom: 12px;
    }

    .section-sub {
      color: #555;
      font-size: 0.95rem;
      margin-bottom: 40px;
    }

    /* ========== ABOUT — Light bg ========== */
    #about {
      background: #f5f0e8;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 24px;
    }

    .info-card {
      background: #fff;
      border-radius: 16px;
      padding: 28px 24px;
      text-align: center;
      border: 0.5px solid rgba(0,0,0,0.08);
      transition: transform .3s, box-shadow .3s;
    }

    .info-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 32px rgba(0,0,0,0.1);
    }

    .card-icon-box {
      width: 56px; height: 56px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      font-size: 24px;
    }

    .icon-blue  { background: #dbeafe; }
    .icon-amber { background: #fef3c7; }
    .icon-green { background: #d1fae5; }

    .info-card h3 {
      font-size: 1rem;
      font-weight: 700;
      color: #0a1628;
      margin-bottom: 8px;
    }

    .info-card p { font-size: 0.88rem; color: #666; }

    /* ========== TIMELINE — Dark bg ========== */
    #jadwal {
      background: #0a1628;
    }

    #jadwal .section-label { color: #ffd700; }
    #jadwal .section-heading { color: #fff; }
    #jadwal .section-sub { color: rgba(255,255,255,0.55); }

    .timeline-row {
      display: flex;
      gap: 0;
      position: relative;
    }

    .timeline-row::before {
      content: '';
      position: absolute;
      top: 24px;
      left: 16.5%;
      right: 16.5%;
      height: 2px;
      background: rgba(255,215,0,0.3);
    }

    .tl-item {
      flex: 1;
      text-align: center;
      padding: 0 16px;
    }

    .tl-dot {
      width: 48px; height: 48px;
      border-radius: 50%;
      background: #ffd700;
      color: #5a3a00;
      font-size: 16px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      position: relative;
      z-index: 1;
    }

    .tl-day {
      font-size: 13px;
      font-weight: 700;
      color: #ffd700;
      margin-bottom: 8px;
    }

    .tl-desc {
      font-size: 13px;
      color: rgba(255,255,255,0.7);
      line-height: 1.5;
    }

    /* ========== GALLERY ========== */
    #galeri { background: #f5f0e8; }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 16px;
    }

    .gallery img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 16px;
      transition: transform .3s, box-shadow .3s;
      display: block;
    }

    .gallery img:hover {
      transform: scale(1.04);
      box-shadow: 0 12px 32px rgba(0,0,0,0.2);
    }

    /* ========== CTA SECTION ========== */
    #daftar {
      background: linear-gradient(135deg, #1a3a6e, #2d6bb5);
      text-align: center;
    }

    #daftar .section-heading { color: #fff; }
    #daftar .section-sub { color: rgba(255,255,255,0.7); }

    .cta-buttons {
      display: flex;
      gap: 16px;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 32px;
    }

    .btn-primary {
      background: #ffd700;
      color: #5a3a00;
      padding: 15px 40px;
      border-radius: 40px;
      font-weight: 700;
      font-size: 15px;
      text-decoration: none;
      transition: transform .3s, box-shadow .3s;
      display: inline-block;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(255,215,0,0.4);
    }

    .btn-outline {
      background: transparent;
      color: #fff;
      padding: 14px 38px;
      border-radius: 40px;
      font-weight: 600;
      font-size: 15px;
      text-decoration: none;
      border: 2px solid rgba(255,255,255,0.5);
      transition: border-color .3s, background .3s;
      display: inline-block;
    }

    .btn-outline:hover {
      border-color: #ffd700;
      background: rgba(255,215,0,0.1);
    }

    /* ========== FOOTER ========== */
    footer {
      background: #060e1a;
      color: rgba(255,255,255,0.4);
      text-align: center;
      padding: 28px 20px;
      font-size: 13px;
    }

    footer span { color: #ffd700; }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
      header h1 { font-size: 2.2rem; }

      .timeline-row {
        flex-direction: column;
        gap: 24px;
      }

      .timeline-row::before { display: none; }

      .info-strip { gap: 20px; }
    }
  </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav>
  <div class="nav-container">
    <div class="nav-logo">🪁 FESTIVAL LAYANG</div>
    <ul>
      <li><a href="#about">Tentang</a></li>
      <li><a href="#jadwal">Jadwal</a></li>
      <li><a href="#galeri">Galeri</a></li>
      <li><a href="{{ url('/register') }}" class="nav-btn">Daftar</a></li>
      <li><a href="{{ url('/login') }}">Login</a></li>
    </ul>
  </div>
</nav>

<!-- ===== HERO ===== -->
<header>
  <div class="sun-glow"></div>

  <div class="hero-badge">Kompetisi Nasional 2026</div>

  <h1>Festival Layang-Layang<br>Nusantara</h1>
  <p class="tagline">Perpaduan budaya, kreativitas, dan kompetisi spektakuler di langit Indonesia</p>

  <!-- Kite Illustration SVG -->
  <div class="kite-scene">
    <svg viewBox="0 0 900 280" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;">

      <!-- Kite strings -->
      <line x1="185" y1="260" x2="185" y2="50" stroke="rgba(255,255,255,0.25)" stroke-width="1.2" stroke-dasharray="5,4"/>
      <path d="M185 260 Q210 200 220 50" stroke="rgba(255,255,255,0.15)" stroke-width="1" fill="none"/>

      <line x1="450" y1="275" x2="450" y2="15" stroke="rgba(255,255,255,0.25)" stroke-width="1.2" stroke-dasharray="5,4"/>
      <path d="M450 275 Q420 200 415 15" stroke="rgba(255,255,255,0.15)" stroke-width="1" fill="none"/>

      <line x1="720" y1="260" x2="720" y2="35" stroke="rgba(255,255,255,0.25)" stroke-width="1.2" stroke-dasharray="5,4"/>
      <path d="M720 260 Q740 190 735 35" stroke="rgba(255,255,255,0.15)" stroke-width="1" fill="none"/>

      <!-- Kite 1 — Merah (kiri) -->
      <polygon points="185,30 145,90 185,145 225,90" fill="#e63946" stroke="rgba(255,255,255,0.6)" stroke-width="2"/>
      <polygon points="185,30 145,90 185,145 225,90" fill="url(#k1)" opacity="0.3"/>
      <line x1="145" y1="90" x2="225" y2="90" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
      <line x1="185" y1="30" x2="185" y2="145" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
      <!-- Tail -->
      <path d="M185,145 Q175,165 185,180 Q195,195 185,210 Q175,225 185,240" stroke="#ffd700" stroke-width="2" fill="none"/>
      <circle cx="185" cy="165" r="4" fill="#ffd700"/>
      <circle cx="185" cy="195" r="4" fill="#ffd700"/>
      <circle cx="185" cy="225" r="4" fill="#ffd700"/>

      <!-- Kite 2 — Biru (tengah, besar) -->
      <polygon points="450,10 395,85 450,155 505,85" fill="#2d9cdb" stroke="rgba(255,255,255,0.6)" stroke-width="2"/>
      <line x1="395" y1="85" x2="505" y2="85" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
      <line x1="450" y1="10" x2="450" y2="155" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
      <!-- Diamond pattern -->
      <polygon points="450,10 395,85 450,155 505,85" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="6"/>
      <!-- Tail -->
      <path d="M450,155 Q438,178 450,198 Q462,218 450,238 Q438,255 450,272" stroke="#ffd700" stroke-width="2.5" fill="none"/>
      <circle cx="450" cy="178" r="5" fill="#ffd700"/>
      <circle cx="450" cy="210" r="5" fill="#ffd700"/>
      <circle cx="450" cy="242" r="5" fill="#ffd700"/>

      <!-- Kite 3 — Oranye (kanan) -->
      <polygon points="720,20 675,85 720,145 765,85" fill="#f4a261" stroke="rgba(255,255,255,0.6)" stroke-width="2"/>
      <line x1="675" y1="85" x2="765" y2="85" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
      <line x1="720" y1="20" x2="720" y2="145" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
      <!-- Tail -->
      <path d="M720,145 Q710,165 720,182 Q730,198 720,215 Q710,230 720,248" stroke="#ffd700" stroke-width="2" fill="none"/>
      <circle cx="720" cy="165" r="4" fill="#ffd700"/>
      <circle cx="720" cy="197" r="4" fill="#ffd700"/>
      <circle cx="720" cy="228" r="4" fill="#ffd700"/>

      <!-- Stars / dots in sky -->
      <circle cx="60" cy="50" r="2" fill="rgba(255,255,255,0.4)"/>
      <circle cx="320" cy="30" r="1.5" fill="rgba(255,255,255,0.3)"/>
      <circle cx="600" cy="20" r="2" fill="rgba(255,255,255,0.35)"/>
      <circle cx="840" cy="60" r="1.5" fill="rgba(255,255,255,0.3)"/>
      <circle cx="80" cy="150" r="1.5" fill="rgba(255,255,255,0.2)"/>
      <circle cx="810" cy="140" r="2" fill="rgba(255,255,255,0.25)"/>
    </svg>
  </div>

  <a href="{{ url('/register') }}" class="btn-primary" style="margin-top:8px;">Daftar Sekarang</a>
</header>

<!-- ===== INFO STRIP ===== -->
<div class="info-strip">
  <div class="info-strip-item">📅  8 – 9  Mei 2026</div>
  <div class="info-strip-item">📍 SMKN 1 Wonosobo</div>
  <div class="info-strip-item">🏆 Lomba • Seni Tradisional</div>
</div>

<!-- ===== ABOUT ===== -->
<section id="about">
  <div class="container">
    <div class="section-label">Informasi Acara</div>
    <h2 class="section-heading">Kenapa Harus Ikut?</h2>
    <p class="section-sub">Event nasional yang menghadirkan lomba dan hiburan budaya terbaik Nusantara.</p>

    <div class="info-grid">
      <div class="info-card">
        <div class="card-icon-box icon-blue">🪁</div>
        <h3>Lomba Layang-Layang</h3>
        <p>Berbagai kategori kreasi unik dari seluruh penjuru Indonesia</p>
      </div>
      <div class="info-card">
        <div class="card-icon-box icon-green">🎭</div>
        <h3>Seni Tradisional</h3>
        <p>Pertunjukan dan hiburan budaya Nusantara</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== JADWAL ===== -->
<section id="jadwal">
  <div class="container">
    <div class="section-label">Rundown</div>
    <h2 class="section-heading">Jadwal</h2>
    <p class="section-sub">Rangkaian acara yang padat dan meriah selama satu hari penuh.</p>

    <div class="timeline-row">
      <div class="tl-item">
        <div class="tl-dot">8 Mei</div>
        <div class="tl-day"> 19.00WIB-Selesai</div>
        <div class="tl-desc">Pembukaan resmi & pendaftaran ulang peserta</div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">8 Mei</div>
        <div class="tl-day">19.00WIB-Selesai</div>
        <div class="tl-desc">Lomba utama & hiburan rakyat</div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">8 Mei</div>
        <div class="tl-day">19.00WIB-Selesai</div>
        <div class="tl-desc">Final & pengumuman pemenang</div>
      </div>
    </div>
  </div>
</section>

<!-- ===== GALERI ===== -->
<section id="galeri">
  <div class="container">
    <div class="section-label">Dokumentasi</div>
    <h2 class="section-heading">Galeri</h2>
    <p class="section-sub">Momen-momen terbaik dari festival sebelumnya.</p>

   <div class="gallery">
  <img src="https://images.pexels.com/photos/6044266/pexels-photo-6044266.jpeg?w=600" alt="Layang-layang">
  <img src="https://images.pexels.com/photos/6044267/pexels-photo-6044267.jpeg?w=600" alt="Layang-layang festival">
  <img src="https://images.pexels.com/photos/3721679/pexels-photo-3721679.jpeg?w=600" alt="Layang-layang terbang">
  <img src="https://images.pexels.com/photos/4555743/pexels-photo-4555743.jpeg?w=600" alt="Kite festival">
</div>

  </div>
</section>

<!-- ===== CTA ===== -->
<section id="daftar">
  <div class="container">
    <h2 class="section-heading">Siap Ikut Festival?</h2>
    <p class="section-sub">Daftarkan diri sekarang dan jadilah bagian dari festival layang-layang terbesar di Nusantara!</p>

    <div class="cta-buttons">
      <a href="{{ url('/register') }}" class="btn-primary">Daftar Sekarang</a>
      <a href="{{ url('/login') }}" class="btn-outline">Sudah Punya Akun? Login</a>
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
  <p>© 2026 <span>Festival Layang-Layang Nusantara</span> – SMKN 1 Wonosobo</p>
</footer>

</body>
</html>