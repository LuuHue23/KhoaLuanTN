<?php 
namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\workpro;
use App\Models\target;
use App\Models\staff;
use App\Models\todo;
use App\Models\rate;
use Session;

/**
 * 
 */
class StaffController extends Controller
{
	
	public function index(Request $req)
	{
		$workpro=workpro::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->get();
		$work=workpro::paginate(3);
		return view('member.index', compact('workpro','work'));
	}
	public function search(Request $req){
	
		$search = $req->get('search');
		
	//	Session::flash('success_message','Thông tin tìm kiếm vềb'.$search);

		$workpro = workpro::where('Date_End','like','%'.$search.'%')
					->orWhere('Date_Start','like','%'.$search.'%')
					->where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)
					->get();
		
	return view('member.index',compact('workpro'));
	}

	public function list()
	{			
		$users=workpro::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->get();
		return view('member.list-kpi',compact('users'));
	}
	public function do($Id_Tar)
	{
		$target = workpro::where('Id_Tar',$Id_Tar)->first();
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
			
			$tar=target::find($Id_Tar);
			$tar->percent=$percent;
			$tar->save();
		}
		
		return view('member.do', compact('target','data','percent'));

	}
	public function post_process(Request $req)
	{	
		$update=target::find($req->Id_Tar)->update(['process'=>$req->process]);
		return redirect()->back();
		
	}

	public function post_do( Request $req, $Id_Tar)
	{
		$target= $Id_Tar;	
		$todo= new todo;
		$todo->Id_Tar=$target;
		$todo->Id_Staff=Auth::guard('acc')->user()->Id_Staff;
		$todo->todo_name=$req->todo_name;	
		$todo->save();	
	return redirect()->back();
	}


	public function post_list(Request $req)
	{
		
		if (isset($_POST['status'])){
			foreach($_POST['status'] as $value) {
	        	// echo $value."<br/>";
	        	$todo= todo::find($value);
	        	$todo->status=1;        
	        	$todo->save();
      		 } 
		}
		return redirect()->back();
	}
public function view()
{
	$users=rate::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->get();
		return view('member.view-rate',compact('users'));
}
	



}
?>