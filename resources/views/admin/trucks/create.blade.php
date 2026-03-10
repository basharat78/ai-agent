@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Create Truck</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.trucks.index') }}">Trucks</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Truck Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.trucks.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Dispatcher</label>
                                <select name="dispatcher_id" class="form-control select2" required>
                                    <option value="">Select Dispatcher</option>
                                    @foreach ($dispatchers as $dispatcher)
                                    <option value="{{ $dispatcher->id }}">{{ $dispatcher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Truck Number</label>
                                        <input type="text" name="truck_number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Driver Name</label>
                                        <input type="text" name="driver_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Driver Phone</label>
                                        <input type="text" name="driver_phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Equipment Type</label>
                                        <select name="equipment_type" class="form-control">
                                            <option value="dry_van">Dry Van</option>
                                            <option value="flatbed">Flatbed</option>
                                            <option value="reefer">Reefer</option>
                                            <option value="step_deck">Step Deck</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Max Weight (lbs)</label>
                                        <input type="number" name="max_weight" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Available From</label>
                                        <input type="datetime-local" name="available_from" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Current Location</label>
                                <input type="text" name="current_location" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Accessories</label>
                                <select name="accessories[]" class="form-control select2" multiple>
                                    @foreach ($accessories as $accessory)
                                    <option value="{{ $accessory->id }}">{{ $accessory->name }}</option>
                                    @endforeach
                                </select>
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
