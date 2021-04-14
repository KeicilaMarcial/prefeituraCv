<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Request\CvRequest;
use App\Http\Controllers\age;
use Illuminate\Support\Facades\File; 
use App\Cv;
use App\Schooling;
use App\User;
use Auth;
use DB;
use Image;
use Input;
class CvController extends Controller
{
    private $cv;

	public function __construct(CV $cv){
		$this->cv = $cv;
	}
    public function registerCv(){
        $cvs =CV::all();
        $schooling = DB::table('schoolings')
        ->orderBy('level','asc')
        ->get();
        return view('registerCV',compact('cvs'),compact('schooling'));
    }
    public function storeCv(Request $request)
    {  
        $extension = Input::file('file')->getClientOriginalExtension();
        if($extension!='pdf'){
            return redirect()
            ->back()
            ->with('danger', 'Extensão Invalida! Sómente aceitos arquivos.pdf')
            ->withInput();
        }
        $filename = rand(11111111, 99999999). '.' . $extension;
        Input::file('file')->move(
          base_path().'/public/files/cv/', $filename
        );
        $fullPath = '/public/files/cv/' . $filename;
        $upload = new Cv(array(
            'name' => $request['name'],
            'format' => $extension,
            'path' => $fullPath,
        ));
        if ( !$upload ){
            return redirect()
                        ->back()
                        ->with('danger', 'Falha ao fazer upload')
                        ->withInput();
        }
        $this->cv->create(
            [
                'name'          => $request->name,
                'gender'        => $request->gender,
                'profession'    => $request->profession,
                'file'          => $filename,
                'status'        => $request->status,
                'phoneNumber'   =>$request->phoneNumber,
                'user_id'       =>$request->user_id,
                'schooling_id'  => $request->schooling_id,
            ]
        );
           
    
       
        return redirect()
        ->route('registerCv')
        ->withSuccess('Cadastro realizado com sucesso!');

        
    }
    public function manageCvs(){
        $cvs = DB::table('cvs')
        ->orderBy('name','asc')
        ->get();
        $schooling = DB::table('schoolings')->get();
        //dd($schooling);
        return view('manageCvs',compact('cvs'),compact('schooling'));
    }

    public function updateCv($id,$user_id, Request $request){
        
         if(!empty($request->file)){ 
                $extension = Input::file('file')->getClientOriginalExtension();
                if($extension!='pdf'){
                    return redirect()
                    ->back()
                    ->with('danger', 'Extensão Invalida! Sómente aceitos arquivos.pdf')
                    ->withInput();
                }
                $filename = rand(11111111, 99999999). '.' . $extension;
                Input::file('file')->move(
                base_path().'/public/files/cv/', $filename
                );
                    $fullPath = '/public/files/cv/' . $filename;
                    $upload = new Cv(array(
                        'name' => $request['name'],
                        'format' => $extension,
                        'path' => $fullPath,
                    ));
                if ( !$upload ){
                    return redirect()
                                ->back()
                                ->with('danger', 'Falha ao fazer upload')
                                ->withInput();
                }
         
         //dd($request->all());
        $this->cv->find($id)->update(
            
            [
                'name'          => $request->name,
                'gender'        => $request->gender,
                'profession'    => $request->profession,
                'file'          => $filename,
                'status'        => $request->status,
                'phoneNumber'   =>$request->phoneNumber,
                'user_id'       =>$user_id,
                'schooling_id'  => $request->schooling_id,

            ]);
         return redirect()
         ->route('manageCvs')
         ->withSuccess('Atualizado com sucesso!');
        }else{

            $this->cv->find($id)->update(
            
                [
                    'name'          => $request->name,
                    'gender'        => $request->gender,
                    'profession'    => $request->profession,
                    'status'        => $request->status,
                    'phoneNumber'   =>$request->phoneNumber,
                    'user_id'       =>$user_id,
                    'schooling_id'  => $request->schooling_id,
    
                ]);
                return redirect()
         ->route('manageCvs')
         ->withSuccess('Atualizado com sucesso!');

        }
    }
    public function destroyCv($id,$filename)
    {
        //dd($filename);
        $file_path = public_path().'/files/cv/'.$filename;
        unlink($file_path);
        Cv::destroy($id); 
            return redirect('/manageCvs')->with('success','Aquivo apagado com sucesso'); 
    }
   

  public function filtroDataCv(Request $request){
    
        if(!isset($request->data_ini) || !isset($request->data_ini)) return redirect()->route('manageCvs')->with('error','Selecione um intervalo');
        if(isset($request->data_ini)) $datainicio = date('Y-m-d 00:00:00',strtotime($request->data_ini));
        else $datainicio = date('Y-m-d 00:00:00');

        if(isset($request->data_fim)) $dataFim = date('Y-m-d 23:59:59',strtotime($request->data_fim));
        else $dataFim = date('Y-m-d 23:59:59');

        if(isset($request->data_ini) && isset($request->data_fim)){
        $curriculos = DB::table('cvs')->whereBetween('created_at',[$datainicio,$dataFim])->orWhereBetween('updated_at',[$datainicio,$dataFim])->get();
        $schooling = DB::table('schoolings')->get();
        return view('pageFiltroData',compact('curriculos'),compact('schooling'));
        }
    }

    public function pageFiltroData(){
        return('pageFiltroData');
    }
   
}
