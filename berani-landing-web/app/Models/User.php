<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'programming_languages',
        'framework_libraries',
        'tools'
    ];

    public function programming_languages()
    {
        return $this->hasMany(UserProgrammingLanguage::class);
    }

    public function framework_libraries()
    {
        return $this->hasMany(UserFrameworkLibrary::class);
    }

    public function tools()
    {
        return $this->hasMany(UserTool::class);
    }

    public function files()
    {
        return $this->hasMany(UserFile::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")->orWhere('email', 'like', "%{$keyword}%")->orWhere('phone_number', 'like', "%{$keyword}%")->orWhere('country', 'like', "%{$keyword}%")->orWhere('city', 'like', "%{$keyword}%");
            })->orWhereHas('programming_languages', function (Builder $query) use ($keyword) {
                $query->whereHas('programming_language', function (Builder $query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                });
            })->orWhereHas('framework_libraries', function (Builder $query) use ($keyword) {
                $query->whereHas('framework_library', function (Builder $query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                });
            })->orWhereHas('tools', function (Builder $query) use ($keyword) {
                $query->whereHas('tool', function (Builder $query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                });
            });
        });

        $query->when($filters['programming_languages'] ?? false, function ($query, $programming_languages) {
            return $query->whereHas('programming_languages', function (Builder $query) use ($programming_languages) {
                $query->where('programming_language_id', $programming_languages);
            });
        });

        $query->when($filters['framework_libraries'] ?? false, function ($query, $framework_libraries) {
            return $query->whereHas('framework_libraries', function (Builder $query) use ($framework_libraries) {
                $query->where('framework_library_id', $framework_libraries);
            });
        });

        $query->when($filters['tools'] ?? false, function ($query, $tools) {
            return $query->whereHas('tools', function (Builder $query) use ($tools) {
                $query->where('tool_id', $tools);
            });
        });
    }
}
