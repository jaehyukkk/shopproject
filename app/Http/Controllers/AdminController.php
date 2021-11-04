<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Category1;
use App\Models\Category2;
use App\Models\Goods;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{




    public function adminMain()
    {
        $orders = Order::all();
        $neworders = Order::orderBy('id','desc')->paginate(3);

        return view('admin.index',compact('orders','neworders'));
    }

    public function index(){
        $cat = Category1::get();
        return view('admin.goodsupload',compact('cat'));
    }

    public function upload(Request $request){


        $filse = '';
        $file = [];

        $request->validate([
            'mainphoto_name' => 'required',
            'mainphoto_name.*' => 'image',
            'contentphoto_name' =>'required',
            'contentphoto_name.*' =>'image',
            'goods_title' => 'required',
            'goods_price' => 'required',
            'goods_color' => 'required',

        ]);



        $title = $request           ->input('goods_title');
        $des = $request             ->input('goods_description');
        $pri = $request             ->input('goods_price');
        $siz = $request             ->input('size');
        $caid = $request            ->input('ca_id');
        $ca2 = $request             ->input('ca_id2');
        $color = $request           ->input('goods_color');

        if($caid === "카테고리"){
            return redirect()->back()->with('alert','카테고리를 선택해주세요');
        }

        $ca2_chg = Category2::where('category2_name',$ca2)->get('id');
        $ca_json = json_decode($ca2_chg);
        $caid2 = $ca_json[0]->id;

        if($request->hasfile('mainphoto_name')){
                $photo = $request->file('mainphoto_name');
                $name = time().rand(1,9999).'.'.$photo->extension();
                $photo->move(public_path('img'),$name);
                $files = $name;

        }

        if($request->hasfile('contentphoto_name')){
            foreach($request->file('contentphoto_name') as $photos){

                $name = time().rand(1,9999).'.'.$photos->extension();
                $photos->move(public_path('img'),$name);
                $file[] = $name;

            }
        }


        Goods::create([
            'goods_title'                   => $title,
            'goods_description'             => $des,
            'goods_price'                   => $pri,
            'size'                          => $siz,
            'ca_id'                         => $caid,
            'ca_id2'                        => $caid2,
            'mainphoto'                     => $files,
            'contentphoto'                  => json_encode($file),
            'goods_color'                   => json_encode($color, JSON_UNESCAPED_UNICODE)
        ]);

        return redirect('/');

    }


    public function categoryAdd(){
        $category = Category1::all();
        return view('admin.category_add',compact('category'));
    }

    public function catList(){
        $result = Category1::all();
        return $result;
    }

    public function addMainCategory(Request $request){

        $cate = $request->input('category1_name');
        Category1::create(['category1_name' => $cate]);
        $result = Category1::where('category1_name',$cate)->get();

        return $result;

    }


    public function addSecondCategory(Request $request){

        $catid = $request->input('category1_id');
        $catname = $request->input('category2_name');

        Category2::create([
            'category1_id' => $catid,
            'category2_name' => $catname
        ]);
        $result = Category2::where('category2_name', $catname)->get();


        return $result;

    }

    public function getSecondCategory(Request $request){

        $num = $request->input('clicked_id');
        $cat2 = Category1::find($num)->getCategory2;

        return $cat2;

    }

    public function delCategory(Request $request){

        $num = $request->input('num');
        $code = $request->input('code');

        try{
            if($code === '1'){
                Category1::where('id',$num)->delete();
                Category2::where('category1_id',$num)->delete();

            }
            else if($code === '2'){
                $id = Category2::where('id',$num)->get('category1_id');
                foreach($id as $ids){
                    $number = $ids->category1_id;
                }
                Category2::where('id',$num)->delete();
                $result = Category2::where('category1_id',$number)->get();
                return $result;
            }
        }

        catch(Exception $e){
            return $e->getMessage();
        }

    }





}
