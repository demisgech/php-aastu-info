<div class="col">
    <div class="card text-center shadow-sm h-100">
        <img src="<?= $profile['photo'] ?>" class="rounded-circle mx-auto mt-4" alt="Profile"
            style="width: 100px; height: 100px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title mb-0"><?= $profile['name'] ?></h5>
            <small class="text-muted d-block mb-3"><?= $profile['title'] ?></small>
            <div>
                <a href="<?= $profile['links']['twitter'] ?>" class="text-muted me-3" target="_blank">
                    <i class="bi bi-twitter fs-5"></i>
                </a>
                <a href="<?= $profile['links']['linkedin'] ?>" class="text-muted me-3" target="_blank">
                    <i class="bi bi-linkedin fs-5"></i>
                </a>
                <a href="<?= $profile['links']['github'] ?>" class="text-muted" target="_blank">
                    <i class="bi bi-github fs-5"></i>
                </a>
            </div>
        </div>
    </div>
</div>