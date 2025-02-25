<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label for="name" class="col-md-3 col-form-label">Name</label>
      <div class="col-md-9">
        <input type="text" name="name" value="{{ old('name', $animal->name) }}" id="name"
          class="form-control @error('name') is-invalid @enderror">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="slug" class="col-md-3 col-form-label">Image</label>
      <div class="col-md-9">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
            <img src="{{ $animal->image }}" alt="{{ $animal->name }}">
          </div>
          <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 150px; max-height: 150px;">
          </div>
          <div class="mt-2">
            <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">
                Select image
              </span>
              <span class="fileinput-exists">Change</span>
              <input type="file" name="image" value="{{ old('image', $animal->image) }}" accept="image/*">
            </span>
            <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
        </div>

        <p class="d-none form-control @error('image') is-invalid @enderror" />
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="slug" class="col-md-3 col-form-label">Slug</label>
      <div class="col-md-9">
        <input type="text" name="slug" value="{{ old('slug', $animal->slug) }}" id="slug"
          class="form-control @error('slug') is-invalid @enderror">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="category" class="col-md-3 col-form-label">Category</label>
      <div class="col-md-9">
        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
          <option value="">Select Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category }}" @selected($category == old('category', $animal->category))>
              {{ $category }}
            </option>
          @endforeach
        </select>
        @error('category')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="gender" class="col-md-3 col-form-label">Gender</label>
      <div class="col-md-9">
        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
          <option value="">Select gender</option>
          @foreach ($genders as $gender)
            <option value="{{ $gender }}" @selected($gender == old('gender', $animal->gender))>
              {{ $gender }}
            </option>
          @endforeach
        </select>
        @error('gender')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="birthday" class="col-md-3 col-form-label">Birthday</label>
      <div class="col-md-9">
        <input type="date" name="birthday" value="{{ old('birthday', $animal->birthday) }}" id="birthday"
          class="form-control @error('birthday') is-invalid @enderror">
        @error('birthday')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="weight" class="col-md-3 col-form-label">Weight, kg</label>
      <div class="col-md-9">
        <input type="number" step="0.1" min="0.1" name="weight" value="{{ old('weight', $animal->weight) }}"
          id="weight" class="form-control @error('weight') is-invalid @enderror">
        @error('weight')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="description" class="col-md-3 col-form-label">Description</label>
      <div class="col-md-9">
        <textarea name="description" id="description" rows="3"
          class="form-control @error('description') is-invalid @enderror">{{ old('description', $animal->description) }}</textarea>
        @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="animal_friendly" class="col-md-3 col-form-label">Animal Friendly</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted px-4 pb-4 ">
          <input type="hidden" name="animal_friendly" value="0">
          <input class="form-check-input" type="checkbox" id="animal_friendly" name="animal_friendly"
            value="1" {{ old('animal_friendly', $animal->animal_friendly) ? 'checked' : '' }}>
        </p>
        <p class="d-none form-control @error('animal_friendly') is-invalid @enderror" />
        @error('animal_friendly')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="vaccinated" class="col-md-3 col-form-label">Vaccinated</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted px-4 pb-4 ">
          <input type="hidden" name="vaccinated" value="0">
          <input class="form-check-input" type="checkbox" id="vaccinated" name="vaccinated" value="1"
            {{ old('vaccinated', $animal->vaccinated) ? 'checked' : '' }}>
        </p>
        <p class="d-none form-control @error('vaccinated') is-invalid @enderror" />
        @error('vaccinated')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    {{-- <div class="form-group row">
      <label for="slug" class="col-md-3 col-form-label">Images</label>
      <div class="col-md-9">

        @php
          $images = explode(', ', $animal->images);

          $rowCount = 4;
          $colCount = 3;
        @endphp

        @foreach (range(0, $rowCount - 1) as $row)
          <div class="row mb-3">
            @foreach (range(0, $colCount - 1) as $col)
              @php
                $index = $colCount * $row + $col;
                $image = isset($images[$index]) ? $images[$index] : asset('storage/placeholder-image.jpg');
              @endphp
              <div class="col-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                    <img src="{{ $image }}" alt="{{ $animal->name }}">
                  </div>
                  <div class="fileinput-preview fileinput-exists img-thumbnail"
                    style="max-width: 150px; max-height: 150px;">
                  </div>
                  <div class="mt-2">
                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">
                        Select image
                      </span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="images[{{ $index }}]"
                        value="{{ old("images[{$index}]", $image) }}" accept="image/*">
                    </span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists"
                      data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach

        <p class="d-none form-control @error('images') is-invalid @enderror" />
        @error('images')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div> --}}

    <hr>
    <div class="form-group row mb-0">
      <div class="col-md-9 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $animal->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('animals.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </div>
  </div>
</div>

@push('styles')
  <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endpush
