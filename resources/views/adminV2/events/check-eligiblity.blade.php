@extends('adminV2.master')

@section('styles')
    <style>
        .tab-content {
            background: #fff;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 20px;
            border-radius: 0 0 .375rem .375rem;
        }

        .milestone-status {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            padding: 15px;
            margin-bottom: 15px;
            transition: box-shadow 0.3s ease;
        }

        .milestone-status:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .info-card {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            padding: 20px;
            background: #f8f9fa;
            margin-bottom: 20px;
        }

        .info-title {
            font-weight: 600;
            color: #007bff;
            font-size: 1.1rem;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff !important;
            border-color: #007bff #007bff #fff;
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Eligibility Check</h4>
                    <small class="text-muted">Review eligibility status for each milestone</small>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Eligibility Check</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="col-12">

        @include('adminV2.partials.alerts')

        <div class="card card-primary">

            <div class="card-header">
                <h4 class="card-title">Check Eligibility </h4>
            </div>
            <div class="card-body">

                <!-- User and Event Info -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-title mb-2">User Information</div>
                            <p><strong>Name:</strong> {{ $user->name ?? 'John Doe' }}</p>
                            <p><strong>Email:</strong> {{ $user->email ?? 'johndoe@example.com' }}</p>
                            <p><strong>Gender:</strong> {{ $user->gender ?? 'Male' }}</p>
                            <p><strong>Role:</strong> {{ ucfirst($user->role ?? 'Model') }}</p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#sendEmailModal">
                                <i class="fa fa-envelope"></i> Send Email
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-title mb-2">Event Information</div>
                            <p><strong>Event Name:</strong> {{ $event->title ?? 'Fashion Show 2025' }}</p>
                            <p><strong>Type:</strong> {{ $event->type ?? 'Model Hunt' }}</p>
                            <p><strong>Date:</strong>
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') ?? '15 Oct 2025' }}
                                -
                                {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') ?? '15 Oct 2025' }}
                            </p>

                            <p><strong> Criteria To Participate:</strong>
                                <span
                                    class="badge badge-info">{{ $event->milestone ? $event->milestone->rule_name . '|' . $event->milestone->rule_type . ' ' . $event->milestone->operator . $event->milestone->value : 'N/A' }}</span>
                            </p>

                            <p><strong>Status:</strong>
                                <span class="badge badge-info">{{ $event->status ?? 'Running' }}</span>
                            </p>


                        </div>
                    </div>
                </div>

                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="eligibilityTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="milestone1-tab" data-toggle="tab" href="#milestone1"
                            role="tab">Profile Completion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="milestone2-tab" data-toggle="tab" href="#milestone2"
                            role="tab">Purchase</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="milestone3-tab" data-toggle="tab" href="#milestone3" role="tab">Login
                            Counts</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="eligibilityTabsContent">
                    <!-- Milestone 1 -->
                    <div class="tab-pane fade show active" id="milestone1" role="tabpanel">
                        <h5 class="mb-3"> Profile Completion</h5>
                        <div class="milestone-status">
                            <p><strong>Status:</strong>
                                @php
                                    // dd($user->modelProfile);
                                @endphp
                                <span class="status-badge status-{{ $user->modelProfile == null || !$user->modelProfile->is_profile_completed ? 'rejected' : 'approved' }}">
                                    @if ($user->modelProfile == null || !$user->modelProfile->is_profile_completed)
                                        {{ 'Profile not completed' }}
                                    @elseif ($user->modelProfile->is_profile_completed)
                                        {{ 'Profile completed' }}
                                    @endif

                                </span>
                            </p>
                            <p><strong>Remarks:</strong> {{ $user->name }} has completed their Profile details
                                successfully.</p>
                        </div>
                    </div>

                    <!-- Milestone 2 -->
                    <div class="tab-pane fade" id="milestone2" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Purchase</h5>
                            <form action="{{ route('participants.eligiblity') }}" method="GET" class="form-inline">
                                <input type="hidden" name="active_tab" value="milestone2"> <!-- 👈 hidden input -->
                                <input type="hidden" name="user_id" value={{ $user->id }}> <!-- 👈 hidden input -->
                                <input type="hidden" name="event_id" value={{ $event->id }}> <!-- 👈 hidden input -->


                                <div class="form-group mr-2">
                                    <label for="from_date" class="mr-2">From:</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control"
                                        value="{{ request('from_date') }}">
                                </div>
                                <div class="form-group mr-2">
                                    <label for="to_date" class="mr-2">To:</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control"
                                        value="{{ request('to_date') }}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                            </form>
                        </div>

                        <div class="milestone-status mt-3">
                            <p>
                                <strong>Total Orders :</strong> <span
                                    class="status-badge status-pending"><b>{{ $filteredOrders ? $filteredOrders->count() : '00' }}</b></span>
                                &nbsp;&nbsp;
                                <strong>Paid Orders :</strong>
                                <span
                                    class="status-badge status-approved"><b>{{ $filteredOrders ? $filteredOrders->where('payment_status', 'paid')->count() : '00' }}</b></span>
                                &nbsp;&nbsp;

                                <strong>Unpaid Orders :</strong> <span
                                    class="status-badge status-rejected"><b>{{ $filteredOrders ? $filteredOrders->where('payment_status', 'pending')->count() : '00' }}</b></span>
                            </p>
                            <p>
                                <strong> Total Order Value :</strong> <span class="status-badge status-pending"><b> INR
                                        {{ $filteredOrders ? $filteredOrders->sum('total') : '00' }}</b></span>
                                &nbsp;&nbsp;

                                <strong> Paid Order Value :</strong> <span class="status-badge status-approved"><b>
                                        INR
                                        {{ $filteredOrders ? $filteredOrders->where('payment_status', 'paid')->sum('total') : '00' }}</b></span>&nbsp;&nbsp;

                                <strong> UnPaid Order Value :</strong> <span class="status-badge status-rejected"><b>
                                        INR
                                        {{ $filteredOrders ? $filteredOrders->where('payment_status', 'pending')->sum('total') : '00' }}</b></span>&nbsp;&nbsp;
                            </p>

                        </div>

                        {{-- Optional: You can list filtered results here --}}
                        @isset($filteredOrders)
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Payment Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($filteredOrders as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($purchase->created_at)->format('d M Y') }}</td>
                                            <td>
                                                @if ($purchase->payment_status == 'paid')
                                                    <span class="badge badge-success">Paid</span>
                                                @elseif($purchase->payment_status == 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($purchase->payment_status == 'failed')
                                                    <span class="badge badge-danger">Failed</span>
                                                @else
                                                    <span
                                                        class="badge badge-secondary">{{ ucfirst($purchase->payment_status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $purchase->total }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No purchases found in this date range.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endisset

                    </div>

                    <!-- Milestone 3 -->
                    <div class="tab-pane fade" id="milestone3" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Login Counts</h5>
                            <form action="{{ route('participants.eligiblity') }}" method="GET" class="form-inline">
                                <input type="hidden" name="active_tab" value="milestone3"> <!-- 👈 hidden input -->
                                <input type="hidden" name="user_id" value={{ $user->id }}> <!-- 👈 hidden input -->
                                <input type="hidden" name="event_id" value={{ $event->id }}> <!-- 👈 hidden input -->


                                <div class="form-group mr-2">
                                    <label for="from_date" class="mr-2">From:</label>
                                    <input type="date" name="lfrom_date" id="from_date" class="form-control"
                                        value="{{ request('lfrom_date') }}">
                                </div>
                                <div class="form-group mr-2">
                                    <label for="to_date" class="mr-2">To:</label>
                                    <input type="date" name="lto_date" id="to_date" class="form-control"
                                        value="{{ request('lto_date') }}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                            </form>
                        </div>

                        <div class="milestone-status mt-3">
                            <p>
                                <strong>Total Login :</strong> <span
                                    class="status-badge status-pending"><b>{{ $filterLoginCounts ? $filterLoginCounts->count() : '00' }}</b></span>
                                &nbsp;&nbsp;
                            </p>

                        </div>

                        {{-- Optional: You can list filtered results here --}}
                        @isset($filterLoginCounts)
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Login At</th>
                                        <th>IP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($filterLoginCounts as $purchase)
                                        <tr>

                                            <td>{{ \Carbon\Carbon::parse($purchase->created_at)->format('d M Y') }}</td>
                                            <td>
                                                {{ $purchase->ip_address }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No purchases found in this date range.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endisset
                    </div>


                </div>

            </div>
        </div>
    </div>


    <!-- Email Modal -->
    <div class="modal   fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="sendEmailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl   modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="sendEmailModalLabel">Send Email</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('send-milestone-email') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient">Recipient Email</label>
                            <input type="email" class="form-control" id="recipient" name="recipient"
                                placeholder="Enter recipient email" required value="{{ $user->email }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Enter email subject" required value="Milestone not accomplished">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="20" placeholder="Type your message..."
                                required>
Event Name: {{ $event->title ?? 'Fashion Show 2025' }}
Type: {{ $event->type ?? 'Model Hunt' }}
Date:  {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') ?? '15 Oct 2025' }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') ?? '15 Oct 2025' }}
Criteria To Participate: {{ $event->milestone ? $event->milestone->rule_name . ' | ' . $event->milestone->rule_type . ' ' . $event->milestone->operator . ' ' . $event->milestone->value : 'N/A' }}
Status: {{ $event->status ?? 'Running' }}
                            </textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Email</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            // Read which tab should be active from the query parameter or old request
            var activeTab = "{{ request('active_tab') ?? '' }}";

            if (activeTab) {
                // Deactivate all tabs
                $('.nav-tabs a').removeClass('active');
                $('.tab-pane').removeClass('show active');

                // Activate the correct one
                $('#' + activeTab + '-tab').addClass('active');
                $('#' + activeTab).addClass('show active');
            }

            // Store tab id in hidden input when switching manually
            $('.nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                var target = $(e.target).attr("href").substring(1); // e.g., milestone2
                $('input[name="active_tab"]').val(target);
            });
        });
    </script>
@endpush
