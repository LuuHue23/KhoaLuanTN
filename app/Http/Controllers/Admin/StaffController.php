<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\position;
use App\Models\depart;
use App\Models\todo;
use App\Models\workpro;
use App\Models\target;


/**
 * 
 */
class StaffController extends Controller
{
	//danh sach nv
	public function list()
	{
		$staf=staff::paginate(5);
		return view('admin\staff\list', compact('staf'));
	}
// tìm kiếm thông tin nhân viên
	public function search(Request $req){
	$search = $req->get('search');
	$staf = staff::where('Staff_Name','like','%'.$search.'%')->paginate(5);

	return view('admin.staff.list',compact('staf'));
	}



	// sua thong tin nhan vien
	public function edit($Id_Staff)
	{
		$staff=staff::all();
		$posit=position::all();
		$depart=depart::all();
		

		$staf=staff::find($Id_Staff);
		return view('admin\staff\edit-nhanvien',compact('staff','posit','depart','staf'));

	}
	public function edit_post ($Id_Staff, Request $req)
	{
		$req->validate(
			[
			 'Staff_Name'=>'required',
			 'Email'=>'unique'
			
			]
			 ,
			[
				'Staff_Name.required'=>'Tên nhân viên không được để trống',
				// 'Email.required'=>'Email không được để trống',
				'Email.unique'=>'Email đã tồn tại ',
			//	'Password.required'=>'Mật khẩu không để trống'
			]);
		// dd($req);
		if($req->hasFile('file'))
		{
			$name=$req->file->getClientOriginalname();
			$req->file->move('uploads/',$name);
		}
		else
		{
			$name=staff::find($Id_Staff)->image;
		}



		staff::find($Id_Staff)->update([
			// 'Id_Staff'=>$req->Id_Staff,
			'Id_Position'=>$req->Id_Position,
			'Id_Depart'=>$req->Id_Depart,
			'Staff_Name'=>$req->Staff_Name,
			'email'=>$req->email,
			'image'=>$name,
			//'Password'=>$req->Password,
			'Status'=>$req->Status
		]);
		return redirect()->route('list_staff');
	}

	//Them nhan vien
	public function add()
	{
		
		$staff=staff::paginate(5);

		$depart=depart::all();
		$posit=position::all();
		return view('admin.staff.add', compact('staff','posit','depart'));
	}

	public function create(Request $req)
	{
		$req->validate(
			[
			 'Staff_Name'=>'required',
			 'email'=>'required|email|unique:staff',
			 'password'=>'required',

			]
			 ,
			[
				'Staff_Name.required'=>'Tên nhân viên không được để trống',
				'email.required'=>'Email không được để trống',
				'email.unique'=>'email đã tồn tại',
				'password.required'=>'Mật khẩu không để trống'
			]);
		
		//dd($req->file);
		if($req->hasFile('file'))
		{
			$name=$req->file->getClientOriginalname();
			$req->file->move('uploads/',$name);
		}

		staff::create([
			'Staff_Name'=>$req->Staff_Name,
			'password'=>bcrypt($req->password),
			'email'=>$req->email,
			'Id_Position'=>$req->Id_Position,
			'Id_Depart'=>$req->Id_Depart,
			'image'=>$name,
			'Status'=>$req->Status

		]);
		return redirect()->back();
		//dd($req->all());
	}

	//xoa nhan vien
	public function delete($Id_Staff)
	{
		staff::find($Id_Staff)->delete();
		return redirect()->back();
	}

	// kpi cua quan tri
	public function list_kpi()
	{
		$users=workpro::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->get();
		return view('admin.do.list-kpi',compact('users'));
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
		
		return view('admin.do.do', compact('target','data','percent'));

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




}
 ?>