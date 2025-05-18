<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header", $post);

?>

<div class="container py-5" style="height:50vh;">
    <!-- Post Composer -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="/posts/<?= $post['id'] ?>" method="POST">
                <input type="hidden" name="_method" id="<?= $post['id'] ?>" value="PUT">
                <div class="d-flex align-items-start gap-3">
                    <!-- Profile Image -->
                    <img src="/assets/images/noImage.png" alt="Profile" class="rounded-circle"
                        style="width: 64px; height: 64px; object-fit: cover;">

                    <!-- Input Section -->
                    <div class="flex-grow-1">
                        <input type="text" class="form-control mb-2" name="title" placeholder="Post title..."
                            value="<?= $post['title'] ?>">
                        <textarea class="form-control mb-2" name="content" rows="2" placeholder="What's on your mind?"
                            required><?= $post['content'] ?></textarea>
                        <input type="text" class="form-control mb-2" name="image_url"
                            placeholder="(Optional) image URL">
                        <div class="text-end">
                            <a href="/posts" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="ms-2 btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php load_view_component("Layouts.footer") ?>