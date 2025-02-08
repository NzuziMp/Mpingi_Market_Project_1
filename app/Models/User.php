<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'profile',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date',
        'month',
        'year',
        'country',
        'country_id',
        'state_id',
        'mobile',
        'pobox',
        'phone',
        'address_1',
        'email',
        'address_2',
        'password',
        'type',
        'status',
        'code',
        'code_exp_date',
        'verification_code',
        'register_date',
        'log_status',
        'session',
        'post_number',
        'post_number_business',
        'post_number_industry',
        'product_duration',
        'service_duration_business',
        'service_duration_industry',
        'service_duration_job',
        'product_per_shop_article',
        'islogged',
        'google_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
       }

       public function state(){
        return $this->belongsTo(State::class);
       }

       public function city(){
        return $this->belongsTo(City::class);
       }

       public function sentMessages()
        {
            return $this->hasMany(tbl_chatbox::class, 'sender_id');
        }

        public function receivedMessages()
        {
            return $this->hasMany(tbl_chatbox::class, 'receiver_id');
        }

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
        'password' => 'hashed',
    ];
}
