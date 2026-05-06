<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Festival</title>

    <style>
        body{
            margin:0;
            font-family:Poppins, sans-serif;
            background: linear-gradient(rgba(11,19,43,.7),rgba(11,19,43,.8)),
                        url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') center/cover;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .box{
            background:white;
            padding:40px;
            border-radius:20px;
            width:350px;
            box-shadow:0 10px 30px rgba(0,0,0,.3);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border-radius:10px;
            border:1px solid #ccc;
        }

        button{
            width:100%;
            padding:12px;
            background:#ffb703;
            border:none;
            border-radius:30px;
            font-weight:bold;
            cursor:pointer;
        }

        button:hover{
            background:#f59e0b;
        }

        .link{
            text-align:center;
            margin-top:10px;
        }

        .link a{
            text-decoration:none;
            color:#0d6efd;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Daftar Festival</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button type="submit">Daftar</button>
    </form>

    <div class="link">
        <a href="{{ route('login') }}">Sudah punya akun? Login</a>
    </div>
</div>

</body>
</html>