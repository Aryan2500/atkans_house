<!-- Add Criteria Modal -->
<div class="modal fade" id="addCriteriaModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCriteriaModalLabel">Add New Criteria</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    @csrf

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="criteria_name" class="form-label">Criteria Name</label>
                            <input type="text" name="criteria_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="criteria_description" class="form-label">Description</label>
                            <textarea name="criteria_description" class="form-control" rows="2"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Criteria</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
