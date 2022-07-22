<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sampel = [
            ['title' => 'Assalaam Juara', 'content' => 'Assalaam Studiio'],
            ['title' => 'Assalaam Berkurban', 'content' => 'Assalaam Studiio'],
            ['title' => 'Assalaam Bersholawat', 'content' => 'Assalaam Studiio'],
        ];

        //masukan
        DB::table('posts')->insert($sampel);
    }
}
