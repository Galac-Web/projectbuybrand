<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class CalcRatingController extends Controller
{
//
public function starRun($datastar){
    $rating = 0;
    $age = preg_replace("/[^0-9]/", '', $datastar) ? date('Y') - preg_replace("/[^0-9]/", '', $datastar) : 0;
    if ($age < 0)$age = 0;
    $rating += ($age * 1);
    return $rating;
}

public function initDataRun($datastar,$age){
    $rating = 0;
    $foundation = preg_replace("/[^0-9]/", '', $datastar) ? preg_replace("/[^0-9]/", '', $datastar) : date('Y');
    $ageWithoutFran = date('Y') - $age - $foundation;
    if ($ageWithoutFran < 0)$ageWithoutFran = 0;
    $rating += ($ageWithoutFran * 0.3);
    return $rating;
}


function  investition(){
    $rating = 0;
    $investmentsRating = 0;
    while($investmentsRating<=10){
        $investmentsRating = $investmentsRating + 0.3;
    }



    return $rating;
}



}
