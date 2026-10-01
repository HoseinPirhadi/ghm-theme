<?php
require __DIR__ . '/data/city.php';

$breadcrumb_items = [
    ['label' => 'خانه', 'url' => '/'],
    ['label' => $city['province'], 'url' => $city['province_url']],
    ['label' => $city['title']],
];
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($city['intro'], ENT_QUOTES, 'UTF-8') ?>">
  <title><?= htmlspecialchars($city['title'], ENT_QUOTES, 'UTF-8') ?> | قالی مپ</title>

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

    <section class="city-hero">
      <div class="hero-copy">
        <span class="eyebrow"><?= htmlspecialchars($city['eyebrow'], ENT_QUOTES, 'UTF-8') ?></span>
        <h1><?= htmlspecialchars($city['title'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="lead"><?= htmlspecialchars($city['intro'], ENT_QUOTES, 'UTF-8') ?></p>

        <div class="hero-actions">
          <a class="button button-primary" href="#cleaners">مشاهده قالیشویی‌ها</a>
          <a class="button button-secondary" href="#prices">مشاهده قیمت‌ها</a>
        </div>
      </div>

      <div class="hero-media">
        <div class="image-placeholder" role="img" aria-label="<?= htmlspecialchars($city['image_alt'], ENT_QUOTES, 'UTF-8') ?>">
          <?= htmlspecialchars($city['image_alt'], ENT_QUOTES, 'UTF-8') ?>
        </div>
      </div>
    </section>

    <section class="location-links section-card" aria-labelledby="locations-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">مناطق تحت پوشش</span>
          <h2 id="locations-title">قالیشویی در مناطق و محله‌های تهران</h2>
        </div>
        <span class="count-badge">
          <?= array_sum(array_map('count', $city['regions'])) ?> مکان
        </span>
      </div>

      <div class="link-groups">
        <?php foreach ($city['regions'] as $group_name => $locations): ?>
          <div class="link-group">
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

    <section id="cleaners" class="section" aria-labelledby="cleaners-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">انتخاب‌های پیشنهادی</span>
          <h2 id="cleaners-title">قالیشویی‌های تهران</h2>
        </div>
        <span class="result-count">
          <?= count($city['recommended_cleaners']) + count($city['cleaners']) ?> قالیشویی
        </span>
      </div>

      <div class="cleaner-grid">
        <?php foreach ($city['recommended_cleaners'] as $cleaner): ?>
          <article class="cleaner-card featured">
            <div class="cleaner-top">
              <div class="logo-placeholder"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
              <div>
                <span class="recommended">✓ پیشنهادی</span>
                <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
              </div>
            </div>

            <div class="contact-row">
              <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>
              </a>
              <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>
              </a>
            </div>

            <div class="socials">
              <?php foreach ($cleaner['socials'] as $social): ?>
                <a href="#"><?= htmlspecialchars($social, ENT_QUOTES, 'UTF-8') ?></a>
              <?php endforeach; ?>
            </div>
          </article>
        <?php endforeach; ?>

        <?php foreach ($city['cleaners'] as $cleaner): ?>
          <article class="cleaner-card">
            <div class="cleaner-top">
              <div class="logo-placeholder"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
              <div>
                <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
              </div>
            </div>

            <div class="contact-row">
              <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>
              </a>
              <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>
              </a>
            </div>

            <div class="socials">
              <?php foreach ($cleaner['socials'] as $social): ?>
                <a href="#"><?= htmlspecialchars($social, ENT_QUOTES, 'UTF-8') ?></a>
              <?php endforeach; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="show-more-wrap">
        <button class="button button-secondary show-more" type="button">نمایش قالیشویی‌های بیشتر</button>
      </div>
    </section>

    <section id="prices" class="section section-card" aria-labelledby="prices-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">هزینه خدمات</span>
          <h2 id="prices-title">لیست قیمت قالیشویی در تهران</h2>
        </div>
        <span class="muted">قیمت‌ها نمونه هستند</span>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>خدمت</th>
              <th>واحد</th>
              <th>قیمت</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($city['prices'] as $price): ?>
              <tr>
                <td><?= htmlspecialchars($price['service'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($price['unit'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($price['price'], ENT_QUOTES, 'UTF-8') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

    <section class="content-section">
      <div class="section-heading">
        <div>
          <span class="section-kicker">راهنمای شهر</span>
          <h2><?= htmlspecialchars($city['content']['قالیشویی در تهران'], ENT_QUOTES, 'UTF-8') ?></h2>
        </div>
      </div>

      <div class="rich-content">
        <p><?= htmlspecialchars($city['content']['قالیشویی در تهران'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><?= htmlspecialchars($city['content']['نکته'], ENT_QUOTES, 'UTF-8') ?></p>
      </div>
    </section>

    <section id="faq" class="section" aria-labelledby="faq-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">پرسش و پاسخ</span>
          <h2 id="faq-title">سوالات متداول</h2>
        </div>
      </div>

      <div class="faq-list">
        <?php foreach ($city['faqs'] as $index => $faq): ?>
          <details <?= $index === 0 ? 'open' : '' ?>>
            <summary><?= htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') ?></summary>
            <div>
              <p><?= htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section section-card" aria-labelledby="related-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">در همان استان</span>
          <h2 id="related-title">شهرهای مرتبط</h2>
        </div>
      </div>

      <div class="city-links">
        <?php foreach ($city['related_cities'] as $related_city): ?>
          <a href="#">
            <strong><?= htmlspecialchars($related_city, ENT_QUOTES, 'UTF-8') ?></strong>
            <span>مشاهده قالیشویی‌ها</span>
          </a>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="comments section" aria-labelledby="comments-title">
      <div class="section-heading">
        <div>
          <span class="section-kicker">تجربه کاربران</span>
          <h2 id="comments-title">نظرات</h2>
        </div>
      </div>

      <div class="comment-placeholder">
        <p>بخش نظرات WordPress در نسخه نهایی اینجا نمایش داده می‌شود.</p>
        <button class="button button-primary" type="button">ثبت نظر</button>
      </div>
    </section>

  </div>
</main>

<?php require __DIR__ . '/../components/footer/footer.php'; ?>

<script src="../components/header/header.js"></script>
<script src="assets/js/city.js"></script>
</body>
</html>
