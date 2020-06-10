<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\staff;
use Illuminate\Contracts\View\View;

class StaffExportView implements FromView
{
     public function view(): View{
    	return view('admin.excel.table',['staff'=>staff::all()]);
    }
    
}
