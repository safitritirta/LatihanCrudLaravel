<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nilai = [
            ['nis' => '1001 ', 'kode_mata_pelajaran' => 'A002', 'nilai' => '100', 'indeks_nilai' => 'A'],         
        ];

        DB::table('_nilai')->insert($nilai);
    }
}
