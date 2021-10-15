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
            'user_id'    =>  1,
            'name'    =>  $row['name'],
            'username' => strtolower(str_replace(' ','_',$row['name'])),
            'country'    =>  $row['country'],
            'state'    =>  $row['state'],
            'city'    =>  $row['city'],
            'address'    =>  $row['address'],
            'longitude'    =>  $row['longitude'],
            'latitude'    =>  $row['latitude'],
            'municipalities'    =>  $row['municipalities'],
            'website'    =>  $row['website']
        ]);
    }
}
