<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function users()
    {
        return $this->hasMany(Blog::class, 'created_by');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Creates a new user based on the input provided.
     *
     * @return object
     */
    public static function create_user($details)
    {
        $user = User::create([
            'surname' => $details['surname'],
            'first_name' => $details['first_name'],
            'last_name' => $details['last_name'],
            'username' => $details['username'],
            'email' => $details['email'],
            'password' => Hash::make($details['password']),
            'language' => ! empty($details['language']) ? $details['language'] : 'en',
        ]);

        return $user;
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getUserFullNameAttribute()
    {
        return "{$this->surname} {$this->first_name} {$this->last_name}";
    }
}
