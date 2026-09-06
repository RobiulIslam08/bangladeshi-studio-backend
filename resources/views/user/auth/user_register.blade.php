<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>BangladeshiStudio - User Registration</title>
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
      <img style="width:50px;height:50px; margin:auto;" src="{{ asset('frontsite/logo.jpeg') }}" alt="BangladeshiStudio Logo">
      
      <!-- Heading -->
      <h2 class="text-xl font-semibold text-gray-800 mb-1 text-center">
        Create Account
      </h2>
      <p class="text-xs text-gray-500 text-center mb-6">
        Please fill in the details to create your account
      </p>

      <!-- Register Form -->
      <form action="{{ route('customRegister') }}" method="POST" class="space-y-4">
    @csrf

        <div>
          <label for="fname" class="block text-sm font-medium text-gray-700 mb-1">
            First Name
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              <i class="fa-regular fa-user"></i>
            </span>
            <input
              type="text"
              id="fname"
              name="fname"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Enter your full name"
            />
          </div>
        </div>
        <div>
          <label for="lname" class="block text-sm font-medium text-gray-700 mb-1">
            Last Name
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              <i class="fa-regular fa-user"></i>
            </span>
            <input
              type="text"
              id="lname"
              name="lname"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Enter your full name"
            />
          </div>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
            Email Address
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              <i class="fa-regular fa-envelope"></i>
            </span>
            <input
              type="email"
              id="email"
              name="email"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Enter your email"
            />
          </div>
        </div>

        <!-- Phone -->
        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
            Phone Number
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              <i class="fa-solid fa-phone"></i>
            </span>
            <input
              type="text"
              id="phone"
              name="phone"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Enter your phone number"
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
              <i class="fa-solid fa-lock"></i>
            </span>
            <input
              type="password"
              id="password"
              name="password"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Create a password"
            />
          </div>
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
            Confirm Password
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">
              <i class="fa-solid fa-lock"></i>
            </span>
            <input
              type="password"
              id="password_confirmation"
              name="password_confirmation"
              required
              class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brandBlue focus:border-transparent text-sm"
              placeholder="Re-enter your password"
            />
          </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="flex items-center text-xs text-gray-600">
          <input
            id="terms"
            name="terms"
            type="checkbox"
            required
            class="h-3.5 w-3.5 text-brandBlue border-gray-300 rounded focus:ring-brandBlue"
          />
          <label for="terms" class="ml-2">
            I agree to the
            <a href="#" class="text-brandBlue hover:underline">Terms &amp; Conditions</a>
          </label>
        </div>

        <!-- Register Button -->
        <button
          type="submit"
          class="w-full py-2.5 text-sm font-semibold rounded-lg bg-brandGreen hover:bg-green-600 text-white shadow-sm transition"
        >
          Register
        </button>

        <!-- Separator -->
        <div class="flex items-center my-2">
          <div class="flex-1 h-px bg-gray-200"></div>
          <span class="px-3 text-xs text-gray-400 uppercase">or</span>
          <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <!-- Social Register -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <button
            type="button"
            class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 text-xs font-medium hover:bg-gray-50 transition"
          >
            <span>
              <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="18" />
            </span>
            <span>Sign up with Google</span>
          </button>
          <button
            type="button"
            class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 text-xs font-medium hover:bg-gray-50 transition"
          >
            <span><i class="fa-brands fa-facebook-f"></i></span>
            <span class="ml-2">Sign up with Facebook</span>
          </button>
        </div>
      </form>

      <!-- Already have account -->
      <div class="mt-6 text-center">
        <p class="text-xs text-gray-600">
          Already have an account?
          <a href="https://bangladeshistudeo.com/user/login" class="font-semibold text-brandBlue hover:underline">
            Login here
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
