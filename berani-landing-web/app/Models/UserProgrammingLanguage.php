<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProgrammingLanguage extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $with = [
        'programming_language'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programming_language()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }
}
