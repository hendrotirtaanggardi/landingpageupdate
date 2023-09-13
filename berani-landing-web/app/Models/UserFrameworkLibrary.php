<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFrameworkLibrary extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $with = ['framework_library'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function framework_library()
    {
        return $this->belongsTo(FrameworkLibrary::class);
    }
}
