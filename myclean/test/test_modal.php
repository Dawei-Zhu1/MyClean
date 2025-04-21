<?php
include_once 'includes/head.php';
?>
<!-- Trigger button (example) -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#passwordConfirmModal">
    Proceed with Sensitive Operation
</button>

<!-- Password Confirmation Modal -->
<div class="modal fade" id="passwordConfirmModal" tabindex="-1" aria-labelledby="passwordConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="confirm_password.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordConfirmModalLabel">Confirm Your Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please enter your password to continue.</p>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
