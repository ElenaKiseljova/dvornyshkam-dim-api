<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col">
                <a href="{{ request()->fullUrlWithQuery(['trash' => false, 'page' => 1]) }}"
                    class="btn {{ !request()->query('trash') ? 'text-primary' : 'text-secondary' }}">All</a>
                |
                <a href="{{ request()->fullUrlWithQuery(['trash' => true, 'page' => 1]) }}"
                    class="btn {{ request()->query('trash') ? 'text-primary' : 'text-secondary' }}">Trash</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        {{-- <form>
      <input type="hidden" name="trash" value="{{ request()->query('trash') }}">
      <div class="row">
        <div class="col">

          @isset($filterDropdown)
            @includeIf($filterDropdown)
          @endisset

        </div>
        <div class="col">
          <div class="input-group mb-3">
            <input type="text" name="search" value="{{ request()->query('search') }}" id="search-input"
              class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
            <div class="input-group-append">
              @if (request()->filled('search') || request()->filled('company_id'))
                <button class="btn btn-outline-secondary" type="button" id="reset-button">
                  <i class="fa fa-refresh"></i>
                </button>
              @endif

              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form> --}}
    </div>
</div>

@push('scripts')
    {{-- <script>
    const resetButton = document.querySelector('#reset-button');

    if (resetButton) {
      const form = resetButton.closest('form');

      if (form) {
        const searchInput = form.querySelector('#search-input');
        const selects = form.querySelectorAll('select');

        resetButton.addEventListener('click', () => {
          searchInput.value = '';

          selects.forEach((select) => {
            select.selectedIndex = 0;
          });

          form.submit();
        })
      }
    }
  </script> --}}
@endpush
