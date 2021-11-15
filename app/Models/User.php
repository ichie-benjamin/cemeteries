<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Overtrue\LaravelFollow\Followable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laratrust\Traits\LaratrustUserTrait;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable implements JWTSubject
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    use Followable;
    use Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','phone','avatar',
        'email','first_name','last_name','bio',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['has_cemetery','site_id','role','name'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $withCount = ['cemeteries','memorials','photos'];
//    protected $with = [];

    public function cemeteries(){
        return $this->hasMany(Cementery::class,'user_id');
    }
    public function photos(){
        return $this->hasMany(Image::class,'user_id');
    }

    public function setting(){
        return $this->hasOne(UserSetting::class);
    }

    public function memorials(){
        return $this->hasMany(Memorial::class,'user_id');
    }

    public function getAvatarAttribute($value){
        if(!$value){
            return 'https://ui-avatars.com/api/?name='.$this->username.'&background=0D8ABC&color=fff&bold=true';
        }
        return  env('APP_URL').$value;
//        return Avatar::create($this->name)->toGravatar(['d' => 'identicon', 'r' => 'pg', 's' => 100]);
    }
    public function getUsernameAttribute($value){
        return Str::limit($value,15);
    }

    public function getNameAttribute($value){
        $name = $this->first_name . ' '. $this->last_name;
        if(strlen($name) > 3){
            return $name;
        }else {
            return $this->username;
        }
    }

    public function getRoleAttribute($value){
        if($this->hasRole('volunteer')){
            return 'Volunteer';
        }elseif ($this->hasRole('admin')){
            return 'Cemetery Owner';
        }else{
            return 'Cemetery Owner';
        }
    }

    public function getSiteIdAttribute(){
        return $this->id + 1000;
    }
    public function getHasCemeteryAttribute(){
        if($this->cemeteries_count > 0){
            return true;
        }else{
            return false;
        }
    }
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
}
