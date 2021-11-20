<h3>Fornecedor</h3>

{{-- Comentário --}}
@php
    /*
        if () {

    } else if () {

    }*/
@endphp



@for($i=0;isset($fornecedores[$i]);$i++)
    @{{$fornecedores[$i]['nome']}} Escapear <br/>
    Fornecedor: {{$fornecedores[$i]['nome']}}
    <br/>
    Status: {{$fornecedores[$i]['status']}}
    <br/>
    CNPJ: {{$fornecedores[$i]['CNPJ'] ?? 'Dado não preenchido'}}
    <br/>
    @if ($fornecedores[$i]['status'] == 'N')
        Fornecedor inativo
    @endif
    <br/>
    @unless($fornecedores[$i]['status']=='S')
        Fornecedor inativo
    @endunless
    <br/>
    <br/>
    @switch($fornecedores[1]['ddd'])
        @case('55')
        RS
        @break
        @case('57')
        Outro
        @break

    @endswitch
@endfor
<br/>
<br/>
@foreach($fornecedores as $indice => $fornecedor)
    Fornecedor: {{$fornecedor['nome']}}
    <br/>
    Status: {{$fornecedor['status']}}
    <br/>
    CNPJ: {{$fornecedore['CNPJ'] ?? 'Dado não preenchido'}}
    <br/>
    @if ($fornecedor['status'] == 'N')
        Fornecedor inativo
    @endif

@endforeach

<br/>
<br/>
@forelse($fornecedores as $indice => $fornecedor)
    <br/>
    Iteração atual: {{$loop->iteration}} <br/>
    Fornecedor: {{$fornecedor['nome']}}
    <br/>
    Status: {{$fornecedor['status']}}
    <br/>
    CNPJ: {{$fornecedore['CNPJ'] ?? 'Dado não preenchido'}}
    <br/>
    @if ($fornecedor['status'] == 'N')
        Fornecedor inativo
    @endif
    @if($loop->first)
        Primeira iteração
    @endif
    @if($loop->last)
        Última iteração
        Total de registros: {{$loop->count}}
    @endif
@empty
    Não existem fornecedores cadastrados

@endforelse

