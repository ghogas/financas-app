@extends('app')

@section('conteudo')
<div class="p-5">
    <h2 class="text-lg text-bold">
        Nova entrada
    </h2>
    <form id="frm-nova-entrada" method="post" action="{{route('store')}}">
        @csrf
        <label for="descricao">Descrição</label><br>
        <textarea class="border" name="descricao" id="descricao" cols="60" rows="5" required>
        </textarea>
        <p class="mt-5">Tipo:</p>
        <input type="radio" name="tipo" value="Receita" required> Receita
        <input class="ms-5" type="radio" name="tipo" value="Despesa" required> Despesa

        <p class="mt-5">
            <label for="valor">Valor:</label><br>
            <input type="number" class="border" name="valor" step="0.01" required>
        </p>

        <p class="mt-5">
            <input type="submit" class="border rounded-lg p-3 bg-teal-200" value="Enviar">
        </p>

    </form>
</div>
@endsection