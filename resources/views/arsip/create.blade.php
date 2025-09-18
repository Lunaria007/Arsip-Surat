<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Arsip Surat</title>
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
        <h3>Arsip Surat >> Unggah</h3>
        <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
        <p>Catatan: <br> - Gunakan file berformat PDF</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-select" name="kategori_id" required>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="file_pdf" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="file_pdf" name="file_pdf" accept=".pdf" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>

    </div>
</body>
</html>