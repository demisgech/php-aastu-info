<?php use function App\Helpers\load_view_component;

load_view_component("Layouts.header", $user);
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="<?= htmlspecialchars($user['profile_url']) ?>"
                    class="card-img-top rounded-circle mx-auto d-block mt-3" alt="Profile"
                    style="width: 150px; height: 150px; object-fit: cover;">

                <div class="card-body position-relative">
                    <h4 class="card-title text-center">
                        <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>
                    </h4>

                    <!-- UPDATE FORM (simulating PUT) -->
                    <form action="/users/<?= (int) $user['id'] ?>" method="POST" class="mt-4"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                value="<?= htmlspecialchars($user['first_name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                value="<?= htmlspecialchars($user['last_name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="<?= htmlspecialchars($user['email']) ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="profile_url" class="form-label">Profile Image URL</label>
                            <input type="file" class="form-control" name="profile_url" id="profile_url"
                                value="<?= htmlspecialchars($user['profile_url']) ?>">
                        </div>

                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-primary">Update User</button>
                                <a href="/users" class="btn btn-secondary">← Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!-- Delete Form and Button -->
                    <form id="delete-form-<?= (int) $user['id'] ?>" class="position-absolute bottom-0 end-0 me-3 mb-3"
                        action="/users/<?= $user['id'] ?>" method="POST" class="d-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal" data-form-id="delete-form-<?= $user['id'] ?>">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php load_view_component("Layouts.delete_modal"); ?>
<?php load_view_component("Layouts.footer"); ?>