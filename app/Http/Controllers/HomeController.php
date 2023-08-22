<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view ('home.index');
    }

   
   public function insert(Request $req) {

        $file_name = $req->file->getClientOriginalName();
        $req->file->move('uploads/safetyVoice/', $file_name);
        
        \DB::table('complaint')
        ->insert([
            'name' => $req -> fName,
            'dept' => $req -> dept,
            'area' => $req -> area,
            'spec_area' => $req -> specArea,
            'unsafe_activity' => $req -> unsafe_activity,
            'unsafe_envi' => $req -> unsafe_envi,
            'file_name' => $file_name,
            'recom' => $req -> recom,
            'status' => $req -> status,
        ]);

        return redirect()->to('/')->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
   }
}
