<?php

namespace App\Imports;

use App\Models\Cementery;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CemeteryImport  implements ToCollection, WithHeadingRow
{
//    public function __construct(int $id)
//    {
//        $this->id = $id;
//    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $name = $this->clean($row['name']);
            if(isset($row['name']) && isset($row['country']) && strlen($name) > 1){
                 Cementery::create([
                    'user_id'    =>  auth()->id(),
                     'name'    =>  $name,
//                    'username' => strtolower(str_replace(' ','_',$row['name'])),
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

        }
    }


    public function clean($str){
        $string = str_replace(' ', '-', $str);
        $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        return str_replace('-', ' ', $text);
    }
}
