<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OtuListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('otu_list.json');
        $json = json_decode($json, true);
        for ($i = 0; $i < count($json); $i++) {

            $id = DB::table('groups_tech_devices')->insertGetId($this->getData($json[$i]));

            foreach ($json[$i]['items'] as $key => $description) {
                DB::table('group_tech_devices_items')->insertGetId($this->getDescription($key, $description, $id));
            }
        }
    }

    public function getData($json)
    {
        echo $json['header'] . PHP_EOL;

        $data = [
            'name' => $json['name'],
            'header' => $json['header'],
        ];

        return $data;
    }

    public function getDescription($key, $description, $id)
    {
        echo  $key . '. ' . $description .  PHP_EOL;

        $data = [
            'gtd_id' => $id,
            'index' => $key,
            'description' =>  $description,
        ];

        return $data;
    }
}
