<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facades\Nexmo;

class VendorController extends Controller
{
    //
    public $obj;
    public function __construct()
    {
        $this->obj= new DataModel();
    }
    public function index()
    {
        return view('vendor.index');
    }
    public function login(Request $request)
    {
        request()->validate(['email'=>'required|email',
        'pass'=>'required']);
        $email=$request->input('email');
        $pass=$request->input('pass');
        
       $data=$this->obj->login('vendors',$email,$pass);
      
       if(isset($data))
       {
           $request->session()->put(array('sessid'=>$data->v_id));
           if($data->reg_status==0)
           {
               return redirect('/vendorDetailsAdd');
           }
           else
           {
            return redirect('/home');
           }
       }
       else{
        return redirect('/vendor');
       }
        
    }
    public function home()
    {
        $id=session('sessid');
        $data['result']=$this->obj->selectId('vendors',$id);
             
        return view('vendor.home',$data);
    }
    public function signUp()
    {
        return view('vendor.vendorRegister');
    }
    public function saveOtp(Request $r)
    {
        $mob=$r->input('mob');
        $otp=$r->input('otp_num');
        $data['otp_mob']=$mob;
        $data['otp_num']= $otp;
     $this->obj->otpInsert('otp',$data);
        Nexmo::message()->send([
            'to'=>$mob,
            'from'=>'919656946547',
            'text'=>$otp
        ]);
        echo "send message";
    // return redirect('/verifypage');

    }
    public function verifyOtppage()
    {
        $data['result']=$this->obj->getMob('otp');
        return view('vendor.verifyVendor',$data);
    }
    public function verifyOtp(Request $r)
    {
        $otp=$r->input('otpv');
        $mob=$r->input('otp_mob');
        $data=$this->obj->verify('otp',$mob,$otp);
     print_r($data);

    if(isset($data))
    {
        $r->session()->put(array('otpid'=>$data->otp_mob));
        
        
        return redirect('/vendersp');
           
       }
       else{
        //   echo "sucess";
        return redirect('/verifypage');
       } 

    }
public function vendersp()
{
    $mob=session('otpid');
    $data['mob']=$this->obj->selectMob('otp',$mob);
    return view('vendor.vendorReg',$data);
}

public function vendorReg(Request $r)
{
    // $r->validate(['txt_name'=>'required',
    //                 'txt_mobile'=>'required',
    //                 'txt_email'=>'required|email',
    //                 'txt_pass'=>'required|min:8'
    //                 'txt_cpass'=>'required|min:8|same:txt_pass'
    //                 ]);
        
        $data['v_name']=$r->input('txt_name');
        $data['v_mobile']=$r->input('txt_mobile');
        $email=$r->input('txt_email');
        $pass=$r->input('txt_pass');
        $data['v_email']=$email;
        $data['v_pass']=$pass;
        $this->obj->otpInsert('vendors',$data);
        $data1=$this->obj->login('vendors',$email,$pass);
        if(isset($data1))
        {
            $r->session()->put(array('sessid'=>$data1->v_id));
            
        return redirect('/vendorDetailsAdd');
        }

    }
    public function vendorDetails()
    {
        
      
        $data['business']=$this->obj->selectData('business_types');
        $data['cat']=$this->obj->selectData('category');
        return view('vendor.vendorDetails',$data);
    }
    public function addDetails(Request $r,$id)
    {
       $data['v_cmpany']=$r->input('name');
       $data['v_ph']=$r->input('num');
       $data['v_state']=$r->input('state');
       $data['district']=$r->input('dis');
       $data['location']=$r->input('loc');
       $data['business_type']=$r->input('dis');
       $data['store_name']=$r->input('store_name');
       $logofiles=$r->file('store_logo');
       $logofilename = $logofiles->getClientOriginalName();
       $logofiles->move(public_path().'/uploads/images', $logofilename);
       $data['store_logo']=$logofilename;
       $data['lic_no']=$r->input('lic_no');
       $licfiles=$r->file('lic_doc');
       $licfilename = $licfiles->getClientOriginalName();
       $licfiles->move(public_path().'/uploads/images', $licfilename);
       $data['lic_doc']=$licfilename;
        $data['gst_no']=$r->input('gst_no');
        $gstfiles=$r->file('gst_doc');
        $gstfilename = $gstfiles->getClientOriginalName();
        $gstfiles->move(public_path().'/uploads/images', $gstfilename);
        $data['gst_doc']=$gstfilename;
        $data['pan_no']=$r->input('pan_no');
        $panfiles=$r->file('pan_doc');
        $panfilename = $panfiles->getClientOriginalName();
        $panfiles->move(public_path().'/uploads/images', $panfilename);
        $data['pan_card']=$panfilename;
        $idfiles=$r->file('id_doc');
        $idfilename = $idfiles->getClientOriginalName();
        $idfiles->move(public_path().'/uploads/images', $idfilename);
        $data['id_doc']=$idfilename;
        $data['ship']=$r->input('ship');
        $data['bk_name']=$r->input('bk_name');
        $data['ac_type']=$r->input('ac_type');
        $data['ac_no']=$r->input('ac_no');
        $data['ifsc']=$r->input('ifsc');
        $sigfiles=$r->file('sig');
        $sigfilename = $sigfiles->getClientOriginalName();
        $sigfiles->move(public_path().'/uploads/images', $sigfilename);
        $data['sig']=$sigfilename;
        $data['reg_status']=1;
        
        $data1['ven_cat']=$r->input('sel_cat');
        $data1['v_id']=$id;
       $this->obj->updateData('vendors',$data,$id);
       $this->obj->insertData('vendor_cat',$data1);
       return redirect('/home');
    }
    public function product()
    {
        
        $id=session('sessid');
        $data['result']=$this->obj->selectId('vendors',$id);
        $data['prd']=$this->obj->selectPrdData('product',$id);
        return view('vendor.allproducts',$data);
    }
    public function productForm()
    {
        $id=session('sessid');
        $data['result']=$this->obj->selectId('vendors',$id);
        $data['cat']=$this->obj->selectData('category');
      return view('vendor.productForm',$data);  
    }
    public function prdSubCat($id)
    {
      $data=$this->obj->selectDataById('subcat',$id);
       foreach($data as $val)
       {
       ?>
        <option value="<?php echo $val->s_id;?>"><?php echo $val->sub_name;?></option>
       
        <?php
       }
        }
        public function savePrd(Request $request)
        {
            $data['pr_venid']=session('sessid');
            $data['pr_cat']=$request->input('cat');
            $data['pr_sub']=$request->input('sub');
            $data['pr_name']=$request->input('pr_name');
            $data['pr_brand']=$request->input('pr_brand');
            $data['pr_stk']=$request->input('pr_stk');
            $data['pr_details']=$request->input('pr_des');
            $data['pr_war']=$request->input('pr_war');
            $data['pr_mrp']=$request->input('mrp');
            $data['pr_selprice']=$request->input('sel');
            $data['pr_gst']=$request->input('gst');
            $data['pr_return']=$request->input('n_return');
            $data['delivery']=$request->input('del');
            $data['pr_len']=$request->input('len');
            $data['pr_width']=$request->input('wid'); 
            $data['pr_unit']=$request->input('unt');
            $data['pr_height']=$request->input('hig');
            $data['pr_color']=$request->input('col');
            // $data['pr_img']=$request->input('img');

            $files[]=$request->file('images');
            foreach($files as $img)
            {
            $filename= $img->getClientOriginalName();
            // $img->move(public_path().'/uploads/images', $filename);
            $data1['pr_img']=$filename;
            print_r($data1);
        exit();
            }$this->obj->insertData('product',$data);
            return redirect('/product');
        }
        // ----------------------Order Details-------------------------------

       public function orderDetails()
       {
           $vid=session('sessid');
           $data['order']=$this->obj->orderDetails('order','user',$vid);
           print_r($data);
       }

        // --------------------------------------------Email Sending----------------
        public function getEmail()
        {
            return view('vendor.getEmail');
        }
        public function VendorSendEmail(Request $req)
        {
            $emailID=$req->input('txt_email');
            $data=[
                'title'=>'Password Reset',
                'body'=>'http://127.0.0.1:8000/vendorPasswordReset'
            ];
            Mail::to($emailID )->send(new SendEmail($data));
            return redirect('/forgotPassword')->with('msg',"Password REset Link has send to your Email");
        }
        public function vendorPasswordReset()
        {
            return view('vendor.resetPassword');
        }
        public function updatePassword(Request $req)
        {
            $email=$req->input('email');
            $pass['v_pass']=$req->input('txt_pass');
            $this->obj->updatePassword('vendors',$pass,$email);
            return redirect('/vendor');
            
        }

       
}
