@extends('layouts.app')

@section('content')
<div class="container">
    <div class="barraMenu">
        <div class="d-flex justify-content-center">
            <div class="mr-auto p-2 styleBarraPrincipalMOBILE">
                <a href="javascript: history.go(-1)" style="text-decoration:none;cursor:pointer;color:black;">
                    <div class="btn-group">
                        <div style="margin-top:1px;margin-left:5px;"><img src="{{ asset('/imagens/logo_voltar.png') }}" alt="Logo" style="width:13px;"/></div>
                        <div style="margin-top:2.4px;margin-left:10px;font-size:15px;">Voltar</div>
                    </div>
                </a>
            </div>
            <div class="mr-auto p-2 styleBarraPrincipalPC">
                <div class="form-group">
                    <div class="tituloBarraPrincipal">Programação</div>
                    <div>
                        <div style="margin-left:10px; font-size:13px;margin-top:2px; margin-bottom:-15px;color:gray;">Início > Programação</div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                {{-- <div class="dropdown" style="width:50px"> --}}
                    {{-- <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#exampleModal">Convidar agente</a>
                    </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <div class="barraMenu" style="margin-top:2rem; margin-bottom:4rem;padding:15px;">
        <div class="container" style="margin-top:1rem;">
            <div class="form-row">

                <div class="form-group col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label style="font-size:19px;margin-top:5px;margin-bottom:5px; font-family: 'Roboto', sans-serif;">INSPEÇÕES</label>
                        </div>
                        <div class="form col-md-12" style="margin-top:-10px;">
                            @if ($message = Session::get('message'))
                                <div class="alert alert-warning alert-block fade show">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            @if(count($inspecoes)>0)
                                @foreach($inspecoes as $item)
                                <table class="table table-responsive-lg table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="subtituloBarraPrincipal" style="font-size:15px; color:black; font-weight:bold; width:100%">Estabelecimento/Tipo/CNAE</th>
                                        <th scope="col" class="subtituloBarraPrincipal" style="font-size:15px; color:black; font-weight:bold; margin-right:30px;">Data</th>
                                        <th scope="col" class="subtituloBarraPrincipal" style="font-size:15px; color:black; font-weight:bold">Status</th>
                                        <th scope="col" class="subtituloBarraPrincipal" style="font-size:15px; color:black; font-weight:bold">Relatório</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="subtituloBarraPrincipal" style="font-size:15px; color:black">
                                                <div class="btn-form">
                                                    <div style="font-weight:bold;">{{$item->nomeEmpresa}}</div>
                                                    <div>{{$item->motivoInspecao}}</div>
                                                    @if ($item->motivoInspecao == "Denuncia")
                                                    <div></div>
                                                    @else
                                                    <div>{{$item->cnae}}</div>
                                                    @endif
                                                </div>
                                            </th>
                                            <th class="subtituloBarraPrincipal" style="font-size:15px; color:black">{{ date( 'd/m/Y' , strtotime($item->data))}}</th>
                                            <th class="subtituloBarraPrincipal" style="font-size:15px; color:black">{{$item->statusInspecao}}</th>
                                            <th class="subtituloBarraPrincipal" style="font-size:15px; color:black">
                                                <div class="btn-group">
                                                    @if ($item->relatorio_id == null)
                                                    <div style="margin:5px;"><a type="button" class="btn btn-warning">Não Finalizado</a></div>
                                                    @else
                                                        @if ($item->relatorio_status == "reprovado")
                                                            <div style="margin:5px;"><a href="{{ route('show.relatorio.agente.verificar', ['relatorio' => Crypt::encrypt($item->relatorio_id), 'inspecao' => Crypt::encrypt($item->inspecao_id)])}}" type="button" class="btn btn-danger">Reprovado</a></div>
                                                            {{-- <div style="margin:5px;"><a type="button" class="btn btn-danger">Reprovado</a></div> --}}
                                                        @elseif (isset($item->agente1) && $item->agente1 == "avaliacao")
                                                            <div style="margin:5px;"><a href="{{ route('show.relatorio.agente', ['relatorio' => Crypt::encrypt($item->relatorio_id), 'inspecao' => Crypt::encrypt($item->inspecao_id)])}}" type="button" class="btn btn-primary">Avaliar</a></div>
                                                        @elseif (isset($item->agente1) && $item->agente1 == "aprovado")
                                                            <div style="margin:5px;"><a href="{{ route('show.relatorio.agente.verificar', ['relatorio' => Crypt::encrypt($item->relatorio_id), 'inspecao' => Crypt::encrypt($item->inspecao_id)])}}" type="button" class="btn btn-success">Aprovado</a></div>
                                                            {{-- <div style="margin:5px;"><a type="button" class="btn btn-success">Aprovado</a></div> --}}
                                                        @elseif (isset($item->agente2) && $item->agente2 == "avaliacao")
                                                            <div style="margin:5px;"><a href="{{ route('show.relatorio.agente', ['relatorio' => Crypt::encrypt($item->relatorio_id), 'inspecao' => Crypt::encrypt($item->inspecao_id)])}}" type="button" class="btn btn-primary">Avaliar</a></div>
                                                        @elseif (isset($item->agente2) && $item->agente2 == "aprovado")
                                                            <div style="margin:5px;"><a href="{{ route('show.relatorio.agente.verificar', ['relatorio' => Crypt::encrypt($item->relatorio_id), 'inspecao' => Crypt::encrypt($item->inspecao_id)])}}" type="button" class="btn btn-success">Aprovado</a></div>                                                            
                                                            {{-- <div style="margin:5px;"><a type="button" class="btn btn-success">Aprovado</a></div> --}}
                                                        @endif
                                                    @endif
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            @else
                                <div style="margin-bottom:5rem; text-align:center; font-size:19px;"> Nenhuma inspeção programada!</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection