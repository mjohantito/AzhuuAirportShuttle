<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LihatDataModel;

class LoginController extends Controller
{
    //
    function __construct()
    {
        $this->LihatDataModel = new LihatDataModel();
    }

    public function login_data(Request $request) {
        $statLogin = $this->LihatDataModel->cek_login($request);
        if(isset($statLogin)){
            $bandara = $this->LihatDataModel->group_bandara();
            $ft = $this->LihatDataModel->group_fromto();
            $data = $request->email;
            $request->session()->put('user', $data);
            return view('homelogin')->with('bandara', $bandara)->with('ft', $ft);
        }else{
            return back()->withErrors(['Invalid Username or Password!']);
        }
    }
    public function login_done() {
        $bandara = $this->LihatDataModel->group_bandara();
        $ft = $this->LihatDataModel->group_fromto();
        return view('homelogin')->with('bandara', $bandara)->with('ft', $ft);
    }
    public function no_login() {
        $bandara = $this->LihatDataModel->group_bandara();
        $ft = $this->LihatDataModel->group_fromto();
        return view('home')->with('bandara', $bandara)->with('ft', $ft);
    }
    public function regis_data(Request $request) {
        $statRegis = $this->LihatDataModel->cek_emailornik($request);
        if(isset($statRegis)){
            return back()->withErrors(['Email or NIK Already Used!']);
        }else{
            $user = $this->LihatDataModel->save_user($request);
            $bandara = $this->LihatDataModel->group_bandara();
            $ft = $this->LihatDataModel->group_fromto();
            $data = $request->email;
            $request->session()->put('user', $data);
            return view('homelogin')->with('bandara', $bandara)->with('ft', $ft);
        }
    }

    public function newpass(Request $request) {
        $statEmail = $this->LihatDataModel->cek_emaill($request);
        if(isset($statEmail)){
            return view('newpassword')->with('req', $request);
        }else{
            return back()->withErrors(['Invalid Email!']);
        }
    }
    public function reset_data(Request $request, $email) {
        if($request->pass == $request->confirmpass){
            return view('confirmnotelp')->with('reqq', $request)->with('email', $email);
        }else{
            return back()->withErrors(['Passwords are not same']);
        }
    }
    public function confirmtelp(Request $request, $email, $pass) {
        $statPhone = $this->LihatDataModel->cek_telp($request, $email);
        if(isset($statPhone)){
            $update = $this->LihatDataModel->reset_pass($email, $pass);
            return redirect('/');
        }else{
            return back()->withErrors(['Wrong Number']);
        }
    }
    public function edit_data() {
        $isiemail = session('user');
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        return view('editprofil')->with('data', $ambildata);
    }
    public function save_data(Request $request) {
        $isiemail = session('user');
        $update1 = $this->LihatDataModel->save_name($request, $isiemail);
        $update2 = $this->LihatDataModel->save_telp($request, $isiemail);
        return redirect('/edit')->with('alert', 'Update Sucess!!');
    }
    public function update_data(Request $request) {
        $isiemail = session('user');
        $statemail = $this->LihatDataModel->check_email($request, $isiemail);
        if(isset($statemail)){
            if($request->newpass == $request->conpass){
                $update = $this->LihatDataModel->ganti_pass($request, $isiemail);
                return redirect('/edit')->with('alert', 'Update Sucess!!');
            }else{
                return back()->withErrors(['Wrong Password!!!!']);
            }
        }else{
            return back()->withErrors(['Wrong Password!!!!']);
        }
    }
    public function myorder() {
        $isiemail = session('user');
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        $posts = $this->LihatDataModel->querry_order($ambildata);
        return view('myorder')->with('posts', $posts);
    }
    public function detail_order($BOOKINGID) {
        $isiemail = session('user');
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        $posts = $this->LihatDataModel->querry_order($ambildata);
        $detail = $this->LihatDataModel->querry_detail($BOOKINGID);
        $penumpang = $this->LihatDataModel->querry_penumpang($BOOKINGID);
        return view('myorder')->with('posts', $posts)->with('detail', $detail)->with('penumpang', $penumpang);
    }
}
