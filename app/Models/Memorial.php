<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{

    protected $table = 'memorials';

    protected $primaryKey = 'id';

    protected $with = ['photos','cemetery'];

    protected $withCount = 'photos';

    protected $appends = ['name','b_date','d_date','short_bio','age'];

    public $months = ['None','Jan','Feb','Mar','April','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];

    protected $fillable = [
                  'first_name',
                  'last_name',
                  'middle_name',
                  'nickname',
                  'maiden_name',
                  'gender',
                  'birth_day',
                  'birth_month',
                  'birth_year',
                  'death_day',
                  'death_month',
                  'death_year',
                  'birth_location',
                  'death_location',
                  'bio',
                  'prefix','user_id',
                  'suffix','cemetery_id','is_famous','active'
              ];

    protected $dates = [];


    protected $casts = [];

    public function photos(){
        return $this->hasMany(Image::class,'memorial_id');
    }

    public function cemetery(){
        return $this->belongsTo(Cementery::class);
    }


    public function getNameAttribute(){
        return $this->first_name. ' '.$this->middle_name.' '.$this->last_name;
    }

    public function getBDateAttribute(){
        return $this->birth_day. '-'. $this->birth_month.'-'.$this->birth_year;
    }
    public function getDDateAttribute(){
        return $this->death_day. '-'. $this->death_month.'-'.$this->death_year;
    }
    public function getShortBioAttribute(){
        return str_limit($this->bio,100);
    }
        public function getAgeAttribute(){

        return $this->birth_day.' '.$this->months[$this->birth_month].' '.$this->birth_year. ' - '.$this->death_day.' '.$this->months[$this->death_month].' '.$this->death_year;
    }

    public function getImageAttribute(){
        if($this->photos_count > 0){
            return $this->photos()->first()->path;
        }else{
            return 'https://ui-avatars.com/api/?name='.$this->name.'&background=0D8ABC&color=fff&bold=true';
        }
    }


}
