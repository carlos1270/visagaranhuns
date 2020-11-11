@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row justify-content-center" style="margin-bottom:3.5rem; margin-top:1.5rem">
        <div class="cardDashboard">
            <div class="container">
                <div class="form-row">
                    <div class="col-12" style="margin-bottom:0.5rem;">
                        <img src="{{ asset('/imagens/logo_predio.png') }}" alt="Logo" style="width:17px; height:20px; margin-top:-5px; margin-right:5px;"/>
                        <label class="cardDashboard_titulo">Estabelecimentos</label>
                    </div>
                    <div class="col-12" style="font-size:13.5px; margin-bottom:-0.4rem">
                        <ul style="margin-left:-5px; height:225px; width:175px;overflow: auto;">
                            @foreach($empresas as $item)
                                <li>
                                <a href="{{ route('empresa',["empresa" => Crypt::encrypt($item->empresa_id)]) }}" style="text-decoration:none;">{{$item->empresa->nome}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12" style="height:20px; text-align:right;">
                        {{-- @if(count($empresas) >= 8)
                            <a href="{{ route('listar.empresas', ['user' => Crypt::encrypt(Auth::user()->id), 'tipo' => 'estabelecimentos']) }}" style="text-decoration:none;">Ver todos</a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="cardDashboard">
            <div class="container">
                <div class="form-row">
                    <div class="col-12" style="margin-bottom:0.5rem;">
                        <img src="{{ asset('/imagens/logo_papel.png') }}" alt="Logo" style="width:17px; height:20px; margin-top:-5px; margin-right:5px;"/>
                        <label class="cardDashboard_titulo">Licenças</label>
                    </div>
                    <div class="cardDashboard_titulo" style="text-align:center; width:100%; margin-top:30%; font-size:60px">0</div>
                    {{-- <div class="col-12" style="font-size:13.5px">Inspeções para <span style="font-weight:bold">setembro:</span></div>
                    <div class="col-12" style="margin-top:rem;font-size:50px;text-align:center;font-weight:lighter;font-family:monospace;color:gray">09</div>
                    <div class="col-12" style="font-size:13.5px">Inspeções para <span style="font-weight:bold">outubro:</span></div>
                    <div class="col-12" style="margin-top:rem;font-size:50px;text-align:center;font-weight:lighter;font-family:monospace;color:gray">02</div> --}}
                </div>
            </div>
        </div>

        <div class="cardDashboard">
            <div class="container">
                <div class="form-row">
                    <div class="col-12" style="margin-bottom:0.5rem;">
                        <img src="{{ asset('/imagens/logo_papel.png') }}" alt="Logo" style="width:17px; height:20px; margin-top:-5px; margin-right:5px;"/>
                        <label class="cardDashboard_titulo">Documentação</label>
                    </div>
                    <div class="col-12">
                        <label class="cardDashboard_titulo" style="text-align:center; width:100%; font-size:13.2px">Documentos Pendentes</label>
                        <div class="form-group">
                            <div class="cardDashboard_titulo" style="text-align:center; width:100%; font-size:20px">{{$anexados}}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="cardDashboard_titulo" style="text-align:center; width:100%; font-size:13.2px">Documentos Anexados</label>
                        <div class="form-group">
                            <div class="cardDashboard_titulo" style="text-align:center; width:100%; font-size:20px">{{$pendentes}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cardDashboard">
            <div class="container">
                <div class="form-row">
                    <div class="col-12" style="margin-bottom:0.5rem;">
                        <img src="{{ asset('/imagens/logo_megafone.png') }}" alt="Logo" style="width:17px; height:20px; margin-top:-5px; margin-right:5px;"/>
                        <label class="cardDashboard_titulo">Avisos</label>
                    </div>
                    <div class="cardDashboard_titulo" style="text-align:center; width:100%; margin-top:30%; font-size:60px">0</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
