<?php

namespace App\Imports;

use App\Models\Cementery;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CemeteryImport implements ToCollection
{
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if(isset($row['name']) && isset($row['country'])){
                 Cementery::create([
                    'user_id'    =>  $this->id,
                    'name'    =>  $row['name'],
                    'country'    =>  $row['country'],
                    'state'    =>  $row['state'],
                    'city'    =>  $row['city'],
                    'address'    =>  $row['address'],
                    'longitude'    =>  $row['longitude'],
                    'latitude'    =>  $row['latitude'],
                    'municipalities'    =>  $row['municipalities'],
                    'website'    =>  $row['website'],
                ]);
            }

        }
    }
}
