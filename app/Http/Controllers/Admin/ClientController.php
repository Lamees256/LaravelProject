<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){

        $clients=Client::orderBy('id','desc')->get();
        return view('admin.clients', compact('clients'));
    }

    public function edit($id){
        $client=Client::where('id',$id)->first();
        if($client == null){
        abort(404);   
        }
        return view('admin.clients_edit', compact('client'));
    }

    public function update($id, Request $request){
        $client=Client::where('id',$id)->first();
        $data=[];
        if($client == null){
        abort(404); 
        }
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|unique:clients,email,'.$id,
            'password' => 'nullable|sometimes:min:8',
        ]);
        $data['name']=$request->name;
        $data['email']=$request->email;
        if(!$request->password == null){
            $data['password']=$request->password;
        }
        $client->update($data);
        return back()->with(['message_success' => 'Successfully Updated']);
    }

    public function delete($id){
        try{
            Client::where('id',$id)->delete();
            return back()->with(['message_success'=>'Client Sucessfully Deleted']);
        }catch(\Throwable $th){
            return back()->with(['message_error'=>'Oops An Error Has Occurred']);
        }
        
        
    }
}
