@extends('layouts.page')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-primary">Users list</h6>
            </div>
            <div class="col-6 text-right">
              <a class="btn btn-info" href="{{ route('users.create') }}">
                <i class="fas fa-plus mr-2"></i>
                New user
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              @foreach ($user->roles as $role)
                                    <span class="badge bg-info text-light">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit mr-2"></i>Edit
                              </a>
                              <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
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
    $('#users-table').DataTable({
      dom: '<"top"<"d-flex justify-content-between"<l><f>>>t<"bottom"<"d-flex justify-content-between"<i><p>>>',
    });
  });
</script>
@endsection
