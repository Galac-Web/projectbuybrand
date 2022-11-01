<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Franchise\CountRating;
use App\Models\Franchise\KonturAdd;
use App\Models\Franchise\Surveyor;

class CountController
{
    public function queryScan($id){
       $coutrating = CountRating::query()->where('franchise_id',$id)->get()->toArray();
       $kontur = KonturAdd::query()->where('franchise_id',$id)->get()->toArray();
       $res = Surveyor::query()->where('franchise_id',$id)->get()->toArray();
        $countrating =CountController::decoderarray($coutrating);
        //CountController::decoderarray($kontur);
        $surveyor = CountController::decoderarray($res);
        $result = $countrating+$surveyor;
        return $result;
    }
    public function decoderarray($array){
        $res = 0;
        foreach ($array as  $value){
            foreach ($value as $key=> $val){
                if($key != 'created_at' && $key != 'updated_at' && $key != 'franchise_id' && $val != ''){
                    $res += $val;
                }
            }
        }
        return $res;
    }

}
