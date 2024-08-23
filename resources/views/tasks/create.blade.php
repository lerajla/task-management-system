@extends('layouts.page')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-primary">Create new task</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('tasks.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description"></textarea>
              </div>
              <div class="mb-3">
                <label for="user_id" class="form-label">Assign to</label>
                <select class="form-select form-control" id="user_id" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ isset($task) && $task->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save mr-2"></i>Save</button>
          </form>
        </div>
    </div>

</div>

@endsection
