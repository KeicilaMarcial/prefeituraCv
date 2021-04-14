<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sector;
use Auth;
use DB;
class SectorController extends Controller
{
    private $sector;

	public function __construct(Sector $sector){
		$this->sector = $sector;
	}
    public function registerSector(){
        $sectors =DB::table('sectors')
        ->orderBy('name','asc')
        ->get();
        return view('registerSector',compact('sectors'));
    }
    public function storeSector(Request $request)
    { 
       
       $data = $request->all();
       $sectors =Sector::all();
       if($sectors->contains('name',$request->name)){
        return redirect()
        ->route('registerSector')
        ->withDanger('ERRO - Setor já Cadastrado!');
       }
        Sector::create($data);
        return redirect()
                    ->route('registerSector')
                    ->withSuccess('Cadastro realizado com sucesso!');
        
    }

    public function updateSector($id, Request $request){
           // dd($request->all());
           $sectors =Sector::all();
           if($sectors->contains('name',$request->name)){
            return redirect()
            ->route('registerSector')
            ->withDanger('ERRO - Setor já Cadastrado!');
           }
           $this->sector->find($id)->update($request->all());
            return redirect()
            ->route('registerSector')
            ->withSuccess('Atualizado com sucesso!');
    }

    public function dropSector($id){
        $this->sector->find($id)->delete();
        return redirect()
        ->route('registerSector')
        ->withSuccess('Removido com sucesso!');

     }
}
