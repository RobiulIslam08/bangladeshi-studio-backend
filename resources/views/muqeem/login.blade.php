<!--header-->
@include('muqeem/header')

<!-- main-content.blade.php-->
<!--login section-->
<section class="px-6 md:px-24 py-10 bg-white">
  <div class="max-w-md mx-auto bg-gray-100 rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold text-center text-secondary mb-6">Login to Your Account</h2>
    <form method="POST" action="{{route('muqeemUserCheck')}}" class="space-y-5">
      @csrf
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          required
          class="w-full p-3 rounded bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-accent"
        />
      </div>
      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          required
          class="w-full p-3 rounded bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-accent"
        />
      </div>
      <button
        type="submit"
        class="w-full bg-primary text-white py-3 rounded hover:bg-red-700 transition-all font-semibold"
      >
        Login
      </button>
    </form>
  </div>
</section>
<!-- footer.blade.php -->
@include('muqeem/footer')

