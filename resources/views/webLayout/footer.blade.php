  <!-- FOOTER AREA START -->
  <footer class="ltn__footer-area">
    <div class="footer-top-area section-bg-2 plr--5">
      <div class="container-lg">
        <div class="row">
          <div class="col-xl-5 col-md-6 col-sm-6 col-12">
            <div class="footer-widget footer-about-widget">
              <div class="footer-logo">
                <div class="site-logo">
                  <img src="img/logo-dark.png" alt="Logo" />
                </div>
              </div>
              <div class="footer-widget footer-newsletter-widget w-100">
                <p class="px-2 f-s-16">
                  Stay tuned for latest updates and new features
                </p>
                <div class="footer-newsletter">
                  <div id="mc_embed_signup">
                    <div class="col header-menu-column p-2">
                      <div class="header-search-2" style="min-width: auto">
                        <form id="#123" method="get" action="#">
                          <input type="text" name="search" value="" placeholder="Email Address" />
                          <button class="main-search" type="submit">
                            <span><i class="far fa-paper-plane px-2"></i>Subscribe</span>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="p-2 mb-3">
                  <label class="input-info-save mb-0"><input type="checkbox" name="agree" /> I accept terms
                    and conditions & privacy policy</label>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-md-6 col-sm-6 col-12">
            <div class="footer-widget footer-menu-widget ">
              <h4 class="footer-title">Varex</h4>
              <div class="footer-menu">
                <ul>
                  <li><a href="">About Us</a></li>
                  <li><a href="{{ url('/products') }}">Products</a></li>
                  <li><a href="{{ url('/media') }}">Media</a></li>
                  <li><a href="blogs.html">Blogs</a></li>
                  <li><a href="Certificate.html">Certificate</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-md-6 col-sm-6 col-12">
            <div class="footer-widget footer-menu-widget clearfix">

              <div class="footer-menu mt-5">
                <ul>
                  <li><a href="#">Privacy & Policy </a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Promotional Offers</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-3 col-md-6 col-sm-6">
            <div class="footer-address">
              <h4 class="footer-title">Varex / Contacts</h4>
              <ul>
                <li>
                  <div class="footer-address-icon">
                    <i class="icon-placeholder"></i>
                  </div>
                  <div class="footer-address-info">
                    <p>
                      <a href="tel: 32 Omar Ibn Abd El Azeez, Helwan" class="scnd-hovr">
                        {{ $contactUsFirstRow->location['en'] ?? ''}}</a>
                    </p>
                  </div>
                </li>
                <li>
                  <div class="footer-address-icon">
                    <i class="icon-mail"></i>
                  </div>
                  <div class="footer-address-info">
                    <p>
                      <a href="{{ $contactUsFirstRow->email ?? ''}}" class="scnd-hovr">{{ $contactUsFirstRow->email ?? ''}}</a>
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-2 ltn__border-top-2 plr--5">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="ltn__copyright-design clearfix">
              <p>
                Copyright 2024 @ Varex

              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
  <div class="preloader-inner">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
</div>
<!-- preloader area end -->
