<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use App\Models\staff;
use App\Models\target;
use App\Models\targetgroup;
use App\Models\workpro;



/**
 * 
 */
class AdminController extends Controller
{
	
	public function index()
	{
		$staff= staff::count();
		$target=target::count();
		$process=target::where('process','=','1')->count();
		$unprocess=target::where('process','=','0')->count();
		$workpro=workpro::paginate(5);

		return view('admin/index',compact('staff','target','workpro','process','unprocess'));
	}

	public function login()
	{
		return view('admin.login');
	}

	public function postlogin(Request $req)
	{
			$this->validate($req,[
			'email'=>'required|email',
			'password'=>'required'
		],[
			'email.required'=>'Email không được để rỗng',
			'email.email'=>'Email không đúng định dạng',
			'password.required'=>'Mật khẩu không được để rỗng'
		]);

		
		//$pass = Hash::make($request['password']);
		$mail=$req->email;
		$pass=$req->password;
		
		
		if(Auth::guard('acc')->attempt(['email'=>$mail,'password'=>$pass,'Status'=>1]))
		{			
			return redirect()->route('index');	

		}
		if(Auth::guard('acc')->attempt(['email'=>$mail,'password'=>$pass,'Status'=>0]))
		{			
			//dd(Auth::user()->email);
		//	return redirect()->route('indexx');
			return redirect()->route('indexx');
			
		}
		else
		{
		//	dd('tk_mk sai');
			return redirect()->back()->with('message','Tài khoản hoặc mật khẩu không đúng');
		}

	}
	public function logout()
	{
		Auth::logout();
		return view('admin.login');
	}

}
 ?>