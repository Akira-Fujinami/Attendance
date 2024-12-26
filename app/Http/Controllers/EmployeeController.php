<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // データベースに保存

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 成功メッセージと共にリダイレクト
        return redirect()->route('complete');
    }
}
