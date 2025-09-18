<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
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
        <a href="{{ route('arsip.index') }}" class="active">★ Arsip</a>
        <a href="{{ route('kategori.index') }}">🗄️ Kategori Surat</a>
        <a href="{{ route('about') }}">ℹ️ About</a>
    </div>

    <div class="content">
        <h3>Arsip Surat</h3>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
        Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

        <div class="d-flex justify-content-between mb-3">
            <form class="d-flex" action="{{ route('arsip.index') }}" method="GET">
            <label for="search" class="col-form-label me-2">Cari surat:</label>
            <input type="text" class="form-control me-2" name="search" placeholder="search" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Cari!</button>
        </form>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($arsips as $arsip)
                    <tr>
                        <td>{{ $arsip->nomor_surat }}</td>
                        <td>{{ $arsip->kategori->nama_kategori }}</td>
                        <td>{{ $arsip->judul }}</td>
                        <td>{{ $arsip->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');" 
                                  action="{{ route('arsip.destroy', $arsip->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-warning btn-sm d-inline">Unduh</a>
                            <a href="{{ route('arsip.show', $arsip->id) }}" class="btn btn-primary btn-sm d-inline">Lihat >></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data arsip surat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <a href="{{ route('arsip.create') }}" class="btn btn-primary">Arsipkan Surat..</a>

    </div>
</body>
</html>