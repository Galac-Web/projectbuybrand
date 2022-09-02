<?php

namespace App\Models\Kontur;

use Illuminate\Database\Eloquent\Model;

class Kontur extends Model
{
    public function getKonturInfo($type,$konturKey,$inn){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://focus-api.kontur.ru/api3/".$type."?key=".$konturKey."&ogrn=&inn=".$inn."&pdf=False&clientId=Unknown&source=Unknown");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $json = json_decode($data,true);
        curl_close($ch);

        if(!is_array($json)){

            $json = $data;

        }

        return $json;
    }

}
