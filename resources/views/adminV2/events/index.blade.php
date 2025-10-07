@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Events</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Events</li>
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
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Dates</th>
                                    <th>Registered</th>
                                    <th>status</th>
                                    <th>Notified To All</th>
                                    <th>Created</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $index => $event)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                                            –
                                            {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                                        </td>
                                        <td>{{ $event->total_registered }}+</td>

                                        <td>{{ $event->event_stage }}</td>
                                        <td>{{ $event->has_notified ? 'Yes' : 'No' }}</td>
                                        <td>{{ $event->created_at->format('d M Y') }}</td>
                                        <td>
                                            {{-- <a href="{{ route('event.show', $event->id) }}" class="btn btn-sm btn-primary"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a> --}}

                                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-info"
                                                title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <form action="{{ route('event.destroy', $event->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this event?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('event.create') }}" class="btn btn-success">
                                + Add New Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END: Card Data-->
@endsection

@push('scripts')
    <script>
        initDataTable('#example', 'Events');
    </script>
@endpush
