
@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Trucks</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Trucks</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Trucks</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.trucks.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Truck #</th>
                                        <th>Driver</th>
                                        <th>Dispatcher</th>
                                        <th>Equipment</th>
                                        <th>Accessories</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trucks as $truck)
                                    <tr>
                                        <td>{{ $truck->truck_number }}</td>
                                        <td>{{ $truck->driver_name }}</td>
                                        <td>{{ $truck->dispatcher->name }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $truck->equipment_type)) }}</td>
                                        {{-- <td>
                                            @foreach ($truck->accessories as $accessory)
                                            <span class="badge badge-info">{{ $accessory->name }}</span>
                                            @endforeach
                                        </td> --}}
                                        <td><span class="badge badge-primary">{{ ucfirst($truck->status) }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.trucks.edit', $truck->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" data-url="{{ route('admin.trucks.destroy', $truck->id) }}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $trucks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
