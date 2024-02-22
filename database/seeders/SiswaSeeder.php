<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            'nis'=>'202201',
            'nama'=>'Adi Ramadhan',
            'tanggal_lahir'=>'2006-10-11',
            'jenis_kelamin'=>'Laki-Laki',
            'alamat'=>'Sememi',
            'kota'=>'Surabaya'
        ]);
        
    }
}
