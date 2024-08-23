@extends('layouts.page')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-primary">Create new role</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('roles.store') }}" method="POST">
               @csrf
               <div class="mb-3">
                   <label for="name" class="form-label">Role Name</label>
                   <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
               </div>
               <button type="submit" class="btn btn-primary float-right">
                 <i class="fas fa-save mr-2"></i>
                 Create Role</button>
           </form>
        </div>
    </div>

</div>

@endsection
