<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class rate extends Model
{
	public $timestamps = false;
	protected $table='rate';
	protected $fillable=['Id_Tar','Id_Staff','Rate','Status'];



	public function todo()
	{
		return $this->hasOne('App\Models\todo','Id_Tar','Id_Tar');
	}


}
 ?>