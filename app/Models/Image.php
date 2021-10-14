<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';

    protected $primaryKey = 'id';

    protected $fillable = [
                  'name',
                  'path','image_id','type',
                  'memorial_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the memorial for this model.
     *
     * @return App\Models\Memorial
     */
    public function memorial()
    {
        return $this->belongsTo('App\Models\Memorial','memorial_id');
    }



}
