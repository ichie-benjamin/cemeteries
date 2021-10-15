<?php

namespace App\Imports;

use App\Models\Cementery;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CemeteriesImport implements ToModel,  WithHeadingRow
{

    public function model(array $row)
    {
        return new Cementery([
            'user_id'    =>  auth()->id(),
            'name'    =>  $this->clean($row['name']),
            'username' => strtolower(str_replace(' ','-',$this->clean($row['name']))),
            'country'    =>  $this->clean($row['country']),
            'state'    =>  $this->clean($row['state']),
            'city'    =>  $this->clean($row['city']),
            'address'    =>  $this->clean($row['address']),
            'longitude'    =>  $this->clean($row['longitude']),
            'latitude'    =>  $this->clean($row['latitude']),
            'municipalities'    =>  $this->clean($row['municipalities']),
            'website'    =>  $this->clean($row['website'])
        ]);
    }


    public function clean($str){
        $string = str_replace(' ', '-', $str);
        $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        return str_replace('-', ' ', $text);
    }
}
