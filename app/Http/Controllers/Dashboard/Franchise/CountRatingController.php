<?php

namespace App\Http\Controllers\Dashboard\Franchise;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\KonturController;
use App\Http\Controllers\Dashboard\ValidatorController;


class CountRatingController extends Controller
{
    public function kontur($datarun,$datainit)
    {
        $rating = 0;
//по дате запуска франшизы
        $age = preg_replace("/[^0-9]/", '', $datarun) ? date('Y') - preg_replace("/[^0-9]/", '', $datarun) : 0;
        if ($age < 0)$age = 0;
        $rating += ($age * 1);

//по дате основания
        $foundation = preg_replace("/[^0-9]/", '', $datainit) ? preg_replace("/[^0-9]/", '', $datainit) : date('Y');
        $ageWithoutFran = date('Y') - $age - $foundation;
        if ($ageWithoutFran < 0)$ageWithoutFran = 0;
        $rating += ($ageWithoutFran * 0.3);

        return $rating;

    }

    public function invest($req){
        $date = $req->terms;
        $min_investion = $date['investments'][0];
        $max_investion = $date['investments'][1];
        if($min_investion && $max_investion){
            $coutinvet = $max_investion / $min_investion;
            $result = $coutinvet * 0.3;

        }else{
          $result = null;
        }
        return $result;

    }
    public function payback($req){
        $date = $req->terms;
        $min = $date['payback'][0];
        $max = $date['payback'][1];

        if($min && $max){
            $result = 5;
        }else{
            $result = null;
        }
        return $result;

    }

    public function point($req){
        if ($req->has('points')) {
            $date = $req->points;
            if($date['own_points'] <=  0){
                $result = $date['own_points'][0] * 0.07;

            }else{
                $result = null;
            }
            return $result;

        }



    }



}
