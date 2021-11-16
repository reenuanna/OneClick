<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DataModel extends Model
{
    use HasFactory;
    public function otpInsert($table,$data)
    {
       return  DB::table($table)->insert($data);
    }
    public function getMob($table)
    {
       return  DB::table($table)->latest('otp_id')->first('otp_mob');
    }
    public function selectId($table,$id)
    {
       return  DB::table($table)->where('v_id',$id)->get();
    }
    public function verify($table,$mob,$otp)
    {
       return DB::table($table)->where('otp_mob','=',$mob)->where('otp_num','=',$otp)->first();
 
    }
    public function joins($table1,$table2,$id)
    {
      return DB::table($table1)->join($table2,'category.c_id','=','vendor_cat.ven_cat')->where('vendor_cat.v_id',$id)->get();
    }
    public function updateData($table,$data,$id)
    {
       DB::table($table)->where('v_id',$id)->update($data);
    }
    public function insertData($table,$data)
    {
      DB::table($table)->insert($data);
    }
    public function selectData($table)
    {
       return DB::table($table)->get();
    }
    public function selectUser($table,$id)
    {
       return DB::table($table)->where('user_id',$id)->get();
    }
    public function selectDataById($table,$id)
    {
       return DB::table($table)->where('c_id',$id)->get();
    }
    public function login($table,$email,$pass)
    {
       return DB::table($table)->where('v_email',$email)->where('v_pass',$pass)->first();

    }
    public function selectMob($table,$mob)
    {
      return DB::table($table)->where('otp_mob',$mob)->get();
    }
    public function selectDataById1($table,$id)
    {
       return DB::table($table)->where('c_id',$id)->get("sub_name","s_id");
    }
    public function userlogin($table,$email,$pass)
    {
       return DB::table($table)->where('ur_email',$email)->where('ur_password',$pass)->first();

    }
    public function selectProductById($table,$id)
    {
      return DB::table($table)->where('pr_id',$id)->get();
    }
    public function selectCart($table1,$table2,$id)
    {
       return DB::table($table1)->join($table2,'product.pr_id','=','cart.pr_id')->where('cart.user_id',$id)->where('c_status',0)->get();
    }
    public function selectCk($table1,$table2,$id)
    {
       return DB::table($table1)->join($table2,'product.pr_id','=','checkout.ck_pr_id')->where('checkout.ck_user_id',$id)->get();
    }
    public function deleteData($table,$id)
    {
       DB::table($table)->where('pr_id',$id)->delete();
    }
    public function checkData($table,$id)
    {
     return  DB::table($table)->where('user_id',$id)->get();
    }
    
    public function deleteCartData($table,$id)
    {
       DB::table($table)->where('user_id',$id)->delete();
    }
    public function getcoin($table,$id)
    {
       return DB::table($table)->where('user_id',$id)->sum('ur_coins');
    }
    public function updateCoins($table,$coins,$id)
    {
       
       DB::table($table)->where('user_id',$id)->update($coins);
    }
   public function selectPrdData($table,$id)
   {
      return DB::table($table)->where('pr_venid',$id)->get();
   }
   public function viewAllProduct($table1,$table2,$table3,$table4)
   {
// ('product','category','subcat','user',$id);
      return DB::table($table1)->join($table2,'product.pr_cat','=','category.c_id')->join($table3,'product.pr_sub','=','subcat.s_id')->join($table4,'vendors.v_id','=','product.pr_venid')->get();
   }
   public function moreProductview($table1,$table2,$table3,$table4,$id)
   {
// ('product','category','subcat','user',$id);
      return DB::table($table1)->join($table2,'product.pr_cat','=','category.c_id')->join($table3,'product.pr_sub','=','subcat.s_id')->join($table4,'vendors.v_id','=','product.pr_venid')->where('product.pr_id',$id)->get();
   }
   public function selectCatjoin($table1,$table2)
   {
   return DB::table($table1)->join($table2,'vendor_cat.ven_cat','=','category.c_id')->get();
   }
   public function updatecart($table,$data,$id)
   {
      DB::table($table)->where('pr_id',$id)->update($data);
     
   }
   public function updatecartData($table,$data,$pid,$uid)
   {
      DB::table($table)->where('pr_id',$pid)->where('user_id',$uid)->update($data);
     
   }
   public function selectCartSum($table,$id)
   {
      // return  DB::raw("SELECT SUM(total) FROM cart  where user_id='$id'");
    return DB::table($table)->select(DB::raw("SUM(total) as csum,SUM(c_coins) as cosum"))->where('user_id',$id)->where('c_status',0)->get();
   }
       
   public function selectApPrd($table) //select approved products only
   {
     return  DB::table($table)->where('pr_status',1)->get();
   }
   public function selectCartByPro($table1,$table2,$id,$uid)
    {
       return DB::table($table1)->join($table2,'product.pr_id','=','cart.pr_id')->where('cart.user_id',$uid)->where('cart.pr_id',$id)->get();
    }
    public function updatePass($table,$pass,$email)
    {
       DB::table($table)->where('ur_email',$email)->orwhere('ur_mobile',$email)->update($pass);
    }
    public function updatePassword($table,$pass,$email)
    {
       DB::table($table)->where('v_email',$email)->orwhere('v_mobile',$email)->update($pass);
    }
    public function ifdata($table,$pid,$uid)
    {
      return DB::table($table)->where('pr_id',$pid)->where('user_id',$uid)->exists();
    }
    public function getorder($table1,$table2,$id)
    {
       return DB::table($table1)->join($table2,'product.pr_id','=','orders.od_pid')->where('orders.user_id',$id)->latest('orders.od_id')->first();
    }
    public function getorder1($table1,$table2,$id)
    {
       return DB::table($table1)->join($table2,'product.pr_id','=','orders.od_pid')->where('orders.user_id',$id)->where('orders.od_status',0)->get();
    }
    public function selectOrderSum($table,$id)
    {
       // return  DB::raw("SELECT SUM(total) FROM cart  where user_id='$id'");
     return DB::table($table)->select(DB::raw("SUM(od_totprice) as csum"))->where('user_id',$id)->where('od_status',0)->get();
    }
}
