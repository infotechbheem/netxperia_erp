<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'clients';

    // The attributes that are mass assignable
    protected $fillable = [
        'client_id',
        'name',
        'email',
        'phone_number',
        'password',
        'company_name',
        'client_type',
        'country',
        'address',
        'preferred_language',
        'referral_source',
        'dob',
        'occupation',
        'tax_identification',
        'industry',
        'communication_preferences',
        'terms_conditions',
        'marketing_opt_in',
    ];

    /**
     * Hide sensitive fields.
     */
    protected $hidden = [
        'password',
    ];

    // Optionally, if you want to customize the primary key
    // protected $primaryKey = 'id';

    // Optionally, if you want to disable timestamps
    // public $timestamps = false;
}
