@if(Auth::user()->permission==1)
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
                        <li><a href="{{route('registerSector') }}"><i class="notika-icon notika-app"></i>Setores</a>
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
    <!-- Data Table area Start-->
 <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Gerênciar Usuários</h2>
                          </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>login</th>
                                        <th>status</th>
                                        <th>Setor</th>
                                        <th>Editar</th>
                                        <th> Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        @if($u->status==1)
                                        <td>
                                            Ativo
                                       </td>
                                        @else
                                        <td>Inativo</td>
                                        @endif 
                                        @foreach($sectors as $s)
                                            @if($s->id== $u->sector_id)
                                            <td>
                                                {{$s->name}}
                                            </td>
                                            @endif
                                        @endforeach
                                         <td> <a href="#exampleModalLive{{$u->id}}" data-toggle="modal"><i class="notika-icon notika-edit"></i></a></td>
                                         @if($u->id ==Auth::user()->id)
                                         <td></td>
                                         @else
                                            <td><a href="{{route('dropUser',['id'=>$u->id])}}" onclick="return confirm('Deseja realmente realizar essa ação?')"><i class="notika-icon notika-trash"></i></a></td>
                                        @endif
                                       </td>
                                    </tr>  
                                    <div id="exampleModalLive{{$u->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
							            <div class="modal-dialog" role="document">
								            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Editar Dados</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                            {!! Form::open(['route'=>['updateUser','id'=>$u->id]]) !!} 
                                           
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome</label>
                                                        {!! Form::text('name',$u->name,['class'=>'form-control','required'=>'required'])!!}         
                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Login</label>
                                                    {!! Form::email('email',$u->email,['class'=>'form-control','required'=>'required'])!!}         
                                            
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Setor</label>
                                                    <select class="form-control" name="sector_id" id="exampleFormControlSelect1">
                                                        @foreach($sectors as $s)
                                                           
                                                            <option value="{{ $s->id }}" {{ ( $s->id == $u->sector_id) ? 'selected' : '' }}> {{ $s->name }} </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            @if(!($u->id==Auth::user()->id))
                                                <div class="form-group">
                                                    <fieldset class="form-group" id="group1">
                                                        <div class="row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Permissão</label>
                                                            <div class="col-sm-3">
                                                            @if($u->permission==0)
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="permission" id="gridRadios2" value="{{0}}"checked >
                                                                    <label class="form-check-label" for="gridRadios2" >Comum</label>
                                                            </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="permission" id="gridRadios1" value="{{1}}">
                                                                    <label class="form-check-label" for="gridRadios1">Administrador</label>
                                                                </div>
                                                            
                                                            </div>
                                                            @else
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="permission" id="gridRadios2" value="{{0}}">
                                                                    <label class="form-check-label" for="gridRadios2" >Comum</label>
                                                            </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="permission" id="gridRadios1" value="{{1}}"checked >
                                                                    <label class="form-check-label" for="gridRadios1">Administrador</label>
                                                                </div>
                                                            
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </fieldset> 
                                                </div>
                                                <div class="form-group">
                                                    <fieldset class="form-group" id="2">
                                                        <div class="row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                                                            <div class="col-sm-3">
                                                            @if($u->status==1)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{1}}"checked >
                                                                    <label class="form-check-label" for="gridRadios1">Ativo</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{0}}">
                                                                    <label class="form-check-label" for="gridRadios2">Inativo</label>
                                                                </div>
                                                            @else
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{1}}" >
                                                                    <label class="form-check-label" for="gridRadios1">Ativo</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{0}}"checked>
                                                                    <label class="form-check-label" for="gridRadios2">Inativo</label>
                                                                </div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </fieldset> 
                                                   <!-- <button type="submit" class="btn  btn-primary">Salvar</button>-->
                                                     </div>
                                                @endif
                                                <div class="modal-footer">
                                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn  btn-primary">Salvar Mudanças </button>
                                                </div>
								            </div>
                                             {!! Form::close() !!}
                                    </div>
                                   
                                <!--</form>-->
                              
                                             
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
                                        <th>Login</th>
                                        <th>status</th>
                                        <th>Setor</th>
                                        <th>Editar</th>
                                        <th> Excluir</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

  
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
@endif