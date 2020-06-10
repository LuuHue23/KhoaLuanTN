<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\targetgroup;
use App\Models\target;
use Carbon\carbon;
/**
 * 
 */
class KpiController  extends Controller
{
	
	function list_kpi()
	{
		//$kpii=target::all();
		$kpii=target::paginate(5);
		
		return view('admin/kpi/list', compact('kpii'));

	}
	function add()
	{
		$kpi=targetgroup::all();
		$kpii=target::all();

		return view('admin/kpi/add',compact('kpi','kpii'));
	}

	public function create(Request $req)
	{
		$req->validate(
			[
				'Tar_Name'=>'required','unique'
			]
			,
			[
				'Tar_Name.required'=>'Tên mục tiêu không được để trống',
				'Tar_Name.unique' =>'Tên mục tiêu đã tồn tại'

			]);

		target::create([
			'Id_Tar'=>$req->Id_Tar,
			'Id_TarG'=>$req->Id_TarG,
			'Tar_Name'=>$req->Tar_Name,
			'Impor'=>$req->Impor,
			'Description'=>$req->Description
		]);
	
		
		return redirect()->route('listkpi');

	}
	public function delete($Id_Tar)
	{
		target::find($Id_Tar)->delete();
		return redirect()->back();
	
	}
	public function edit($Id_Tar)
	{
		$kpi=targetgroup::all();
		$kpii=target::all();
		
		$target=target::find($Id_Tar);

		return view('admin\kpi\edit-muctieu', compact('kpi','kpii','target'));
	}
	public function update($Id_Tar, Request $req)
	{
		// dd($req);
		$this->validate($req,
			[
			'Tar_Name'=>'required'],
			[
				'Tar_Name.required'=>'Tên mục tiêu không để trống',
				
			]);

		target::find($Id_Tar)->update([
			'Id_TarG'=>$req->Id_TarG,
			'Tar_Name'=>$req->Tar_Name,
			'Impor'=>$req->Impor,
			'Description'=>$req->Description
		]);
		return redirect()->route('listkpi');

	}
	public function filter(Request $req){
		if($req->Date_Start!='')
		{
			$kpii= target::whereBetween('created_at',[$req->Date_Start, $req->Date_End])->paginate(7);
			
		}
		return view('admin.kpi.list', compact('kpii'));
	}
}
 ?>