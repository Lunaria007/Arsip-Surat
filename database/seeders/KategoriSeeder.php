<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama_kategori' => 'Undangan',
            'keterangan' => 'Surat-surat resmi undangan.'
        ]);
        Kategori::create([
            'nama_kategori' => 'Pengumuman',
            'keterangan' => 'Surat-surat bersifat pengumuman.'
        ]);
        Kategori::create([
            'nama_kategori' => 'Nota Dinas',
            'keterangan' => 'Surat-surat internal kedinasan.'
        ]);
        Kategori::create([
            'nama_kategori' => 'Pemberitahuan',
            'keterangan' => 'Surat-surat bersifat pemberitahuan.'
        ]);
    }
}