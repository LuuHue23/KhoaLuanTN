<?php 
namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\workpro;
use App\Models\target;
use App\Models\todo;
use App\Models\staff;
use App\Models\position;
use App\Models\depart;

/**
 * 
 */
class AccountController extends Controller
{
	
	public function account()
	{
		// $user=Auth::guard('acc')->user()->Id_Staff->get();

		$staff=staff::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->get();

		$staf=staff::find(Auth::guard('acc')->user()->Id_Staff);

		$posit=position::all();
		$depart=depart::all();
		// đếm số lượng công việc được giao
		$count=workpro::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->count();

		


		$target=DB::table('target')
		->join('work_pro','target.Id_Tar','=','work_pro.Id_Tar')
		->select( DB::raw('COUNT(target.process) as process'))
		 ->where('work_pro.Id_Staff','=',Auth::guard('acc')->user()->Id_Staff)
		->Where('target.process','=',0)
		->value('process');

		$targetdo=DB::table('target')
		->join('work_pro','target.Id_Tar','=','work_pro.Id_Tar')
		->select( DB::raw('COUNT(target.process) as process'))
		 ->where('work_pro.Id_Staff','=',Auth::guard('acc')->user()->Id_Staff)
		->Where('target.process','=',1)
		->value('process');
	


		return view('member.account.list',compact('staff','staf','posit','depart','count', 'target','targetdo'));




	}
	public function edit_acc( Request $req)
	{
		$Id_Staff=Auth::guard('acc')->user()->Id_Staff;
		$update=staff::find($Id_Staff)->update([
			'Staff_Name'=>$req->Staff_Name,
			'email'=>$req->email
		
		]);
		return redirect()->back();
	}
	
	public function update_pas(Request $req)
	{
		if($req->isMethod('post'))
		{
			$data= $req->all();
			if(Hash::check($data['password'],Auth::guard('acc')->user()->password)){
				if($data['newpas']==$data['updatepas'])
				{
					Staff::where('Id_Staff',Auth::guard('acc')->user()->Id_Staff)->update(['password'=>bcrypt($data['newpas'])]);
					Session::flash('success_message','Mật khẩu đã được cập nhật!');

				}
				else
				{
					Session::flash("error_message","Mật khẩu mới và xác nhận không trùng nhau");
					return redirect()->back();
				}
			}
			else
			{
				Session::flash("error_message"," Mật khẩu đã nhập vào không đúng");
				
			}

		}
		return redirect()->back();
		
	}
	public function update_img(Request $req)
	{
			$Id_Staff=Auth::guard('acc')->user()->Id_Staff;
		if($req->hasFile('file'))
		{
			$name=$req->file->getClientOriginalname();
			$req->file->move('uploads/',$name);
		}
		else
		{
			$name=staff::find($Id_Staff)->image;
		}


	
		$update=staff::find($Id_Staff)->update([
			'image'=>$name

		]);
		Session::flash("succes_message","Thay ảnh đại diện thành công!");
		return redirect()->back();
	}
}
?>