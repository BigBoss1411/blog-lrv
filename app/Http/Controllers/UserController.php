<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;


class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }


    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'fullname' => 'required',
        ], [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email là không hợp lệ',
            'fullname.required' => 'Họ tên là trường bắt buộc'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $fullname = $request->input('fullname');
        $email = $request->input('email');

        $user->fullname = $fullname;
        $user->email = $email;

        $user->save();
        return back();
    }

    public function changePassword()
    {
        return view('user.change-password');
    }

    public function submitChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:3|max:25',
            're_password' => 'required|min:3|max:25|same:new_password',
        ], [
            'old_password.required' => 'Mật khẩu cũ là trường bắt buộc',
            'new_password.required' => 'Mật khẩu mới là trường bắt buộc',
            'new_password.min' => 'Mật khẩu mới tối thiểu 3 ký tự',
            're_password.required' => 'Nhập lại mật khẩu mới là trường bắt buộc',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $oldPassword = $request->input('old_password');

        if (!\Hash::check($oldPassword, Auth::user()->password)) {
            return back()->withError('Mật khẩu cũ không chính xác');
        }

        Auth::user()->password = bcrypt($request->input('new_password'));
        Auth::user()->save();
        return back()->withSuccess('Thay đổi mật khẩu thành công');
    }

}
