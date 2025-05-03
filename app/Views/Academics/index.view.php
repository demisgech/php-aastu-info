<?php

use function App\Helpers\load_view_component;

?>

<?php load_view_component("Layouts.header"); ?>
<?php load_view_component("Academics.hero") ?>
<?php load_view_component("Academics.course-grid", ["academics" => $academics]) ?>
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