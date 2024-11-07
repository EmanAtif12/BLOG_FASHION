<x-weblayout> 
<!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Our Fashion Services</h1>
            <p class="services_text">Explore our range of exclusive services designed to enhance your fashion experience.</p>
            <div class="services_section_2">
               <div class="row">
                  <div class="col-md-4">
                     <div><img src="images/1 (1).jpg" class="services_img" alt="Personal Styling"></div>
                     <div class="btn_main"><a href="{{ url('/services/personal-styling') }}">Personal Styling</a></div>
                  </div>
                  <div class="col-md-4">
                     <div><img src="images/1 (2).jpg" class="services_img" alt="Personal Shopping"></div>
                     <div class="btn_main active"><a href="{{ url('/services/personal-shopping') }}">Personal Shopping</a></div>
                  </div>
                  <div class="col-md-4">
                     <div><img src="https://images.pexels.com/photos/4621910/pexels-photo-4621910.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="services_img" alt="Custom Tailoring" style="height: 235px; object-fit: cover;"></div>
                     <div class="btn_main"><a href="{{ url('/custom-tailoring') }}">Custom Tailoring</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
</x-weblayout> 
