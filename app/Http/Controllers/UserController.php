<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Message;
class UserController extends Controller
{

    public function index(){
        $all = User::all();
        return view('ListeUser', compact('all'));
    }
    protected function createUser(Request  $request)
    {
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "user";
        $user->avatar = "https://via.placeholder.com/150";
        $user->save();

        return back();
    }

    public function editUser($id){
        $user = User::find($id);
        return view('editUser', compact('user'));
    }

    public function editUserAction(Request  $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();
        return back();

    }

    public function deleteUser($id){
        User::destroy($id);
        return back();
    }

    public function messagerie(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messagerie', compact('users'));
    }

    public function message($user_id){
        $my_id = Auth::id();

        // Make read all unread message
       

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages', ['messages' => $messages]);;
    }
}
