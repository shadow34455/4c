<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class User extends Authenticatable implements MustVerifyEmail
 //class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'Job_title',
        'education',
        'imge_path_cover_page',
        'email',
        'date',
        'gender',
        'phone',
        'password',
        'role',
        'google_id',
        'facebook_id',
        'github_id',
        'social_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function messages(){
        return $this->hasMany(messages::class);
    }
    public function services(){
        return $this->hasMany(services::class);
    }
    public function public_services(){
        return $this->hasMany(public_services::class);
    }
    public function public_services_bid(){
        return $this->hasMany(public_services::class);
    }
    public function posts()
    {
        return $this->hasMany(posts::class);
    }
    public function question()
    {
        return $this->hasMany(question::class);
    }
    // public function likedByUser(User $user)
    // {   
    //     return DB::table('likes')
    //     ->where('user_id',$user->id)
    //     ->count();
    // }
    public function tasks()
    {
        return $this->hasMany(tasks::class);
    }
    public function fields()
    {
        return $this->hasMany(fields::class);
    }
    public function  isAdmin()
    {
        return $this->role == 1 ? true : false;
    }
    public function isPersonal_accounr()
    {
        return $this->role == 2 ? true : false;
    }
    public function  isBusiness_account()
    {
        return $this->role == 3 ? true : false;
    }
};
