<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Category1;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    

    public function index($category){
        $results = Goods::where('ca_id',$category)->paginate(12);
        $title = Category1::where('id',$category)->get();
        $data = Category1::all();
        $cat2_title = Category1::find($category)->getCategory2;
        return view('shop.shop_main',compact('results','title','data','cat2_title'));
    }

    public function sub($category, $category2){
        $results = Goods::where('ca_id2',$category2)->paginate(12);
        $title = Category1::where('id',$category)->get();
        $data = Category1::all();
        $cat2_title = Category1::find($category)->getCategory2;
        return view('shop.shop_main',compact('results','title','data','cat2_title'));
    }

    public function desc($id){
        $data = Category1::all();
        $comment = Goods::find($id)->getComment;
        $goodss = Goods::where('id',$id)->get();
        
        return view('shop.list',compact('goodss','data','comment'));
    
    }


    //카트 상품 수량 바꾸는 메서드
    public function setNumber(Request $request){
        $number = $request->input('number');
        $id = $request->input('id');

        Cart::find($id)->update([
            'number' => $number
        ]);

        return $number;
    }
}

