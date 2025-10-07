@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Sponsorships</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Sponsorships</li>
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
                                    <th>Brand</th>
                                    <th>Contact Person</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Package</th>
                                    <th>Budget</th>
                                    <th>Home Page Visiblity</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sponsorships as $index => $sponsorship)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sponsorship->brand_name }}</td>
                                        <td>{{ $sponsorship->contact_name }}</td>
                                        <td>{{ $sponsorship->contact_number }}</td>
                                        <td>{{ $sponsorship->email }}</td>
                                        <td>{{ $sponsorship->package->name }} </td>
                                        <td>{{ $sponsorship->budget_range ?? 'N/A' }}</td>
                                        <td>{{ $sponsorship->show_on_home_page ? 'Yes' : 'No' ?? 'N/A' }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $sponsorship->status == 'approved' ? 'success' : ($sponsorship->status == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($sponsorship->status ?? 'Pending') }}
                                            </span>
                                        </td>
                                        <td>{{ $sponsorship->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('sponsership.show', $sponsorship->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <br>

                                            <a class="m-2" href="{{ route('sponsership.edit', $sponsorship->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <br>

                                            <form action="{{ route('sponsership.destroy', $sponsorship->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this sponsorship?')">
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
    <!-- END: Card DATA-->
@endsection

@push('scripts')
    <script>
        initDataTable('#example', 'Sponsorships');
    </script>
@endpush
