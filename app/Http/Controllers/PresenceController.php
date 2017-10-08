<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertPersonRequest;
use Illuminate\Http\Request;
use App\Person;
use App\Code;

class PresenceController extends Controller
{
    public function index(){

        return view('presence.add-presence-form');

    }

    public function create(InsertPersonRequest $request){

        $person['name'] = $request->all()['name'];
        $person['surname'] = $request->all()['surname'];
        $person['presence'] = date('Y-m-d');
        $person['hour'] = date('H:i:d');
        $person['code_id'] = $request->code_id;
        Person::create($person);

        $request->session()->flash('success', 'Ai confirmat ca esti prezent!');
        return redirect('/prezenta');

    }

    public function lista($page = 25){

        if($page>100)
            $page = 100;

        $codes = Code::paginate($page);

        return view('presence.presence-list',compact('codes'));

    }

    public function show($date,$id){
        $persons = Person::where('code_id','=',$id)->where('presence','=',$date)->get();

        return view('presence.presence-list-by-date',compact('persons'));
    }
}
