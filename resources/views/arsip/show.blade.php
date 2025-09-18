<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Arsip Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar { width: 250px; background: #f8f9fa; padding: 20px; height: 100vh; }
        .content { flex-grow: 1; padding: 20px; }
        .sidebar a { display: block; padding: 10px; text-decoration: none; color: #333; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Menu</h4>
        <hr>
        <a href="{{ route('arsip.index') }}">★ Arsip</a>
        <a href="{{ route('kategori.index') }}">🗄️ Kategori Surat</a>
        <a href="{{ route('about') }}">ℹ️ About</a>
    </div>

    <div class="content">
        <h3>Arsip Surat >> Lihat</h3>
        <p>
            <strong>Nomor:</strong> {{ $arsip->nomor_surat }} <br>
            <strong>Kategori:</strong> {{ $arsip->kategori->nama_kategori }} <br>
            <strong>Judul:</strong> {{ $arsip->judul }} <br>
            <strong>Waktu Unggah:</strong> {{ $arsip->created_at->format('Y-m-d H:i:s') }}
        </p>

        <iframe src="{{$arsip->file_path}}" 
                align="top" 
                height="500" 
                width="100%" 
                frameborder="0" 
                scrolling="auto">
        </iframe>
        
        <br><br>

        <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
        <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-warning">Unduh</a>
        <a href="#" class="btn btn-primary">Edit/Ganti File</a>

    </div>
</body>
</html>