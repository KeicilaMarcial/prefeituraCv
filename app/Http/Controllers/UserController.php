<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Cv;
use App\Sector;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $user;

	public function __construct(User $user){
		$this->user = $user;
	}
    
    public function dashboard(){
        /*------ Cvs-----------------------------*/
        $countM=Cv::where('gender','=',0)->count();
        $countF=Cv::where('gender','=',1)->count();
        $countO=Cv::where('gender','=',2)->count();
        $countT=DB::table('cvs')->count();

        $countIna=Cv::where('status','=',0)->count();
        $countAti=Cv::where('status','=',1)->count();
        //get all the Cvc created in the current day
        $posts = Cv::whereDate('created_at', Carbon::today())->paginate(4);
       // dd($countAti);
        return view('dashboard',compact('countM','countF','countO','countT','countIna','countAti','posts'));

       
    }
    

    public function manageUsers(){
        $users = DB::table('users')
                ->orderBy('name', 'asc')
                ->get();
        $sectors = DB::table('sectors')
                    ->orderBy('name','asc')
                    ->get();
        /*$sectors =Sector::all();
        $users = User::all();*/
        return view('manageUsers',compact('sectors'),compact('users'));
    }

    public function registerUser(){
        $sectors =DB::table('sectors')
        ->orderBy('name','asc')
        ->get();
        return view('registerUser',compact('sectors'));
    }
   
    public function storeUser(Request $request)
    { 
       // $request->status;
       $users =User::all();
       if($users->contains('email',$request->email)){
        return redirect()
        ->route('registerUser')
        ->withDanger('ERRO - Email já Cadastrada!');
       }
       $data = $request->all();
        User::create($data);
        return redirect()
                    ->route('registerUser')
                    ->withSuccess('Cadastro realizado com sucesso!');
        
    }

    public function updateUser($id, Request $request){
           // dd($request->all());
           $this->user->find($id)->update($request->all());
            return redirect()
            ->route('manageUsers')
            ->withSuccess('Atualizado com sucesso!');
    }

    public function dropUser($id){
        $this->user->find($id)->delete();
        return redirect()
        ->route('manageUsers')
        ->withSuccess('Removido com sucesso!');

     }

     public function resetPassword(Request $request){
        return view('resetPassword');
     }

     public function passwordUpdate($id, Request $request){
        $p= Hash::make($request->password); 
        $us=DB::table('users')
        ->select('permission')
        ->where('id',$id) 
        ->get();
       foreach($us as $u){
          $perm=$u->permission;
       }
      if($perm==1) {
            if( $users=DB::table('users') ->where('email','=',$request->email) ->update(['password'=>$p])){
                return redirect()
                ->route('resetPassword')
                ->withSuccess('Senha Atualizada com sucesso!');
            }else{
                return redirect()
                ->route('resetPassword')
                ->withDanger('ERRO, Email nao existente na base de dados');
            }
        }else{
            if( $users=DB::table('users') 
                ->where('email','=',$request->email)
                ->where('id', $id)
                ->update(['password'=>$p])){
                return redirect()
                ->route('resetPassword')
                ->withSuccess('Senha Atualizada com sucesso!');
            }else{
                return redirect()
                ->route('resetPassword')
                ->withDanger('ERRO! Email nao existente na base de dados
                    Ou permissão para alterar essa senha não foi permitida.
                ');
            }
        }
       
     }
     
}
