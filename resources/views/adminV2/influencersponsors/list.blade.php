@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Influencer Sponsorships</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Influencers</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                @include('admin.partials.alerts')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="influencerTable" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Instagram</th>
                                    <th>Followers</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Interested Product</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($influencers as $index => $influencer)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $influencer->name }}</td>
                                        <td>
                                            @if ($influencer->instagram_profile)
                                                <a href="{{ $influencer->instagram_profile }}" target="_blank">
                                                    View Profile
                                                </a>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($influencer->followers ?? 0) }}</td>
                                        <td>{{ $influencer->email ?? 'N/A' }}</td>
                                        <td>{{ $influencer->phone ?? 'N/A' }}</td>
                                        <td>{{ $influencer->interested_product ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge badge-{{ $influencer->status ? 'success' : 'secondary' }}">
                                                {{ $influencer->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $influencer->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('influencers.edit', $influencer->id) }}"
                                                class="btn btn-sm btn-warning mt-1">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <form action="{{ route('influencers.destroy', $influencer->id) }}"
                                                method="POST" style="display:inline-block;" class="mt-1">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this influencer?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Optional: Add Button to Create New Influencer --}}
                        {{-- <div class="mt-3">
                            <a href="{{ route('influencers.create') }}" class="btn btn-success">
                                + Add New Influencer
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
@endsection

@push('scripts')
    <script>
        initDataTable('#influencerTable', 'Influencers');
    </script>
@endpush
