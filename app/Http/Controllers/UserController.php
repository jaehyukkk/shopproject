<?php

namespace App\Http\Controllers;

use App\Models\Category1;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function join(){
        return view('auth.join');
    }

    public function login(){

        if(Auth::user()){
            return redirect('/')->with('alert','이미 로그인한 사용자입니다.');
        }

        return view('auth.login');
    }


    public function checkId(Request $request){

        $userid = $request->input('userid');
        $count = User::where('userid',$userid)->count();

        return $count;
    }



    public function joinProcess(Request $request){

        $request->validate([
            'name'              => 'required',
            'userid'            => 'required|unique:users',
            'password'          => 'min:8|required_with:repassword|same:repassword',
            'repassword'        => 'min:8',
            'tel'               => 'min:10',
            'dayfirst'          => 'required',
            'daylast'           => 'required',
            'email'             => 'required',
            'addr'              => 'required',
            'detailaddr'        => 'required',
        ]);


        $data = $request->all();
        $this->createJoin($data);

        Auth::attempt([
            'userid' =>  $request->input('userid'),
            'password' =>  $request->input('password')
        ]);

        if(Auth::check()){
            return redirect('/')->with('alert','회원가입 완료');
        }

        return redirect()->back()->with('alert','입력이 안된 사항이있거나 형식 오류가있습니다.');  
        
    }

    public function createJoin(array $data){

        return User::create([

            'name'              => $data['name'], 
            'userid'            => $data['userid'],
            'password'          => Hash::make($data['password']),
            'addr'              => $data['addr'],
            'detailaddr'        => $data['detailaddr'],
            'sex'               => $data['sex'],
            'birthday'          => $data['dayfirst'],
            'birthdaymiddel'    => $data['daymiddle'],
            'birthdaylast'      => $data['daylast'],
            'email'             => $data['email'],
            'tel'               => $data['tel'],
            'post'              => $data['post'],
        ]);      
    }


    public function loginProcess(Request $request){

        $request->validate([
            'userid'        =>'required',
            'password'      =>'required|min:6'
        ]);

        $credentials = $request->only('userid', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        
        return redirect()->back()->with('alert','존재하지 않는 아이디이거나 잘못된 비밀번호입니다.');

    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/')->with('alert','로그아웃 되었습니다.');
    }  


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $userSocial = Socialite::driver('google')->user();
        $users = User::Where(['userid' => $userSocial->getId() ])->first();

        if($users){
            Auth::login($users);
            return redirect('/');
        }
        else{

            $users = User::create([
                'userid'       => $userSocial->getId(),
                'email'        => $userSocial->getEmail(),
                'name'         => $userSocial->getName(),
                'password'     => Hash::make(uniqid()),
                'social'       => 1
            ]);

            $users = User::Where(['userid' => $userSocial->getId() ])->first();

            Auth::login($users);
            return redirect('/');
        }

    }

    public function getResetPassword(){
        $data = Category1::all();
        if(Auth::user()->social == 1){
            return redirect()->back()->with('alert','소셜로그인 사용자는 비밀번호변경이 불가능합니다.');
        }
        return view('auth.resetpassword',compact('data'));
    }

    public function postResetPassword(Request $request, $id){
        
        $request->validate([
        'password'          => 'min:8|required_with:repassword|same:repassword',
        'repassword'        => 'min:8',
        ]);
        
        if(!(Hash::check($request->input('oldpassword'), Auth::user()->password))){
            return redirect()->back()->with('alert','이전 패스워드가 맞지않습니다.');
        }
        else{
            User::where('id',$id)->update([
                'password' => Hash::make($request->input('password'))
            ]);

            return redirect('/');
        }
    }

    public function getResetInfo($id){

        if($id != Auth::user()->id){
            return redirect('/');
        }
        else{
            $data = Category1::all();
            $user = User::where('id',$id)->get();
            return view('auth.resetinfo',compact('user','data'));
        }
        
    }

    public function editUser(Request $request,$id){

        User::where('id',$id)->update([

            'name'              => $request->input('name'),
            'addr'              => $request->input('addr'),
            'detailaddr'        => $request->input('detailaddr'),
            'sex'               => $request->input('sex'),
            'birthday'          => $request->input('dayfirst'),
            'birthdaymiddel'    => $request->input('daymiddle'),
            'birthdaylast'      => $request->input('daylast'),
            'email'             => $request->input('email'),
            'tel'               => $request->input('tel'),
            'post'              => $request->input('post'),
        ]);  

        return redirect('/')->with('alert','회원정보 수정 완료');
    }

    public function getMypage($id){
        $data = Category1::all();
        $cart = Cart::where('user_id',$id)->count();
        $ready = Order::where('user_id',$id)->where('orderstate','배송준비')->count();
        $middel = Order::where('user_id',$id)->where('orderstate','배송중')->count();
        $success = Order::where('user_id',$id)->where('orderstate','배송완료')->count();
        return view('auth.mypage',compact('data','cart','ready','middel','success'));

    }
}
