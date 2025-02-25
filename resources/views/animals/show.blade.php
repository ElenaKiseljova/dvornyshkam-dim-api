@extends('layouts.main')

@section('title', "Admin | Animal $animal->name")

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Animal Details</strong>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->name }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label">Image</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">
                        <img src="{{ $animal->image }}" class="img-thumbnail" alt="{{ $animal->name }}">
                      </p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="slug" class="col-md-3 col-form-label">Slug</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->slug }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="category" class="col-md-3 col-form-label">Category</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->category }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="gender" class="col-md-3 col-form-label">Gender</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->gender }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="birthday" class="col-md-3 col-form-label">Birthday</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->birthday }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="weight" class="col-md-3 col-form-label">Weight, kg</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->weight }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $animal->description }}</p>
                    </div>
                  </div>

                  <div class="form-group row pi-none">
                    <label for="animal_friendly" class="col-md-3 col-form-label">Animal Friendly</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted pl-4">
                        <input class="form-check-input" type="checkbox" value="" id="animal_friendly"
                          {{ $animal->animal_friendly ? 'checked' : '' }}>
                      </p>
                    </div>
                  </div>
                  <div class="form-group row pi-none">
                    <label for="vaccinated" class="col-md-3 col-form-label">Vaccinated</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted pl-4">
                        <input class="form-check-input" type="checkbox" value="" id="vaccinated"
                          {{ $animal->vaccinated ? 'checked' : '' }}>
                      </p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="images" class="col-md-3 col-form-label">Images</label>
                    <div class="col-md-9 d-flex flex-wrap">
                      @foreach (explode(', ', $animal->images) as $key => $image)
                        <div class="col-4 mb-2">
                          <img src="{{ $image }}" class="img-thumbnail" alt="{{ $animal->name }}">
                        </div>
                      @endforeach
                    </div>
                  </div>

                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                      <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-info">Edit</a>

                      @include('shared.buttons.destroy', [
                          'buttonStyle' => 'default',
                          'action' => route('animals.destroy', [
                              'animal' => $animal->id,
                              'redirect' => 'animals.index',
                          ]),
                      ])

                      <a href="{{ route('animals.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
