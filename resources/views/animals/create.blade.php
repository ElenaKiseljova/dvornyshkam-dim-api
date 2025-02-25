@extends('layouts.main')

@section('title', 'Admin | Add new animal')

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New animal</strong>
            </div>
            <div class="card-body">
              <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
                @include('animals._form')

                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
