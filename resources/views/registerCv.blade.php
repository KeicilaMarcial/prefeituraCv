@extends('layouts.blank')
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
<div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="basic-tb-hd">
                                    <h2>Cadastrar Novo Currículo </h2>
                        </div>    
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form  method="POST" action="{{ action('CvController@storeCv')}}"enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Nome</label>
                                                <input type="text"  name="name" class="form-control" id="inputEmail4" placeholder="Nome" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Celular</label>
                                                <input type="text"  name="phoneNumber"  placeholder="(xx)x xxxxxxxxx" class="form-control" id="phoneNumber" placeholder="Password" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Profissão</label>
                                                <input type="text"  name="profession" class="form-control" id="inputEmail4" placeholder="Profissão" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Escolaridade</label>
                                                <select class="form-control" name="schooling_id" id="exampleFormControlSelect1">
                                                    @foreach($schooling as $s)
                                                        <option value="{{$s->id}}">{{$s->level}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
    <div class="form-group col-md-2">
    <label for="inputEmail4">Gênero</label><br>

        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="{{0}}" >
        <label class="form-check-label" for="exampleRadios1">Masculino</label> <br>                                                
        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="{{1}}" >
        <label class="form-check-label" for="exampleRadios1">Feminino</label><br>
        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="{{2}}" checked>
        <label class="form-check-label" for="exampleRadios1">Outro</label><br>

    </div>
        <div class="form-group col-md-4">
                    <label for="inputEmail4">Status</label><br>                                           
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="{{0}}" >
                    <label class="form-check-label" for="exampleRadios1">Arquivado</label><br>
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="{{1}}" checked >
                    <label class="form-check-label" for="exampleRadios1">Ativo</label>                    
        </div>
    </div>
    <div class="form-group col-md-5">
        <label for="exampleFormControlFile1">Arquivo</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" required>                      
                                          
    </div>
    <div class="form-row">                                         
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary" >Cadastrar</button>     
        </div>
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
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#phoneNumber").mask("(00) 0000-00009");
    </script>
        
@endsection