<!-- header.blade.php -->
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('frontsite/logo.jpeg') }}">
    <style>
      @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
      }
      .animate-marquee {
        animation: marquee 10s linear infinite;
      }
    </style>
  </head>
  <body>
    <div class="font-[sans-serif]">
      <!-- Notice Marquee -->
      <div class="flex bg-accent justify-between items-center">
        <h1 class="bg-primary text-white w-20 px-4 py-1 md:py-2 font-semibold [clip-path:polygon(0_0,100%_0,84%_100%,0%_100%)]">Notice</h1>
        <div class="overflow-hidden whitespace-nowrap py-1 text-white">
          <div class="animate-marquee inline-block">
            This is notice Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam est tempora, quae nisi rem quisquam nam nihil ab ducimus adipisci.
          </div>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="flex items-center justify-between w-full relative px-2 mt-2 md:px-7 shadow-md border-b-2 sticky top-0 z-50 bg-white">
        <div class="flex items-center gap-4">
          <img src="{{ asset('frontsite/logo.jpeg') }}" alt="logo" class="w-[60px] max-w-full" />
          <div>
            <h1 class="text-xl md:text-2xl font-semibold text-secondary">Bangladeshi Studeo</h1>
            <p class="text-secondary">is Trusted Document Site.</p>
          </div>
        </div>

        <ul class="items-center gap-5 text-base text-secondary md:flex hidden font-semibold">
          <li><a href="#" class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 capitalize block">home</a></li>
          <li><a href="#" class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 capitalize block">about us</a></li>
          <li><a href="#" class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 capitalize block">services</a></li>
          <li><a href="#" class="hover:border-b-primary border-b-2 border-transparent transition-all duration-500 capitalize block">log Out</a></li>
        </ul>

        <button id="menuToggle" class="md:hidden flex cursor-pointer transition-transform duration-300 ease-in-out">
          <svg id="menuIcon" class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="closeIcon" class="w-7 h-7 text-secondary hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div id="mobileMenu" class="transform transition-all duration-500 ease-in-out md:hidden bg-white pt-2 text-center absolute top-[60px] right-0 w-[200px] opacity-0 z-[-1] border-l">
          <ul class="flex flex-col gap-2 text-secondary">
            <li><a href="#" class="hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 capitalize block">home</a></li>
            <li><a href="#" class="hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 capitalize block">about us</a></li>
            <li><a href="#" class="hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 capitalize block">services</a></li>
            <li><a href="#" class="hover:border-b-primary border-b pb-2 border-gray-300 transition-all duration-500 capitalize block">login</a></li>
          </ul>
        </div>
      </nav>