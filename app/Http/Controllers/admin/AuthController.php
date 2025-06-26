<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        $data['pageTitle'] = 'Login | Seo Tech Master';
        return view('admin.auth.login', $data);  
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json(array('type'=>'success', 'text'=>'You Are Logged In Successfully'));
            }else{
                return response()->json(array('type'=>'error', 'text'=>'Invalid Email And Password')); 
            }  
        }else{
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }
    } 
    public function profileForm(){
        $data['pageTitle'] = 'Profile | Seo Tech Master';
        return view('admin.auth.profile', $data);
    }
    public function profileUpdate(Request $request){
        $user = User::find(Auth::user()->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'phone' => 'required|numeric|unique:users,phone,'.Auth::user()->id,
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
            // Handle old image deletion if this is an update
            $old_image_path = public_path('manual_storage/'.$user->image);
            if (file_exists($old_image_path)) {
                @unlink($old_image_path);
            }
        
            $destinationPath = public_path('manual_storage/profile/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $img_file = $request->file('image');
            $img_filename = time() . '_' . $img_file->getClientOriginalName();
            $img_file->move($destinationPath, $img_filename);
            $user->image = 'profile/' . $img_filename;
        }
        $user->save();
         return response()->json(['type' => 'success', 'text' => 'Profile Successfully updated!']);  
    }
    public function passwordForm(){
        $data['pageTitle'] = 'Password | Seo Tech Master';
        return view('admin.auth.password', $data);
    }
    public function passwordUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validator->passes()) {
            $currentPassword = Auth::user()->password;
            if (Hash::check($request->old_password, $currentPassword)) {
                $user = User::find(Auth::user()->id);
                $user -> password = Hash::make($request->password);
                $user -> save();
                return response()->json(['type' => 'success', 'text' => 'Password Updated Successfully']);
            }else{
                return response()->json(['type' => 'error', 'text' => 'Old Password is Wrong']);

            }  
        }else{
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin_login');

    }
}
