@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
         <div class="section-header-back">
                <a href="{{ route('admin.dispatchers.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        <h1>Create Dispatcher</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.dispatchers.index') }}">Dispatchers</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dispatcher Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.dispatchers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="dispatcher">Dispatcher</option>
                                    <option value="team_lead">Team Lead</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>OpenPhone Number</label>
                                <input type="text" name="openphone_number" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
