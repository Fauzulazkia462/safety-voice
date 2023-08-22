<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Reminder;
use App\Exports\complaintExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ExportController extends Controller
{
    public function index(){
        $data = \DB::table('complaint')
        ->select('complaint.*')
        ->get();

        return view('export.index', compact('data'));
    }

    public function exportexcel(){
        return Excel::download(new complaintExport, 'SafetyVoice-'.date('d-m-Y').'.xlsx');
    }

    public function deletedata(Request $req){

        $id = $req->idhapus;
        \DB::delete('DELETE FROM complaint WHERE id = ?', [$id]);

        return back();
    }

    public function update(Request $req){
        $id = $req->idEdit;
        $status = $req->statusEdit;

        $model = Complaint::find($id);
        $model->status = $req->statusEdit;
        $model->save();

        $query = 'SELECT * FROM reminder WHERE complaint_id = '.$id.'';
        
        // if($status == "Done"){
        //     if($query){
        //         DB::table('reminder')
        //         ->where('complaint_id', $id)
        //         ->update([
        //             'status' => $req->statusEdit,
        //         ]);
        //     }
        // }
        
        if($query){
            DB::table('reminder')
            ->where('complaint_id', $id)
            ->update([
                'status' => $req->statusEdit,
            ]);
        }

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!!',
        ]);
    }

    public function assGa(Request $req){
        $id = $req -> idCompGa;
        \DB::table('reminder')
        ->insert([
            'complaint_id' => $req -> idCompGa,
            'email' => $req -> emailGa,
            'status' => $req -> statusGa,
            'divisi' => $req -> divGa,
        ]);

        DB::table('complaint')
            ->where('id', $id)
            ->update([
                'assign' => "1",
            ]);

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function assEng(Request $req){
        $id = $req -> idCompEng;
        \DB::table('reminder')
        ->insert([
            'complaint_id' => $req -> idCompEng,
            'email' => $req -> emailEng,
            'status' => $req -> statusEng,
            'divisi' => $req -> divEnd,
        ]);

        DB::table('complaint')
            ->where('id', $id)
            ->update([
                'assign' => "1",
            ]);

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function done(Request $req){
        $id = $req->idDone;

        $model = Complaint::find($id);
        $model->status = $req->statusDone;
        $model->save();

        // $model2 = Reminder::find($id);
        // $model2->status = $req->statusDone;
        // $model2->save();
        
        $query = 'SELECT * FROM reminder WHERE complaint_id = '.$id.'';

        if($query){
            DB::table('reminder')
            ->where('complaint_id', $id)
            ->update([
                'status' => $req->statusDone,
            ]);
        }

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!!',
        ]);
    }
}
