<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</button>
            </div>

        </div>
    </div>
</div>

<script>
    let targetFormId = null;

    // Capture the form ID when the modal opens
    document.getElementById('confirmDeleteModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        targetFormId = button.getAttribute('data-form-id');
    });

    // When "Yes, Delete" is clicked, submit the correct form
    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (targetFormId) {
            document.getElementById(targetFormId).submit();
        }
    });
</script>