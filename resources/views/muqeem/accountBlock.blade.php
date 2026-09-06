<!--header-->
@include('muqeem/header')

<!-- main-content.blade.php-->
<!--user-->
 <section class="px-4 md:px-16 py-10 bg-gray-100 min-h-screen">
  <div class="flex flex-col lg:flex-row gap-8">




    <!-- Right User Profile Section -->
    <!-- Right User Profile Section -->
<main class="w-full lg:w-3/4 bg-white rounded-xl shadow p-8 flex flex-col items-center text-center">
  
  <!-- Alert for Deactivated Account -->
  <div class="flex flex-col items-center justify-center bg-red-100 border border-red-400 text-red-700 px-6 py-8 rounded-xl shadow-md space-y-4">
    
    <!-- Block Icon -->
    <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-6m0-6h.01M21 12A9 9 0 113 12a9 9 0 0118 0z"></path>
    </svg>

    <!-- Alert Text -->
    <h2 class="text-2xl font-bold">Your Account is Deactive</h2>
    <p class="text-md">Please contact the Admin for assistance.</p>

  </div>

</main>


  </div>
</section>

<!-- footer.blade.php -->
@include('muqeem/footer')

