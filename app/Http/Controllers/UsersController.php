<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class UsersController extends Controller
{
    public function index(){
        $users = User::with('group')->get();
        return view('users.user',compact('users'));
    }

    public function userGroup(){
        $groups = Group::all();
        $this->data['userGroups'] =[];
        foreach ($groups as $group){
           $this->data['userGroups'][$group->id] = $group->title;
        }
        return view('users.userCreate', $this->data);
    }

    public function store(CreateUserRequest $request){

        $data = $request->all();
            if( User::create($data) ){
                Session::flash('message', 'User Create  Successfully');
            }
            return redirect()->intended('users');

    }

    public function edit($id){
        $userData = User::where('id',$id)->first();
        $groups = Group::all();
        return view('users.userCreateEdit', compact('groups','userData'));
    }

    public function updateUser(Request $request){
        $uData = User::where('id',$request->user_id)->first();
        if ($uData->email == $request->email){
            $validator = Validator::make($request->all(), [
                'email' => 'required'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users'
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except('_token','user_id');
        $user = User::where('id',$request->user_id)->update($data);
        if ($user){
            return redirect()->back()->with('success','Updated');
        }else{
            return redirect()->back()->with('error','Updated');
        }
    }

    public function destroy($id){
        if (User::find($id)->delete()){
            Session::flash ('message','Delete Successfully');
        }
        return redirect()->intended('users');

    }














//    public function createe(){
//        $data =[
//            'group_id'=>'2',
//            'name'=>'mofhijh',
//            'email'=>'sakib@gmail.com',
//            'phone'=>'000000000',
//            'address'=>'sakibpur',
//        ];
//        User::create($data);
//        return 'successfully';
//    }
}
