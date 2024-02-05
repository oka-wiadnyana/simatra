<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function satker(){
        $satkers=Satker::all();
        return view('setting.satker',['satkers'=>$satkers]);
    }

    public function insertSatker(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'name'=>['required'],
                'nick_name'=>['required'],
                'whatsapp_number'=>['required'],
                'satker_code'=>['required'],
                'address'=>['required'],
            ]
        );

        if($validate->fails()){
            Alert::error('Gagal', $validate->errors()->all());
            return back();
        }

    //    dd($validate->safe()['name']);
        try{
        
          Satker::updateOrCreate(
            ['id'=>$request->id],
            $validate->safe()->all()
            );
          
            Alert::success('Berhasil', __('message.success'));
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', $e->getMessage());
            return back();
        }


    } 
    public function deleteSatker(Request $request){
        Satker::destroy($request->id);
        Alert::success('Berhasil', __('message.delete'));
        return response()->json(['msg'=>'success']);
    }

    public function account(){
        $accounts=User::all();
        return view('setting.accounts',['accounts'=>$accounts]);
    }

    public function insertAccount(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'name'=>['required'],
                'username'=>['required'],
                'role'=>['required'],
                'satker_id'=>['required'],
                'password'=>['required_if:id,null','confirmed','sometimes'],
            ]
        );

        if($validate->fails()){
            Alert::error('Gagal', $validate->errors()->all());
            return back();
        }

      
        if($request->password){
            $password=Hash::make($request->password);
            $data_insert=array_merge($validate->safe()->except('password'),['password'=>$password]);
        }else{
            $data_insert=$validate->safe()->except('password');
        }
        
        try{
        
          User::updateOrCreate(
            ['id'=>$request->id],
            $data_insert
            );
          
            Alert::success('Berhasil', __('message.success'));
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', $e->getMessage());
            return back();
        }


    } 
    public function deleteAccount(Request $request){
        Satker::destroy($request->id);
        Alert::success('Berhasil', __('message.delete'));
        return response()->json(['msg'=>'success']);
    }
}
