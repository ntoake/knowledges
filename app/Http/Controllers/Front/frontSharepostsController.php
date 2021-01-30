<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Sharepost;
use App\Tag;

class frontSharepostsController extends Controller
{
    //
    public function index(Request $request)
    {
        
        //検索クエリ
        $search_query = $request->search_query;
        //検索タグ
        $search_tag = $request->tagname;
        
        //$aaa = '';
        
        //dd($search_query);
        
        //dd($search_tag);
        
        if($search_query != '' && empty($search_tag)) {
            //テキスト検索のときのみ
            $shareposts = Sharepost::with('postHaveTag')
            ->where('title', 'LIKE', '%'.$search_query.'%')
            ->orwhere('content', 'LIKE', '%'.$search_query.'%')
            ->orderBy('id', 'desc')
            ->paginate(10);
            //$aaa = 'text';  
        
        } else if ($search_query == null && empty($search_tag) == false){
            
            //タグの時のみ
            $shareposts = Sharepost::with('postHaveTag')
            ->whereHas('postHaveTag', function ($q) use ($search_tag) {
                $q->whereIn('tag_id', $search_tag);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
            //$aaa = 'tag';          
            
        } else if ($search_query != '' &&  empty($search_tag) == false){
            
            //テキスト検索とタグの両方
            
            $query = Sharepost::with('postHaveTag')
            ->whereHas('postHaveTag', function ($q) use ($search_tag) {
                $q->whereIn('tag_id', $search_tag);
            })
            ->orderBy('id', 'desc');
            
            //必要なクエリを追加
            $query = $query
            ->where('title', 'LIKE', '%'.$search_query.'%')
            ->orwhere('content', 'LIKE', '%'.$search_query.'%');
            
            //クエリを実行
            $shareposts = $query->paginate(10);
            //$aaa = 'both';
            
        } else {
            
            //指定なしで検索
            $shareposts = Sharepost::with('postHaveTag')->orderBy('id', 'desc')->paginate(10);
            //$aaa = 'nothing';
             
        }
        
        //タグを取得
        $tags = Tag::all();

        // dd($shareposts->toSql());

        // ユーザ詳細ビューでそれを表示
        return view('front.index', [
            'shareposts' => $shareposts, 
            'tags' => $tags, 
        ]);
        //
        /*$shareposts = Sharepost::with('postHaveTag')->orderBy('id', 'desc')->paginate(10);
        
        return view('front.index', [
            'shareposts' => $shareposts, 
        ]);*/
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
