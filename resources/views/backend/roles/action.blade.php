<div class="d-flex">
    @can('role-edit')
        <a href="{{ route('roles.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('role-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
    @endcan
</div>
