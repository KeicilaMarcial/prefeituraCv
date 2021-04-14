@extends('layouts.blank')
@section('head')
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/jquery.dataTables.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/style.css')}}">
    <!-- responsive CSS
		============================================ -->
@endsection
@section('nav-bar')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a href="{{ route('dashboard') }}"><i class="notika-icon notika-house"></i> Dashboard</a>
                    </li>
                    @if(Auth::user()->permission==1)
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-support"></i> Usuários</a>
                        </li>
                        <li><a  href="{{route('registerSector') }}"><i class="notika-icon notika-app"></i>Setores</a>
                        </li>
                        <li><a  href="{{ route('registerSchooling') }}"><i class="notika-icon notika-edit"></i> Escolaridade</a>
                        </li>
                    @endif
                    <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-form"></i>Curriculos</a>
                    </li>
                </ul>
               
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                        </div>
                        @if(Auth::user()->permission==1)
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a  href="{{ route('registerUser') }}">Cadastrar Usuário</a>
                                </li>
                                <li><a href="{{ route('manageUsers') }}">Gerenciar Usuários</a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    
                       
                    @endif
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <!--<li><a  href="{{route('registerCv') }}">Cadastrar Currículo</a>
                            </li>-->
                            <li><a href="{{route('manageCvs') }}">Gerenciar Currículos</a>
                            </li>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div>
@endsection

@section('container1')
@if (session('danger'))
    <div class="alert alert-danger alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        {{ session('danger') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        {{ session('success') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        {{ session('warning') }}
    </div>
@endif
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <a href="#exampleModalLiveStore" data-toggle="modal"> <img src="{{asset('style/assets/img/new.png')}}" width="40" height="40" alt=""/></a>
                                       
                           Filtro por data
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="exampleModalLiveStore" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
							            <div class="modal-dialog" role="document">
								            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Filtrar currículos por data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="row">
                                                                    <form action="{{route('filtroDataCv')}}" method="POST">
                                                                        {{csrf_field()}}
                                                                        <div class="col-md-4 col-sm-8 col-xs-7">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Data Inicial</label>
                                                                                <div class="form-line">
                                                                                    <input type="date" class="form-control" name="data_ini">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-8 col-xs-7">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Data Final</label>
                                                                                <div class="form-line">
                                                                                    <input type="date" class="form-control" name="data_fim">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn  btn-primary">Filtrar </button>
                                                                    </div>        
                                                                </form>
                                                        </div>
						                        </div>
					                        </div>
				                        </div>
			                        </div>    <br>  

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Gerênciar Currículos</h2>
                          </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Profissão</th>
                                        <th>Celular</th>
                                        <th>Gênero</th>
                                        <th>Escolaridade</th>
                                        <th>Status</th>
                                        <th>Arquivo</th>
                                        <th>Data de Criação</th>
                                        <th>Editar</th>
                                        <th> Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($curriculos as $c)
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->profession}}</td>
                                        <td>{{$c->phoneNumber}}</td>
                                        @if($c->gender==0)
                                            <td>Masculino</td>
                                        @elseif($c->gender==1)
                                            <td>Feminino</td>
                                        @elseif($c->gender==2)
                                            <td>Não identidicado</td>
                                        @endif
                                        @foreach($schooling as $s)
                                            @if($s->id== $c->schooling_id)
                                            <td>
                                                {{$s->level}}
                                            </td>
                                            @endif
                                        @endforeach
                                        @if($c->status==0)
                                            <td> Arquivado</td>
                                        @else
                                        <td>Ativo</td>
                                        @endif
                                        <td>
                                        @php
                                            if ($c->file)
                                            $pathArquivo = url("files/cv/{$c->file}");
                                        @endphp
                                        <a href="{{ $pathArquivo }}" target="_blank">
                                        <img src="{{asset('style/assets/img/pdf_icon.png')}}" width="20" height="20" alt=""/>
                                        </td>
                                        <td> {{ date( 'd/m/Y' , strtotime($c->created_at))}}</td>
                                        <td> <a href="#exampleModalLive{{$c->id}}" data-toggle="modal"><i class="notika-icon notika-edit"></i></a></td>
                                        <td><a href="{{route('destroyCv',['id'=>$c->id,'filename'=>$c->file])}}" onclick="return confirm('Deseja realmente realizar essa ação?')"><i class="notika-icon notika-trash"></i></a></td>
                                       </td>
                                    </tr>
                                    <div id="exampleModalLive{{$c->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
							            <div class="modal-dialog" role="document">
								            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Editar Dados</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                            {!! Form::open(['route'=>['updateCv','id'=>$c->id,'user_id'=>$c->user_id], "enctype"=>"multipart/form-data"]) !!} 
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome</label>
                                                        {!! Form::text('name',$c->name,['class'=>'form-control','required'=>'required'])!!}         
                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Profissão</label>
                                                    {!! Form::text('profession',$c->profession,['class'=>'form-control','required'=>'required'])!!}         
                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Celular</label>
                                                    {!! Form::text('phoneNumber',$c->phoneNumber,['class'=>'form-control','id'=>'phoneNumber','required'=>'required'])!!}         
                                            
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Escolaridade</label>
                                                    <select class="form-control" name="schooling_id" id="exampleFormControlSelect1">
                                                        @foreach($schooling as $s)
                                                        <option value="{{ $s->id }}" {{ ( $s->id == $c->schooling_id) ? 'selected' : '' }}> {{ $s->level }} </option>

                                                           <!-- @if($s->id == $c->schooling_id)
                                                            <option value="{{$s->id}}">{{$s->level}}</option>
                                                            @endif-->
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                        <label for="exampleFormControlFile1">Arquivo</label>
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">                      
                                                    </div>
                                                    <div class="form-group">
                                                    <fieldset class="form-group" id="2">
                                                        <div class="row">
                                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-5">
                                                            @if($c->status==1)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{1}}"checked >
                                                                    <label class="form-check-label" for="gridRadios1">Ativo</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{0}}">
                                                                    <label class="form-check-label" for="gridRadios2">Arquivado</label>
                                                                </div>
                                                            @else
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{1}}" >
                                                                    <label class="form-check-label" for="gridRadios1">Ativo</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{0}}"checked>
                                                                    <label class="form-check-label" for="gridRadios2">Arquivado</label>
                                                                </div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </fieldset> 
                                                </div>
                                                <div class="form-group">
                                                    <fieldset class="form-group" id="2">
                                                        <div class="row">
                                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Gênero</label>
                                                            <div class="col-sm-9">
                                                            @if($c->gender==0)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="{{0}}"checked >
                                                                    <label class="form-check-label" for="gridRadios1">Masculino</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="{{1}}">
                                                                    <label class="form-check-label" for="gridRadios2">Feminino</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="{{2}}">
                                                                    <label class="form-check-label" for="gridRadios2">Outro</label>
                                                                </div>
                                                            @elseif($c->gender==1)
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="{{0}}" >
                                                                    <label class="form-check-label" for="gridRadios1">Masculino</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="{{1}}"checked>
                                                                    <label class="form-check-label" for="gridRadios2">Feminino</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="{{2}}">
                                                                    <label class="form-check-label" for="gridRadios2">Outro</label>
                                                                </div>
                                                                @elseif($c->gender==2)
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="{{0}}" >
                                                                    <label class="form-check-label" for="gridRadios1">Masculino</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="{{1}}">
                                                                    <label class="form-check-label" for="gridRadios2">Feminino</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="{{2}}"checked>
                                                                    <label class="form-check-label" for="gridRadios2">Outro</label>
                                                                </div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </fieldset> 
                                                </div>
                                             
                                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                             {!! Form::close() !!}
                                    </div>
                                   
                                </form>
                              
							            </div>
						            </div>
						</div>
				</div>
			</div>        
                                   @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Profissão</th>
                                        <th>Celular</th>
                                        <th>Gênero</th>
                                        <th>Escolaridade date</th>
                                        <th>Status</th>
                                        <th>Arquivo</th>
                                        <th>Editar</th>
                                        <th> Excluir</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
@endsection
@section('script')
    <!-- jquery
		============================================ -->
    <script src="{{asset('style/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('style/assets/js/plugins.js')}}"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="{{asset('style/assets/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('style/assets/js/data-table/data-table-act.js')}}"></script>
    <!-- main JS
		============================================ -->
    <!-- Mascara celular ----------------------------->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $("#phoneNumber").mask("(00) 0000-00009");
        </script>
    <!--- --------------------------------------->
@endsection

