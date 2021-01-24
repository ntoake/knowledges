<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.tags.index', [
            'tags' => $tags, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tag = new Tag;
        return view('admin.tags.create', [
            'tag' => $tag, 
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $request->validate([
            'tag' => 'required|max:30',
        ]);
        //requestの内容を取得
        $requestAll = $request->all();
 
        $tag = new Tag;
        $tag->create($requestAll);
        //createの引数は配列にしないといけない
        //modelはcreate()を呼ぶことができる
        
        //$request->user()->sharepost()->create([……])でやる方がいい
        
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tag = Tag::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('admin.tags.show', [
            'tag' => $tag,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = Tag::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('admin.tags.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $request->validate([
            'tag' => 'required|max:30',
        ]);
        
        $tag = Tag::findOrFail($id);
        // メッセージを更新
        $tag->tag = $request->tag;       
        $tag->save();

        return redirect()->route('tags.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tag = Tag::findOrFail($id);
        // 記事を削除
        $tag->delete();

        // 管理ページtopへリダイレクトさせる
        return redirect()->route('tags.index');
    }
}
