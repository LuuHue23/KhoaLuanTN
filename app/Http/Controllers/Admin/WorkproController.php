<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\position;
use App\Models\depart;
use App\Models\target;
use App\Models\targetgroup;
use App\Models\workpro;
use App\Models\todo;

/**
 * 
 */
class WorkproController extends Controller
{
	
	public function add_workpro(Request $req)
	{

		$staff=staff::all();
		$targg=targetgroup::all();
		$tar=target::all();
	
		$work=workpro::paginate(7);
		return view('admin.work_pro.list',compact('staff','targg','work','tar'));

	}
	public function filter(Request $req)
	{
		if($req->Date_Start!='')
		{
			$tar= target::whereBetween('created_at',[$req->Date_Start, $req->Date_End])->get();
			
		}
		else
		{
			$tar=target::all();
		}
		$staff=staff::all();
		$targg=targetgroup::all();
		
	
		$work=workpro::paginate(8);
		return view('admin.work_pro.list',compact('staff','targg','work','tar'));
		
	}
	public function filter_workpro(Request $req)
	{

		if($req->Date_Start!='')
		{
			$work= workpro::whereBetween('Date_Start',[$req->Date_Start, $req->Date_End])->paginate(5);
			
		}
		
		return view('admin.rate.list-workpro', compact('work'));

	}


	public function add_work_pro(Request $req)
	{
		$req->validate(
			[
			 'Date_Start'=>'required',
			 'Date_End'=>'required',
			
			]
			 ,
			[
				'Date_Start.required'=>'Vui lòng chọn ngày bắt đầu',
				'Date_End.required'=>'Vui lòng chọn ngày kết thúc',
				//'Password.required'=>'Mật khẩu không để trống'
			]);
		$data=workpro::create([
			'Id_Tar'=>$req->Id_Tar,
			'Id_TarG'=>$req->Id_TarG,
			'Id_Staff'=>$req->Id_Staff,
			'Date_Start'=>$req->Date_Start,
			'Date_End'=>$req->Date_End,
			'Status'=>$req->Status

		]);
		
		return redirect()->back();
	}

	public function view($Id_Tar)
	{	
		$workpro =workpro::where('Id_Tar',$Id_Tar)->first();

		$data=todo::where('Id_Tar',$Id_Tar)->get();
	
	
     	 $todo=todo::where('status','=',1)->where('Id_Tar','=',$Id_Tar)->count();
		$count=todo::where('Id_Tar',$Id_Tar)->count();
		if($count==0)
		{
			$percent=0;
		}
		else 
		{
		$percent= ($todo/$count)* 100;
		}
		
		return view('admin.work_pro.show', compact('workpro','data','percent'));
		
	}
	public function list_workpro()
	{
		$work=workpro::paginate(5);
		return view('admin.rate.list-workpro', compact('work'));
	}

	


}



 ?>