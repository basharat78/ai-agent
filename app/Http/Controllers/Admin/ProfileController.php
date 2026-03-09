<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{

    use FileUploadTrait;

    public function index(){
     
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));

    }

    public function update(ProfileUpdateRequest $request ) : RedirectResponse { 


        $avatarPath = $this->uploadImage($request, 'avatar' ,$request->old_avatar); 


        $user = Auth::user();
        if ($avatarPath) {
            $user->avatar = $avatarPath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
    

        $user->save();

        if (function_exists('flash')) {
            flash('Data saved successfully!')->success();
        }
        
        return redirect()->back();

    }

    public function PasswordUpdate(Request $request) : RedirectResponse { 
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back();
    }
}