<?php

namespace App\Models\Franchise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonturAdd extends Model
{

    use HasFactory;

    protected $table = 'kontur';

    protected $fillable = [
        'public', 'regData','regtradmark','lawsuits','anakitikcount','anakitikcountNote','anakitikcountWin','anakitikcountLose','anakitikexec','franchise_id'
    ];
}
