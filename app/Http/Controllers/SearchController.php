<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LihatDataModel;


class SearchController extends Controller
{
    //
    function __construct()
    {
        $this->LihatDataModel = new LihatDataModel();
    }

    public function cari_data(Request $request) {
        $posts = $this->LihatDataModel->querry_data($request);
        $bus = $this->LihatDataModel->bus_data();
        if (session()->has('user')) {
        return view('searchlogin')->with('posts', $posts)->with('airport', $request->airport)->with('bus', $bus)->with('fromto', $request->fromto)->with('date', $request->date)->with('passanger', $request->passanger);
        }
        return view('search')->with('posts', $posts)->with('airport', $request->airport)->with('bus', $bus)->with('fromto', $request->fromto)->with('date', $request->date)->with('passanger', $request->passanger);
    }
    public function home_page() {
        $bandara = $this->LihatDataModel->group_bandara();
        $ft = $this->LihatDataModel->group_fromto();
        if (session()->has('user')) {
        return view('homelogin')->with('bandara', $bandara)->with('ft', $ft);
        }
        return view('home')->with('bandara', $bandara)->with('ft', $ft);
    }
    public function filter(Request $request, $airport, $fromto, $date, $passanger) {
        if(!isset($_POST['filterbus'])){
            $_POST['filterbus'] = array('1'=>'A001', '2'=> 'A002', '3'=> 'B001', '4'=> 'B002', '5'=> 'B003', '6'=> 'H001', '7'=> 'J001', '8'=> 'J002', '9'=> 'M001', '10'=> 'P001', '11'=> 'R001', '12'=> 'S001');
        }
        $checked = $_POST['filterbus'];
        $bus = $this->LihatDataModel->bus_data();
        $posts = $this->LihatDataModel->queryt_data($airport, $fromto, $checked, $request);
        if (session()->has('user')) {
        return view('searchlogin')->with('posts', $posts)->with('bus', $bus)->with('airport', $airport)->with('fromto', $fromto)->with('date', $date)->with('passanger', $passanger)->with('waktu', $request);
        }
        return view('search')->with('posts', $posts)->with('bus', $bus)->with('airport', $airport)->with('fromto', $fromto)->with('date', $date)->with('passanger', $passanger)->with('waktu', $request);
    }
    public function input($date, $passanger, $RUTE_ID) {
        $posts = $this->LihatDataModel->querrry_data($RUTE_ID);
        $isiemail = session('user');
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        return view('pinput')->with('date', $date)->with('passanger', $passanger)->with('ambildata', $ambildata)->with('posts', $posts);
    }
    public function payment(Request $request, $date, $passanger, $RUTE_ID) {
        $posts = $this->LihatDataModel->querrry_data($RUTE_ID);
        $isiemail = session('user');
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        return view('payment')->with('date', $date)->with('passanger', $passanger)->with('ambildata', $ambildata)->with('posts', $posts)->with('request', $request);
    }
    public function checkout(Request $request, $date, $passanger, $RUTE_ID, $penumpangnama, $penumpangid) {
        $posts = $this->LihatDataModel->querrry_data($RUTE_ID);
        $isiemail = session('user');
        $nama = unserialize($penumpangnama);
        $id = unserialize($penumpangid);
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        return view('checkout')->with('date', $date)->with('passanger', $passanger)->with('ambildata', $ambildata)->with('posts', $posts)->with('request', $request)->with('nama', $nama)->with('id', $id);
    }
    public function insert_data($RUTE_ID, $date, $total, $nama, $id) {
        $isiemail = session('user');
        $ambildata = $this->LihatDataModel->ambil_data($isiemail);
        $today = date('Y-m-d');
        $urutan = $this->LihatDataModel->hitung_data($today);
        if (isset($urutan)) {
            $count = count($urutan)+1;
        }else{
            $count = 1;
        }
        if($count < 10){
            $tcount = '00' . $count;
        }
        elseif($count >= 10 and $count < 100){
            $tcount = '0' . $count;
        }
        elseif($count >= 100){
            $tcount = $count;
        }
        $bookingid = $RUTE_ID . date('Ymd', strtotime($today)) . $tcount;
        $insert = $this->LihatDataModel->insert_transaksi($RUTE_ID, $date, $total, $ambildata, $today, $bookingid);
        $penumpangnama = unserialize($nama);
        $penumpangid = unserialize($id);
        for($i = 1; $i <= count($penumpangnama); $i++)
        {
            $inspenumpang = $this->LihatDataModel->insert_penumpang($penumpangnama[$i], $penumpangid[$i]);
        }
        for($i = 1; $i <= count($penumpangnama); $i++)
        {
            $instpenumpang = $this->LihatDataModel->insert_tpenumpang($penumpangid[$i], $bookingid);
        }
        return redirect('/');
    }
}
