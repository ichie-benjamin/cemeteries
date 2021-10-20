<?php

namespace App\Imports;

use App\Models\Cementery;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CemeteryImport  implements ToCollection, WithHeadingRow, WithStartRow
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
            $exist = Cementery::select('longitude','latitude')->where('latitude',$row['latitude'])->where('longitude',$row['longitude'])->first();
            if(isset($row['name']) && isset($row['country']) && strlen($name) > 1 && !$exist){
                 Cementery::create([
                    'user_id'    =>  auth()->id(),
                     'name'    =>  $name,
//                    'username' => strtolower(str_replace(' ','_',$row['name'])),
                     'country'    =>  $this->clean($row['country']),
                     'state'    =>  $this->clean($row['state']),
                     'city'    =>  $this->clean($row['city']),
                     'address'    =>  $this->clean($row['address']),
                     'longitude'    =>  $row['longitude'],
                     'latitude'    =>  $row['latitude'],
                     'municipalities'    =>  $this->clean($row['municipalities']),
                     'website'    =>  str_limit($this->clean($row['website']), 100)
                ]);
            }

        }
    }

    public function startRow(): int
    {
        return 1;
    }

    public function batchSize(): int
    {
        return 500;
    }


    public function clean($str){
        $string = str_replace(' ', '-', $str);
        $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        return str_replace('-', ' ', $text);
    }
}
