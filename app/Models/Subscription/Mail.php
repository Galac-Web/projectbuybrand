<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'subscriptions_mail';

    protected $fillable = [
       'user_id', 'email',
    ];
}
