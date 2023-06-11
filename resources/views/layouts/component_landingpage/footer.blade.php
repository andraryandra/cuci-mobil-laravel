   <!-- Footer top -->
   <div class="template-footer-top">

       <!-- Layout 25x25x25x25 -->
       <div class="template-layout-25x25x25x25 template-clear-fix">

           <!-- Left column -->
           <div class="template-layout-column-left">
               <h6>About</h6>
               <p>Autospan Hand Wash is an eco-friendly hand car wash and detailing service based in Portland.
               </p>
               <img src="media/image/logo.png" alt="" class="template-logo" />
           </div>

           <!-- Center left column -->
           <div class="template-layout-column-center-left">
               <h6>Kategori Cuci Boking</h6>
               <ul class="template-list-reset">
                   @foreach ($kategori_mobil->take(5) as $item)
                       <li><a href="service-style-1.html">{{ $item->kategori_mobil }}</a></li>
                   @endforeach
               </ul>
           </div>

           <!-- Center right column -->
           <div class="template-layout-column-center-right">
               <h6>Company</h6>
               <ul class="template-list-reset">
                   <li><a href="{{ route('landingPage.home') }}">Home</a></li>
                   <li><a href="{{ route('landingPage.contact') }}">Contact</a></li>
                   <li><a href="{{ route('landingPage.booking') }}">Booking</a></li>
               </ul>
           </div>

           {{-- <!-- Right column -->
           <div class="template-layout-column-right">
               <h6>Newsletter</h6>
               <form class="template-component-newsletter-form">
                   <div class="template-component-form-field">
                       <label for="newsletter-form-email">Your e-mail address *</label>
                       <input type="text" name="newsletter-form-email" id="newsletter-form-email" />
                   </div>
                   <div class="template-margin-top-2">
                       <input type="submit" value="Subscribe" class="template-component-button"
                           name="newsletter-form-submit" id="newsletter-form-submit" />
                   </div>
               </form>
           </div> --}}

       </div>

   </div>

   <!-- Footer bottom -->
   <div class="template-footer-bottom">

       <!-- Social icon list -->
       <ul class="template-component-social-icon-list template-component-social-icon-list-2">
           <li><a href="https://twitter.com/quanticalabs" class="template-icon-social-twitter" target="_blank"></a></li>
           <li><a href="https://www.facebook.com/QuanticaLabs" class="template-icon-social-facebook"
                   target="_blank"></a></li>


       </ul>

       <!-- Copyright -->
       <div class="template-footer-bottom-copyright">
           By <a href="http://quanticalabs.com" target="_blank">QuanticaLabs</a> &copy; 2016 <a
               href="http://themeforest.net/user/QuanticaLabs/portfolio?ref=quanticalabs" target="_blank">Auto Spa
               Template</a>
       </div>

   </div>
