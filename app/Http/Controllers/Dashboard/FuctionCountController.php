<?php


namespace App\Http\Controllers\Dashboard;
use App\Models\Calcstaticdate;

class FuctionCountController
{
    public function index()
    {
        $calcstaticdate = Calcstaticdate::all();
        foreach ($calcstaticdate as $calc=>$value) {

            echo $value->id."<br/>".$value->name."<br/>";
        }

    }
    public function calcFuction($el1,$el2,$type){
        switch ($type){
            case "calcY":
                $result = calcY($el1,$el2);
                break;
            case "CalcPow":
                $result = CalcPow($el1,$el2);
                break;
            case "CalcLog":
                $result = CalcLog($el1,$el2);
                break;
            case "CalcC":
                $result = CalcC($el1,$el2);
                break;
        }
        function calcY($el1,$el2){
            return $el1/$el2;
        }
        function CalcPow($el1,$el2){
            return pow($el1, $el2);
        }
        function CalcLog($el1,$el2){
            return log($el1, $el2);
        }
        function CalcC($el1,$el2){
            return $el1 * $el2;
        }
        return $result;
    }

    public function FinalCalc(){

    }

}


