<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\elementType;

class NTDListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('ntd_list.json');
        $json = json_decode($json, true);
        for ($i = 0; $i < count($json); $i++) {
            DB::table('ntd_lists')->insert($this->getData($json[$i]));
        }
    }

    public function getData($json)
    {

        if ($json['Destination'] == "Сварка; ") {
            $json['Destination'] = 1;
        } else {
            $json['Destination'] = 0;
        };
        
        
        $arrControlMethod = [];

        if ($json['VIK_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "ВИК",
                "clause" => $json['VIK_Evaluation'],
            ];
        }

        if ($json['RK_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "РК",
                "clause" => $json['RK_Evaluation'],
            ];
        }

        if ($json['UZK_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "УЗК",
                "clause" => $json['UZK_Evaluation'],
            ];
        }

        if ($json['VS_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "Растяжение",
                "clause" => $json['VS_Evaluation'],
            ];
        }

        if ($json['Izgib_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "Изгиб",
                "clause" => $json['Izgib_Evaluation'],
            ];
        }

        if ($json['Splush_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "Сплющивание",
                "clause" => $json['Splush_Evaluation'],
            ];
        }

        if ($json['Srez_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "Сдвиг",
                "clause" => $json['Srez_Evaluation'],
            ];
        }

        if ($json['Otriv_Evaluation'] != "") {
            $arrControlMethod[] = [
                "name" => "Отрыв(ПЭ)",
                "clause" => $json['Otriv_Evaluation'],
            ];
        }


        $json['Sample_type_used'] = str_replace(';', ',', $json['Sample_type_used']);
        $json['Sample_type_used'] = trim($json['Sample_type_used']);
        $json['Sample_type_used'] = substr($json['Sample_type_used'], 0, -1);

        $json['Sposob_svarki_used'] = str_replace(';', ', ', $json['Sposob_svarki_used']);
        $json['Sposob_svarki_used'] = trim($json['Sposob_svarki_used']);
        $json['Sposob_svarki_used'] = substr($json['Sposob_svarki_used'], 0, -1);

        $json['Material_type_used'] = str_replace(';', ',', $json['Material_type_used']);
        $json['Material_type_used'] = str_replace('M', 'М', $json['Material_type_used']);
        $json['Material_type_used'] = trim($json['Material_type_used']);
        $json['Material_type_used'] = substr($json['Material_type_used'], 0, -1);

        $data = [
            'name' => $json['NTD_short_name'],
            'long_name' => $json['NTD_long_name'],
            'control_method' => json_encode($arrControlMethod),
            'weld_enabled' => $json['Destination'],
            'details_type' => $json['Sample_type_used'],
            'welding_method' => $json['Sposob_svarki_used'],
            'materials_group' => $json['Material_type_used'],
            'otu' => $json['OTU_used'],

        ];
        return $data;
    }
}
