<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar { width: 250px; background: #f8f9fa; padding: 20px; height: 100vh; }
        .content { flex-grow: 1; padding: 20px; }
        .sidebar a { display: block; padding: 10px; text-decoration: none; color: #333; }
        .sidebar a.active { font-weight: bold; }
        .profile-pic { width: 150px; height: 150px; border: 5px solid #333; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Menu</h4>
        <hr>
        <a href="{{ route('arsip.index') }}">★ Arsip</a>
        <a href="{{ route('kategori.index') }}">🗄️ Kategori Surat</a>
        <a href="{{ route('about') }}" class="active">ℹ️ About</a>
    </div>

    <div class="content">
        <h3>About</h3>
        <hr>
        <div class="d-flex align-items-center">
            <img src="{{ asset('fotogweh.jpeg') }}" alt="Foto Profil" class="profile-pic me-4">
            <div>
                <p>Aplikasi ini dibuat oleh:</p>
                <p><strong>Nama:</strong> Muhammad Rifky Ramadhan</p>
                <p><strong>NIM:</strong> 2331730044</p>
                <p><strong>Prodi:</strong> D3-MI PSDKU Kediri</p>
                <p><strong>Tanggal:</strong> 15 September 2025</p>
            </div>
        </div>
    </div>
</body>
</html>