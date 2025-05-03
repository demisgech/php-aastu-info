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