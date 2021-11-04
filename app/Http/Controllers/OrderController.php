<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Goods;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


//기능만 구현 보안X
class OrderController extends Controller
{
   public function orderprocess(Request $request){

    $imp_key = "1720702051247094";
    $imp_secret = "U1rbvThBCxDozTo44FuRHqmm7P4okk3fmuqRoIs0f5oPZNU4toVaOixW8ClsWoHiT79hQCi5IGUHuPLX";
    $imp_uid = $request->input('imp_uid');
    $merchant_uid = $request->input('merchant_uid');
    $orderList = $request->input('orderlist');
    $userid = $request->input('userid');
    

    try{
        $getToken  = Http::withHeaders([
            'Content-Type' => 'application/json'
            ])->post('https://api.iamport.kr/users/getToken', [
                'imp_key' => $imp_key,
                'imp_secret' => $imp_secret,
        ]);
        $getTokenJson = json_decode($getToken, true);
        $access_token = $getTokenJson['response']['access_token'];

        $getPaymentData = Http::withHeaders([
            'Authorization' => $access_token
        ])->get('https://api.iamport.kr/payments/'.$imp_uid);
        
        $getPaymentDataJson = json_decode($getPaymentData,true);

         $responseData = $getPaymentDataJson['response'];
         $iamport_status = $responseData['status'];
         $iamport_amount = $responseData['amount']; 
         
         $jsonOrderList = json_encode($orderList, JSON_UNESCAPED_UNICODE);
        //  $getOrderList = json_decode($jsonOrderList, JSON_UNESCAPED_UNICODE);
        Order::create([
            'orderlist'=>$jsonOrderList,
            'buyer_name' =>$responseData['buyer_name'],
            'buyer_tel' =>$responseData['buyer_tel'],
            'buyer_addr' =>$responseData['buyer_addr'],
            'buyer_email' =>$responseData['buyer_email'],
            'amount' =>$responseData['amount'],
            'orderstate' =>'배송준비',
            'user_id' =>$userid,
            'uid' =>$merchant_uid
        ]);
            return $userid;

    }catch(Exception $e){
       return $e->getMessage();
    }
   }

   public function orderListIndex(){

        $orders = Order::orderBy('id','desc')->get();

        return view('admin.orderlist',compact('orders'));
    
    }

    public function orderListIndexState($state){
        if($state == 1){
            $orders = Order::where('orderstate','배송준비')->get();
        }
        elseif($state == 2){
            $orders = Order::where('orderstate','배송중')->get();
        }
        else{
            $orders = Order::where('orderstate','배송완료')->get();
        }
        
        return view('admin.orderlist',compact('orders'));
    }


    public function titleClick(Request $request){

        $title = $request->input('title');

        $idx = Goods::where('goods_title',$title)->get('id');
        return $idx;

    }

    public function orderStateChg(Request $request){
        $idx = $request->input('number');
        $state = $request->input('state');

        Order::where('id',$idx)->update([
            'orderstate' => $state
        ]);
        return 'success';
    }





//카트관련 메서드


    //동일한 상품은 갯수만 늘리고 히든 벨류가 카트면 카트로 payment면 오더창으로 이동하는 메서드
    public function cartProcess(Request $request){

            $getId = [];
            $data = Category1::get();
            
            $hidden = $request->input('hidden');
            $num = $request->input('cntbox');
            $color = $request->input('array');
            $usernum = $request->input('usernum');
            $gid = $request->input('goods_id');

            $users = User::where('id',$usernum)->get();

            for($i = 0 ;$i < count($num); $i++){

                $count = Cart::where('user_id',$usernum)->where('color',$color[$i])->where('goods_id',$gid)
                ->count();
    
                if($count == 1){
                    $idx = Cart::where('user_id',$usernum)->where('color',$color[$i])->where('goods_id',$gid)
                    ->get('id');

                    Cart::where('id',$idx[0]->id)->update([
                        'number'=> DB::raw('number+'.$num[$i])
                    ]);
                    
                    $getId[$i] = $idx[0]->id;

                    continue;
                    
                }
        
                    $getId[$i] = Cart::create([
                        'color'                 => $color[$i], 
                        'number'                => $num[$i],  
                        'user_id'               => $usernum,
                        'goods_id'              => $gid,
                    ])->id;
            }   
            if($hidden == 'cart'){      
            return redirect('/cart/'.$usernum);
            
            }else{
                $carts = DB::table('carts')
                ->whereIn('carts.id',$getId)
                ->leftJoin('goods', 'carts.goods_id', '=', 'goods.id')
                ->select('*','carts.id as carts_id')
                ->orderBy('carts.id','desc')
                ->get();

            return view('shop.order', compact('data','carts','users'));
        
            }
             
        }

        //카트 인덱스
        public function cart($id){
            $data = Category1::get();

            $carts = DB::table('carts')->where('user_id', '=', $id)
            ->leftJoin('goods', 'carts.goods_id', '=', 'goods.id')
            ->select('*','carts.id as carts_id')
            ->orderBy('carts.id','desc')
            ->get();

            $users = User::where('id',$id)->get();
            
            return view('shop.cartlist',compact('carts','data','users'));
        
        }


        //장바구니에 동일한 상품이있는지 확인하고 결과를 ajax로 반환하는 메서드
        public function cartCheck(Request $request){
            
            $result = 0;

            $num = $request->input('cntbox');
            $color = $request->input('array');
            $usernum = $request->input('usernum');
            $gid = $request->input('goods_id');

            $users = User::where('id',$usernum)->get();

            for($i = 0 ;$i < count($num); $i++){
        
                $count = Cart::where('user_id',$usernum)->where('color',$color[$i])->where('goods_id',$gid)
                ->count();
    
                if($count == 1){                   
                    $result = $count;  
                }
            }  
            return $result;
          
        }
       

//여기까지 카트관련






        public function orderPage(Request $request){
            
            $data = Category1::get();
            
            $idx = $request->input('cartcheck');
            $userid = $request->input('userid');
            // $json = json_decode($idx);
            $users = User::where('id',$userid)->get();

            if($request->input('delete') === 'delete'){
                DB::table('carts')->whereIn('id',$idx)->delete();
                return back();
            }
          
            $carts = DB::table('carts')
            ->whereIn('carts.id',$idx)
            ->leftJoin('goods', 'carts.goods_id', '=', 'goods.id')
            ->select('*','carts.id as carts_id')
            ->orderBy('carts.id','desc')
            ->get();


            return view('shop.order', compact('data','carts','users'));
           
        }

        public function orderInfoPage($id){
            $data = Category1::get();
            $orders = Order::where('user_id',$id)->orderBy('id','desc')->get();
            return view('shop.orderinfo',compact('orders','data'));
        }



}


