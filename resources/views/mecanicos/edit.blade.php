@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Mecânico</h1>
    <form method="post" action="{{ route('mecanicos.update', $mecanico->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $mecanico->nome }}">
        </div>
        <div class="form-group">
            <label for="especialidade">Especialidade:</label>
            <select class="form-control" id="especialidade" name="especialidade">
                @foreach(\App\Enums\EspecialidadeEnum::labels() as $value => $label)
                    <option value="{{ $value }}" @if($mecanico->especialidade === $value) selected @endif>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mecanico->email }}">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" value="{{ $mecanico->telefone }}">
        </div>
        <div class="mb-3">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $mecanico->endereco }}">
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{ route('mecanicos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
</div>
@endsection
