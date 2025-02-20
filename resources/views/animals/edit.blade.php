@extends('layouts.main')

@section('title', 'Admin | Edit Animal')

@section('content')
    <main class="py-5">
        <div class="container">
            <h1>Edit Animal - {{ $animal->name }}</h1>
        </div>
    </main>
@endsection
