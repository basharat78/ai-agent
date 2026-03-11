@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
          <div class="section-header-back">
                <a href="{{ route('admin.dispatchers.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        <h1>Loads</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Loads</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Loads</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.loads.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Source</th>
                                        <th>Route</th>
                                        <th>Pickup</th>
                                        <th>Broker</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loads as $load)
                                    <tr>
                                        <td>{{ strtoupper($load->source) }}</td>
                                        <td>{{ $load->origin_city }}, {{ $load->origin_state }} <i class="fas fa-arrow-right"></i> {{ $load->destination_city }}, {{ $load->destination_state }}</td>
                                        <td>{{ $load->pickup_date->format('M d, Y') }}</td>
                                        <td>{{ $load->broker_name }}</td>
                                        <td>${{ number_format($load->rate, 2) }}</td>
                                        <td><span class="badge badge-info">{{ ucfirst($load->status) }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.loads.edit', $load->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" data-url="{{ route('admin.loads.destroy', $load->id) }}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $loads->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
