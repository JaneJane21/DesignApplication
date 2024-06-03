<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function save_user(Request $request){
        $request->validate([
            'fio'=>['required','regex:/^[а-яА-ЯЁё\-\s]*$/u'],
            'login'=>['required','unique:users','regex:/^[A-Za-z\-\s]*$/'],
            'email'=>['required','email:rfc,dns','unique:users'],
            'password'=>['required','confirmed'],
            'rule'=>['required']
        ],
        [
            'fio.required'=>['Поле обязательно для заполнения'],
            'login.required'=>['Поле обязательно для заполнения'],
            'email.required'=>['Поле обязательно для заполнения'],
            'password.required'=>['Поле обязательно для заполнения'],
            'rule.required'=>['Поле обязательно для заполнения'],
            'fio.regex'=>['Только кириллические буквы, дефис и пробелы'],
            'login.regex'=>['Только латиница и дефис'],
            'login.unique'=>['Пользователь с таким логином уже есть в системе'],
            'email.unique'=>['Пользователь с такщй почтой уже есть в системе'],
            'email.email'=>['Неверный формат почты'],
            'password.confirmed'=>['Пароли не совпадают']

        ]
        );
        $user = new User();
        $user->fio = $request->fio;
        $user->login = $request->login;
        $user->email=$request->email;
        $user->password=md5($request->password);
        $user->save();
        return redirect()->back()->with('success','Успешная регистрация');
}
    public function log_user(Request $request){
        $request->validate([
            'login'=>['required','regex:/^[A-Za-z\-\s]*$/'],
            'password'=>['required'],
        ],
        [
            'login.required'=>['Поле обязательно для заполнения'],
            'login.regex'=>['Только латиница и дефис'],
            'password.required'=>['Поле обязательно для заполнения'],
        ]
        );
        $user = User::query()->where('login',$request->login)
        ->where('password',md5($request->password))->first();
        if($user){
            Auth::login($user);
            if($user->role==0){
                return redirect()->route('user_profile')->with('success','Успешная авторизация');
            }
            elseif($user->role==1){
                return redirect()->route('admin_profile')->with('success','Успешная авторизация');
            }
        }
        else{
            return redirect()->back()->with('error','Пользователь не найден');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
