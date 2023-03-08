@extends('layouts.app')

@section('title')
<title>Eventos</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <livewire:eventos-component />
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/eventos.js')
@endsection