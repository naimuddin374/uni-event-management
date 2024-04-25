@extends('layouts.main')
@section('content')

<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>Contact</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bradcam_area_end  -->

<!-- ================ contact section start ================= -->
<section class="contact-section">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3650.7451740732095!2d90.40279!3d23.792086999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDQ3JzMxLjUiTiA5MMKwMjQnMTAuMCJF!5e0!3m2!1sen!2sbd!4v1714025271514!5m2!1sen!2sbd"
        width="1200" height="600" style="border:0;" allowfullscreen=""
        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <!-- <div id="map"
        style="height: 480px; position: relative; overflow: hidden;"></div> -->
      <!-- <script>
      function initMap() {
        var uluru = {
          lat: -25.363,
          lng: 131.044
        };
        var grayStyles = [{
            featureType: "all",
            stylers: [{
                saturation: -90
              },
              {
                lightness: 50
              }
            ]
          },
          {
            elementType: 'labels.text.fill',
            stylers: [{
              color: '#ccdee9'
            }]
          }
        ];
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: -31.197,
            lng: 150.744
          },
          zoom: 9,
          styles: grayStyles,
          scrollwheel: false
        });
      }
      </script>
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
      </script> -->

    </div>


    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Get in Touch</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" action="contact_process.php"
          method="post" id="contactForm" novalidate="novalidate">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control w-100" name="message" id="message"
                  cols="30" rows="9" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter Message'"
                  placeholder="Messege"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control valid" name="name" id="name"
                  type="text" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter your name'"
                  placeholder="Enter your name">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control valid" name="email" id="email"
                  type="email" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter email address'"
                  placeholder="Email">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" name="subject" id="subject"
                  type="text" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter Subject'"
                  placeholder="Enter Subject">
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="submit"
              class="button button-contactForm boxed-btn">Send</button>
          </div>
        </form>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>House # 87, Road # 06, Block-C,</h3>
            <p>Banani, Dhaka-1213, Bangladesh</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>Plot # 1&2, Road # 1&2, Sector # 16/I,</h3>
            <p>Uttara, Dhaka-1230, Bangladesh</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3>+880 153 565 2365</h3>
            <p>Tue to Sun 9am to 6pm</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3>fiucec.club@gmail.com</h3>
            <p>Send us your query anytime!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ contact section end ================= -->
@endsection