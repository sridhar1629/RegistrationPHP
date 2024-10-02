<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class JobListing extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "joblistings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'company_name',
        'location',
        'jobtitle',
        'description',
        'salary',
        'industry',
        'degree',
        'duration',
        'type',
        'requirements',
        'state',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
}
