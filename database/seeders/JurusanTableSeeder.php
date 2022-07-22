<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jurusan = [
            ['kode_mata_pelajaran'=>'A001', 'nama_mata_pelajaran'=> 'A1', 'semester'=>1, 'jurusan'=>'RPL'],

        ];

        DB::table('_jurusan')->insert($jurusan);
    }
}
