<div id="Site-Footer" class="footer-area">
  <div class="container">
    {{-- Articles-and-Advices Section --}}
    <section class="articles-and-advices pt-28">
      <h2 class="section-title">articles & advices</h2>
      <div class="section-content flex flex-col md:flex-row justify-between -mx-4">
        <div class="single-block flex-1 mb-8 md:mb-0 px-4">
          <div class="flex bg-white rounded-lg shadow">
            <div style="background-image: url('{{ asset('assets/img/bg/sample-img.jpg') }}')" class="bg-img w-2/5 bg-gray-800 bg-cover bg-center rounded-lg rounded-r-none"></div>
            <div class="block-content w-3/5 p-4">
              <div class="text-2xl font-medium mb-4">Lorem ipsum dolor sit amet.</div>
              <a href="/" class="full-width-btn">More details</a>
            </div>
          </div>
        </div>

        <div class="single-block flex-1 mb-8 md:mb-0 px-4">
          <div class="flex bg-white rounded-lg shadow">
            <div style="background-image: url('{{ asset('assets/img/bg/sample-img.jpg') }}')" class="bg-img w-2/5 bg-gray-800 bg-cover bg-center rounded-lg rounded-r-none"></div>
            <div class="block-content w-3/5 p-4">
              <div class="text-2xl font-medium mb-4">Lorem ipsum dolor sit amet.</div>
              <a href="/" class="full-width-btn">More details</a>
            </div>
          </div>
        </div>

        <div class="single-block flex-1 mb-8 md:mb-0 px-4">
          <div class="flex bg-white rounded-lg shadow">
            <div style="background-image: url('{{ asset('assets/img/bg/sample-img.jpg') }}')" class="bg-img w-2/5 bg-gray-800 bg-cover bg-center rounded-lg rounded-r-none"></div>
            <div class="block-content w-3/5 p-4">
              <div class="text-2xl font-medium mb-4">Lorem ipsum dolor sit amet.</div>
              <a href="/" class="full-width-btn">More details</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Additional-Services Section --}}
    <section class="additional-services pt-28">
      <h2 class="section-title">additional services</h2>
      <div class="section-content flex flex-wrap justify-between text-lg -mx-4">
        <div class="single-block w-1/2 md:w-auto px-4 mb-8 md:mb-0">
          <a href="/" class="link underline">Lorem ipsum dolor sit.</a>
        </div>
        
        <div class="single-block w-1/2 md:w-auto px-4 mb-8 md:mb-0">
          <a href="/" class="link underline">Lorem ipsum dolor.</a>
        </div>
        
        <div class="single-block w-1/2 md:w-auto px-4 mb-8 md:mb-0">
          <a href="/" class="link underline">Lorem ipsum dolor sit ipsum.</a>
        </div>
        
        <div class="single-block w-1/2 md:w-auto px-4 mb-8 md:mb-0">
          <a href="/" class="link underline">Lorem ipsum dolor sit.</a>
        </div>
      </div>
    </section>

    {{-- Footer-Links Section --}}
    <section class="site-footer mt-24 py-8 border-t-2 border-gray-400">
      <div class="flex flex-wrap -mx-4">
        <div class="site-copyright flex-1 px-4">
          <div class="flex flex-wrap content-between justify-center md:justify-start h-full">
            <a href="/" class="left logo footer min-w-max mb-8 md:mb-0">
              <img width="100" src="{{ asset('assets/img/logo/logo-dark.png') }}" alt="" class="site-logo" />
              {{-- <h2 class="font-bold text-2xl">Brand Logo</h2> --}}
            </a>

            <div class="copyright-text text-base">
              Copyright &copy; <a href="/" class="">SellProperty</a> {{ date('Y', strtotime(today())) }}
            </div>
          </div>
        </div>

        <div class="footer-nav flex-1 px-4 hidden md:block">
          <a href="/" class="footer-link">For investors</a>
          <a href="/" class="footer-link">For agents</a>
          <a href="/" class="footer-link">For developers</a>
        </div>
        
        <div class="footer-nav flex-1 px-4 hidden md:block">
          <a href="/" class="footer-link">About</a>
          <a href="/" class="footer-link">Contacts</a>
          <a href="/" class="footer-link">Smart Search</a>
        </div>
        
        <div class="footer-nav flex-1 px-4 hidden md:block">
          <a href="/" class="footer-link">Blog</a>
          <a href="/" class="footer-link">Partnership</a>
          <a href="/" class="footer-link">Terms of use</a>
          <a href="/" class="footer-link">Privacy policy</a>
        </div>
      </div>
    </section>
  </div>

  {{-- Footer-BG --}}
  <div class="footer-bg bg-cover bg-top py-20"
    style="background-image: url('{{ asset('assets/img/bg/footer-bg-1.png') }}')">
  </div>
</div>