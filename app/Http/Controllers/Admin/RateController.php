<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\workpro;
use App\Models\rate;
use App\Models\staff;
use App\Models\target;
use App\Models\todo;
use App\Models\position;
use Carbon\carbon;

use Auth;


/**
 * 
 */
class RateController extends Controller
{
	public function rate($Id_Tar)
	{
		$rate=rate::whereMonth('created_at',Carbon::now('Asia/Ho_Chi_Minh')->month)->get();
		$workpro=workpro::where('Id_Tar',$Id_Tar)->first();
		return view('admin.rate.list',compact('rate','workpro'));
	}	
	
	public function update_rate($Id_Tar )
	{
		$target= $Id_Tar;
		$staff=workpro::where('Id_Tar',$Id_Tar)->value('Id_Staff');
		$percent=  target::where('Id_Tar',$Id_Tar)->value('percent');
		$date= workpro::where('Id_Tar',$Id_Tar)->value('Date_End');
		$update= todo::where('Id_Tar',$Id_Tar)->value('updated_at');
		$process=target::where('Id_Tar',$Id_Tar)->value('process');
		$Impor= target::where('Id_Tar',$Id_Tar)->value('Impor');
		$output= ($percent * $Impor)/100;
		
		$rate= new rate;
		$rate->Id_Tar= $target;
		$rate->Id_Staff= $staff;

		if(($date > $update && $process==1) || ($date == $update && $process==1) )
		{
			$rate->Minus=0;
		}
		else
		{
			$rate->Minus=500000;
		}
		if(($date > $update && $process==1) || ($date == $update && $process==1) )
		{
			$rate->Plus=1000000;
		}
		else
		{
			$rate->Plus=0;
		}
		
		$rate->Rate=$output;
		$rate->save();
		return redirect()->back();
	}
	public function total_rate()
	{

		$rate=rate::whereMonth('created_at',Carbon::now('Asia/Ho_Chi_Minh')->month)->get();
		
		return view('admin.rate.total-rate', compact('rate'));
	}
	
	public function showrate()
	{	
		
		$sum= rate::select('Id_Staff', DB::raw('SUM(Rate) as sum'))
		->groupBy('Id_Staff')->get();
		foreach( $sum as $row)
		{
			staff::where('Id_Staff', $row->Id_Staff)->update([
				'total_rate'=>$row->sum
			]);

		}
		$join = rate::select('Id_Staff', DB::raw(' SUM(Rate) as sum'),DB::raw('SUM(Minus) as minus' ),DB::raw('SUM(Plus) as plus' ))		
		->groupBy('Id_Staff');
		
		$sql = '(' . $join->toSql() . ') as latest';
		$triages = rate::join(DB::raw($sql), function($join) {
			$join->on('rate.Id_Staff', 'latest.Id_Staff')
			->on('rate.Id_Staff', 'latest.Id_Staff');
		})->get()->unique('Id_Staff');
		
		return view('admin.rate.show',compact('triages'));
	}

	public function post_salary()
	{	
			$sala = DB::table('staff')
	            ->join('position', 'staff.Id_Position', '=', 'position.Id_Position')
	           ->join('rate', 'staff.Id_Staff', '=', 'rate.Id_Staff')
	           ->select('staff.Id_Staff as Id_Staff','position.Salary as luong' ,'staff.total_rate as rate','rate.Minus as minus','rate.Plus as plus')
	        ->get();	
	           

	        foreach($sala as $row)
	        {
	        	
	           $ab=staff::where('Id_Staff',$row->Id_Staff)->update([
	           	'Salary'=>$row->luong+(($row->luong *$row->rate)/100)-($row->minus)+ ($row->plus)
	           ]);
	                    
			}
			return redirect()->back();
    }

    public function error()
    {
    	// $staff= staff::all();

    	// $workpro=DB::table('work_pro')
    	// 		->join('target','target.Id_Tar','=','work_pro.Id_Tar')
    	// 		->select('work_pro.Id_Staff','COUNT(Id_Tar) as count')
    	// 		->groupBy('work_pro.Id_Staff')
    	// 		->value('count');

  
    	// return view('admin.rate.error', compact('staff','workpro'));
    	dd( Carbon::now('Asia/Ho_Chi_Minh'));
    }
}

 ?>