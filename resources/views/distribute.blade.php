@extends('webLayout.main')

@section('content')
  <!-- PRODUCT DETAILS AREA START -->
  <div class="ltn__product-area ltn__product-gutter pt-80" id="distribute_page">
    <div class="container-lg">
      <div class="main-grid-container">
        <div class="item bg-img">
          <img src="{{asset('webasset/img/bg/Rectangle 33.png')}}" alt="" srcset="">
        </div>
        <div class="item contnet-info">
          <h2 class="text-in-dark"><span class="first-word">Distribute</span> with us</h2>
          <p>
            Nothing compares to being a distributor for the most widespread and high-quality products in the Egyptian
            market, especially since we guarantee you a wide selection of reputable products that appeal to Egyptian
            and Arab consumers. Welcome to the Egyptian Varex family.
          </p>
          <p>The Varex brand is one of the leading players in the household cleaning tools market in Egypt,
            representing the pinnacle of production from the Italian company, Clean, which has dedicated all its
            resources to developing 63 high-quality products to suit the tastes of Egyptian and Arab consumers.</p>
          <p>The distinctive Varex range consists of 8 cohesive product families, including:</p>
          <ol>
            <li>Various kitchen sponges (from synthetic sponge/spun plastic fiber/polypropylene spun fiber, and more).
            </li>
            <li>Italian-made scrubbers and scrapers.</li>
            <li>Stainless steel wire made from the purest SS410 stainless steel, and soft, coiled metal wire.</li>
            <li>Household and kitchen cleaning cloths and towels (spun/non-spun) in different shapes and sizes.</li>
            <li>Bath sponges (natural and synthetic).</li>
            <li>Personal care tools.</li>
            <li>High-quality transparent plastic household cleaning tools.</li>
            <li>Dishwashing liquid.</li>

          </ol>
          <p>Join us and become one of our distinguished distributors in the local market in Egypt or in the Arab
            market. It's worth mentioning that we have a special relationship with distributors and clients in many
            other countries around the world.</p>
          <p>We embrace a continuous improvement approach to our products and have built a strategy for continuous
            expansion with distributors and clients. Therefore, we always focus on discovering new partners, markets,
            and experiences. Consequently, we are searching for qualified agents through whom we can distribute.</p>
          <p>So, if you aim to acquire a reputable and distinguished product in the local and international market,
            Varex is your suitable destination.</p>
          <p>For a faster response, contact us via WhatsApp.</p>
        </div>
        <div class="item catalog-section">
          <div class="logo-catalog">
            <div class="main-logo">
              <img src="{{asset('webasset/img/logo.png')}}" alt="">
            </div>
            <ul class="cst-btn p-0">
              <li class="special-link shinep-0">
                <a class="p-0" href="{{ $about->company_katalog }}" download="">Download Katalog</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="main-distributer-form pb-100">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 order-2 order-lg-1 form-inputs">
            <form id="contact-form" action="" method="post">
              <div class="row">
                <div class="col-12">
                  <div class="input-item input-item-name ltn__custom-icon">
                    <label for="exampleFormControlInput1" class="form-label">Your Company Name</label>
                    <input type="text" name="name">
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-item input-item-name ltn__custom-icon">
                    <label for="exampleFormControlInput1" class="form-label">Your Name</label>
                    <input type="text" name="name">
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-item input-item-name ltn__custom-icon">
                    <label for="exampleFormControlInput1" class="form-label">Telephone Number/WhatsApp</label>
                    <input type="text" name="name">
                  </div>
                </div>
                <div class="input-item input-item-textarea ltn__custom-icon">
                  <label for="exampleFormControlInput1" class="form-label">Your Massage</label>
                  <textarea name="message"></textarea>
                </div>
                <!-- <p><label class="input-info-save mb-0">Please fill in spaces marked with *</label></p> -->
                <div class="btn-wrapper mt-0 col-12">
                  <button class="btn theme-btn-1 form-contact-btn w-100" type="submit">submit</button>
                </div>
              </div>

              <p class="form-messege mb-0 mt-20"></p>
            </form>
          </div>
          <div
            class="col-12 col-lg-6 order1 order-lg-2 dis-img d-flex justify-content-center  justify-content-lg-end">
            <img src="{{asset('webasset/img/bg/Slice 3 (1) 1.png')}}" class="h-100" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PRODUCT DETAILS AREA END -->
@endsection
