<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\DaData;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function getCity(Request $request, DaData $dadata)
    {
        return $request->whenHas('value', function ($value) use ($dadata) {
            $cities = cache()->rememberForever('dadata_clean_address__' . md5($value), fn () => $dadata->suggest(
                'address',
                $value,
                DaData::SUGGESTION_COUNT,
                [
                    'from_bound' => [
                        'value' => 'city'
                    ],
                    'to_bound' => [
                        'value' => 'city'
                    ],
                ]
            ));

            $cities = isset($cities[0]['data']) ? $cities : [[
                'value' => $cities['result'],
                'data' => $cities,
            ]];

            return $cities;
        });


        return $request->whenHas('value', function ($value) use ($dadata) {
            $data = cache()->rememberForever('dadata_clean_address__' . md5($value), fn () => $dadata->clean('address', $value));

            return [
                'city' => $data['region_type_full'] === 'город' ? $data['region'] : $data['city'],
                'geo_lat' => $data['geo_lat'],
                'geo_lon' => $data['geo_lon'],
            ];
        });
    }

    public function getCountry(Request $request, DaData $dadata)
    {
        if (!$request->has('value')) {
            return;
        }

        $countries = Country::query();

        if ($request->has('without')) {
            $countries->whereNotIn('name', $request->without);
        }

        return $countries->where('name', 'LIKE', '%'. $request->value .'%')->get();
    }
}
