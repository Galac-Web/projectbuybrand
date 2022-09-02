<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Franchise\Category;

class FranchisesCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            'Общественное питание' => [
                'Кафе, рестораны, бары',
                'Уличная еда',
                'Фуд-траки',
                'Доставка еды',
            ],
            'Розничная торговля' => [],
            'Услуги' => [],
            'Производство/строительство' => [],
            'Автоматизированная торговля' => [],
        ];

        Category::insert(
            array_map(fn ($item) => [
                'name' => $item,
                'slug' => Str::slug($item)
            ], array_keys($items))
        );

        $categories = Category::get();

        foreach ($items as $category => $childrens) {
            if (empty($childrens)) continue;

            Category::insert(
                array_map(fn ($children) => [
                    'name' => $children,
                    'slug' => Str::slug($children),
                    'parent_id' => $categories->firstWhere('name', $category)->id,
                ], $childrens)
            );
        }
    }

    public function getOldScopes(): array
    {
        return [
            'Дети и образование', 'Для бизнеса B2B', 'Кафе и рестораны',
            'Красота, здоровье, спорт', 'Магазин, продажа товаров', 'Производственные',
            'Развлечения, отдых', 'Услуги населению', 'Фастфуд',
        ];
    }
}
