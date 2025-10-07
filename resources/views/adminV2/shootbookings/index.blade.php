@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Photoshoot Bookings</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                @include('adminV2.partials.alerts')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Package</th>
                                    <th>Shoot Date</th>
                                    <th>Addons</th>
                                    <th>Notes</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->package->name }} | INR {{ $booking->package->price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->shoot_date)->format('d M Y') }}</td>
                                        <td>
                                            @if (!empty($booking->add_ons))
                                                <ul style="padding-left: 16px;">
                                                    @foreach ($booking->add_ons as $addon)
                                                        <li>{{ $addon }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $booking->notes ?? '—' }}</td>
                                        <td>{{ $booking->created_at->format('d M Y') }}</td>
                                        <td>
                                            {{-- Optional view/edit/delete buttons --}}
                                            {{-- <a href="#" class="btn btn-sm btn-primary" title="View"><i class="fa fa-eye"></i></a> --}}
                                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this booking?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- No "Add" button needed for bookings --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card Data-->
@endsection

@push('scripts')
    <script>
        initDataTable('#example', 'Photoshoot-Bookings');
    </script>
@endpush
