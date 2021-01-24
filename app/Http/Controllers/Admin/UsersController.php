<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    //
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // ユーザ詳細ビューでそれを表示
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }
    
    /*使用していない*/
    public function edit($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // ユーザ詳細ビューでそれを表示
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }
    
    /*使用していない*/
    public function update(Request $request, $id)
    {
        
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        // idの値でメッセージを検索して取得
        $user = User::findOrFail($id);
        // メッセージを更新
        $user->name = $request->name;
        $user->email = $request->email;      
        /*$user->password = Hash::make($request->password);*/ 
        $user->save();

        // マイアカウントへリダイレクトさせる
        return redirect()->route('users.show', ['user' => $id]);
    }
    
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $user = User::findOrFail($id);
        // メッセージを削除
        $user->delete();

        // トップページへリダイレクトさせる
        return redirect()->route('admin');
    }
    
}
