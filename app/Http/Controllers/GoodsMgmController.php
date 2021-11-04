<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category1;
use App\Models\Category2;
use App\Models\Goods;
use Illuminate\Support\Facades\DB;

class GoodsMgmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = DB::table('goods')
        ->leftJoin('category1s', 'goods.ca_id', '=', 'category1s.id')
        ->leftJoin('category2s', 'goods.ca_id2', '=', 'category2s.id')
        ->select('*','goods.id as goods_id')
        ->orderBy('goods.id','desc')
        ->get();

        return view('admin.goodsmgm',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $goods)
    {  
         $cat = Category1::get();
        return view('admin.goodsupdate',compact('cat','goods'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $files ="";
        $file = [];

        $request->validate([
            'mainphoto_name.*' => 'image',
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
        $idx = $request             ->input('goodsid');

        if($caid === "카테고리"){
            return redirect()->back()->with('alert','카테고리를 선택해주세요');
        }
        

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
        if($file != [] && $files != ""){
            Goods::where('id',$idx)->update([
                'goods_title'                   => $title,
                'goods_description'             => $des,
                'goods_price'                   => $pri,
                'size'                          => $siz,
                'ca_id'                         => $caid,
                'ca_id2'                        => $ca2,
                'mainphoto'                     => $files,
                'contentphoto'                  => json_encode($file),
                'goods_color'                   => json_encode($color, JSON_UNESCAPED_UNICODE)
            ]);
            
        }
        else if($file === [] && $files != ""){
            Goods::where('id',$idx)->update([
                'goods_title'                   => $title,
                'goods_description'             => $des,
                'goods_price'                   => $pri,
                'size'                          => $siz,
                'ca_id'                         => $caid,                     
                'ca_id2'                        => $ca2,
                'mainphoto'                     => $files,
                'goods_color'                   => json_encode($color, JSON_UNESCAPED_UNICODE)
            ]);
        }
        else if($files === "" && $file != []){
            Goods::where('id',$idx)->update([
                'goods_title'                   => $title,
                'goods_description'             => $des,
                'goods_price'                   => $pri,
                'size'                          => $siz,
                'ca_id'                         => $caid,
                'ca_id2'                        => $ca2,
                'contentphoto'                  => json_encode($file),
                'goods_color'                   => json_encode($color, JSON_UNESCAPED_UNICODE)
            ]);      
        }
        else if($files === "" && $file === []){
            Goods::where('id',$idx)->update([
                'goods_title'                   => $title,
                'goods_description'             => $des,
                'goods_price'                   => $pri,
                'size'                          => $siz,
                'ca_id'                         => $caid,
                'ca_id2'                        => $ca2,
                'goods_color'                   => json_encode($color, JSON_UNESCAPED_UNICODE)
            ]);
        }

        return redirect('/goodsmgm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Goods::where('id',$id)->delete();
       
    }

    public function getMgmCategory(Request $request){
        $id = $request->input('id');
        $data = Category1::find($id)->getCategory2;

        return $data;
    }
}
