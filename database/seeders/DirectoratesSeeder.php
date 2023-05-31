<?php

namespace Database\Seeders;

use App\Models\Directorates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectoratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorates')->delete();

        $dir = ['الثورة', 'معين', 'الوحدة'];

        foreach($dir as  $d){
            Directorates::create(['name' => $d]);
        }
    }
}
