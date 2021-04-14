<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schooling;
use Auth;
use DB;
class SchoolingController extends Controller
{
    private $schooling;

	public function __construct(Schooling $schooling){
		$this->schooling = $schooling;
	}
    public function registerSchooling(){
        $schoolings = DB::table('schoolings')
        ->orderBy('level','asc')
        ->get();
        return view('registerSchooling',compact('schoolings'));
    }
    public function storeSchooling(Request $request)
    { 
       
       $data = $request->all();
       $schoolings =Schooling::all();
     //  dd($schoolings);
       if($schoolings->contains('level',$request->level)){
        return redirect()
        ->route('registerSchooling')
        ->withDanger('ERRO - Escolaridade já Cadastrada!');
       }
        Schooling::create($data);
        return redirect()
                    ->route('registerSchooling')
                    ->withSuccess('Cadastro realizado com sucesso!');
        
    }

    public function updateSchooling($id, Request $request){
           // dd($request->all());
           $schoolings =Schooling::all();
           if($schoolings->contains('level',$request->level)){
            return redirect()
            ->route('registerSchooling')
            ->withDanger('ERRO - Escolaridade já Cadastrada!');
           }
           $this->schooling->find($id)->update($request->all());
            return redirect()
            ->route('registerSchooling')
            ->withSuccess('Atualizado com sucesso!');
    }

    public function dropSchooling($id){
        $this->schooling->find($id)->delete();
        return redirect()
        ->route('registerSchooling')
        ->withSuccess('Removido com sucesso!');

     }
}
