<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class ReviewController extends Controller
{
   

    public function ttt(Request $request){

        $file = [];

        $request->validate([
            'reply' => 'required'
        ]);

        if( $request->input('writer') != null){
        $reply_content = $request->input('reply');
        $reply_writer = $request->input('writer');
        $goods_id = $request->input('goodsid');
        $star = $request->input('star');
        $userid = $request->input('userid');
        

        if($request->hasfile('review_photo')){
            foreach($request->file('review_photo') as $photos){
               
                $name = time().rand(1,9999).'.'.$photos->extension();
                $photos->move(public_path('img'),$name);
                $file[] = $name;
              
            }
        }
        

        Comment::create([
            'reply_content' => $reply_content,
            'reply_writer'  => $reply_writer,
            'goods_id'      => $goods_id,
            'star'          => $star,
            'reply_userid'  => $userid,
            'reply_photo'   => json_encode($file)
        ]);

        return 1;
    }

     else{
        return 2;
    }
       
    }



    public function updataReview(Request $request){

        $file = [];

      
        $reply_content = $request->input('reply');
        $star = $request->input('star');
        $idx = $request->input('reviewid');        

        if($request->hasfile('review_photo')){
            foreach($request->file('review_photo') as $photos){
               
                $name = time().rand(1,9999).'.'.$photos->extension();
                $photos->move(public_path('img'),$name);
                $file[] = $name;
              
            }
        }

        if($file != null){
        Comment::find($idx)->update([
            'reply_content' => $reply_content,
            'star'          => $star,
            'reply_photo'   => json_encode($file)
        ]);
        return '성공';
    }
        else{
            Comment::find($idx)->update([
                'reply_content' => $reply_content,
                'star'          => $star,
            ]);
            return '성공';
        }
       

    }

    public function reviewDel(Request $request){
        $id = $request->input('id');
        Comment::where('id',$id)->delete();        
        return 'success';
    }
}
   
