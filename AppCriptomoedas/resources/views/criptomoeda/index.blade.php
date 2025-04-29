@extends('layout.app')
@section ('content')

<h1> Lista de Criptomoeda </h1>

<a href="{{ route('criptomoedas.create') }}" class="btn btn-primary">Cadastrar</a>

@if(count($criptos))
<table class="table">
    <thread>
        <tr>
            <th scope="col">Sigla</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Opções</th>
        <tr>
    </tread>
    <tbody>
        @foreach($criptos as $cripto)
            <tr>
                <th scope="row">{{$cripto['sigla']}}</th>
                <td>{{$cripto['nome']}}</td>
                <td>R$ {{number_format((float) $cripto['valor'], 2, ',', '.')}}</td>
                <td>
                <a href="{{ route('criptomoedas.edit',$cripto['id'])}}" class='btn btn-warning'>Editar</a>
                <form action="{{ route('criptomoedas.destroy', $cripto['id']) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Nenhuma Criptomoeda</p>
@endif
@endsection