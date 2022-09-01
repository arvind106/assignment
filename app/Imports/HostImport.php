<?php

namespace App\Imports;

use App\Models\HostModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HostImport implements ToModel,WithValidation,WithStartRow
{
    use Importable;

    public function model(array $row){
      
        return new HostModel([
            'Sapid'     => $row[0],
            'Hostname'    => $row[1],
            'Loopback' =>  DB::raw('INET_ATON(\''.$row[2].'\')'),
            'MacAddress' =>  $row[3],
           'ResponseTime'  => time(),

        ]);
    }

     public function rules(): array {
        return [
            '0' => 'required|alpha_num|max:18|unique:router_details,Sapid',
            '1' => 'required|alpha_num|max:14',
            '2' => 'required|ip',
            '3' => 'required|max:17',
        ];
    }
     public function startRow(): int
    {
        return 2;
    }
}
