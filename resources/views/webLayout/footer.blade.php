  <!-- FOOTER AREA START -->
  @php
    $locale = app()->getLocale();
@endphp
  <footer class="ltn__footer-area">
      <div class="footer-top-area section-bg-2 plr--5">
          <div class="container-lg">
              <div class="row">
                  <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                      <div class="footer-widget footer-about-widget">
                          <div class="footer-logo">
                              <div class="site-logo">
                                  <img src="{{ asset('webasset/img/logo-dark.png') }}" alt="Logo" />
                              </div>
                          </div>
                          <div class="footer-widget footer-newsletter-widget w-100">
                              <p class="px-2 f-s-16">
                                {{ __('links.footer_text') }}
                              </p>
                              <div class="footer-newsletter">
                                  <div id="mc_embed_signup">
                                      <div class="col header-menu-column p-2">
                                          <div class="header-search-2" style="min-width: auto">
                                                <form id="newsletterForm" action="{{ route('newsLetter.store') }}" method="post">
                                                    @csrf
                                                  <input type="text" name="email" value="" id="email"
                                                      autocomplete="email" placeholder="{{ __('links.enter_email') }}" />
                                                  <button class="main-search" type="submit">
                                                      <span><i class="far fa-paper-plane px-2"></i>{{ __('links.Subscribe') }}</span>
                                                  </button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <p class="p-2 mb-3">
                                  <label class="input-info-save mb-0">
                                      <input type="checkbox" id="agree" name="agree" />   {{ __('links.terms_text') }}
                                  </label>
                              </p>
                              <div id="error-message"
                                  style="background: #ff000085;color:#fff; display: none; padding: 10px; margin-top: 10px;">
                                  {{ __('links.term_condation') }}
                              </div>

                          </div>


                      </div>
                  </div>
                  <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                      <div class="footer-widget footer-menu-widget ">
                          <h4 class="footer-title">Varex</h4>
                          <div class="footer-menu">
                              <ul>
                                  <li><a  href="{{ LaravelLocalization::localizeUrl('/about-us') }}">{{ __('links.about_us') }}</a></li>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/products') }}">{{ __('links.products') }}</a></li>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/media') }}">{{ __('links.media') }}</a></li>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/blogs') }}">{{ __('links.blogs') }}</a></li>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/varex-certificates') }}">{{ __('links.certificate') }}</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                      <div class="footer-widget footer-menu-widget clearfix">

                          <div class="footer-menu mt-5">
                              <ul>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/distribute') }} ">{{ __('links.distribute') }}</a></li>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/contact') }}">{{ __('links.contact_us') }}</a></li>
                                  <li><a href="{{ LaravelLocalization::localizeUrl('/terms-condations') }}">{{ __('links.terms') }}</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-xl-3 col-md-6 col-sm-6">
                      <div class="footer-address">
                          <h4 class="footer-title">Varex / {{  __('links.contacts') }}</h4>
                          <ul>
                              <li>
                                  <div class="footer-address-icon">
                                      <i class="icon-placeholder"></i>
                                  </div>
                                  <div class="footer-address-info">
                                    <p>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contactUsFirstRow->location[$locale] ?? '') }}" target="_blank">
                                            {{ $contactUsFirstRow->location[$locale] ?? '' }}
                                        </a>
                                    </p>
                                  </div>
                              </li>
                              <li>
                                  <div class="footer-address-icon">
                                      <i class="icon-mail"></i>
                                  </div>
                                  <div class="footer-address-info">
                                      <p>
                                          <a href="mailto:{{ $contactUsFirstRow->email1 ?? '' }}"
                                              class="scnd-hovr">{{ $contactUsFirstRow->email1 ?? '' }}</a>
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
                              {{   __('links.tade_mark') }} 2024 @ Varex

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
