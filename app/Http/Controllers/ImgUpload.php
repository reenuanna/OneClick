<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class ImgUpload extends Controller
{
    public $obj;
    public function __construct()
    {
        $this->obj= new DataModel();
    }
    //
  public function view(){
    return view('photos');
  }


  public function store(Request $req){
 $files= $req->file('doc');
 $name= $req->input('name');
 print_r( $files);
 exit();
 if(!empty($files))
 {
     foreach($files as $doc)
     {
        $filename = $doc->getClientOriginalName();
        $doc->move(public_path().'/document', $filename);
        $data['image']=$filename;
        $this->obj->otpInsert('image',$data);
        
     }
 }
 return  "Success ";
}
}
