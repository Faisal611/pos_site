<?php

namespace App\Http\Controllers;

use App\group;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserGroupController extends Controller
{


    public function index(){
        $this->data['groups'] = Group::all();
        return view('groups.group',$this->data);
    }

    public function newGroup(){
        return view('groups.new_group');
    }
    public function store(Request $request){
        $formData = $request->all();
            $title = $request->title;
            if (!empty($title)){
                if (Group::create($formData)){
                    Session::flash('message', 'Group Create Successfully');
                }
                return redirect()->intended('create_user');
            }else{
                return redirect()->back()->with('message','title error');
            }

    }
    public function destroy($id){
        if ( Group::find($id)->delete() ){
            Session::flash('message','Group Delete Successfully');
        }
        return redirect()->intended('create_user');

    }




}
