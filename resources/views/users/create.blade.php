@extends('layouts.page')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-primary">Create new user</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('users.store') }}" method="POST">
             @csrf
             <div class="mb-3">
                 <label for="name" class="form-label">Name</label>
                 <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
             </div>
             <div class="mb-3">
                 <label for="email" class="form-label">Email</label>
                 <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
             </div>
             <div class="mb-3">
                 <label for="password" class="form-label">Password</label>
                 <input type="password" class="form-control" id="password" name="password" required>
             </div>
             <div class="mb-3">
                 <label for="password_confirmation" class="form-label">Confirm Password</label>
                 <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
             </div>
             <div class="mb-3">
                  <label for="roles" class="form-label">Roles</label>
                  <select name="roles[]" id="roles" class="form-select form-control" multiple required>
                      @foreach ($roles as $role)
                          <option value="{{ $role->name }}" {{ isset($user) && $user->hasRole($role->name) ? 'selected' : '' }}>
                              {{ ucfirst($role->name) }}
                          </option>
                      @endforeach
                  </select>
              </div>
             <button type="submit" class="btn btn-primary float-right">
               <i class="fas fa-save mr-2"></i>
               Create User</button>
         </form>
        </div>
    </div>

</div>

@endsection
