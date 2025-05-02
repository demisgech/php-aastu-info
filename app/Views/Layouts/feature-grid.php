<section class="custom-section position-relative">
    <!-- Top-left Badge -->
    <div class="top-badge">
        <span class="badge bg-warning">Explore</span>
    </div>

    <!-- Section Header and Description -->
    <div class="container mt-5">
        <h2 class="fw-bold mb-3">Discover Your Path at AASTU Today</h2>
        <p class="text-muted mb-5">
            Explore a comprehensive selection of undergraduate programs, access detailed application resources, and
            engage with inspiring clubs and organizations through AASTU Info.
        </p>

        <!-- Responsive Card Row -->
        <div class="row g-4">
            <?php foreach ($data as $feature): ?>
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <img src="<?= $feature['image_url'] ?>" class="card-img-top" alt="Tech">
                        <div class="card-body">
                            <h5 class="card-title"><?= $feature['title'] ?></h5>
                            <p class="card-text"><?= $feature['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>