<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Session;
use Exception;
class UserController extends Controller
{
    //
    public $obj;
    public function __construct()
    {
        $this->obj= new DataModel();
    }
    public function index() //main page
    {
        $id=session('userid');
        $data['result']=$this->obj->selectApPrd('product');
        $data['user']=$this->obj->selectUser('user',$id);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
        return view('user.index',$data);
    }
    public function login() //login form
    {
        return  view('user.login');
    }
  
    public function UserLogin(Request $req) //login function
    {
         $email=$req->input('email');
         $pass=$req->input('pass');
       
        $data=$this->obj->userlogin('user',$email,$pass);
        if(isset($data))
        {
            $req->session()->put(array('userid'=>$data->user_id));
            return redirect('/');
        }
        else
        {
            return redirect('/login')->with('message', 'Invalid email ID or password');
        }
    }
    public function UserRegister() //register form
    {
        return view('user.register');
    }
    public function userReg(Request $req) // register function
    {
        $data['ur_name']=$req->input('txt_name');
        $data['ur_mobile']=$req->input('txt_mobile');
        $email=$req->input('txt_email');
        $data['ur_email']=$email;
        $data['ur_gender']=$req->input('gender');
        $pass=$req->input('txt_pass');
        $data['ur_password']=$pass;
        $this->obj->insertData('user',$data);
        $data=$this->obj->userlogin('user',$email,$pass);
        if(isset($data))
        {
            $req->session()->put(array('userid'=>$data->user_id));
            return redirect('/');
        }
       
        

    }
    public function viewProduct($id) //view single product
    {
        $uid=session('userid');
        $data['result']=$this->obj->selectProductById('product',$id);
        $data['user']=$this->obj->selectUser('user',$uid);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');

        return view('user.viewProduct',$data);
    }
    public function addcart(Request $req) //add to cart
    {
        $pid=$req->input('m-pid');
        $uid=$req->input('m-uid');
        $tdata=$this->obj->ifdata('cart',$pid,$uid);
        // print_r($tdata);
        // exit();
        if($tdata!="")
        {
            return redirect()->back()->with('msg',"This item was already in your cart. edit your Cart.");
        }
        else
        {
        $data['pr_id']=$pid;
        $data['price']=$req->input('m-price');
        $data['qnty']=$req->input('m-qnty');
        $data['total']=$req->input('m-tot');
        $data['user_id']=$uid;
        $data['c_coins']=$req->input('m-coin');
        $this->obj->insertData('cart',$data);
        }
        return redirect()->back();
    }
    public function updatecart(Request $req,$id) //update cart using ajax
    {
        $uid=$req->input('uid');
        $price=$req->input('price');
        $qnty=$req->input('qty');
        $tot=$req->input('tot');
        $data=['user_id'=>$uid,
        'price'=>$price,
        'qnty'=>$qnty,
        'total'=>$tot];

        $d=$this->obj->updatecart('cart',$data,$id);
       
       }
    public function cart() //viw cart page
    {
        if(session()->has('userid'))
        {
       
        $id=session('userid');
        $data['user']=$this->obj->selectUser('user',$id);
        $data['cart']=$this->obj->selectCart('cart','product',$id);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
        $data['csum']=$this->obj->selectCartSum('cart',$id);
        // print_r($data);
        // exit();
        return view('user.cart',$data);
        }
        else
        {
            return redirect('/login');
        }
    }
    public function buynow(Request $req,$id) //add to cart 
    {
        $uid=session('userid');
        $tdata=$this->obj->ifdata('cart',$id,$uid);
        // print_r($tdata);
        // exit();
        if($tdata!="")
        {
            $data['user']=$this->obj->selectUser('user',$uid);
        $data['ck']=$this->obj->selectCartByPro('cart','product',$id,$uid);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');

        return view('user.checkout',$data);
        }
        else
        {
        $data['pr_id']=$id;
        $data['price']=$req->input('pid');
        $data['qnty']=$req->input('qnty');
        $data['total']=$req->input('tot');
        $data['user_id']=$uid;
        $data['c_coins']=$req->input('coin');
        $this->obj->insertData('cart',$data);
        }
        // return redirect('/checkout');
        //
        $data['user']=$this->obj->selectUser('user',$uid);
        $data['ck']=$this->obj->selectCartByPro('cart','product',$id,$uid);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
      
        return view('user.checkout',$data);
    }
    public function buynow1($id) //add to checkout from cart(single product)
    {
        $uid=session('userid');
        $cart=$this->obj->selectCartByPro('cart','product',$id,$uid);
        
        foreach($cart as $val)
        {
             $qnty= $val->qnty;
             $tot= $val->total;
        }
        
        $data1['ck_user_id']=$uid;
        $data1['ck_pr_id']=$id;
        $data1['ck_qnty']=$qnty;
        $data1['ck_total']=$tot;
        $data1['ck_coin']=$c_coins;
        $this->obj->insertData('checkout',$data1);
        return redirect('/checkout');
        
    }
  
    public function cartCheckout() //add to checkout from cart for multiple product
    {
        $id=session('userid');
        $data['user']=$this->obj->selectUser('user',$id);
        $data['ck']=$this->obj->selectCart('cart','product',$id);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
        $data['csum']=$this->obj->selectCartSum('cart',$id);
        return view('user.cartcheckout',$data);   
    }
   
    public function order1(Request $req) //function to add to order table (multiple product)
    {
        $id=session('userid');
        $data=$this->obj->checkData('cart',$id);
        foreach($data as $order)
        {
            $chkData['user_id']=$id;
            $chkData['od_qlty']=$order->qnty;
            $chkData['od_totprice']=$order->total;
            $chkData['od_pid']=$order->pr_id;
            $chkData['od_address']=$req->input('address');
            $chkData['od_date']=date('y-m-d');
            $this->obj->insertData('orders',$chkData);
            $points= $req->input('tcoin');//get coins from form input
            $conis['coins']=$order->c_coins;
            $conis['c_pid']=$order->pr_id;
            $conis['c_userid']=$id;
            $this->obj->insertData('coins',$conis); //insert into coin table
    }
    $totcoin=$this->obj->getcoin('user',$id); //get value of coin from user table
    $tot=$totcoin+$points; //calculate total coins
    $userCoin['ur_coins']=$tot;
    $this->obj->updateCoins('user',$userCoin,$id);//update user table
    // $this->obj->deleteData('checkout',$id); //delete checkout table
    // $status['c_status']=1;
    $this->obj->deleteCartData('cart',$id);
    return redirect('cartpayForm');
    }

 //==================== function to add to order table single product==========================
    public function order(Request $req)
    {
        $id=session('userid');
        $data['user_id']=$id;
        $data['od_qlty']=$req->input('qnty');
        $data['od_totprice']=$req->input('tot');
        $pid=$req->input('pid');
        $data['od_pid']=$pid;
        $data['od_address']=$req->input('address');
        $data['od_date']=date('y-m-d');
        $this->obj->insertData('orders',$data); //insert to order table
        $points=$req->input('coin'); //get coins from form input
        $conis['coins']=$points;
        $conis['c_pid']=$req->input('pid');
        $conis['c_userid']=$id;
        $this->obj->insertData('coins',$conis); //insert into coin table
        $totcoin=$this->obj->getcoin('user',$id); //get value of coin from user table
        $tot=$totcoin+$points; //calculate total coins
        $totcoins['ur_coins']=$tot;
        $this->obj->updateCoins('user',$totcoins,$id);//update user table
        $this->obj->deleteData('cart',$pid); //delete checkout table
        $status['c_status']=1;
        $this->obj->updatecart('cart',$status,$pid);
        return redirect('payment');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('userid');
        return redirect('/login');
    }
//============================= Email Sending (Password Reset)================================
    public function getEmail()
    {
        return view('user.getEmail');
    }
    public function SendEmail(Request $req)
    {
        $emailID=$req->input('txt_email');
        $data=[
            'title'=>'Password Reset',
            'body'=>'http://127.0.0.1:8000/passwordReset'
        ];
        Mail::to($emailID )->send(new SendEmail($data));
        return redirect('/forgot_password')->with('msg',"Password REset Link has send to your Email");
    }
    public function passwordReset()
    {
        return view('user.resetPassword');
    }
    public function updatePass(Request $req)
    {
        $email=$req->input('email');
        $pass['ur_password']=$req->input('txt_pass');
        $this->obj->updatePass('user',$pass,$email);
        return redirect('/login');
        
    }
//============================= PAYMENT USING RAZORPAY==========================================
    public function payForm()
    {
        if(session()->has('userid'))
        {
        $id=session('userid');
        $data['user']=$this->obj->selectUser('user',$id);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
        $amt['pay']=$this->obj->getorder('orders','product',$id);

        foreach($amt as  $val)
        {
            $amtpay=$val->od_totprice;
        }
              $data['amt']=$amtpay;
            return view('user.payForm',$data,$amt);
    }
    else{
        return redirect('/login');
    }
    }
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
            
        }
          
        Session::put('success', 'Payment successful');
        return redirect('/paysuccess');
    }
    public function paysuccess(){
        $id=session('userid');
        $data['user']=$this->obj->selectUser('user',$id);
        $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
        return view('user.thankyou',$data);
    }
    public function cartpayForm()
    {
        if(session()->has('userid'))
        {
            $id=session('userid');
            $data['user']=$this->obj->selectUser('user',$id);
            $data['ck']=$this->obj->getorder1('orders','product',$id);
            $data['cat']=$this->obj->selectCatjoin('vendor_cat','category');
            $amt['csum']=$this->obj->selectOrderSum('orders',$id);


            return view('user.cartPayForm',$data,$amt);
    }
    else{
        return redirect('/login');
    }
    }
    public function cartstore(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
            
        }
          
        Session::put('success', 'Payment successful');
        
        return redirect('/paysuccess');
    }
//============= send mesage=================


}
