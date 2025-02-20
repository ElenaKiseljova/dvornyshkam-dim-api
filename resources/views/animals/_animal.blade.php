<tr>
    <th scope="row">{{ $animals->firstItem() + $index }}</th>
    <td>{{ $animal->name }}</td>
    {{-- <td>{{ $animal->last_name }}</td>
    <td>{{ $animal->email }}</td>
    <td>{{ $animal->company->name }}</td> --}}
    {{-- <td>{{ optional($animal->company)->name }}</td> --}}
    <td width="150">
        @if ($showTrashButtons)
            @include('shared.buttons.restore', [
                'action' => route('animals.restore', $animal->id),
            ])

            @include('shared.buttons.force-delete', [
                'action' => route('animals.force-delete', $animal->id),
            ])
        @else
            <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-sm btn-circle btn-outline-info"
                title="Show"><i class="fa fa-eye"></i></a>
            <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-circle btn-outline-secondary"
                title="Edit"><i class="fa fa-edit"></i></a>

            @include('shared.buttons.destroy', [
                'action' => route('animals.destroy', $animal->id),
            ])
        @endif
    </td>
</tr>
