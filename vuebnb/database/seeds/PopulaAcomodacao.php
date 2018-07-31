<?php

use Illuminate\Database\Seeder;

class PopulaAcomodacao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path()."/database/data.json";
        $file = File::get($path);
        $data = json_decode($file, true);

        DB::table("acomodacao")->insert($data);
    }
}
