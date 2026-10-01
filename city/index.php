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

    <section class="city-intro" aria-labelledby="city-title">
      <div class="city-intro__copy">
        <span class="eyebrow"><?= htmlspecialchars($city['eyebrow'], ENT_QUOTES, 'UTF-8') ?></span>
        <h1 id="city-title"><?= htmlspecialchars($city['title'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="city-intro__lead"><?= htmlspecialchars($city['intro'], ENT_QUOTES, 'UTF-8') ?></p>

        <div class="city-intro__actions">
          <a class="button button-primary" href="#cleaners">مشاهده قالیشویی‌ها</a>
          <a class="button button-quiet" href="#areas">انتخاب محدوده</a>
        </div>

        <div class="city-intro__facts" aria-label="خلاصه اطلاعات">
          <span><strong><?= count($city['recommended_cleaners']) + count($city['cleaners']) ?></strong> مجموعه نمونه</span>
          <i aria-hidden="true"></i>
          <span><strong><?= $location_count ?></strong> محدوده</span>
          <i aria-hidden="true"></i>
          <span><strong><?= count($city['faqs']) ?></strong> پرسش متداول</span>
        </div>
      </div>

      <div class="city-intro__visual" role="img" aria-label="<?= htmlspecialchars($city['image_alt'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="city-intro__visual-label">نمای شهر</div>
        <strong>تهران</strong>
        <span>راهنمای محلی قالیشویی</span>
      </div>
    </section>

    <nav class="city-tabs" aria-label="بخش‌های صفحه">
      <a href="#areas">مناطق و محله‌ها</a>
      <a href="#cleaners">قالیشویی‌ها</a>
      <a href="#prices">قیمت‌ها</a>
      <a href="#guide">راهنما</a>
      <a href="#faq">سوالات متداول</a>
    </nav>

    <div class="city-layout">
      <div class="city-content">
        <section id="areas" class="city-section city-section--first" aria-labelledby="areas-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">پوشش شهری</span>
              <h2 id="areas-title">قالیشویی در مناطق و محله‌های تهران</h2>
              <p>محدوده خود را پیدا کنید و بعد سراغ مجموعه‌هایی بروید که برای همان محدوده مناسب‌اند.</p>
            </div>
            <span class="count-badge"><?= $location_count ?> محدوده</span>
          </div>

          <div class="location-groups">
            <?php foreach ($city['regions'] as $group_name => $locations): ?>
              <details class="location-group"<?= $group_name === 'مناطق' ? ' open' : '' ?>>
                <summary>
                  <span><?= htmlspecialchars($group_name, ENT_QUOTES, 'UTF-8') ?></span>
                  <small><?= count($locations) ?> مورد</small>
                </summary>
                <div class="chips">
                  <?php foreach ($locations as $location): ?>
                    <a href="#"><?= htmlspecialchars($location, ENT_QUOTES, 'UTF-8') ?></a>
                  <?php endforeach; ?>
                </div>
              </details>
            <?php endforeach; ?>
          </div>
        </section>

        <section id="cleaners" class="city-section" aria-labelledby="cleaners-title">
          <section class="cleaners-featured" aria-labelledby="featured-cleaners-title">
            <div class="section-heading">
              <div>
                <span class="section-kicker">انتخاب قالی مپ</span>
                <h2 id="featured-cleaners-title">قالیشویی‌های پیشنهادی</h2>
                <p>چند مجموعه منتخب در ابتدای فهرست؛ اطلاعات این بخش در نسخه واقعی بر اساس معیارهای تعریف‌شده سایت تکمیل می‌شود.</p>
              </div>
            </div>
            <div class="featured-cleaners">
              <?php foreach ($city['recommended_cleaners'] as $cleaner): ?>
                <article class="cleaner-card cleaner-card--featured">
                  <div class="cleaner-card__topline">
                    <span class="status-badge">پیشنهاد قالی مپ</span>
                    <span class="sample-badge">داده نمونه</span>
                  </div>
                  <div class="cleaner-card__main">
                    <div class="logo-placeholder" aria-hidden="true"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
                    <div class="cleaner-card__identity">
                      <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                      <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                  </div>
                  <div class="cleaner-card__contact">
                    <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>"><span>تلفن ثابت</span><strong><?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                    <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>"><span>موبایل</span><strong><?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                  </div>
                  <div class="cleaner-card__footer">
                    <div class="socials">
                      <?php foreach ($cleaner['socials'] as $social): ?><a href="#"><?= htmlspecialchars($social, ENT_QUOTES, 'UTF-8') ?></a><?php endforeach; ?>
                    </div>
                    <a class="text-link" href="#">مشاهده پروفایل <b>←</b></a>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          </section>

          <section class="cleaners-standard" aria-labelledby="standard-cleaners-title">
            <div class="section-heading">
              <div>
                <span class="section-kicker">فهرست عمومی</span>
                <h2 id="standard-cleaners-title">سایر قالیشویی‌های تهران</h2>
                <p>مجموعه‌های دیگر شهر با همان ساختار اطلاعاتی و بدون برچسب پیشنهادی.</p>
              </div>
              <span class="result-count"><?= count($city['cleaners']) ?> مورد نمونه</span>
            </div>
            <div class="cleaner-list">
              <?php foreach ($city['cleaners'] as $cleaner): ?>
                <article class="cleaner-card cleaner-card--standard">
                  <div class="cleaner-card__main">
                    <div class="logo-placeholder" aria-hidden="true"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
                    <div class="cleaner-card__identity">
                      <span class="sample-badge">داده نمونه</span>
                      <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                      <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                  </div>
                  <div class="cleaner-card__contact">
                    <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>"><span>تلفن ثابت</span><strong><?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                    <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>"><span>موبایل</span><strong><?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                  </div>
                  <div class="cleaner-card__footer">
                    <div class="socials">
                      <?php foreach ($cleaner['socials'] as $social): ?><a href="#"><?= htmlspecialchars($social, ENT_QUOTES, 'UTF-8') ?></a><?php endforeach; ?>
                    </div>
                    <a class="text-link" href="#">جزئیات مجموعه <b>←</b></a>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
            <div class="section-action"><button class="button button-quiet" type="button">نمایش قالیشویی‌های بیشتر</button></div>
          </section>
        </section>

        <section id="prices" class="city-section city-section--surface" aria-labelledby="prices-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">راهنمای هزینه</span>
              <h2 id="prices-title">قیمت قالیشویی در تهران</h2>
              <p>جدول زیر در پروتوتایپ با داده نمونه نمایش داده شده و ساختار آن برای داده واقعی آماده است.</p>
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
            <span aria-hidden="true">i</span>
            <p><strong>نکته:</strong> هزینه نهایی می‌تواند بر اساس نوع فرش، ابعاد، خدمات تکمیلی و شرایط سفارش متفاوت باشد.</p>
          </div>
        </section>

        <section id="guide" class="city-section city-guide" aria-labelledby="guide-title">
          <div class="city-guide__heading">
            <span class="section-kicker">راهنمای شهر</span>
            <h2 id="guide-title">قبل از انتخاب قالیشویی در تهران چه چیزهایی را بررسی کنیم؟</h2>
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
                <span>قالیشویی‌های <?= htmlspecialchars($related_city, ENT_QUOTES, 'UTF-8') ?> <b>←</b></span>
              </a>
            <?php endforeach; ?>
          </div>
        </section>


        <section class="city-section reviews-section" aria-labelledby="reviews-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">تجربه کاربران</span>
              <h2 id="reviews-title">نظرات کاربران درباره قالیشویی‌ها</h2>
              <p>نمونه‌ای از نحوه نمایش تجربه کاربران در نسخه نهایی.</p>
            </div>
          </div>
          <div class="reviews-grid">
            <?php foreach ($city['reviews'] as $review): ?>
              <article class="review-card">
                <div class="review-card__top">
                  <div class="review-avatar"><?= htmlspecialchars($review['avatar'], ENT_QUOTES, 'UTF-8') ?></div>
                  <div>
                    <strong><?= htmlspecialchars($review['name'], ENT_QUOTES, 'UTF-8') ?></strong>
                    <span><?= htmlspecialchars($review['date'], ENT_QUOTES, 'UTF-8') ?></span>
                  </div>
                  <span class="review-rating" aria-label="<?= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8') ?> از ۵"><?= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <p><?= htmlspecialchars($review['text'], ENT_QUOTES, 'UTF-8') ?></p>
                <a href="#"><?= htmlspecialchars($review['cleaner'], ENT_QUOTES, 'UTF-8') ?></a>
              </article>
            <?php endforeach; ?>
          </div>
        </section>

        <section class="city-cta" aria-labelledby="cta-title">
          <div>
            <span class="section-kicker">برای کسب‌وکارها</span>
            <h2 id="cta-title">قالیشویی خود را به قالی مپ اضافه کنید</h2>
            <p>اطلاعات مجموعه خود را برای قرار گرفتن در فهرست شهر ثبت کنید.</p>
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
    </div>
  </div>
</main>

<?php require __DIR__ . '/../components/footer/footer.php'; ?>

<script src="../components/header/header.js"></script>
<script src="../components/footer/footer.js"></script>
<script src="assets/js/city.js"></script>
</body>
</html>
