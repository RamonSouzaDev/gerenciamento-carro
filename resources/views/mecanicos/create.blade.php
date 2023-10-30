@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Mecânico</h1>
    <form method="post" action="{{ route('mecanicos.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="mb-3">
            <label for="especialidade">Especialidade:</label>
            <select class="form-control" id="especialidade" name="especialidade">
                @foreach(\App\Enums\EspecialidadeEnum::labels() as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="telefone">Telefone:</label>
            <input type="tel" class="form-control" id="telefone" name="telefone">
        </div>
        <div class="mb-3">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ route('mecanicos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
</div>
@endsection
