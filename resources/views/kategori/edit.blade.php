<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori Surat</title>
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
        <a href="{{ route('arsip.index') }}">Arsip</a>
        <a href="{{ route('kategori.index') }}">Kategori Surat</a>
        <a href="{{ route('about') }}">About</a>
    </div>

    <div class="content">
        <h3>Kategori Surat >> Edit</h3>
        <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID (Auto Increment)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="{{ $kategori->id }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ $kategori->keterangan }}</textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>