<?php 

?>
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center mb-5">
              <h2 class="text-black section-title text-uppercase">Contact Us</h2>
            </div>
          </div>
          <div class="text-center mb-3" style="font-size:1.5em; font-weight:bold;">
               <span class="icon-phone pl-3 pr-3"></span> <span><a id="donatenum" href='tel:{{$setting->phone_num}}'>{{ phoneNum($setting->phone_num) }}</a></span>
          </div>
          <div class="text-center mb-3" style="font-size:2.5em;">
            <a href="https://m.facebook.com/YouTAF.afr/" target="_blank" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <!-- <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a> -->
            <a href="https://www.instagram.com/youngtalentedfellows/" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <!-- <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a> -->
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6 mb-5">
              <form action="#" method="post" id="contactForm">
                <div class="form-group row">
                  <div class="col-md-6 mb-4 mb-lg-0">
                    <input type="text" class="form-control" name="fname" placeholder="First name">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="lname" placeholder="First name">
                  </div>
                </div>
  
                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="email" placeholder="Email address">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Your Subject">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <textarea name="message" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 ml-auto">
                    <input type="submit" id="submit-btn" class="btn btn-block btn-primaryB text-white py-3 px-5" value="Send Message">
                  </div>
                </div>
                
                <div class="alert alert-info" id="alert-msg" style="display: none"></div>
                <div id="success" class="alert alert-success" style="display: none"></div>             
                <div id="error" class="alert alert-danger" style="display: none"></div>
              </form>
            </div>
            
          </div>
          
            
        </div>
      </div>