<div class="col-lg-4 mb-4">
    <div class="card h-100">
        <img src="<?= $card['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="d-flex align-items-center text-muted mb-2" style="font-size: 0.875rem;">
                <i class="bi <?= $card['icon'] ?> me-2"></i> <?= $card['label'] ?>
            </div>
            <h5 class="card-title"><?= $card['title'] ?></h5>
            <p class="card-text"><?= $card['description'] ?></p>
            <a href="<?= $card['button_link'] ?>" class="btn btn-primary"><?= $card['button_text'] ?></a>
        </div>
    </div>
</div>