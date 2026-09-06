<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bangladeshi Studeo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#e12454",
              secondary: "#424242",
              accent: "#60a5fa",
            },
          },
        },
      };
    </script>
    <!-- for  carosel -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"
      rel="stylesheet"
    />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="icon" type="image/png" href="{{ asset('frontsite/logo.jpeg') }}">

  </head>
  <body>
    <div class="font-[sans-serif]">
      <!-- for navbar -->
      <!-- Notice Marquee -->
      <div class="flex bg-accent justify-between items-center">
        <h1
          class="bg-primary text-white w-20 px-4 py-1 md:py-2 font-semibold [clip-path:polygon(0_0,100%_0,84%_100%,0%_100%)]"
        >
          Notice
        </h1>
        <marquee class="py-1 text-white">
          This is notice Lorem ipsum dolor sit amet consectetur adipisicing
          elit. Quibusdam est tempora, quae nisi rem quisquam nam nihil ab
          ducimus adipisci.
        </marquee>
      </div>
      <!-- for navbar -->
      <!-- Main Navigation -->
      <nav
        class="flex items-center justify-between w-full relative px-2 mt-2 md:px-7 shadow-md border-b-2 sticky top-0 z-50 bg-white"
      >
        <div class="flex items-center gap-4">
          
          <img src="{{ asset('frontsite/logo.jpeg') }}" alt="logo" class="w-[60px] max-w-full" />
          <div>
            <h1 class="text-xl md:text-2xl font-semibold text-secondary">
              Bangladeshi Studeo 
            </h1>
            <p class="text-secondary">is Trusted Document Site.</p>
          </div>
        </div>

        <!-- Desktop Menu -->
        <ul
          class="items-center gap-5 text-base text-secondary md:flex hidden font-semibold"
        >
          <li
            class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 cursor-pointer capitalize"
          >
            home
          </li>
          <li
            class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 cursor-pointer capitalize"
          >
            about us
          </li>
          <li
            class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 cursor-pointer capitalize"
          >
            services
          </li>
          
          <li
            class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 cursor-pointer capitalize"
          >
            about us
          </li>
          <li
            class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 cursor-pointer capitalize"
          >
            login
          </li>
        </ul>

        <!-- Mobile Menu Toggle -->
        <button
          id="menuToggle"
          class="md:hidden flex cursor-pointer transition-transform duration-300 ease-in-out"
        >
          <svg
            id="menuIcon"
            class="w-7 h-7 text-secondary"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
          <svg
            id="closeIcon"
            class="w-7 h-7 text-secondary hidden"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>

        <!-- Mobile Menu -->
        <div
          id="mobileMenu"
          class="transform transition-all duration-500 ease-in-out md:hidden bg-white pt-2 text-center absolute top-[60px] right-0 w-[200px] opacity-0 z-[-1] border-l"
        >
          <ul class="flex flex-col gap-2 text-secondary">
            <li
              class="w-full hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 cursor-pointer capitalize"
            >
              home
            </li>
            <li
              class="w-full hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 cursor-pointer capitalize"
            >
              about us
            </li>
            <li
              class="w-full hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 cursor-pointer capitalize"
            >
              services
            </li>
            <li
              class="w-full hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 cursor-pointer capitalize"
            >
              home
            </li>
            <li
              class="w-full hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 cursor-pointer capitalize"
            >
              about us
            </li>
            <li
              class="w-full hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 cursor-pointer capitalize"
            >
              services
            </li>
          </ul>
        </div>
      </nav>

      <!-- for slider -->
      <div id="default-carousel" class="relative w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 lg:h-[70vh]">
          <!-- Item 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset('frontsite/slide5.jpg') }}"
              class="w-full h-full object-contain block"
              alt="..."
            />
          </div>
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset('frontsite/slide4.jpg') }}"
              class="w-full h-full object-contain block"
              alt="..."
            />
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset('frontsite/slide1.jpg') }}"
              class="w-full h-full object-contain block"
              alt="..."
            />
          </div>
          <!-- Item 4 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset('frontsite/slide2.jpg') }}"
              class="w-full h-full object-contain block"
              alt="..."
            />
          </div>
          <!-- Item 5 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset('frontsite/slide3.jpg') }}"
              class="w-full h-full object-contain block"
              alt="..."
            />
          </div>
          <!-- Item 6 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset('frontsite/slide6.jpg') }}"
              class="w-full h-full object-contain block"
              alt="..."
            />
          </div>
        </div>
        <!-- Slider indicators -->
        <div
          class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse"
        >
          <button
            type="button"
            class="w-2 h-2 rounded-full"
            aria-current="true"
            aria-label="Slide 1"
            data-carousel-slide-to="0"
          ></button>
          <button
            type="button"
            class="w-2 h-2 rounded-full"
            aria-current="false"
            aria-label="Slide 2"
            data-carousel-slide-to="1"
          ></button>
          <button
            type="button"
            class="w-2 h-2 rounded-full"
            aria-current="false"
            aria-label="Slide 3"
            data-carousel-slide-to="2"
          ></button>
          <button
            type="button"
            class="w-2 h-2 rounded-full"
            aria-current="false"
            aria-label="Slide 4"
            data-carousel-slide-to="3"
          ></button>
          <button
            type="button"
            class="w-2 h-2 rounded-full"
            aria-current="false"
            aria-label="Slide 5"
            data-carousel-slide-to="4"
          ></button>
          <button
            type="button"
            class="w-2 h-2 rounded-full"
            aria-current="false"
            aria-label="Slide 6"
            data-carousel-slide-to="5"
          ></button>
        </div>
        <!-- Slider controls -->
        <button
          type="button"
          class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-prev
        >
          <span
            class="inline-flex items-center justify-center w-6 md:w-10 h-6 md:h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60"
          >
            <svg
              class="w-2 md:w-4 h-2 md:h-4 text-white dark:text-gray-800 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 1 1 5l4 4"
              />
            </svg>
            <span class="sr-only">Previous</span>
          </span>
        </button>
        <button
          type="button"
          class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-next
        >
          <span
            class="inline-flex items-center justify-center w-6 md:w-10 h-6 md:h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60"
          >
            <svg
              class="w-2 md:w-4 h-2 md:h-4 text-white dark:text-gray-800 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 9 4-4-4-4"
              />
            </svg>
            <span class="sr-only">Next</span>
          </span>
        </button>
      </div>

      <!-- for service -->
	  <div class="my-5 md:my-7 lg:my-9">
		<h1 class="text-lg md:text-xl lg:text-2xl xl:text-3xl font-bold text-center mb-6 text-[#222222]">
		  Our Services
		</h1>
	  
		<div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-8 justify-items-center gap-6 w-[90%] mx-auto">
		  <!-- Service Card -->
		  <div onclick="subser('https://www.medicaltestcertificate.online/')" class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/medical_logo.png') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Medical Certificate</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/cv_logo.png') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">CV</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div onclick="subser('https://bangladeshistudeo.com/muqeemUser')" class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Muqeem</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
		  <!-- Service Card -->
		  <div class="w-[95px] md:w-[120px] lg:w-[140px] h-[95px] md:h-[120px] lg:h-[140px] relative overflow-hidden cursor-pointer rounded-md">
			<img src="{{ asset('frontsite/residence.jpg') }}" alt="Residence" class="w-full h-full object-cover scale-[1.1] transition-all duration-700" />
	  
			<!-- Overlay Text -->
			<div class="absolute top-1/2 left-0 w-full h-full transform -translate-y-1/2 z-20 flex items-center justify-center flex-col transition-all duration-500">
			  <h1 class="text-base font-bold text-center capitalize text-white">Residence</h1>
			  <i class="fa-solid fa-square-arrow-up-right text-[18px] mt-4 text-[#b4f079d2]"></i>
			</div>
	  
			<!-- Bottom Shadow -->
			<div class="w-full h-full absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/50"></div>
		  </div>
	  
		  <!-- Duplicate this div for additional services and change the image & text accordingly -->
		</div>
	  </div>
	  

      <!-- for footer -->
      <footer class="bg-[#111111] w-full sm:p-9 pt-5">
        <!-- Logo and Social Links -->
        <div class="flex items-center justify-between px-6 md:px-24 mb-7">
          <!-- Logo Section -->
          <div class="flex items-center gap-4">
            <img src="{{ asset('frontsite/logo.jpeg') }}" alt="logo" class="w-[60px] rounded-full max-w-full" />
            <div class="hidden md:flex flex-col">
              <h1 class="text-xl md:text-2xl font-semibold text-white">
                Bangladeshi Studeo
              </h1>
              <p class="text-[#b1aaaa]">is Trusted Document Site.</p>
            </div>
          </div>

          <!-- Social Icons -->
          <div class="flex gap-4 text-2xl md:text-3xl mt-4">
            <i
              class="fab fa-facebook hover:text-[#0866FF] text-[#0866FF] transition-all duration-300 ease-in hover:scale-125"
            ></i>
            <i
              class="fab fa-instagram hover:text-[#E1306C] text-[#E1306C] transition-all duration-300 ease-in hover:scale-125"
            ></i>
            <i
              class="fab fa-linkedin text-[#0A66C2] transition-all duration-300 ease-in hover:scale-125"
            ></i>
            <i
              class="fab fa-youtube text-[#FF0000] transition-all duration-300 ease-in hover:scale-125"
            ></i>
            <i
              class="fa-brands fa-x-twitter text-[#E7ECF0] transition-all duration-300 ease-in hover:scale-125"
            ></i>
          </div>
        </div>

        <!-- Main Content Sections -->
        <div
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-6 md:px-24"
        >
          <!-- Reach Us -->
          <div class="w-full">
            <h3 class="text-xl font-semibold text-white mb-2">Reach Us</h3>
            <div class="flex flex-col gap-3 text-[#999999]">
              <div class="flex items-center gap-2">
                <i class="fas fa-phone text-[#b4f079d2]"></i>
                <span>01323090887</span>
              </div>
              <div class="flex items-center gap-2">
                <i class="fas fa-map-marker-alt text-[#b4f079d2]"></i>
                <span>Sherpur, Mymensingh, Bangladesh</span>
              </div>
              <div class="flex items-center gap-2">
                <i class="fas fa-envelope text-[#b4f079d2]"></i>
                <span>bangladeshistudeo@gmail.com</span>
              </div>
            </div>
          </div>

          <!-- Services -->
          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-white mb-2">Services</h3>
            <div class="flex flex-col gap-2 text-[#999999]">
              <p
                class="hover:text-blue-500 cursor-pointer transition-all duration-200"
              >
                Service Name
              </p>
              <!-- Repeat for other services -->
            </div>
          </div>

          <!-- Quick Links -->
          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-white mb-2">Links</h3>
            <div class="flex flex-col gap-2 text-[#999999]">
              <p
                class="hover:text-blue-500 cursor-pointer transition-all duration-200"
              >
                Home
              </p>
              <!-- Repeat for other links -->
            </div>
          </div>

          <!-- Contact Form -->
          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-white mb-2">Contact Us</h3>
            <form class="space-y-3">
              <input
                type="text"
                placeholder="Name"
                class="w-full p-2 rounded bg-gray-800 text-white"
              />
              <input
                type="email"
                placeholder="Email"
                class="w-full p-2 rounded bg-gray-800 text-white"
              />
              <input
                type="tel"
                placeholder="Phone"
                class="w-full p-2 rounded bg-gray-800 text-white"
              />
              <textarea
                class="w-full p-2 rounded bg-gray-800 text-white"
                placeholder="Message"
              ></textarea>
              <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded transition-all"
              >
                Submit
              </button>
            </form>
          </div>
        </div>

        <!-- Payment Methods -->
        <div class="flex flex-wrap gap-4 justify-center items-center mt-8">
          <i class="fab fa-cc-visa text-2xl md:text-4xl text-[#082fca]"></i>
          <i class="fab fa-cc-discover text-2xl md:text-4xl text-[#e87800]"></i>
          <i
            class="fab fa-cc-mastercard text-2xl md:text-4xl text-[#e3001b]"
          ></i>
          <i class="fab fa-cc-paypal text-2xl md:text-4xl text-[#00aee3]"></i>
          <i
            class="fab fa-cc-amazon-pay text-2xl md:text-4xl text-[#b4f079d2]"
          ></i>
          <i
            class="fa-brands fa-apple-pay text-2xl md:text-5xl text-[#767775d2]"
          ></i>
          <i
            class="fa-brands fa-google-pay text-2xl md:text-5xl text-[#b7e7a0d2]"
          ></i>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-8 pt-6 text-center">
          <p class="text-gray-500">Copyright © 2025 Bangladesh Studeo.</p>
        </div>
      </footer>
      

      <!-- end div -->
    </div>
    <!-- for carosel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function subser(link){
            
            window.location.href = link;
        }
    </script>

  </body>
</html>
