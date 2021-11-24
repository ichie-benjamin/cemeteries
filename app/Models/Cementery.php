<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;

class Cementery extends Model implements Viewable
{

    use Likeable;
    use InteractsWithViews;

    protected $table = 'cementeries';

    protected $appends = ['full_address', 'short_desc'];

    protected $primaryKey = 'id';



    use Sluggable;

    protected $withCount = 'memorials';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
            'username' => [
                'source' => 'name'
            ],

        ];
    }


    protected $fillable = [
                  'user_id',
                  'name',
                  'username',
                  'description',
                  'city',
                  'state',
                  'country',
                  'address',
                  'longitude',
                  'latitude','slug',
                  'status',
                  'approved',
                  'featured',
                  'municipalities',
                  'website',
                  'image',
                  'logo'
              ];


    public function getAvatarAttribute($value){
        if(!$value){
            return 'https://ui-avatars.com/api/?name='.$this->name.'&background=0D8ABC&color=fff&bold=true';
        }
        return  $value;
    }
    public function getNameAttribute($value){
        return $this->clean($value);
    }
    public function getAddressAttribute($value){
        return $this->clean($value);
    }

    public function clean($str){
        $string = str_replace(' ', '-', $str);
        $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        return str_replace('-', ' ', $text);
    }

    public function getFullAddressAttribute(){
       return $this->address. ', '.$this->city. ', '.$this->state.', '.$this->country;
    }
    public function getShortDescAttribute(){
       return str_limit($this->description, 200);
    }
    public function getLogoAttribute($value){
        if(!$value){
            return 'https://ui-avatars.com/api/?name='.$this->name.'&background=0D8ABC&color=fff&bold=true';
        }
        return  $value;
    }
    public function getImageAttribute($value){
        if(!$value){
            return asset('images/slider1.jpeg');
        }
        return  $value;
    }

    protected $dates = [];

    protected $casts = [
        'longitude' => 'double',
        'latitude' => 'double'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function photos(){
        $mem_ids = $this->memorials()->pluck('id');
        return Image::whereIn('memorial_id',$mem_ids)->orWhere('cemetery_id', $this->id)->get();
    }

    public function photographed(){
     $total_mem = count($this->memorials()->pluck('id'));
        $unphotographed = 0;
        foreach ($this->memorials()->get() as $item){
            if($item->photos_count < 1){
                $unphotographed++;
            }
        }
        if($unphotographed > 0){
            return (($total_mem - $unphotographed) / $total_mem ) * 100;
        }else{
            return 100;
        }
    }

    public function memorials()
    {
        return $this->hasMany(Memorial::class,'cemetery_id');
    }



}
