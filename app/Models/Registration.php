<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';

    protected $fillable = [
        'name',
        'title',
        'owner_id',
    ];

    /**
     * Get the owner details
     */
    public function owner()
    {
        return $this->hasOne(User::class, 'owner_id', 'id');
    }
}
