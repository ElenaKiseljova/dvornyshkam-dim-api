@if ($message = session('message'))
  <div class="alert alert-success">
    {{ $message }}

    @if ($undoRoute = session('undoRoute'))
      <form action="{{ $undoRoute }}" method="POST" class="d-inline">
        @csrf
        @method('delete')

        <button class="btn alert-link">Undo</button>
      </form>
    @endif
  </div>
@endif
