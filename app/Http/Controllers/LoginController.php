<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // 管理者 (Client) の認証
        if (Auth::guard('client')->attempt($credentials)) {
            return redirect()->route('staff');
        }

        // 従業員 (Employee) の認証
        $employee = Employee::where('email', $request->email)->first();
        if ($employee && Hash::check($request->password, $employee->password)) {
            Auth::login($employee); // セッションに従業員をログイン
            return redirect()->route('employee.dashboard');
        }

        // 認証失敗
        return back()->withInput()->withErrors([
            'login' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }

}
