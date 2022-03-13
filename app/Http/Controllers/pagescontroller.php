<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Session;
class pagescontroller extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function loginsubmit(Request $st)
    {
        $this->validate($st,
        [
            'username'=>'required|min:5|max:20',
            'password'=>'required|min:4', 
        ],
        [   'username.required'=>'Please provide username',
            'username.max'=>'Username must not exceed 20 alphabets',
        ]
    );
    $val=customer::where('username',$st->username)->where('password',md5($st->password))->first();

    if($val)
    {
       Session()->put('loged',['uname'=>$val->name,'id'=>$val->id]);
       session()->flash('msg','login successful');
        if($val->role =='admin')
        {
            return redirect()->route('admin.home');
        }
        else
        {
            return redirect()->route('customer.home');
        }
    }
    else
    {
        Session()->flash('msg','Invalid Username or Password');
        return redirect()->route('login');
    }
    

    }


    public function Changepass()
    {
        return view('Changepass');   
    }

    public function Changepassubmit(Request $si)
    {
        $this->validate($si,
        [
            'pass'=>'required|min:5|max:20',
            'npass'=>'required|same:pass', 
        ],
        [   'pass.required'=>'Please provide new password',
            'napss.same'=>'Password and confirm password must match',
        ]
    );
    
     customer::where('ID',Session::get('loged')['id'])->update(['password'=>md5($si->pass)]);
     session()->flash('msg','Change password successful');
        return redirect()->route('logout'); 
    }


}
