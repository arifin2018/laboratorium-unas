<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = collect([
            'FISIP',
            'FH',
            'FBS',
            'FEB',
            'FTKI'
        ]);

        $prodi->each(function($prodi){
            Prodi::create([
                'name'  => $prodi
            ]);
        });
    }
}
