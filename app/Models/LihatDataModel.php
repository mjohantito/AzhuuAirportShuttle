<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LihatDataModel extends Model
{
    function cek_login($request) {
        if (DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$request->email)->where('USER_PASSWORD', '=',$request->pass)->exists()){
            return DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$request->email)->where('USER_PASSWORD', '=',$request->pass)->get();
        }
    }
    function querry_data($request) {
        return DB::table('RUTE')
            ->join('PO_BUS', 'RUTE.POBUS_ID','=', 'PO_BUS.POBUS_ID')
            ->join('VEHICLE', 'RUTE.V_ID' , '=', 'VEHICLE.V_ID')
            ->where('AIRPORT_ID', '=', $request->airport)
            ->where('RUTE_HALTE', '=', $request->fromto)
            ->take(3)
            ->get(array(
                'POBUS_NAME',
                'RUTE_WAKTUBERANGKAT',
                'AIRPORT_ID',
                'RUTE_FROMTO',
                'RUTE_HALTE',
                'V_JENIS',
                'RUTE_PRICE',
                'RUTE.RUTE_ID'
            ));
    }
    function querrry_data($RUTE_ID) {
        return DB::table('RUTE')
            ->join('PO_BUS', 'RUTE.POBUS_ID','=', 'PO_BUS.POBUS_ID')
            ->join('VEHICLE', 'RUTE.V_ID' , '=', 'VEHICLE.V_ID')
            ->where('RUTE.RUTE_ID', '=', $RUTE_ID)
            ->get(array(
                'POBUS_NAME',
                'RUTE_WAKTUBERANGKAT',
                'AIRPORT_ID',
                'RUTE_FROMTO',
                'RUTE_HALTE',
                'V_JENIS',
                'RUTE_PRICE',
                'RUTE.RUTE_ID'
            ));
    }
    function queryt_data($airport, $fromto, $checked, $request) {
        return DB::table('RUTE')
            ->join('PO_BUS', 'RUTE.POBUS_ID','=', 'PO_BUS.POBUS_ID')
            ->join('VEHICLE', 'RUTE.V_ID' , '=', 'VEHICLE.V_ID')
            ->where('AIRPORT_ID', '=', $airport)
            ->where('RUTE_HALTE', '=', $fromto)
            ->where('RUTE_WAKTUBERANGKAT', '>=', $request->appt)
            ->where('RUTE_WAKTUBERANGKAT', '<', $request->appt2)
            ->whereIn('RUTE.POBUS_ID', $checked)
            ->take(3)
            ->get(array(
                'POBUS_NAME',
                'RUTE_WAKTUBERANGKAT',
                'AIRPORT_ID',
                'RUTE_FROMTO',
                'RUTE_HALTE',
                'V_JENIS',
                'RUTE_PRICE',
                'RUTE.RUTE_ID'
            ));
    }
    function group_bandara(){
        return DB::table('AIRPORT')->get();
    }
    function group_fromto(){
        return DB::table('RUTE')->select('RUTE_HALTE')->groupBy('RUTE_HALTE')->get();
    }
    function bus_data(){
        return DB::table('PO_BUS')->get();
    }
    function ambil_data($isiemail) {
        return DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$isiemail)->get();
    }
    function cek_emailornik($request) {
        if (DB::table('USER_AZHUU')->where('USER_EMAIL', '=', $request->email)->orWhere('USER_NIK', '=', $request->nik)->exists()){
            return DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$request->email)->orWhere('USER_NIK', '=', $request->nik)->get();
        }
    }
    function save_user($request){
        DB::table('USER_AZHUU')->insert([
            'USER_NIK' => $request->nik,
            'USER_EMAIL' => $request->email,
            'USER_TITLE' => '',
            'USER_BIRTHDATE' => $request->tanggal,
            'USER_TELP' => $request->telp,
            'USER_NAME' => $request->nama,
            'USER_PASSWORD' => $request->password,
            'USER_DELETE' => '0'
        ]);
    }
    function cek_emaill($request) {
        if (DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$request->email)->exists()){
            return DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$request->email)->get();
        }
    }
    function cek_telp($request, $email) {
        if (DB::table('USER_AZHUU')->where('USER_EMAIL', '=', $email)->where('USER_TELP', '=', $request->confirmnotelp)->exists()){
            return DB::table('USER_AZHUU')->where('USER_EMAIL', '=', $email)->where('USER_TELP', '=', $request->confirmnotelp)->get();
        }
    }

    function reset_pass($email, $pass) {
        DB::table('USER_AZHUU')
            ->where('USER_EMAIL', '=', $email)
            ->update(['USER_PASSWORD' => $pass]);

    }
    function save_name($request, $isiemail){
        DB::table('USER_AZHUU')
            ->where('USER_EMAIL', '=', $isiemail)
            ->update(['USER_NAME' => $request->nama]);
    }
    function save_telp($request, $isiemail){
        DB::table('USER_AZHUU')
            ->where('USER_EMAIL', '=', $isiemail)
            ->update(['USER_TELP' => $request->telp]);
    }
    function check_email($request, $isiemail) {
        if (DB::table('USER_AZHUU')->where('USER_EMAIL', '=', $isiemail)->where('USER_PASSWORD', '=',$request->curpass)->exists()){
            return DB::table('USER_AZHUU')->where('USER_EMAIL', '=',$isiemail)->where('USER_PASSWORD', '=',$request->curpass)->get();
        }
    }
    function ganti_pass($request, $isiemail) {
        DB::table('USER_AZHUU')
            ->where('USER_EMAIL', '=', $isiemail)
            ->update(['USER_PASSWORD' => $request->newpass]);

    }

    function querry_order($ambildata) {
        return DB::table('RUTE')
            ->join('PO_BUS', 'RUTE.POBUS_ID','=', 'PO_BUS.POBUS_ID')
            ->join('VEHICLE', 'RUTE.V_ID' , '=', 'VEHICLE.V_ID')
            ->join('PESAN_TRANSAKSI', 'RUTE.RUTE_ID' , '=', 'PESAN_TRANSAKSI.RUTE_ID')
            ->join('USER_AZHUU', 'PESAN_TRANSAKSI.USER_NIK' , '=', 'USER_AZHUU.USER_NIK')
            ->where('PESAN_TRANSAKSI.USER_NIK', '=', $ambildata[0]->USER_NIK)
            ->take(4)
            ->get(array(
                'POBUS_NAME',
                'RUTE_WAKTUBERANGKAT',
                'AIRPORT_ID',
                'RUTE_FROMTO',
                'RUTE_HALTE',
                'V_JENIS',
                'TP_BOOKINGID',
                'RUTE.RUTE_ID'
            ));
    }
    function querry_detail($BOOKINGID) {
        return DB::table('PESAN_TRANSAKSI')
            ->join('RUTE', 'PESAN_TRANSAKSI.RUTE_ID', '=', 'RUTE.RUTE_ID')
            ->where('PESAN_TRANSAKSI.TP_BOOKINGID', '=', $BOOKINGID)
            ->get(array(
                'RUTE_WAKTUBERANGKAT',
                'AIRPORT_ID',
                'RUTE_FROMTO',
                'RUTE_HALTE',
                'TP_BOOKINGID',
                'TP_TOTALPRICE',
                'TP_TANGGALTRANSKSI',
                'TP_TANGGALBOOKING'
            ));
    }
    function querry_penumpang($BOOKINGID) {
        return DB::table('TRANSAKSI_PENUMPANG')
            ->join('PENUMPANG', 'TRANSAKSI_PENUMPANG.P_NIK', '=', 'PENUMPANG.P_NIK')
            ->where('TRANSAKSI_PENUMPANG.TP_BOOKINGID', '=', $BOOKINGID)
            ->get(array(
                'PENUMPANG.P_NAMA',
                'PENUMPANG.P_NIK'
            ));
    }
    function insert_transaksi($RUTE_ID, $date, $total, $ambildata, $today, $bookingid){
        DB::table('PESAN_TRANSAKSI')->insert([
            'TP_BOOKINGID' => $bookingid,
            'RUTE_ID' => $RUTE_ID,
            'PROMO_ID' => 'p0002',
            'USER_NIK' => $ambildata[0]->USER_NIK,
            'TP_TANGGALTRANSKSI' => $today,
            'TP_TANGGALBOOKING' => $date,
            'TP_BOOKINGSTATUS' => 'O',
            'TP_TOTALPRICE' => $total,
            'TP_DELETE' => '0'
        ]);
    }
    function hitung_data($today) {
        if (DB::table('PESAN_TRANSAKSI')->where('TP_TANGGALTRANSKSI', '=',$today)->exists()){
            return DB::table('PESAN_TRANSAKSI')->where('TP_TANGGALTRANSKSI', '=',$today)->get();
        }
    }
    function insert_penumpang($penumpangnama, $penumpangid){
        DB::table('PENUMPANG')->insert([
            'P_NIK' => $penumpangid,
            'P_NAMA' => $penumpangnama,
            'P_TELP' => '81232939453',
            'P_DELETE' => '0'
        ]);
    }
    function insert_tpenumpang($penumpangid, $bookingid){
        DB::table('TRANSAKSI_PENUMPANG')->insert([
            'P_NIK' => $penumpangid,
            'TP_BOOKINGID' => $bookingid
        ]);
    }
}
