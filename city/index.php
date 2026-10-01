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
      <a href="#recommended">پیشنهادی‌ها</a>
      <a href="#cleaners">قالیشویی‌ها</a>
      <a href="#guide">محتوا</a>
      <a href="#prices">قیمت‌ها</a>
      <a href="#areas">محدوده‌ها</a>
      <a href="#faq">سوالات متداول</a>
      <a href="#reviews">نظرات</a>
    </nav>

    <div class="city-layout">
      <div class="city-content">

        <section id="recommended" class="city-section city-section--first" aria-labelledby="featured-cleaners-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">انتخاب قالی مپ</span>
              <h2 id="featured-cleaners-title">قالیشویی‌های پیشنهادی</h2>
            </div>
          </div>
          <div class="featured-cleaners">
            <?php foreach ($city['recommended_cleaners'] as $cleaner): ?>
              <article class="cleaner-card cleaner-card--featured">
                <div class="cleaner-card__main">
                  <div class="logo-placeholder" aria-hidden="true"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
                  <div class="cleaner-card__identity">
                    <div class="cleaner-card__labels">
                      <span class="status-badge">پیشنهاد قالی مپ</span>

                    </div>
                    <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
                  </div>
                </div>
                <details class="cleaner-card__call">
                  <summary>تماس با قالیشویی</summary>
                  <div class="cleaner-card__numbers">
                    <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>"><span>تلفن ثابت</span><strong><?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                    <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>"><span>موبایل</span><strong><?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                  </div>
                </details>
              </article>
            <?php endforeach; ?>
          </div>
        </section>

        <section id="cleaners" class="city-section" aria-labelledby="standard-cleaners-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">فهرست شهر</span>
              <h2 id="standard-cleaners-title">قالیشویی‌های تهران</h2>
            </div>
            <span class="result-count"><?= count($city['cleaners']) ?> مورد نمونه</span>
          </div>
          <div class="cleaner-list">
            <?php foreach ($city['cleaners'] as $cleaner): ?>
              <article class="cleaner-card cleaner-card--standard">
                <div class="cleaner-card__main">
                  <div class="logo-placeholder" aria-hidden="true"><?= htmlspecialchars($cleaner['logo'], ENT_QUOTES, 'UTF-8') ?></div>
                  <div class="cleaner-card__identity">

                    <h3><?= htmlspecialchars($cleaner['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars($cleaner['description'], ENT_QUOTES, 'UTF-8') ?></p>
                  </div>
                </div>
                <details class="cleaner-card__call">
                  <summary>تماس با قالیشویی</summary>
                  <div class="cleaner-card__numbers">
                    <a href="tel:<?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?>"><span>تلفن ثابت</span><strong><?= htmlspecialchars($cleaner['landline'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                    <a href="tel:<?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?>"><span>موبایل</span><strong><?= htmlspecialchars($cleaner['mobile'], ENT_QUOTES, 'UTF-8') ?></strong></a>
                  </div>
                </details>
              </article>
            <?php endforeach; ?>
          </div>
        </section>

        <section id="guide" class="city-section city-guide" aria-labelledby="guide-title">
          <div class="city-guide__heading">
            <span class="section-kicker">راهنمای شهر</span>
            <h2 id="guide-title">راهنمای قالیشویی در تهران</h2>
          </div>
          <div class="city-guide__content">
            <p><?= htmlspecialchars($city['content']['قالیشویی در تهران'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><?= htmlspecialchars($city['content']['نکته'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        </section>

        <section id="prices" class="city-section city-section--surface" aria-labelledby="prices-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">هزینه خدمات</span>
              <h2 id="prices-title">لیست قیمت قالیشویی در تهران</h2>
            </div>
          </div>
          <div class="price-table-wrap">
            <table class="price-table">
              <thead><tr><th>خدمت</th><th>واحد</th><th>قیمت نمونه</th></tr></thead>
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

        <section id="areas" class="city-section city-locations" aria-labelledby="areas-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">پوشش شهری</span>
              <h2 id="areas-title">محدوده‌های قالیشویی در تهران</h2>
            </div>
            <span class="count-badge"><?= $location_count ?> مورد</span>
          </div>

          <?php if ($city['slug'] === 'tehran' && !empty($city['regions']['جهت‌ها'])): ?>
            <div class="location-direction">
              <div class="location-subheading"><span>جهت‌های تهران</span><small>۴ جهت اصلی</small></div>
              <div class="direction-grid">
                <?php foreach ($city['regions']['جهت‌ها'] as $direction): ?>
                  <a class="direction-card" href="#">
                    <span class="direction-card__mark" aria-hidden="true"></span>
                    <strong><?= htmlspecialchars($direction, ENT_QUOTES, 'UTF-8') ?></strong>
                    <small>قالیشویی‌های این محدوده <b>←</b></small>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="location-regions">
            <div class="location-subheading"><span>مناطق تهران</span><small><?= count($city['regions']['مناطق']) ?> منطقه</small></div>
            <div class="region-grid">
              <?php foreach ($city['regions']['مناطق'] as $location): ?>
                <a href="#" class="region-item"><span><?= htmlspecialchars($location, ENT_QUOTES, 'UTF-8') ?></span><b>←</b></a>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="location-neighborhoods">
            <div class="location-subheading"><span>محله‌های منتخب</span><small><?= count($city['regions']['محله‌های منتخب']) ?> محله</small></div>
            <div class="neighborhood-list">
              <?php foreach ($city['regions']['محله‌های منتخب'] as $location): ?>
                <a href="#"><?= htmlspecialchars($location, ENT_QUOTES, 'UTF-8') ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        </section>

        <section id="faq" class="city-section" aria-labelledby="faq-title">
          <div class="section-heading">
            <div><span class="section-kicker">پرسش و پاسخ</span><h2 id="faq-title">سوالات متداول درباره قالیشویی تهران</h2></div>
          </div>
          <div class="faq-list">
            <?php foreach ($city['faqs'] as $index => $faq): ?>
              <details<?= $index === 0 ? ' open' : '' ?>>
                <summary><?= htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') ?></summary>
                <div class="faq-answer"><p><?= htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8') ?></p></div>
              </details>
            <?php endforeach; ?>
          </div>
        </section>

        <section id="reviews" class="city-section reviews-section" aria-labelledby="reviews-title">
          <div class="section-heading">
            <div>
              <span class="section-kicker">تجربه کاربران</span>
              <h2 id="reviews-title">نظرات کاربران</h2>
            </div>
          </div>

          <div class="reviews-list">
            <?php foreach ($city['reviews'] as $review): ?>
              <article class="review-card">
                <div class="review-card__top">
                  <div class="review-avatar" aria-hidden="true"><?= htmlspecialchars($review['avatar'], ENT_QUOTES, 'UTF-8') ?></div>
                  <div class="review-card__author">
                    <strong><?= htmlspecialchars($review['name'], ENT_QUOTES, 'UTF-8') ?></strong>
                    <span><?= htmlspecialchars($review['date'], ENT_QUOTES, 'UTF-8') ?></span>
                  </div>
                  <span class="review-rating" aria-label="<?= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8') ?> از ۵"><?= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8') ?> از ۵</span>
                </div>
                <p><?= htmlspecialchars($review['text'], ENT_QUOTES, 'UTF-8') ?></p>
              </article>
            <?php endforeach; ?>
          </div>

          <div class="review-form-box">
            <div class="review-form-box__heading">
              <span class="section-kicker">ثبت تجربه</span>
              <h3>نظر خود را درباره تجربه‌تان ثبت کنید</h3>
            </div>
            <form class="review-form" action="#" method="post">
              <div class="review-form__grid">
                <label>
                  <span>نام</span>
                  <input type="text" name="review_name" placeholder="نام شما">
                </label>
                <label>
                  <span>امتیاز</span>
                  <select name="review_rating">
                    <option value="">انتخاب امتیاز</option>
                    <option value="5">۵ از ۵</option>
                    <option value="4">۴ از ۵</option>
                    <option value="3">۳ از ۵</option>
                    <option value="2">۲ از ۵</option>
                    <option value="1">۱ از ۵</option>
                  </select>
                </label>
              </div>
              <label>
                <span>نظر شما</span>
                <textarea name="review_text" rows="5" placeholder="تجربه خود را درباره کیفیت خدمات، زمان‌بندی یا نحوه پاسخ‌گویی بنویسید."></textarea>
              </label>
              <div class="review-form__footer">
                <small>این فرم در پروتوتایپ است و در نسخه WordPress به سیستم نظرات متصل می‌شود.</small>
                <button class="button button-primary" type="submit">ارسال نظر</button>
              </div>
            </form>
          </div>
        </section>

        <section id="related" class="city-section related-section" aria-labelledby="related-title">
          <div class="section-heading">
            <div><span class="section-kicker">ادامه جستجو</span><h2 id="related-title">شهرهای دیگر استان تهران</h2></div>
          </div>
          <div class="related-cities">
            <?php foreach ($city['related_cities'] as $related_city): ?>
              <a href="#"><strong><?= htmlspecialchars($related_city, ENT_QUOTES, 'UTF-8') ?></strong><span>قالیشویی‌های <?= htmlspecialchars($related_city, ENT_QUOTES, 'UTF-8') ?> <b>←</b></span></a>
            <?php endforeach; ?>
          </div>
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
