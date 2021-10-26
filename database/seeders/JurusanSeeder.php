<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = collect([
            'ilmu Politik',
            'Hubungan Internasional',
            'Administrasi Publik',
            'Sosiologi',
            'Ilmu Komunikasi',
            'Hukum',
            'Sastra Inggris',
            'Sastra Indonesia',
            'Sastra Jepang',
            'Sastra Korea',
            'Manajemen',
            'Akutansi',
            'Pariwisata',
            'Sistem Informasi',
            'informatika'
        ]);

        $jurusan->each(function($jurusan){
            Jurusan::create([
                'prodi_id'  => 1,
                'name'      => $jurusan
            ]);
        });
    }
}
