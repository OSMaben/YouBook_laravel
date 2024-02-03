<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title'=>Str::random(10),
            'description'=>Str::random(10),
            'image'=>Str::random(10).'png'
//            'email'=>Str::random(10).'@gmail.com',
        ]);
    }
}
