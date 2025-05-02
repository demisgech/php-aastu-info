<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header", $academics);
load_view_component("Academics.hero")
    ?>

<section class="custom-section position-relative mb-2">
    <div class="container">
        <span class="top-badge rounded bg-primary p-1 text-white">Explore</span>
        <h2 class="section-heading my-3">Availabel Courses</h2>
        <p class="section-description my-3">
            Discover top-tier education in Engineering and Applied Sciences that shapes the future across multiple
            disciplines.
        </p>

        <!-- Filter Tabs -->
        <ul class="nav nav-pills mb-4" id="filterTabs" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-category="All">All</button></li>
            <li class="nav-item"><button class="nav-link" data-category="Engineering">Engineering</button></li>
            <li class="nav-item"><button class="nav-link" data-category="Science">Applied Science</button></li>
        </ul>

        <!-- Cards Container -->
        <div class="row row-cols-1 row-cols-md-2 g-4" id="programCards">
            <?php foreach ($academics as $program): ?>
                <div class="col program-card" data-category="<?= $program['tag'] ?>">
                    <div class="card p-3 bg-light rounded card-hover-bg">
                        <h5 class="card-title">
                            <?= htmlspecialchars($program['title']) ?>
                            <span
                                class="badge <?= $program['tag'] === 'Engineering' ? 'bg-primary' : ($program['tag'] === 'Science' ? 'bg-success' : 'bg-secondary') ?>">
                                <?= htmlspecialchars($program['tag']) ?>
                            </span>
                        </h5>
                        <p class="card-text"><?= htmlspecialchars($program['description']) ?></p>
                        <div class="d-flex gap-4 text-muted small">
                            <div><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($program['location']) ?></div>
                            <div><i class="bi bi-calendar"></i> <?= htmlspecialchars($program['year']) ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<?php load_view_component("Layouts.footer") ?>


<script>
    document.querySelectorAll('#filterTabs button').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('#filterTabs button').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const selected = btn.getAttribute('data-category');
            document.querySelectorAll('.program-card').forEach(card => {
                const category = card.getAttribute('data-category');
                if (selected === 'All' || category === selected) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>