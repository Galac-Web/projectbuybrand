<?php

namespace Database\Seeders;

use App\Enums\FranchiseAdvantageType;
use App\Enums\RoyaltyType;
use App\Helpers\Media as MediaLibrary;
use App\Models\Franchise;
use App\Models\Franchise\Advantage;
use App\Models\Franchise\Type;
use App\Models\User;
use App\Services\Models\PaybackPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class FranchiseTableSeeder extends Seeder
{
    /** @var \App\Models\User */
    private $user;

    /** @var \Illuminate\Database\Eloquent\Collection */
    private $types;

    /** @var \App\Services\Models\PaybackPeriod */
    private $payback;

    public function __construct()
    {
        $this->user = User::first();
        $this->types = Type::get();
        $this->payback = PaybackPeriod::init();
    }

    public function run()
    {
        $franchises = [
            [
                'name' => 'FARFOR',
                'owner_id' => $this->user->id,
                'type_id' => $this->types->firstWhere('name', 'Франшиза')->id,
                'is_active' => true,
                'foundation_year' => 2020,
                'start_year' => 2021,
                'information' => [
                    'description' => 'Бренд FARFOR- это сеть ресторанов доставки еды. Наша глобальная цель- строить узнаваемый бренд, готовить и доставлять еду в каждый дом. Сеть доставки еды FARFOR работает более чем в 80 городах России и СНГ и предоставляет услуги по доставке готовой еды, а также обслуживает гостей в небольших залах с посадочными местами  и продает еду навынос.',
                ],
                'terms' => [
                    'royalty_type' => RoyaltyType::PERCENT,
                    'royalty' => 4,
                    'investments' => [2000000, 6000000],
                    'lumpsum' => [500000, 2000000],
                    'payback' => [6, 12],
                ],
                'media' => [
                    'logo' => '/assets/images/logos/farfor.png',
                    'cover' => 'https://buybrand.ru/upload/iblock/774/franshiza_861kh483rkh_2.jpg',
                ],
                'formats' => [
                    [
                        'created_by' => $this->user->id,
                        'name' => 'Number One',
                        'investments' => [2000000, null],
                        'payback_period' => 1,
                        'media' => [
                            'preview' => '/assets/images/wb.png',
                        ],
                    ],
                    [
                        'created_by' => $this->user->id,
                        'name' => 'Number Two',
                        'investments' => [2500000, null],
                        'payback_period' => 1,
                        'media' => [
                            'preview' => '/assets/images/wb.png',
                        ],
                    ],
                    [
                        'created_by' => $this->user->id,
                        'name' => 'Number Three',
                        'investments' => [6000000, null],
                        'payback_period' => 2,
                        'media' => [
                            'preview' => '/assets/images/wb.png',
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Лабораторная служба Хеликс',
                'owner_id' => $this->user->id,
                'type_id' => $this->types->firstWhere('name', 'Франшиза')->id,
                'is_active' => true,
                'foundation_year' => 1998,
                'start_year' => 2007,
                'information' => [
                    'description' => 'Лабораторная служба Хеликс была основана в 1998 году и является одним из лидеров рынка частной лабораторной диагностики в России.',
                ],
                'terms' => [
                    'royalty_type' => RoyaltyType::PERCENT,
                    'royalty' => 2,
                    'investments' => [1250000, 2800000],
                    'lumpsum' => [50000, 180000],
                    'payback' => [12, 18],
                ],
                'media' => [
                    'logo' => 'https://buybrand.ru/upload/iblock/07b/Logo_VK.jpg',
                    'cover' => 'https://buybrand.ru/upload/iblock/278/helix_small_.jpg',
                ],
            ],
            [
                'name' => 'Пив&Ко',
                'owner_id' => $this->user->id,
                'type_id' => $this->types->firstWhere('name', 'Франшиза')->id,
                'is_active' => true,
                'foundation_year' => 2008,
                'start_year' => 2013,
                'information' => [
                    'description' => <<<HTML
                        <p>ГК «Пив&amp;Ко» включает в себя девять подразделений и более 570 торговых точек, где заняты почти полторы тысячи сотрудников. Первый минимаркет «Пив&amp;Ко» был открыт в городе Екатеринбурге в 2009 г., и с того момента компания начала свое развитие и расширение. Более десяти лет мы совершенствуемся и развиваемся, чтобы удовлетворять все требования наших клиентов и партнеров.</p>
                        <p>На сегодняшний день «Пив&amp;Ко» — это лидирующая в РФ сеть магазинов у дома с большим ассортиментом качественного разливного пива.</p>
                        <p>Магазины «Пив&amp;Ко» привлекают своим дизайном, уютом, удобством и доступностью. Посещаемость наших магазинов достигает десятки тысяч человек в день. Наши постоянные посетители и продавцы становятся хорошими знакомыми и называют друг друга по именам.</p>
                        <p>В 2021 году в 192 городах России и Казахстана мы имеем 53 магазина собственной сети и более 520 магазинов, открытых по франшизе.</p>
                        <p>Каждый месяц мы открываем от 15 до 25 франшизных магазинов, основная цель которых – обеспечивать клиентов качественным пивом. Наши партнеры получают от нас самое необходимое – богатый опыт ведения бизнеса и общения с клиентами.</p>
                        <p>Высокое качество нашей продукции и широкий ассортимент товара выгодно отличают нас от конкурентов. Посетители наших магазинов получают самую качественную продукцию на рынке.</p>
                    HTML,
                ],
                'terms' => [
                    'royalty_type' => RoyaltyType::WITHOUT,
                    'royalty' => null,
                    'investments' => [2500000, 4900000],
                    'lumpsum' => [250000, 350000],
                    'payback' => [6, 12],
                ],
                'media' => [
                    'logo' => 'https://pivko24.ru/design/logo.png',
                    'cover' => 'https://buybrand.ru/upload/resize_cache/iblock/cd0/550_440_1/pivko_obl.jpg',
                    'video' => [
                        'youtube' => 'https://youtu.be/O-EkwdRSOdE',
                    ],
                ],
                'formats' => [
                    [
                        'created_by' => $this->user->id,
                        'name' => 'Minimarket',
                        'investments' => [1500000, null],
                        'payback_period' => 2,
                        'media' => [
                            'preview' => 'https://buybrand.ru/upload/resize_cache/iblock/0a8/562_342_2/minimarket.jpg',
                        ],
                    ],
                    [
                        'created_by' => $this->user->id,
                        'name' => 'Supermarket',
                        'investments' => [2900000, null],
                        'payback_period' => 3,
                        'media' => [
                            'preview' => 'https://buybrand.ru/upload/resize_cache/iblock/599/562_342_2/supermarket.jpg',
                        ],
                    ],
                    [
                        'created_by' => $this->user->id,
                        'name' => 'Островок',
                        'investments' => [795000, null],
                        'payback_period' => 3,
                        'media' => [
                            'preview' => 'https://buybrand.ru/upload/resize_cache/iblock/574/562_342_2/ostrovok.jpg',
                        ],
                    ],
                ],
            ],
        ];

        foreach ($franchises as $index => $franchise) {
            /** @var \App\Models\Franchise $item */
            $item = Franchise::create([
                'name' => $franchise['name'],
                'owner_id' => $franchise['owner_id'],
                'type_id' => $franchise['type_id'],
                'is_active' => $franchise['is_active'],
                'foundation_year' => $franchise['foundation_year'],
                'start_year' => $franchise['start_year'],
            ]);

            if ($index === 0) {
                $item->badges()->sync(1);
            }

            $advantages = Advantage::get();

            foreach ($advantages as $index => $advantage) {
                $item->advantages()->attach($advantage->id, [
                    'type' => $index < 3 ? FranchiseAdvantageType::GOOD : FranchiseAdvantageType::BAD,
                    'label' => $advantage->name === 'Формат развития' ? 'off-line, on-line' : null,
                    'is_main' => $index < 5 ? true : false,
                ]);
            }

            if (!empty($franchise['terms'])) {
                $item->terms()->updateOrCreate(
                    ['franchise_id' => $item->id],
                    $franchise['terms']
                );
            }

            if (!empty($franchise['information'])) {
                $item->information()->updateOrCreate($franchise['information']);
            }

            if (!empty($franchise['formats'])) {
                foreach ($franchise['formats'] as $format) {
                    if (!empty($format['media'])) {
                        $formatMedia = $format['media'];
                        unset($format['media']);
                    }

                    $formatItem = $item->formats()->updateOrCreate(
                        [
                            'created_by' => $format['created_by'],
                            'name' => $format['name'],
                        ],
                        $format
                    );

                    if (isset($formatMedia)) {
                        $this->media($formatItem, $formatMedia);
                    }
                }
            }

            if (!empty($franchise['media'])) {
                $this->media($item, $franchise['media']);
            }
        }
    }

    private function media(Model $model, array $media)
    {
        foreach ($media as $name => $image) {
            if ($name === 'video') {
                /** @var \App\Services\Video\Service $video */
                $video = app(\App\Services\Video\Service::class);
                $video->save($model, $image);
                continue;
            }

            MediaLibrary::toCollection($model, url($image), $name);
        }
    }
}
