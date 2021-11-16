<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    //
    public function index(Request $r){

        $mob=$r->input('mob');
        $otp=$r->input('otp_num');
        $data['otp_mob']=$mob;
        $data['otp_num']= $otp;
     $this->obj->otpInsert('otp',$data);
        Nexmo::message()->send([
            'to'=>'919605487670',
            'from'=>'919656946547',
            'text'=>'hi'
        ]);
        echo "send message";
    }
}
