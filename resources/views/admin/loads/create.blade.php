@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
          <div class="section-header-back">
                <a href="{{ route('admin.dispatchers.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        <h1>Create Load</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.loads.index') }}">Loads</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Load Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.loads.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Source</label>
                                        <input type="text" name="source" class="form-control" placeholder="e.g. DAT, Truckstop" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>External ID</label>
                                        <input type="text" name="external_id" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Broker Name</label>
                                        <input type="text" name="broker_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Broker Phone</label>
                                        <input type="text" name="broker_phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Broker Email</label>
                                        <input type="email" name="broker_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Origin City</label>
                                        <input type="text" name="origin_city" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Origin State</label>
                                        <input type="text" name="origin_state" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Dest City</label>
                                        <input type="text" name="destination_city" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Dest State</label>
                                        <input type="text" name="destination_state" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pickup Date</label>
                                        <input type="date" name="pickup_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Equipment Type</label>
                                        <input type="text" name="equipment_type" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Weight (lbs)</label>
                                        <input type="number" name="weight" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rate ($)</label>
                                        <input type="number" step="0.01" name="rate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="fetched">Fetched</option>
                                            <option value="matched">Matched</option>
                                            <option value="calling">Calling</option>
                                            <option value="confirmed">Confirmed</option>
                                            <option value="rejected">Rejected</option>
                                            <option value="expired">Expired</option>
                                        </select>
                                    </div>
                                </div>
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
