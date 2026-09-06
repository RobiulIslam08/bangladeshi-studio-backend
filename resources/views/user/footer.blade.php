      <!-- Footer -->
      <footer class="bg-[#111111] w-full sm:p-9 pt-5">
        <div class="flex items-center justify-between px-6 md:px-24 mb-7">
          <div class="flex items-center gap-4">
            <img src="{{ asset('frontsite/logo.jpeg') }}" alt="logo" class="w-[60px] rounded-full max-w-full" />
            <div class="hidden md:flex flex-col">
              <h1 class="text-xl md:text-2xl font-semibold text-white">Bangladeshi Studeo</h1>
              <p class="text-[#b1aaaa]">is Trusted Document Site.</p>
            </div>
          </div>
          <div class="flex gap-4 text-2xl md:text-3xl mt-4">
            <i class="fab fa-facebook text-[#0866FF] hover:scale-125 transition-all"></i>
            <i class="fab fa-instagram text-[#E1306C] hover:scale-125 transition-all"></i>
            <i class="fab fa-linkedin text-[#0A66C2] hover:scale-125 transition-all"></i>
            <i class="fab fa-youtube text-[#FF0000] hover:scale-125 transition-all"></i>
            <i class="fa-brands fa-x-twitter text-[#E7ECF0] hover:scale-125 transition-all"></i>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-6 md:px-24">
          <div class="w-full">
            <h3 class="text-xl font-semibold text-white mb-2">Reach Us</h3>
            <div class="flex flex-col gap-3 text-[#999999]">
              <div class="flex items-center gap-2"><i class="fas fa-phone text-[#b4f079d2]"></i><span>01323090887</span></div>
              <div class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-[#b4f079d2]"></i><span>Sherpur, Mymensingh, Bangladesh</span></div>
              <div class="flex items-center gap-2"><i class="fas fa-envelope text-[#b4f079d2]"></i><span>bangladeshistudeo@gmail.com</span></div>
            </div>
          </div>

          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-white mb-2">Services</h3>
            <div class="flex flex-col gap-2 text-[#999999]">
              <p class="hover:text-blue-500 cursor-pointer transition-all duration-200">Service Name</p>
            </div>
          </div>

          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-white mb-2">Links</h3>
            <div class="flex flex-col gap-2 text-[#999999]">
              <p class="hover:text-blue-500 cursor-pointer transition-all duration-200">Home</p>
            </div>
          </div>

          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-white mb-2">Contact Us</h3>
            <form class="space-y-3">
              <input type="text" placeholder="Name" class="w-full p-2 rounded bg-gray-800 text-white"/>
              <input type="email" placeholder="Email" class="w-full p-2 rounded bg-gray-800 text-white"/>
              <input type="tel" placeholder="Phone" class="w-full p-2 rounded bg-gray-800 text-white"/>
              <textarea class="w-full p-2 rounded bg-gray-800 text-white" placeholder="Message"></textarea>
              <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded transition-all">Submit</button>
            </form>
          </div>
        </div>

        <div class="flex flex-wrap gap-4 justify-center items-center mt-8">
          <i class="fab fa-cc-visa text-2xl md:text-4xl text-[#082fca]"></i>
          <i class="fab fa-cc-discover text-2xl md:text-4xl text-[#e87800]"></i>
          <i class="fab fa-cc-mastercard text-2xl md:text-4xl text-[#e3001b]"></i>
          <i class="fab fa-cc-paypal text-2xl md:text-4xl text-[#00aee3]"></i>
          <i class="fab fa-cc-amazon-pay text-2xl md:text-4xl text-[#b4f079d2]"></i>
          <i class="fa-brands fa-apple-pay text-2xl md:text-5xl text-[#767775d2]"></i>
          <i class="fa-brands fa-google-pay text-2xl md:text-5xl text-[#b7e7a0d2]"></i>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-6 text-center">
          <p class="text-gray-500">Copyright © 2025 Bangladesh Studeo.</p>
        </div>
      </footer>

    </div> <!-- /font container -->

    <!-- JS (keep at end for performance) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
      function subser(link){ window.location.href = link; }
    </script>
  </body>
</html>
