<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>BangladeshiStudio - User Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <!-- Optional: basic Tailwind config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brandBlue: "#1E40AF",
            brandGreen: "#16A34A",
            brandRed: "#DC2626",
          },
        },
      },
    };
  </script>
  <link rel="icon" type="image/png" href="{{ asset('frontsite/logo.jpeg') }}">
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4">
  <!-- Wrapper -->
  
  
  <div class="w-full max-w-md">
    <!-- Brand / Logo -->
    <div class="text-center mb-6">
      <h1 class="text-2xl font-extrabold text-brandBlue">
        BangladeshiStudio
      </h1>
      
    </div>

    <!-- Card -->
    <div class="bg-white shadow-xl rounded-2xl p-6 md:p-8">
        <img style="width:50px;height:50px; margin:auto;" src="{{ asset('frontsite/logo.jpeg') }}" alt="">
      <!-- Heading -->
      <h2 class="text-xl font-semibold text-gray-800 mb-1 text-center">
        Login
      </h2>
      <p class="text-xs text-gray-500 text-center mb-6">
        Please login to continue to your account
      </p>

      <!-- Login Form -->
      <form action="{{ route('customLogin') }}" method="POST" class="space-y-4">
    @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
            Email or Phone Number
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              📧
            </span>
            <input
              type="text"
              id="email"
              name="email"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Enter your email or phone"
            />
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
            Password
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              🔒
            </span>
            <input
              type="password"
              id="password"
              name="password"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Enter your password"
            />
          </div>
          <div class="flex justify-end mt-1">
            <a href="#" class="text-xs text-brandBlue hover:underline">
              Forgot password?
            </a>
          </div>
        </div>
        
        
        {{-- ALERT MESSAGE --}}
@if (session('error'))
    <div class="mb-4 p-3 text-sm text-white bg-red-600 rounded-lg text-center">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="mb-4 p-3 text-sm text-white bg-green-600 rounded-lg text-center">
        {{ session('success') }}
    </div>
@endif

        <!-- Login Button -->
        <button
          type="submit"
          class="w-full py-2.5 text-sm font-semibold rounded-lg bg-brandBlue hover:bg-blue-700 text-white shadow-sm transition"
        >
          Login
        </button>

        <!-- Separator -->
        <div class="flex items-center my-2">
          <div class="flex-1 h-px bg-gray-200"></div>
          <span class="px-3 text-xs text-gray-400 uppercase">or</span>
          <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <!-- Social Login -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <button
            type="button"
            class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 text-xs font-medium hover:bg-gray-50 transition"
          >
            <span>
  <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="18" />
</span>
<span>Login with Google</span>

          </button>
          <button
            type="button"
            class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 text-xs font-medium hover:bg-gray-50 transition"
          >
            <span><i class="fa-brands fa-facebook-f"></i></span>
<span style="margin-left:8px;">Login with Facebook</span>


          </button>
        </div>
      </form>

      <!-- Create Account -->
      <div class="mt-6 text-center">
        <p class="text-xs text-gray-600">
          Don’t have an account?
          <a href="https://bangladeshistudeo.com/user/register" class="font-semibold text-brandGreen hover:underline">
            Create a new account
          </a>
        </p>
      </div>
    </div>

    <!-- Small footer text -->
    <p class="mt-4 text-center text-[11px] text-gray-400">
      © <span id="year"></span> BangladeshiStudio.com • All rights reserved.
    </p>
  </div>

  <script>
    // Set current year in footer
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>
</html>
