<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_telepon',
        'alamat',
        'active',
        'role_id',
        'created_at',
        'updated_at',
        'username',
        'moodle_id',
        'board_of_director',
        'function',
        'division',
        'area',
        'sub_area',
        'position',
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
        'cfh' => 'boolean',
        'is_active' => 'boolean',
    ];

    private function getMigrationDate()
    {
        return Carbon::parse('2022-01-08T00:00:00.000Z');
    }

    public function getAuthIdentifierName()
    {
        // The date the migration happened :D
        $migrationDate = $this->getMigrationDate();

        try {
            $iat = Carbon::parse(auth()->payload()->get('iat'));
            if ($iat->lessThan($migrationDate)) {
                // info('getAuthIdentifierName 1');
                return 'id';
            }
            // info('getAuthIdentifierName 2');

            return 'moodle_id';
        } catch (\Exception $e) {
            // info('getAuthIdentifierName 3');
            return 'id';
        }
    }

    public function getAuthIdentifier()
    {
        // The date the migration happened :D
        $migrationDate = $this->getMigrationDate();
        if (auth()->guest() && now()->greaterThan($migrationDate)) {
            // info('getAuthIdentifier 1');
            return $this->moodle_id;
        }
        // info('getAuthIdentifier 2');

        return $this->{$this->getAuthIdentifierName()};
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
