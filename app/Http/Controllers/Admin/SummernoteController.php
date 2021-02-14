<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SummernoteController extends Controller
{
    //
    public function image(Request $request){
        //dd($request);
        $result=$request->file('file')->isValid();
        
        if($result){
            $filename = $request->file->getClientOriginalName();
            $filename = 'img_'.time().'_'.$filename;
            
            //Storageのpublic/sharepost/にファイルを格納
            //パスに「public」は入れないと動かない！（filesystemsのdefaultがlocalの間はこれ）
            Storage::putFileAs('public/sharepost/', $request->file('file'), $filename);
            
            //シンボリックをしているのでこれでつながる！
            echo '/storage/sharepost/'.$filename;
        }
    }

    //まだできてない！！
    public function remove(Request $request){
        //削除対象のファイルのパスを変数$targetImgUrlに格納
        $targetImgUrl = $request->filepass;
        
        
        
        
        //dd(Storage::disk('public')->url(''));
        
        
        $hostName = $_SERVER['HTTP_HOST'];
        
        //ファイルの名前だけに加工する
        $targetImgFileName = str_replace('https://'.$hostName.'/storage/sharepost/', '', $targetImgUrl);

        
        //日本語表記のファイルもアップロードされているときのためデコードする
        $targetImgFileName = urldecode($targetImgFileName);
        
        //対象の画像をstorageから削除する
        //パスに「public」は入れないと動かない！（filesystemsのdefaultがlocalの間はこれ）
        Storage::delete('public/sharepost/'.$targetImgFileName);
        
        //echo $targetImgFileName;//実際は不要（確認用）

    }
    
}
