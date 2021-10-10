@forelse ($productos as $item)
<tr>
    <td>{{ $item->nombre }}</td>
    <td>
        @if ($item->status == "ACTIVO")
            <span class="badge badge-success">{{ $item->status }}</span>
        @else
            <span class="badge badge-danger">{{ $item->status }}</span>
        @endif
    </td>
    <td>{{ $item->created_at }}</td>
    <td>{{ $item->updated_at }}</td>
    <td><img src="{{ \Storage::disk('local')->url($item->imagen) }}" alt="{{ $item->nombre }}" width="50"></td>
    <td>
        <div class="d-flex">
            <button type="button" class="btn btn-warning mr-2" data-id=""><i class="far fa-edit"></i></button>
            <button type="button" class="btn btn-danger mr-2 deleteBtn" data-id="{{ $item->id }}" data-name="{{ $item->nombre }}">
                <i class="far fa-trash-alt"></i>
            </button>
        </div>
    </td>
</tr>
@empty
    <tr>
        <td colspan="6" class="text-center font-weight-bold">No hay registros</td>
    </tr>
@endforelse