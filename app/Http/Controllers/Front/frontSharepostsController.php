<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Sharepost;


class frontSharepostsController extends Controller
{
    //
    public function index()
    {
        //
        $shareposts = Sharepost::with('postHaveTag')->orderBy('id', 'desc')->paginate(10);
        
        return view('front.index', [
            'shareposts' => $shareposts, 
        ]);
    }
    
    public function show($id)
    {
        //
        // idの値でメッセージを検索して取得
        $sharepost = Sharepost::with('postHaveTag')->findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('front.shareposts.show', [
            'sharepost' => $sharepost,
        ]);
    }
}
