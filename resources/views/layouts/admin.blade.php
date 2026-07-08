<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Admin SDN Kulinyar</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            background:#4338CA;
            position:fixed;
            color:white;
        }

        .sidebar h4{
            padding:25px;
            font-weight:bold;
            text-align:center;
        }

        .sidebar a{
            display:block;
            color:white;
            padding:14px 25px;
            text-decoration:none;
            transition:.3s;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,.15);
        }

        .content{
            margin-left:250px;
        }

        .topbar{
            height:70px;
            background:white;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
            padding:15px 30px;
        }

        .card-dashboard{
            border:none;
            border-radius:15px;
            color:white;
        }

        .purple{
            background:#4338CA;
        }

        .green{
            background:#16a34a;
        }

        .orange{
            background:#f59e0b;
        }

        .red{
            background:#dc2626;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <h4>🏫 SDN Kulinyar</h4>

    <a href="{{ route('admin.dashboard') }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="{{ route('admin.berita.index') }}">
        <i class="bi bi-newspaper"></i> Berita
    </a>

    <a href="{{ route('admin.galeri.index') }}">
        <i class="bi bi-images"></i> Galeri
    </a>

    <a href="{{ route('admin.pengumuman.index') }}">
        <i class="bi bi-megaphone"></i> Pengumuman
    </a>

    <a href="{{ route('admin.agenda.index') }}">
        <i class="bi bi-calendar-event"></i> Agenda
    </a>

    <a href="{{ route('admin.profil.index') }}">
        <i class="bi bi-building"></i> Profil
    </a>

    <a href="{{ route('admin.kontak.index') }}">
        <i class="bi bi-telephone"></i> Kontak
    </a>

    <a href="{{ route('admin.pesan.index') }}">
        <i class="bi bi-envelope"></i> Pesan
    </a>

    <hr class="text-light">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn text-white w-100 text-start">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>

</div>


<div class="content">

    <div class="topbar d-flex justify-content-between">

        <h4>@yield('title')</h4>

        <div>

            Halo,
            <b>{{ Auth::user()->name }}</b>

        </div>

    </div>

    <div class="container-fluid mt-4">

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>