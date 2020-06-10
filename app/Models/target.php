<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class target extends Model
{
	public $timestamps = false;
	protected $table='target';
	protected $primaryKey ='Id_Tar';
	
	protected $fillable=['Id_Tar','Id_TarG','Tar_Name','Description','process','percent','Impor'];
	public function targetgroup()
	{
		return $this->hasOne('App\Models\targetgroup','Id_TarG','Id_TarG');
	}
	
	
}
 ?>