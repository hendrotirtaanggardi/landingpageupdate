<?php

namespace App\Models;

use App\Models\UserTool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->hasMany(UserTool::class);
    }
}
