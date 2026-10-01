<footer class="site-footer">
  <div class="container">
    <div class="site-footer__main">
      <div class="site-footer__intro">
        <a class="site-footer__brand" href="/" aria-label="قالی مپ">قالی مپ</a>
        <p class="site-footer__description">
          راهنمای پیدا کردن قالیشویی‌ها، شناخت خدمات و بررسی اطلاعات موردنیاز برای انتخاب آگاهانه‌تر.
        </p>
      </div>

      <nav class="site-footer__nav" aria-label="لینک‌های فوتر">
        <div class="site-footer__column">
          <button class="site-footer__toggle" type="button" aria-expanded="false" aria-controls="footer-links-quick">
            <span>دسترسی سریع</span>
            <span class="site-footer__toggle-icon" aria-hidden="true"></span>
          </button>
          <ul id="footer-links-quick">
            <li><a href="/province/">استان‌ها</a></li>
            <li><a href="/services/">خدمات قالیشویی</a></li>
            <li><a href="/prices/">قیمت قالیشویی</a></li>
            <li><a href="/guide/">راهنمای قالیشویی</a></li>
          </ul>
        </div>

        <div class="site-footer__column">
          <button class="site-footer__toggle" type="button" aria-expanded="false" aria-controls="footer-links-business">
            <span>برای کسب‌وکارها</span>
            <span class="site-footer__toggle-icon" aria-hidden="true"></span>
          </button>
          <ul id="footer-links-business">
            <li><a href="/contact/">ثبت قالیشویی</a></li>
            <li><a href="/contact/">ارتباط با قالی مپ</a></li>
          </ul>
        </div>

        <div class="site-footer__column">
          <button class="site-footer__toggle" type="button" aria-expanded="false" aria-controls="footer-links-guide">
            <span>راهنمای انتخاب</span>
            <span class="site-footer__toggle-icon" aria-hidden="true"></span>
          </button>
          <ul id="footer-links-guide">
            <li><a href="/guide/">انتخاب قالیشویی مناسب</a></li>
            <li><a href="/prices/">آشنایی با قیمت‌ها</a></li>
            <li><a href="/services/">شناخت خدمات قالیشویی</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="site-footer__bottom">
      <p>© <?= date('Y') ?> قالی مپ — کلیه حقوق محفوظ است.</p>
      <div class="site-footer__bottom-links">
        <a href="/privacy/">حریم خصوصی</a>
        <a href="/contact/">تماس با ما</a>
      </div>
    </div>
  </div>
</footer>
