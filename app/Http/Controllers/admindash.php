<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cupon;
use App\Models\slide;
use App\Models\customer;
class admindash extends Controller
{
    //
    public function adminhome()
    {
        return view('homeadmin');
    }

    public function slide()
    {
        return view('slide');
    }

    public function registration(){
        return view ('adminregistration');
    }

    public function registersubmit(Request $req){
        $req->validate(
            [
                'name' => 'required|regex:/^[A-Z a-z.]+$/',
                'username' => 'required|min:5|max:20|unique:admins,username',
                'email' => 'required|email|unique:admins|email',
                'phone' => 'required|min:11|regex:/^01[5-9]{1}[0-9]{8}$/',
                'password' => 'required|min:3',
                'confirm_password' => 'required|same:password',
                'image' => 'required'
            ]
        );
        $filename = $req->username.'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->storeAs('public/AdminImage',$filename);

        $ad = new customer();
        $ad->name = $req->name;
        $ad->username = $req->username;
        $ad->email = $req->email;
        $ad->phone = $req->phone;
        $ad->password = md5($req->password);
        $ad->image = "storage/AdminImage/".$filename;
        $ad->role='Admin';
        $ad->save();
        session()->flash('msg','Suucessfully Registered');
        return  redirect()->route('registration');
    }

    public function managecupon()
    {
        return view('cupon');
    }

    public function cuponsubmit(Request $st)
    {
        $this->validate($st,
        [
            'name'=>'required|max:20',
            'code'=>'required|min:4',
            'dis'=>'required', 
            'type'=>'required',
        ],
        [   'name.required'=>'Please provide username',
            'username.max'=>'Username must not exceed 20 alphabets',
            'code.required'=>'Please provide code',
            'type.required'=>'Please provide cupon type',
            'dis.required'=>'Please provide Discount Amount'
        ]
    );
    
    $em = new cupon();
    $em->Name = $st->name;
    $em->code = $st->code;
    $em->Discount=$st->dis;
    $em->type = $st->type;
    $em->save();
    
    if($em){
        session()->flash('msg','Cupon code Added');
        return redirect()->route('cuponslist');

    }

    }


    public function managecuponlist()
    {
        $cupons = cupon::all();
        return view('cuponslist')->with('cupons',$cupons);
    }


    public function deletecupon(Request $req){
        $m = cupon::where('ID',$req->id)->delete();
        if($m){
            session()->flash('msg','Succesfully Deleted');
            return redirect()->route('cuponslist');
            
        }
    }



    public function slideup(Request $st)
    {
        $this->validate($st,
        [
            'name'=>'required|max:20',
            'image' => 'required'
        ],
        [   'name.required'=>'Please provide username',
            'username.max'=>'Username must not exceed 20 alphabets',   
        ]
    );

    
    $filename = $st->name.'.'.$st->file('image')->getClientOriginalExtension();
    $st->file('image')->storeAs('public/slide',$filename);
    
    $ex = new slide();
        $ex->name = $st->name;
        $ex->image = "storage/slide/".$filename;
        $ex->save();

        if($ex){
            session()->flash('msg','slide Added');
            return redirect()->route('admin.slidelist');

    }

}


public function slidelist()
    {
        $slide = slide::all();
        return view('slidelist')->with('slides',$slide);
    }

    public function deleteslide(Request $req){
        $m = slide::where('ID',$req->id)->delete();
        if($m){
            session()->flash('msg','Succesfully Deleted');
            return redirect()->route('admin.slidelist');
            
        }
    }


}
