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
                    <li class="active"><a  href="{{ route('dashboard') }}"><i class="notika-icon notika-house"></i> Dashboard</a>
                    </li>
                    @if(Auth::user()->permission==1)
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-support"></i> Usuários</a>
                        </li>
                        <li><a  href="{{route('registerSector') }}"><i class="notika-icon notika-app"></i>Setores</a>
                        </li>
                        <li><a href="{{ route('registerSchooling') }}"><i class="notika-icon notika-edit"></i> Escolaridade</a>
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
                            <li><a  href="{{route('registerCv') }}">Cadastrar Currículo</a>
                            </li>
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
<div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <a href="#exampleModalLiveStore" data-toggle="modal"> <img src="{{asset('style/assets/img/new.png')}}" width="40" height="40" alt=""/></a>
                                       
  Novo nível de Escolariade
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="exampleModalLiveStore" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
							            <div class="modal-dialog" role="document">
								            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Novo nível de escolariade</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="{{ action('SchoolingController@storeSchooling')}}">
                                                     @csrf
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Nivel de Escolariade</label>
                                                        <input type="text" class="form-control" id="exampleInputText" placeholder="Nívle de escolaridade" name="level" value="{{ old('level') }}" required autocomplete="name" autofocus> 
                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn  btn-primary">Cadastrar </button>
                                                </div>   </form>

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
                            <h2>Gerênciar Setores</h2>
                          </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Editar</th>
                                        <th> Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($schoolings as $s)
                                        <td>{{$s->level}}</td>
                                        <td> <a href="#exampleModalLive{{$s->id}}" data-toggle="modal"><i class="notika-icon notika-edit"></i></a></td>
                                        <td><a href="{{route('dropSchooling',['id'=>$s->id])}}" onclick="return confirm('Deseja realmente realizar essa ação?')"><i class="notika-icon notika-trash"></i></a></td>
                                      </td>
                                    </tr>
                                            
                                    <div id="exampleModalLive{{$s->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
							            <div class="modal-dialog" role="document">
								            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Editar Dados</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                        {!! Form::open(['route'=>['updateSchooling','id'=>$s->id]]) !!} 
                                                            <div class="form-group">
                                                                    <label for="exampleInputEmail1">Nível de escolaridade</label>
                                                                    {!! Form::text('level',$s->level,['class'=>'form-control','required'=>'required'])!!}         
                                                        
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="btn  btn-primary">Salvar Mudanças </button>
                                                            </div>
                                                        {!! Form::close() !!}
                                                </div>
                                               
								            </div>
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