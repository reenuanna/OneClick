<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;


class AdminController extends Controller
{
    //
    public $obj;
    public function __construct()
    {
        $this->obj= new DataModel();
    }
    public function index()
    {
        return view('admin.index');
    }
    public function vendorDetails()
    {
        $data['ven_dtl']=$this->obj->selectData('vendors');
        return view('admin.vendorDetails',$data);
    }
    public function moreVenderDetails($id)
    {
        $data['ven_more']=$this->obj->selectId('vendors',$id);
        $data['ven_cat']=$this->obj->joins('vendor_cat','category',$id);
        return view('admin.moreVendorDetails',$data);
    }
    public function showBusinessType()
    {
        $data['result']=$this->obj->selectData('business_types');
        return view('admin.businessType',$data);
    }
    public function addbusiness(Request $r)
    {
        request()->validate(['business'=>'required',
        'business1'=>'required|confirmed']);
        $data['type']=$r->input('business');
       
        $this->obj->insertData('business_types',$data);
        return redirect('/businesstype');
    }
    public function showcategory()
    {
        $data['result']=$this->obj->selectData('category');
        return view('admin.categoryType',$data);
    }
    public function addcategory(Request $request)
    {
        $data['category']=$request->input('business');
        $this->obj->insertData('category',$data);
        return redirect()->back();
    }
    public function showSubCat($id)
    {
        $data['result']=$this->obj->selectDataById('category',$id);
        $data['sub']=$this->obj->selectDataById('subcat',$id);
        return view('admin.showSubCat',$data);
    }
    public function addsubcat(Request $request,$id)
    {
        $data['c_id']=$id;
        $data['sub_name']=$request->input('sub_cat');
        $this->obj->insertData('subcat',$data);
        return redirect()->back();

    }
    public function venapprove($id)
    {
  
        $data['approve_status']=1;
        $this->obj->updateData('vendors',$data,$id);
        return redirect('/vendorDetails');
    }
    public function viewProduct()
    {
 
        $data['result']=$this->obj->viewAllProduct('product','category','subcat','vendors');
        // print_r($data);
        // exit();
        return view('admin.viewAllProduct',$data);

    }
    public function moreProductview($id)
    {
        $data['result']=$this->obj->moreProductview('product','category','subcat','vendors',$id);
        return view('admin.moreProductview',$data);
    }
    public function prdapprove($id)
    {
        $data['pr_status']=1;
        $this->obj->updatecart('product',$data,$id);
        return redirect('/viewProduct');
        }
    public function prdareject(Request $req,$id)
    {
       $data['pr_rsn']=$req->input('rsn');
       $data['pr_status']=2;
       $this->obj->updatecart('product',$data,$id);
       return redirect('/viewProduct');
    }
    // ------------------edit vendor details-------
public function savecmpy(Request $req,$id)
{
 $data['v_company']="";
 $data['v_ph']="";
 $data['v_state']="";
 $data['district'] ="";
 $data['location'] ="";
 $data['business_type']="";
}
 
}
