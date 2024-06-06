<div class="d-flex">
    @can('report-show')
        <a href="{{ route('reports.show', $id) }}" class="show btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-eye"></i>
        </a>
     @endcan

     @can('report-edit')
        <a href="{{ route('reports.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
     @can('report-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     @endcan
</div>
