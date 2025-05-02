<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left: Header and Button -->
            <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start">
                <h1 class="display-5 fw-bold">A Guide to Understanding
                    Admissions Processes</h1>
                <p class="lead">Discover the tools that help modern teams create scalable and beautiful digital
                    products.</p>
                <a href="#" class="btn btn-success btn-lg mt-3">Explore Features</a>
            </div>

            <!-- Right: Media Object List -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php foreach ($data as $media): ?>
                        <li class="d-flex mb-4">
                            <div class="me-3">
                                <i class="bi bi-speedometer2 fs-2 text-primary">✅</i>
                            </div>
                            <div>
                                <h5 class="mb-1"><?= $media['title'] ?></h5>
                                <p class="mb-0"><?= $media['description'] ?></p>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</section>