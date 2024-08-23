@extends('layouts.page')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-primary">Task list</h6>
            </div>
            <div class="col-6 text-right">
              <a class="btn btn-info" href="{{ route('tasks.create') }}">
                <i class="fas fa-plus mr-2"></i>
                New task
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tasks-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <th>Assigned to</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($tasks as $key => $task)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td class="text-center">
                              @if($task->is_completed)
                                <i class="fas fa-check text-success"></i>
                              @else
                                <i class="fas fa-times text-danger"></i>
                              @endif
                            </td>
                            <td>{{ $task->user->name }}</td>
                            <td>
                              <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit mr-2"></i>Edit
                              </a>
                              <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash mr-2"></i>Delete
                                  </button>
                              </form>
                              @if (!$task->is_completed)
                                  <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('PATCH')
                                      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check mr-2"></i>Mark as Done</button>
                                  </form>
                              @endif
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
    $('#tasks-table').DataTable({
      dom: '<"top"<"d-flex justify-content-between"<l><f>>>t<"bottom"<"d-flex justify-content-between"<i><p>>>',
    });
  });
</script>
@endsection
