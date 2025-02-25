@extends('layouts.main')

@section('title', 'Admin | Edit animal')

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Edit animal</strong>
            </div>
            <div class="card-body">
              <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                @include('animals._form')

                @method('put')
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
