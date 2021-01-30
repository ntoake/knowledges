<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Sharepost;
use App\Tag;

use App\SharepostTag;

class SharepostsController extends Controller
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
        
        // dd($shareposts->toSql());

        //$shareposts = Sharepost::with('postHaveTag')->orderBy('id', 'desc')->paginate(10);
        

        //dd($shareposts);
        //$tags = Tag::all();
        
        //タグを取得
        $tags = Tag::all();
        
        return view('admin.index', [
            'shareposts' => $shareposts, 
            'tags' => $tags, 
        ]);
    }

    public function create()
    {
        //
        $sharepost = new Sharepost;
        
        $tags = Tag::all();
        
        
        return view('admin.shareposts.create', [
            'sharepost' => $sharepost,
            'tags' => $tags, 
        ]); 
        
    }

    public function store(Request $request)
    {
        // バリデーション
       /* $request->validate([
            'title1' => 'required|max:255',
            'content1' => 'required',
            'img1' => 'max:255',
            'pdf1' => 'max:255',
            'title2' => 'max:255',
            'img2' => 'max:255',
            'pdf2' => 'max:255',           
            'title3' => 'max:255',
            'img3' => 'max:255',
            'pdf3' => 'max:255',           
        ]);*/
        
       $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        

        
//echo gettype( $request->user_id);
//dd($aaa);

        //requestの内容を取得
        $requestAll = $request->all();
        
        //$aaa -> user_id = $request->user()->id;
        
        //ユーザID取得
        $user = [
            'user_id' => \Auth::id(),
        ];
        
        //
        $sharepostArray = array_merge($requestAll, $user);
       // dd($sharepostArray);
        $sharepost = new Sharepost;
        $sharepost->create($sharepostArray);
        //createの引数は配列にしないといけない
        //modelはcreate()を呼ぶことができる
        //$request->user()->sharepost()->create([……])でやる方がいい    
        
        //dd(Sharepost::orderBy('id', 'desc')->first()->id);
        
        //新規で制作した記事のID番号を取得
        $postNum = Sharepost::orderBy('id', 'desc')->first()->id;
        
        //選んだタグの数をカウント（あとでタグテーブルに登録するための繰り返しのカウント）
        $tagNum = count($request->tagname);       
        //dd($tagNum);
        
        //sharepost_tagsの中間テーブルに保存
        $sharepostTag = new SharepostTag;
        
        //選んだタグ分繰り返して保存する
        for ($i = 0; $i < $tagNum; $i++) {
            $sharepostTag->create([
                'sharepost_id' => $postNum,
                'tag_id' => $requestAll['tagname'][$i],              
            ]);
        } 
        
        return redirect()->route('admin');

    }

    public function show($id)
    {
        //
        $sharepost = Sharepost::with('postHaveTag')->findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('admin.shareposts.show', [
            'sharepost' => $sharepost,
        ]);
    }

    public function edit($id)
    {
        //
        $sharepost = Sharepost::with('postHaveTag')->findOrFail($id);
   
        $tags = Tag::all();

        // メッセージ編集ビューでそれを表示
        return view('admin.shareposts.edit', [
            'sharepost' => $sharepost,
            'tags' => $tags,
            'tagCheckBoxFlag' => false,          
        ]);
    }

    public function update(Request $request, $id)
    {
        //
       $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        
        $sharepost = Sharepost::findOrFail($id);
        // メッセージを更新
        $sharepost->title = $request->title;       
        $sharepost->content = $request->content;
        $sharepost->save();
        
        //まとめての場合の方法
        //$requestAll = $request->all();
        //$sharepost->fillable($requestAll) ※モデルの$fillableと同じカラムがないといけない
        //$sharepost->save();
        

        //現状のタグをすべて更新
        $sharepost->postHaveTag()->sync($request->tagname);


        return redirect()->route('shareposts.show', $id);
    }

    public function destroy($id)
    {
        //
        $sharepost = Sharepost::findOrFail($id);
        // 記事を削除
        $sharepost->delete();

        // 管理ページtopへリダイレクトさせる
        return redirect()->route('admin');
    }
}
