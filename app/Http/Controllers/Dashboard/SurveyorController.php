<?php

namespace App\Http\Controllers\Dashboard;

class SurveyorController
{
    public function index($request)
    {
        $resultcout = 0;
        foreach ($request as $key => $value){
            $resultcout += SurveyorController::calcdatesurveyor($value,$key);
        }
        return $resultcout;
    }

    public function calcdatesurveyor($value,$name){
        $rating = 0;
        switch ($name){
            case "informational":
                if($value && $value == 'yes') $rating += 0.05;
                break;
            case "declared":
                if($value && $value == 'yes') $rating += 0.1;
                break;
            case "kontactposibility":
                if($value && $value == 'yes') $rating += 0.05;
                break;
            case "presencemutual":
                if($value && $value == 'yes') $rating += 0.1;
                break;
            case "conformitysupport":
                if($value && $value == 'yes') $rating += 0.1;
                break;

        }
        return $rating;
    }
}
