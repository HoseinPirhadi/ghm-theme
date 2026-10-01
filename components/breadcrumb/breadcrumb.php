<?php if (!empty($breadcrumb_items)): ?>
<nav class="breadcrumbs" aria-label="مسیر صفحه">
  <?php foreach ($breadcrumb_items as $index => $item): ?>
    <?php if ($index > 0): ?>
      <span aria-hidden="true">←</span>
    <?php endif; ?>

    <?php if (!empty($item['url'])): ?>
      <a href="<?= htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?>
      </a>
    <?php else: ?>
      <strong><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></strong>
    <?php endif; ?>
  <?php endforeach; ?>
</nav>
<?php endif; ?>
