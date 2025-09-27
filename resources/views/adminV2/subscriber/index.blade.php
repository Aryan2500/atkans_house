@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Newsletter/Event Subscribers</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Subscribers</li>
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
                        <table id="subscribersTable" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Subscribed On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $index => $subscriber)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $subscriber->email }}</td>

                                        <td>{{ $subscriber->created_at->format('d M Y') }}</td>
                                        <td>
                                            <form action="{{ route('subscribers.destroy', $subscriber->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this subscriber?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card Data-->
@endsection

@push('scripts')
    <script>
        initDataTable('#subscribersTable', 'Subscribers');
    </script>
@endpush
