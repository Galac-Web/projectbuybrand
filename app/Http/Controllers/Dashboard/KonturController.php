<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Kontur\Kontur;

class KonturController extends Controller
{
    public function kontur()
    {
        $resultanalytic = $this->analitickontur('analytics','3208d29d15c507395db770d0e65f3711e40374df','6663003127');
        dd($resultanalytic);

    }

    private function analitickontur($type,$key,$inn){
        $res = Kontur::getKonturInfo($type,$key,$inn);
        if ($res[0]) {
            $count = intval($res[0]["analytics"]["q2002"]) + intval($res[0]["analytics"]["q2004"]);
            $countNotEnd = intval($res[0]["analytics"]["q2014"]) + intval($res[0]["analytics"]["q2024"]);
            $countWin = intval($res[0]["analytics"]["q2023"]) + intval($res[0]["analytics"]["q2022"]);
            $countLose = intval($res[0]["analytics"]["q2011"]) + intval($res[0]["analytics"]["q2012"]);
            $exec = intval($res[0]["analytics"]["q1001"]);
            return [
                'count'=>$count,
                'countNote'=>$countNotEnd,
                'countWin'=>$countWin,
                'countLose'=>$countLose,
                'exec'=> $exec
            ];
        }
    }
}
