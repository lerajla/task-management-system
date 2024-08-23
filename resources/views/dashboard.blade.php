@extends('layouts.page')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1 class="display-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="lead">This is your task management dashboard.</p>
                <hr class="my-4">
                <p>Manage your tasks efficiently and stay on top of your responsibilities.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('tasks.index') }}" role="button"><i class="fas fa-search mr-2"></i>View Tasks</a>
                <a class="btn btn-success btn-lg" href="{{ route('tasks.create') }}" role="button"><i class="fas fa-plus mr-2"></i>Create New Task</a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Example of displaying user-specific information -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Your Profile
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong>
                      @foreach (Auth::user()->roles as $role)
                            <span class="badge bg-info text-light">{{ $role->name }}</span>
                        @endforeach
                    </p>
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-warning"><i class="fas fa-edit mr-2"></i>Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Example of displaying task-related information -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Your Tasks
                </div>
                <div class="card-body">
                    <p>Total number of tasks:<strong> {{ $tasksCount }} </strong></p>
                    <p class="text-warning">PENDING:<strong> {{ $pendingTasksCount }} </strong></p>
                    <p class="text-success">COMPLETED:<strong> {{ $completedTasksCount }} </strong></p>
                    <a href="{{ route('tasks.index') }}" class="btn btn-info"> <i class="fas fa-wrench mr-2"></i>Manage Tasks</a>
                </div>
            </div>
        </div>
    </div>
@endsection
