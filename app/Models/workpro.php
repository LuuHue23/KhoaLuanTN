<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class workpro extends Model
{
	public $timestamps = false;
	// protected $primarykey= 'Id_Tar';
	protected $table='work_pro';
	
	
	protected $fillable=['Id_TarG','Id_Tar','Id_Staff','Date_Start','Date_End'];

	public function target()
	{
		return $this->hasOne('App\Models\target','Id_Tar','Id_Tar');
	}
	
	public function staff()
	{
		return $this->hasOne('App\Models\staff','Id_Staff','Id_Staff');
	}
	public function targetgroup()
	{
		return $this->hasOne('App\Models\targetgroup','Id_TarG','Id_TarG');
	}
	public function todo()
	{
		return $this->hasOne('App\Models\todo','Id_Tar','Id_Tar');
	}
	
	
}
 ?>