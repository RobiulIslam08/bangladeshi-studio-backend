<!--header-->
@include('muqeem/header')

<!-- main-content.blade.php-->
<!--user-->
 <section class="px-4 md:px-16 py-10 bg-gray-100 min-h-screen">
  <div class="flex flex-col lg:flex-row gap-8">

    <!-- Left Sidebar Menu -->
    @include('muqeem/sideber')


    <!-- Right User Profile Section -->
    <main class="w-full lg:w-3/4 bg-white rounded-xl shadow p-8 flex flex-col items-center text-center">
      <div class="w-32 h-32 mb-4">
        <img
          src="{{ asset('frontsite/user-placeholder.png') }}"
          alt="User Image"
          class="w-full h-full rounded-full object-cover border-4 border-accent shadow"
        />
      </div>
      <h2 class="text-2xl font-bold text-secondary mb-1">Hi {{ Auth::user()->Name }}</h2>
      <p class="text-gray-600">Your Account is {{ Auth::user()->status }}</p>
      <div class="mt-6 text-left w-full max-w-xl">
        <h3 class="text-xl font-semibold text-secondary mb-2">User Details</h3>
        <ul class="space-y-2 text-gray-700">
          <li><strong>Name:</strong> {{ Auth::user()->Name }}</li>
          <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
          <li><strong>Phone:</strong> {{ Auth::user()->phone }}</li>
          <li><strong>Joined:</strong> {{ Auth::user()->joindate }}</li>
          <li><strong>Available Limit:</strong> {{ Auth::user()->limit }}</li>
        </ul>
      </div>
    </main>

  </div>
</section>

<!-- footer.blade.php -->
@include('muqeem/footer')

