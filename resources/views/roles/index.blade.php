@extends('layouts.page')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-primary">Roles list</h6>
            </div>
            <div class="col-6 text-right">
              <a class="btn btn-info" href="{{ route('roles.create') }}">
                <i class="fas fa-plus mr-2"></i>
                New role
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="roles-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                              <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit mr-2"></i>Edit
                              </a>
                              <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash mr-2"></i>Delete
                                  </button>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('pageScripts')

<script>
  // Call the dataTables jQuery plugin
  $(document).ready(function() {
    $('#roles-table').DataTable({
      dom: '<"top"<"d-flex justify-content-between"<l><f>>>t<"bottom"<"d-flex justify-content-between"<i><p>>>',
    });
  });
</script>
@endsection
