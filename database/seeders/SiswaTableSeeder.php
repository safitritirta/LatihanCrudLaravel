<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $siswa = [
            ['nis' => '1001', 'nama_siswa' => 'Safitri Tirta Lestari', 'alamat_siswa' =>'Bandung', 'tanggal_lahir' => '2005-03-18'],
          
        ];

        //masukan
        DB::table('_siswa')->insert($siswa);
    }
}
