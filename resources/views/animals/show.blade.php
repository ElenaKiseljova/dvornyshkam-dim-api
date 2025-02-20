@extends('layouts.main')

@section('title', 'Admin | Show Animal')

@section('content')
    <main class="py-5">
        <div class="container">
            <h1>Show Animal - {{ $animal->name }}</h1>
        </div>
    </main>
@endsection
