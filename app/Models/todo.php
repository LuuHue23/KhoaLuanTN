<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class todo extends Model
{
	public $timestamps = false;
	protected $table='todo_list';

	
	protected $fillable=['id','Id_Tar','Id_Staff','todo_name','status','updated_at','created_at','process'];
	
	
	public function rate()
	{
		return $this->hasOne('App\Models\rate','Id_Tar','Id_Tar');
	}

	public function workpro()
	{
		return $this->hasOne('App\Models\workpro','Id_Tar','Id_Tar');
	}
	
	


}
 ?>