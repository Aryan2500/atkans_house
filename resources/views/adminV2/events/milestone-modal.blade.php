<!-- Add Criteria Modal -->
<div class="modal fade" id="addCriteriaModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCriteriaModalLabel">Add New </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="milestoneTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="create-tab" data-toggle="tab" href="#create"
                                    role="tab" aria-controls="create" aria-selected="true">Create Milestone</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="list-tab" data-toggle="tab" href="#list" role="tab"
                                    aria-controls="list" aria-selected="false">All Milestones</a>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content mt-3" id="milestoneTabContent">
                            <!-- Create Milestone Form -->
                            <div class="tab-pane fade show active" id="create" role="tabpanel"
                                aria-labelledby="create-tab">
                                <!-- Criteria form -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title"> Milestone</h3>
                                    </div>
                                    <!-- form start -->
                                    <form id="criteriaForm" action="{{ route('milestone.store') }}" method="POST">

                                        @csrf
                                        <div class="card-body">

                                            <!-- Rule Name -->
                                            <div class="form-group">
                                                <label for="ruleName"> Name</label>
                                                <input type="text" name="rule_name" class="form-control"
                                                    id="ruleName"
                                                    placeholder="Enter rule name (e.g. Minimum Purchase)">
                                            </div>

                                            <!-- Rule Type Dropdown -->
                                            <div class="form-group">
                                                <label for="ruleType"> Type</label>
                                                <select name="rule_type" class="form-control" id="ruleType">
                                                    <option value="">-- Select Rule Type --</option>
                                                    @foreach (config('constant.rule_types') as $key => $type)
                                                        <option value="{{ $key }}">{{ $type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Operator -->
                                            <div class="form-group">
                                                <label for="operator">Operator</label>
                                                <select name="operator" class="form-control" id="operator">
                                                    <option value="">-- Select Operator --</option>
                                                    <option value="=">= Equal To</option>
                                                    <option value=">">&gt; Greater Than</option>
                                                    <option value="<">&lt; Less Than</option>
                                                    <option value=">=">&gt;= Greater or Equal</option>
                                                    <option value="<=">&lt;= Less or Equal</option>
                                                    <option value="in">IN (List)</option>
                                                    <option value="not_in">NOT IN (List)</option>
                                                </select>
                                            </div>

                                            <!-- Value -->
                                            <div class="form-group" id="ruleNumberValue">
                                                <label for="ruleValue">Value</label>
                                                <input type="number" name="num_value" class="form-control"
                                                    placeholder="Enter value (e.g. 2000)">
                                            </div>

                                            <div class="form-group" id="ruleDateValue">
                                                <label for="ruleDateValue">Value (Date)</label>
                                                <input type="date" name="date_value" class="form-control">
                                            </div>

                                            <div class="form-group" id="ruleBooleanValue">
                                                <label for="ruleBooleanValue">Value (True / False) </label>
                                                <select name="bool_value" class="form-control">
                                                    <option value="1">True</option>
                                                    <option value="0">False</option>
                                                </select>
                                            </div>


                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Save Rule</button>
                                        </div>
                                    </form>


                                </div>
                                <!-- /.card -->
                            </div>

                            <!-- All Milestones Table -->
                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Value</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($milestones as $milestone)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $milestone->rule_name }}</td>
                                                <td>{{ $milestone->rule_type }}</td>
                                                <td>{{ $milestone->value }}</td>

                                                <td>
                                                    <form action="{{ route('milestone.destroy', $milestone->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>
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

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#ruleNumberValue').hide();
            $('#ruleDateValue').hide();
            $('#ruleBooleanValue').hide();
            $('#ruleType').change(function(e) {
                console.log(e.target.value)
                switch (e.target.value) {
                    case 'min_purchase':
                    case 'max_purchase':
                    case 'purchase_count':
                    case 'min_login_count':
                    case 'order_within_days':
                        $('#ruleNumberValue').show();
                        $('#ruleDateValue').hide();
                        $('#ruleBooleanValue').hide();
                        break;

                    case 'profile_completed':
                        $('#ruleNumberValue').hide();
                        $('#ruleDateValue').hide();
                        $('#ruleBooleanValue').show();
                        break;

                    case 'signup_before_date':
                    case 'signup_after_date':
                        $('#ruleNumberValue').hide();
                        $('#ruleDateValue').show();
                        $('#ruleBooleanValue').hide();
                        break;

                    default:
                        $('#ruleNumberValue').hide();
                        $('#ruleDateValue').hide();
                        $('#ruleBooleanValue').hide();
                        break;
                }

            })
        })
    </script>

    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {

                    // alert("Rule submitted successfully!");

                    form.submit();
                }
            });

            $('#criteriaForm').validate({
                rules: {
                    rule_name: {
                        required: true,
                        minlength: 3
                    },
                    rule_type: {
                        required: true
                    },
                    operator: {
                        required: true
                    },

                },
                messages: {
                    rule_name: {
                        required: "Please enter a rule name",
                        minlength: "Rule name must be at least 3 characters long"
                    },
                    rule_type: {
                        required: "Please select a rule type"
                    },
                    operator: {
                        required: "Please select an operator"
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
