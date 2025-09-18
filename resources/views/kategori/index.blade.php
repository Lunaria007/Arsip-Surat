<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar { width: 250px; background: #f8f9fa; padding: 20px; height: 100vh; }
        .content { flex-grow: 1; padding: 20px; }
        .sidebar a { display: block; padding: 10px; text-decoration: none; color: #333; }
        .sidebar a.active { font-weight: bold; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Menu</h4>
        <hr>
        <a href="{{ route('arsip.index') }}">★ Arsip</a>
        <a href="{{ route('kategori.index') }}" class="active">🗄️ Kategori Surat</a>
        <a href="{{ route('about') }}">ℹ️ About</a>
    </div>

    <div class="content">
        <h3>Kategori Surat</h3>
        <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. <br>
        Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <form class="d-flex" action="{{ route('kategori.index') }}" method="GET">
                <label for="search" class="col-form-label me-2">Cari kategori:</label>
                <input type="text" class="form-control me-2" name="search" placeholder="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Cari!</button>
            </form>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>{{ $kategori->keterangan }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kategori ini?');" 
                                  action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data kategori surat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <a href="{{ route('kategori.create') }}" class="btn btn-success">[+] Tambah Kategori Baru...</a>
    </div>
</body>
</html>