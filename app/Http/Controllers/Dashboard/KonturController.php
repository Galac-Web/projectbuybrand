<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ValidatorController;
use App\Models\Kontur\Kontur;

class KonturController extends Controller
{
    public function kontur($type,$inn)
    {
        $arrayvalidator = ValidatorController::validator($type,$inn);
        if(count($arrayvalidator) > 0){
            $resultanalytic = KonturController::runContent($arrayvalidator,'3208d29d15c507395db770d0e65f3711e40374df',$inn);
            return $resultanalytic;
        }



    }

    function runContent($type,$key,$inn){
        foreach ($type as $value){
            $res = Kontur::getKonturInfo($value,$key,$inn);
            if($res){
                switch ($value){
                    case "analytics":
                        $analitik =KonturController::analitickontur($res);
                        break;
                    case "finan":
                        KonturController::filecree($res);
                        break;
                    case "req":
                        $regData = KonturController::reg($res);
                        $publicCompani = KonturController::publickompany($res);
                        break;
                    case "briefReport":
                        $briefReport = KonturController::getKonturLights($res);
                        break;
                    case "petitionersOfArbitration":
                        $briefReport = KonturController::petitionersOfArbitration($res);
                        break;

                }
            }

        }

        return [
            'analityk'=>$analitik,
            'regdata'=>$regData,
            'publickcompani'=>$publicCompani,
            'brifReports'=>$briefReport,
        ];
    }

    public function petitionersOfArbitration($res){
        if ($res[0]) {
            //$file = $_SERVER['DOCUMENT_ROOT'].'/public/doc/'.rand(1,99999).'_finance.pdf';
            //file_put_contents($file,$res);
            //return $file;
        }
        return '';
    }


    public function filecree($res){
        if ($res[0]) {
            //$file = $_SERVER['DOCUMENT_ROOT'].'/public/doc/'.rand(1,99999).'_finance.pdf';
            //file_put_contents($file,$res);
            //return $file;
        }
    }


    public function analitickontur($res){
        if ($res[0]) {
            $count = intval($res[0]["analytics"]["q2002"]) + intval($res[0]["analytics"]["q2004"])+intval($res[0]["analytics"]["q2004"]);
            $countNotEnd = intval($res[0]["analytics"]["q2014"]) + intval($res[0]["analytics"]["q2024"]);
            $countWin = intval($res[0]["analytics"]["q2023"]) + intval($res[0]["analytics"]["q2022"]);
            $countLose = intval($res[0]["analytics"]["q2011"]) + intval($res[0]["analytics"]["q2012"]);
            $exec = intval($res[0]["analytics"]["q1001"]);
            $tovar = intval($res[0]["analytics"]["q9001"]);
            $credit = intval($res[0]["analytics"]["6014"]);
            return [
                'count'=>$count,
                'countNote'=>$countNotEnd,
                'countWin'=>$countWin,
                'countLose'=>$countLose,
                'exec'=> $exec,
                'tovar'=>$tovar,
                'credit'=>$credit
            ];
        }
    }
    public function reg($res){
        if ($res[0]) {
            $regDate = explode('-',$res[0]['UL']['registrationDate']);
            $ao = explode('-',$res[0]['UL']['opf']);
            return [
                'regdata'=>$regDate,
                'ao'=>$ao
            ];
        }
    }

    public function getKonturLights($res){
        if ($res[0]['briefReport']['href']) {
            $url=$res[0]['briefReport']['href'];
            $urlexp = explode('&ltoken',$url);
            $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt( $ch, CURLOPT_COOKIEJAR,  $_SERVER['DOCUMENT_ROOT'].'/test.txt' );
            curl_setopt( $ch, CURLOPT_COOKIEFILE,  $_SERVER['DOCUMENT_ROOT'].'/test.txt' );
            $result=curl_exec($ch);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            curl_setopt($ch, CURLOPT_URL,$urlexp[0]);
            curl_setopt( $ch, CURLOPT_COOKIEJAR,   $_SERVER['DOCUMENT_ROOT'].'/test.txt' );
            curl_setopt( $ch, CURLOPT_COOKIEFILE,  $_SERVER['DOCUMENT_ROOT'].'/test.txt' );
            $htmler=curl_exec($ch);
            $htmler = str_replace('	', '', $htmler);
            $contentExp = explode('<div class="content">',$htmler);
            $contentExp2 = explode('<div class="footer gap10">',$contentExp[1]);
            $newHtml = $contentExp2[0];
            $newHtml = str_replace('
', '', $newHtml);
            $newHtml = str_replace(array("\r\n", "\r", "\n"), '', $newHtml);
            debug(htmlspecialchars($newHtml));
            $needBlockTitles = [
                '<div class="title--block">Обратить внимание</div>',
                '<div class="title--block">Критерии фирм-однодневок</div>',
                '<div class="title--block">Благоприятные факты</div>',
            ];
            $resultInfo = null;

            foreach(explode('<div class="block">',$newHtml) as $block) {
                $currentBlockInfo = null;
                $currentLight = null;
                $tableItems = null;
                if ($currentLight) {
                    $resultInfo[array_pop(array_keys($resultInfo))]['lights'][] = $currentLight;
                }
                $block = str_replace('','',$block);
                $block = trim($block);
                $block = mb_substr($block,0,-6);
                if (!$block)continue;
                $finded = false;
                foreach($needBlockTitles as $title) {
                    if (strpos($block, $title) !== false) $finded = true;
                }
                if (!$finded)continue;
                foreach(explode('<div class="section">',$block) as $section) {

                    $section = trim($section);
                    $section = mb_substr($section,0,-6);
                    if (!$section)continue;
                    $section = str_replace('<div></div>','',$section);
                    $section = str_replace('<div class="shift"></div>','',$section);
                    $isTitle = false;
                    foreach($needBlockTitles as $title) {
                        if ($title == $section){
                            $currentBlockInfo['title'] = strip_tags($section);
                            $isTitle = true;
                        }
                    }
                    if ($isTitle)continue;

                    if (strpos($section,'marker__item') !== false) {
                        if ($currentLight) {
                            $currentBlockInfo['lights'][] = $currentLight;
                        }
                        $currentLight = null;
                        if (strpos($section,'marker__item--Alert')) {
                            $currentLight['color'] = 'red';
                        } else if (strpos($section,'marker__item--Exclamation')) {
                            $currentLight['color'] = 'yellow';
                        } else {
                            $currentLight['color'] = 'green';
                        }

                        if ($tableItems) {
                            $currentLight['items'] = $tableItems;
                            $tableItems = null;
                        }

                        if (strpos($section, '<ul class="list">') !== false) {
                            $explodeSection = explode('<ul class="list">',$section);
                            $currentLight['title'] = $explodeSection[0];
                            $list = str_replace('</ul>','',$explodeSection[1]);
                            if ($list) {
                                foreach(explode("<li class='list__item'>",$list) as $item) {
                                    $item = str_replace('</li>','',$item);
                                    if ($item) {
                                        $currentLight['items'][] = strip_tags($item);
                                    }
                                }
                            }

                        } else {
                            $currentLight['title'] = $section;
                        }
                        if (strpos($currentLight['title'],'</div><div>') !== false) {
                            $titleExplode = explode('</div><div>',$currentLight['title']);
                            $currentLight['title'] = $titleExplode[0].'</div>';
                            $title2 = '<div>'.$titleExplode[1];
                            if (strpos($title2,'Это означает') === false) {
                                $currentLight['items'][] = strip_tags($title2);
                            }
                        }
                        $currentLight['title'] = strip_tags($currentLight['title']);

                    } elseif (strpos($section,'tableBlock') !== false) {
                        $tableItems = null;
                        if ($currentLight) {
                            $currentBlockInfo['lights'][] = $currentLight;
                        }
                        $currentLight = null;

                        if (strpos($section,'<div class="small gray">') !== false) {
                            $sectionExplode = explode('<div class="small gray">',$section);
                            $section = $sectionExplode[0];
                        }

                        $section = str_replace([
                            '<ul class="tableBlock">',
                            '</ul>',
                        ],'',$section);

                        foreach(explode('</li>',$section) as $item) {
                            if ($item && strpos($item,'<li class="tableBlock__item" data-value="Да">') !== false) {
                                $tableItems[] = strip_tags($item.'</li>');
                            }
                        }


                    } else {
                        if (strpos($section,'<div class="shift"><div>') !== false) {
                            $sectionExplode = explode('<div class="shift"><div>',$section);
                            $section = $sectionExplode[0];
                        }
                        $currentLight['items'][] = strip_tags($section);
                    }
                }

                if ($currentLight) {
                    $currentBlockInfo['lights'][] = $currentLight;
                }

                if ($currentBlockInfo)
                    $resultInfo[] = $currentBlockInfo;
            }
            foreach($resultInfo as $key=>$value) {
                if (!$value['lights'])unset($resultInfo[$key]);
            }
            return $resultInfo;
        }
    }

    public function publickompany($res){
        $result = '';
        if($res[0]['UL']['opf'] == 'Публичные акционерные общества'){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

}
