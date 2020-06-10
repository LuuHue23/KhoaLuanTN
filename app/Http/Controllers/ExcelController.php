<?php

namespace App\Http\Controllers;
use App\Exports\StaffExport;
use App\Exports\StaffExportView;

use Illuminate\Http\Request;
use App\Models\staff;

use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
	public function index()
	{
		
		
		$staff= staff::all();
		return view('admin.excel.index', compact('staff'));
	}
    public function export()
    {
    	
    	return Excel::download(new StaffExport (),'Bảng lương.xlsx');
    }
    public function export_view()
    {
    	return Excel::download(new StaffExportView(),'Lương nhân viên.xlsx');
    }
}
