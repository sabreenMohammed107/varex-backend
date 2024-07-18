
@include('webLayout.style')
<body style="direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
  <!-- Add your site or application content here -->

  <!-- Body main wrapper start -->
  <div class="body-wrapper">
    <!-- HEADER AREA START (header-3) -->
    <!-- HEADER AREA START (header-3) -->
    @include('webLayout.header')

    <!-- HEADER AREA END -->
    @include('webLayout.nav')
@yield('content')
@include('webLayout.footer')
@include('webLayout.footerscript')



