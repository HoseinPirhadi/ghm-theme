<?php
$theme = require __DIR__ . '/../config/theme.php';
require __DIR__ . '/data/city.php';

$theme_css = '';
foreach ($theme as $name => $value) {
    $theme_css .= '--' . $name . ':' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . ';';
}

$breadcrumb_items = [
    ['label' => 'خانه', 'url' => '/'],
    ['label' => $city['province'], 'url' => $city['province_url']],
    ['label' => $city['title']],
];

$cleaners = [];
foreach (array_merge($city['recommended_cleaners'], $city['cleaners']) as $cleaner) {
    $cleaner['featured'] = in_array($cleaner['name'], array_column($city['recommended_cleaners'], 'name'), true);
    $cleaners[] = $cleaner;
}

$location_count = 0;
foreach ($city['regions'] as $locations) {
    $location_count += count($locations);
}
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($city['intro'], ENT_QUOTES, 'UTF-8') ?>">
  <title><?= htmlspecialchars($city['title'], ENT_QUOTES, 'UTF-8') ?> | قالی مپ</title>
  <style>:root { <?= $theme_css ?> }</style>
  <link rel="stylesheet" href="../components/header/header.css">
  <link rel="stylesheet" href="../components/breadcrumb/breadcrumb.css">
  <link rel="stylesheet" href="../components/footer/footer.css">
  <link rel="stylesheet" href="assets/css/city.css">
</head>
<body>

<?php require __DIR__ . '/../components/header/header.php'; ?>

<main class="city-page">
  <div class="container">
    <?php require __DIR__ . '/../components/breadcrumb/breadcrumb.php'; ?>

    <section class="city-hero" aria-labelledby="city-title">
      <div class="city-hero__content">
        <span class="eyebrow"><?= htmlspecialchars($city['eyebrow'], ENT_QUOTES, 'UTF-8') ?></span>
        <h1 id="city-title"><?= htmlspecialchars($city['title'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p><?= htmlspecialchars($city['intro'], ENT_QUOTES, 'UTF-8') ?></p>

        <div class="city-hero__actions">
          <a class="button button-primary" href="#cleaners">مشاهده قالیشویی‌ها</a>
          <a class="button button-secondary" href="#prices">قیمت‌ها</a>
        </div>

        <div class="city-hero__stats" aria-label="اطلاعات صفحه">
          <div>
            <strong><?= count($cleaners) ?></strong>
            <span>قالیشویی نمونه</span>
          </div>
          <div>
            <strong><?= $location_count ?></strong>
            <span>محدوده و منطقه</span>
          </div>
          <div>
            <strong><?= count($city['faqs']) ?></strong>
            <span>پرسش متداول</span>
          </div>
        </div>
      </div>

      <div class="city-hero__visual">
        <div class="city-hero__image" role="img" aria-label="<?= htmlspecialchars($city['image_alt'], ENT_QUOTES, 'UTF-8') ?>">
          <span>تصویر شهر تهران</span>
          <strong>تهران</strong>
        </div>
      </div>
    </section>

    <nav class="city-quick-nav" aria-label="دسترسی سریع صفحه">
      <a href="#areas">مناطق و محله‌ها</a>
      <a href="#cleaners">قالیشویی‌ها</a>
      <a href="#prices">قیمت‌ها</a>
      <a href="#guide">راهنمای شهر</a>
      <a href="#faq">سوالات متداول</a>
    </nav>

    <section id="areas" class="city-section" aria-labelledby="areas-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">پوشش شهری</span>
          <h2 id="areas-title">قالیشویی در مناطق و محله‌های تهران</h2>
          <p>محدوده موردنظر خود را انتخاب کنید و اطلاعات قالیشویی‌های همان محدوده را بررسی کنید.</p>
        </div>
        <span class="count-badge"><?= $location_count ?> محدوده</span>
      </div>

      <div class="location-groups">
        <?php foreach ($city['regions'] as $group_name => $locations): ?>
          <div class="location-group">
            <h3><?= htmlspecialchars($group_name, ENT_QUOTES, 'UTF-8') ?></h3>
            <div class="chips">
              <?php foreach ($locations as $location): ?>
                <a href="#"><?= htmlspecialchars($location, ENT_QUOTES, 'UTF-8') ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="cleaners" class="city-section" aria-labelledby="cleaners-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">فهرست مجموعه‌ها</span>
          <h2 id="cleaners-title">قالیشویی‌های تهران</h2>
          <p>اطلاعات تماس و خدمات مجموعه‌های نمونه را در یک نگاه ببینید.</p>
        </div>
        <span class="result-count"><?= count($cleaners) ?> مورد</span>
      </div>

      <div class="cleaner-list">
        <?php foreach ($cleaners as $cleaner): ?>
          <article class="cleaner-card<?= $cleaner['featured'] ? ' is-featured' : '' ?>">
            <div class="cleaner-card__main">
              <div class="logo-placeholder" aria-hidden="true"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
              <div class="cleaner-card__identity">
                <div class="cleaner-card__meta">
                  <?php if ($cleaner['featured']): ?>
                    <span class="status-badge">پیشنهاد قالی مپ</span>
                  <?php endif; ?>
                  <span class="sample-badge">نمونه</span>
                </div>
                <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
              </div>
            </div>

            <div class="cleaner-card__details">
              <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>">
                <span>تلفن ثابت</span>
                <strong><?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?></strong>
              </a>
              <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>">
                <span>موبایل</span>
                <strong><?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?></strong>
              </a>
            </div>

            <div class="cleaner-card__footer">
              <div class="socials">
                <?php foreach ($cleaner['socials'] as $social): ?>
                  <a href="#"><?= htmlspecialchars($social, ENT_QUOTES, 'UTF-8') ?></a>
                <?php endforeach; ?>
              </div>
              <a class="text-link" href="#">مشاهده جزئیات ←</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="section-action">
        <button class="button button-secondary" type="button">نمایش قالیشویی‌های بیشتر</button>
      </div>
    </section>

    <section id="prices" class="city-section city-section--surface" aria-labelledby="prices-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">راهنمای هزینه</span>
          <h2 id="prices-title">قیمت قالیشویی در تهران</h2>
          <p>قیمت‌های زیر صرفاً برای نمایش ساختار جدول در پروتوتایپ هستند.</p>
        </div>
      </div>

      <div class="price-table-wrap">
        <table class="price-table">
          <thead>
            <tr>
              <th>خدمت</th>
              <th>واحد</th>
              <th>قیمت نمونه</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($city['prices'] as $price): ?>
              <tr>
                <td><?= htmlspecialchars($price['service'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($price['unit'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><strong><?= htmlspecialchars($price['price'], ENT_QUOTES, 'UTF-8') ?></strong></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="notice">
        <strong>نکته:</strong>
        هزینه نهایی می‌تواند بر اساس نوع فرش، ابعاد، خدمات تکمیلی و شرایط سفارش متفاوت باشد.
      </div>
    </section>

    <section id="guide" class="city-section city-guide" aria-labelledby="guide-title">
      <div class="city-guide__heading">
        <span class="section-kicker">راهنمای شهر</span>
        <h2 id="guide-title">راهنمای انتخاب قالیشویی در تهران</h2>
      </div>
      <div class="city-guide__content">
        <p><?= htmlspecialchars($city['content']['قالیشویی در تهران'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><?= htmlspecialchars($city['content']['نکته'], ENT_QUOTES, 'UTF-8') ?></p>
      </div>
    </section>

    <section id="faq" class="city-section" aria-labelledby="faq-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">پرسش و پاسخ</span>
          <h2 id="faq-title">سوالات متداول درباره قالیشویی تهران</h2>
        </div>
      </div>

      <div class="faq-list">
        <?php foreach ($city['faqs'] as $index => $faq): ?>
          <details<?= $index === 0 ? ' open' : '' ?>>
            <summary><?= htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') ?></summary>
            <div class="faq-answer">
              <p><?= htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="city-section related-section" aria-labelledby="related-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">ادامه جستجو</span>
          <h2 id="related-title">شهرهای مرتبط</h2>
        </div>
      </div>

      <div class="related-cities">
        <?php foreach ($city['related_cities'] as $related_city): ?>
          <a href="#">
            <strong><?= htmlspecialchars($related_city, ENT_QUOTES, 'UTF-8') ?></strong>
            <span>مشاهده قالیشویی‌ها <b>←</b></span>
          </a>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="city-cta" aria-labelledby="cta-title">
      <div>
        <span class="section-kicker">برای کسب‌وکارها</span>
        <h2 id="cta-title">قالیشویی خود را به قالی مپ اضافه کنید</h2>
        <p>اطلاعات مجموعه خود را برای قرار گرفتن در فهرست قالیشویی‌های شهر ثبت کنید.</p>
      </div>
      <a class="button button-primary" href="/contact/">ثبت قالیشویی</a>
    </section>

    <section class="comments-placeholder" aria-labelledby="comments-title">
      <div>
        <span class="section-kicker">تجربه کاربران</span>
        <h2 id="comments-title">نظرات کاربران</h2>
      </div>
      <p>بخش نظرات در نسخه نهایی WordPress در این قسمت نمایش داده می‌شود.</p>
    </section>
  </div>
</main>

<?php require __DIR__ . '/../components/footer/footer.php'; ?>

<script src="../components/header/header.js"></script>
<script src="../components/footer/footer.js"></script>
<script src="assets/js/city.js"></script>
</body>
</html>
