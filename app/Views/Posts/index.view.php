<?php

use function App\Helpers\load_view_component;
use function App\Helpers\showErrorMessage;

load_view_component("Layouts.header", $posts);

?>

<div class="container py-4">
    <!-- Post Composer -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="/posts" method="POST">
                <div class="d-flex align-items-start gap-3">
                    <!-- Profile Image -->
                    <img src="<?= $_SESSION['user']['profile_url'] ?? "/assets/images/noImage.png" ?>" alt="Profile"
                        class="rounded-circle" style="width: 64px; height: 64px; object-fit: cover;">

                    <!-- Input Section -->
                    <div class="flex-grow-1">
                        <input type="text" class="form-control mb-2" name="title" placeholder="Post title...">
                        <?= showErrorMessage('title') ?>
                        <textarea class="form-control mb-2" name="content" rows="2" placeholder="What's on your mind?"
                            required></textarea>
                        <?= showErrorMessage('content') ?>
                        <input type="text" class="form-control mb-2" name="image_url"
                            placeholder="(Optional) image URL">
                        <?= showErrorMessage('image_url') ?>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Posts Feed -->
    <?php foreach ($posts as $post): ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="row g-3">
                    <!-- Left: User Info -->
                    <div class="col-md-2 text-center">
                        <img src="<?= $post['profile_url'] ?? '/assets/images/noImage.png' ?>" class="rounded-circle mb-2"
                            alt="Profile" style="width: 64px; height: 64px; object-fit: cover;">
                        <h6 class="mb-0"><?= htmlspecialchars($post['first_name'] . ' ' . $post['last_name']) ?></h6>
                        <small class="text-muted"><?= date('M j, Y g:i a', strtotime($post['published_at'])) ?></small>
                    </div>

                    <!-- Right: Post Content -->
                    <div class="col-md-10">
                        <p class="mb-2"><?= nl2br(htmlspecialchars($post['title'])) ?></p>
                        <p class="mb-2 text-muted"><?= nl2br(htmlspecialchars($post['content'])) ?></p>

                        <?php if (!empty($post['image_url'])): ?>
                            <div class="mb-3">
                                <img src="<?= $post['image_url'] ?? "/assets/images/noImage.png" ?>"
                                    class="img-fluid rounded border" alt="Post image"
                                    style="max-height: 400px; object-fit: contain;">
                            </div>
                        <?php endif; ?>

                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-hand-thumbs-up"></i> Like
                            </button>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-chat-dots"></i> Comment
                            </button>

                            <!-- Optional: Only show for the user who owns the post -->
                            <?php if ($post['user_id'] === $_SESSION['user']['id']): ?>
                                <!-- Edit Button -->
                                <a href="/posts/<?= $post['post_id'] ?>" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <!-- Delete Form and Button -->
                                <form id="delete-form-<?= $post['post_id'] ?>" action="/posts/<?= $post['post_id'] ?>"
                                    method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal" data-form-id="delete-form-<?= $post['post_id'] ?>">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php load_view_component("Layouts.delete_modal") ?>
<?php load_view_component("Layouts.footer") ?>