<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $search = $request->params;

        foreach($search as $searchs){
             $seh = $searchs;
        }
      

      $User = User::role(['users','admin'])->where(function($q) use ($seh) {
        $q->where('name', 'like', "%$seh%")
            ->orWhere('cedula', 'LIKE', "%$seh%")
            ->orWhere('celular', 'LIKE', "%$seh%")
            ->orWhere('email', 'LIKE', "%$seh%");

    })->with(['city'=>function ($q){
        $q->with(['state'=>function ($que){
            $que->with('country');
        }]);
    }])->orderBy('created_at', 'desc')->paginate(5);
         return response($User, 200);
    }

    public function add(Request $request)
    {

          
        $validator = Validator::make($request->all(), [
             'email' => ['string', 'email', 'max:100', 'unique:users'],
             ]);
        if ($validator->fails()) {
           
            return response()->json(['status'=>'error','errors'=>$validator->errors()]);
                 }
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->cedula = $request->cedula;
      $user->email = $request->email;
      $user->fecha_de_nacimiento = $request->fecha_de_nacimiento;
      $user->celular = $request->celular;
      $user->city_id = $request->city;
      $user->assignRole('users');
      $user->save();

      return response()->json(['status'=>'success','data'=>$user]);


    }

    
    public function delete($id){

        $user = User::where('id', $id)->delete();
        return response()->json(['status'=>'success','data'=>$user]);
     }
   
    public function edit(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->cedula = $request->cedula;
        $user->email = $request->email;
        $user->fecha_de_nacimiento = $request->fecha_de_nacimiento;
        $user->celular = $request->celular;
        $user->city_id = $request->city;
        $user->save();
     

      return response()->json(['status'=>'success','data'=>$user]);
    }

    
}
