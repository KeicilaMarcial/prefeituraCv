@if(Auth::user()->permission==1)
@extends('layouts.blank')
@section('nav-bar')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a  href="{{ route('dashboard') }}"><i class="notika-icon notika-house"></i> Dashboard</a>
                    </li>
                    @if(Auth::user()->permission==1)
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-support"></i> Usuários</a>
                        </li>
                        <li><a  href="{{ route('registerSector') }}"><i class="notika-icon notika-app"></i>Setores</a>
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
                    
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a   href="{{route('registerSector') }}">Gerenciar Setores</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="normal-table.html">Cadastarar Escolaridade</a>
                                </li>
                                <li><a href="data-table.html">Gerenciar Esolaridades</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a  href="{{route('registerCv') }}">Cadastrar Currículo</a>
                            </li>
                            <li><a href="google-map.html">Gerenciar Currículos</a>
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

<div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="basic-tb-hd">
                                    <h2>Cadastrar Novo Usúario </h2>
                        </div>    
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form  method="POST"action="{{ action('UserController@storeUser')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="inputEmail4">Nome</label>
                                                <input type="text"  name="name" class="form-control" id="inputEmail4" placeholder="Nome" required>
                                            </div>
                                       
                                            <div class="form-group col-md-5">
                                                        <label for="inputPassword4">Setor</label>
                                                        <select class="form-control" name="sector_id" id="exampleFormControlSelect1">
                                                            @foreach($sectors as $s)
                                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                                            @endforeach
                                                        </select>
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label for="inputPassword4">Login</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ex:PrimeiroNome.UltimoNome@pmsm.com"name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label for="inputPassword4">Senha</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite  sua senha"name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        
                                             </div>
                                        </div>
                                          
                                        <div class="form-row">                                         
                                            <div class="form-group col-md-5">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Permissão
                                                </label>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio"name="permission" id="flexRadioDefault1" value="{{0}}"checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Comum
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="permission" id="flexRadioDefault2" value="{{1}}">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Administrador
                                                </label>
                                            </div>
                                            
                                            </div> 
                                            <div class="form-group col-md-5">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Status
                                                </label>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio"  name="status"  id="flexRadioDefault1" value="{{1}}"checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Ativo
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio"  name="status"  id="flexRadioDefault2" value="{{0}}">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Inativo
                                                </label>
                                            
                                            </div>

                                 </div>
                                 <div class="form-row">                                         
                                            <div class="form-group col-md-5">
                                            <button type="submit" class="btn btn-primary" >Cadastrar</button>     
                                            </div>
                                  </div>   
                                       
                              </form>
                        </div>
                    </dev>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
@endif