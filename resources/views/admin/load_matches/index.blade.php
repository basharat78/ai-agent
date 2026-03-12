@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>AI Load Matches</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Load Matches</div>
        </div>
    </div>
    
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Proposed Matches
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
   <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Score</th>
                                        <th>Truck</th>
                                        <th>Load (Route)</th>
                                        <th>Equipment</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matches as $match)
                                    <tr>
                                        <td>
                                            <div class="badge @if($match->match_score >= 90) badge-success @elseif($match->match_score >= 80) badge-primary @else badge-info @endif">
                                                {{ $match->match_score }}%
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $match->truck->truck_number }}</strong><br>
                                            <small>{{ $match->truck->current_location }}</small>
                                        </td>
                                        <td>
                                            <span class="text-primary">{{ $match->loadDetails->origin_city }}, {{ $match->loadDetails->origin_state }}</span>
                                            <i class="fas fa-arrow-right mx-1"></i>
                                            <span class="text-success">{{ $match->loadDetails->destination_city }}, {{ $match->loadDetails->destination_state }}</span>
                                        </td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $match->loadDetails->equipment_type)) }}</td>
                                        <td>${{ number_format($match->loadDetails->rate, 2) }}</td>
                                        <td>
                                            @if($match->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($match->status == 'confirmed')
                                                <span class="badge badge-success">Accepted</span>
                                            @else
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#reasonModal{{ $match->id }}"><i class="fas fa-info-circle"></i> AI Reason</a>
                                                    <form action="{{ route('admin.load_matches.update_status', $match->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="confirmed">
                                                        <button type="submit" class="dropdown-item has-icon"><i class="fas fa-check"></i> Accept</button>
                                                    </form>
                                                    <form action="{{ route('admin.load_matches.update_status', $match->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="rejected">
                                                        <button type="submit" class="dropdown-item has-icon"><i class="fas fa-times"></i> Reject</button>
                                                    </form>
                                                    <a class="dropdown-item has-icon delete-item" href="javascript:void(0)" data-url="{{ route('admin.load_matches.destroy', $match->id) }}"><i class="fas fa-trash"></i> Delete</a>
                                                </div>
                                            </div>

                                            <!-- Reason Modal -->
                                            <div class="modal fade" id="reasonModal{{ $match->id }}" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel{{ $match->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="reasonModalLabel{{ $match->id }}">AI Analysis: Truck {{ $match->truck->truck_number }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ $match->match_reason }}</p>
                                                        </div>
        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
             </div>
                        <div class="mt-4">
                            {{ $matches->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    </section>
@endsection