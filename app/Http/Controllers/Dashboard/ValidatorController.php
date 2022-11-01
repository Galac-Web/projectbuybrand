<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Kontur\Kontur;
use Illuminate\Support\Arr;
class ValidatorController extends Controller
{
    public function validator($tye,$inn){
        $collection = collect($tye);
        $keyworkcontact = [
            'req'=>'req',
            'egrDetails'=>'egrDetails',
            'analytics'=>'analytics',
            'briefReport'=>'briefReport',
            'briefReportpdf'=>'briefReportpdf',
            'briefReportEng'=>'briefReportEng',
            'contacts'=>'contacts',
            'buh'=>'buh',
            'licences'=>'licences',
            'excerpt'=>'excerpt',
            'finan'=>'finan',
            'bankGuarantees'=>'bankGuarantees',
            'taxes'=>'taxes',
            'EgrDetails'=>'EgrDetails',
            'Analytics'=>'Analytics',
            'fssp'=>'fssp',
            'govPurchasesOfCustomer'=>'govPurchasesOfCustomer',
            'govPurchasesOfParticipant'=>'govPurchasesOfParticipant',
            'beneficialOwners'=>'beneficialOwners',
           'fsa'=>'fsa',
            'sites'=>'sites',
            'foreignRepresentatives'=>'foreignRepresentatives',
            'petitionersOfArbitration'=>'petitionersOfArbitration',
            'companyDetails'=>'companyDetails',
            'suggest'=>'suggest',
            'suggestEng'=>'suggestEng',
            'sanctionedPersons'=>'sanctionedPersons',
            'personBankruptcy'=>'personBankruptcy',
            'pepSearch'=>'pepSearch',
            'selectionByRegDate'=>'selectionByRegDate',
            'fizbankr'=>'fizbankr',
            'checkPassport'=>'checkPassport',
            'trademarks'=>'trademarks',
            'fnsBlockedBankAccounts'=>'fnsBlockedBankAccounts',
            'allPeps'=>'allPeps',
            'stat'=>'stat',
            'lists'=>'lists',
            'import'=>'import',
            'listsMatches'=>'listsMatches',
            'monList'=>'monList'
        ];

        if($collection->count() > 1){
            $result = [];
            $typedate= ValidatorController::verifiinn($inn);
            foreach ($tye as $keyword){
               $exists = Arr::exists($keyworkcontact, $keyword);

                if($exists && $typedate){
                    array_push($result, $keyword);
                }

            }
         return $result;


        }
    }
    public function verifiinn($inn){
        if((strlen($inn) >= 10 || strlen($inn) <= 12)  &&  is_numeric($inn)) {
            return true;
        }
    }
}
