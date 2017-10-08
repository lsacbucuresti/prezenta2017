<?php

namespace App\Http\Controllers;

use App\Code;
use App\Http\Requests\InsertCodeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodesController extends Controller
{
    public function index(){

        $code = Code::orderBy('id','desc')->first();
        
        return view('code.add-code-form',compact('code'));

    }

    public function create(InsertCodeRequest $request){

        $code = Code::orderBy('id','desc')->first();

        $date = date('Y-m-d H:i:s');

        if(!empty($code) && $date > $code->expiration)
            dd('Deja exista un cod activ');

        $code['admin_id'] = Auth::id();
        $code['code'] = $request->all()['code'];
        $code['title'] = $request->all()['title'];
        $code['expiration'] = date('Y-m-d H:i:s',strtotime('+2 hours'));
        Code::insert($code);

        return redirect('/code');
    }
}
