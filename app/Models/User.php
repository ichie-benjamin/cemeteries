<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laratrust\Traits\LaratrustUserTrait;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable implements JWTSubject
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    use Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','phone','avatar',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['has_cemetery'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $withCount = ['cemeteries'];

    public function cemeteries(){
        return $this->hasMany(Cementery::class,'user_id');
    }

    public function getAvatarAttribute($value){
        if(!$value){
            return 'https://ui-avatars.com/api/?name='.$this->username.'&background=0D8ABC&color=fff&bold=true';
        }
        return  env('APP_URL').$value;
//        return Avatar::create($this->name)->toGravatar(['d' => 'identicon', 'r' => 'pg', 's' => 100]);
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
