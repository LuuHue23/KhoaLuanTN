<?php

namespace App\Exports;
use App\Models\staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffExport implements FromCollection
{

  
    public function collection()
    {
     return staff::all();   
    }
}
