<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * 
 */
class staff extends Authenticatable
{
	protected $table='staff';

	public $timestamps = false;
	
	protected $primaryKey='Id_Staff';

	protected $fillable=['Id_Position','Id_Depart','password','Staff_Name','email', 'Status','image','total_rate'];

	public function depart()
	{
		return $this->hasOne('App\Models\depart','Id_Depart','Id_Depart');
	}
	public function position()
	{
		return $this->hasOne('App\Models\position','Id_Position','Id_Position');
	}

}
 ?>