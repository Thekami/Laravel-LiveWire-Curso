@extends('layouts.app')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <livewire:home-component />
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection