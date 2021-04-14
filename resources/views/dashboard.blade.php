@extends('layouts.blank')
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
                        </div> @if(Auth::user()->permission==1)
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
@section('cards')
<div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="email-statis-inner notika-shadow">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
								<h2  style="text-align:center">Estatistica  dos Currículos por  Gênero</h2>
							</div>
                            <div class="email-statis-wrap">
                                <div class="email-round-nock">
                                    <input type="text" class="knob" value="0" data-rel="{{$countT}}" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true">
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="email-round-gp">
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="{{$countM}}" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Masculino</p>
                                    </div>
                                </div>
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="{{$countF}}" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Feminino</p>
                                    </div>
                                </div>
                                <div class="email-round-pro sm-res-ds-n lg-res-mg-bl">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="{{$countO}}" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Outro</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2 style="text-align:center">Currículos em Números</h2>
                                </div>
                            </div>
                           
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                                <div class="website-traffic-ctn">
                                    <h2><span class="counter">{{$countT}}</span></h2>
                                    <p>Currículos Cadastrados</p>
                                </div>
                                <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">{{$countAti}}</span></h2>
                            <p>Currículos Ativos</p>
                        </div>
                        <div class="sparkline-bar-stats2">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">{{$countIna}}</span></h2>
                            <p> Curriculos Inativos</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                
            </div>
        </div>         
                    </div>
                </div>
            </div>
                        
                     
               
               
<div class="row">
               
@endsection
@section('container1')


             
@endsection
<!--



