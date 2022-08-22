<?php

namespace App\Models\Franchise;

use App\Casts\Between;
use App\Enums\RoyaltyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;

    protected $table = 'franchises_terms';

    protected $fillable = [
        'royalty_type', 'royalty',
        'investments',
        'lumpsum',
        'payback',
        'staff',
        'avg_monthly_revenue', 'profit',
    ];

    protected $casts = [
        'investments' => Between::class,
        'lumpsum'     => Between::class,
        'payback'     => Between::class,
        'staff'       => Between::class,
    ];

    public static function getRoyaltyTypes(): array
    {
        return collect(RoyaltyType::get())
            ->map(fn ($id, $name) => (object) [
                'id' => $id,
                'name' => trans('royalty_types.' . strtolower($name)),
            ])
            ->values()
            ->toArray();
    }
}
