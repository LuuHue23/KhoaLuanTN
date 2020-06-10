<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;

use Mail;
use App\Models\workpro;
use App\Models\todo;
use App\Models\target;


class EmailController extends Controller
{
    public function sendEmail()
    {
        $context= DB::table('work_pro')
                ->join('target','work_pro.Id_Tar','=','target.Id_Tar')
                ->join('staff','work_pro.Id_Staff','=','staff.Id_Staff')
                ->select('target.Id_Tar as Id_Tar','work_pro.Id_Staff as Id_Staff','target.process as process','work_pro.Date_End as Date_End','staff.Email as Email')
                ->where('process',0)
               
                ->get();
            foreach( $context as $row)
            {

               $email= $row->Email;

                $data['title'] = "Nhắc nhở hoàn thành công việc";

                Mail::send('admin.mail.email', $data, function($message) use ($email) {
                    $message->from('luuthihue123bg@gmail.com','Admin'); 
                    $message->to( $email, 'Receiver Name');

                    $message->subject('Thư từ Lưu Huệ');
                });     
            }



        // if (Mail::failures()) {
        //    return response()->Fail('Sorry! Please try again latter');
        //  }else{
        //    return response()->success('Great! Successfully send in your mail');
        //  }
            return redirect()->back();
    }
}