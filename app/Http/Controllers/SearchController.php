<?php

namespace App\Http\Controllers;

use App\Models\Category1;
use App\Models\Goods;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $request->validate([
            'search' => 'required'
        ]);
        
        $data = Category1::all();
        $search = $request->input('search');

        $results = Goods::where('goods_title','LIKE','%'.$search.'%')->paginate(9);
        $count = $results->count();
        return view('shop.search',compact('data','results','search','count'));
    }
}
