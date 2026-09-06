<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Documents — Demo</title>

  <!-- Tailwind (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50:  "#eef5ff",
              100: "#dbe9ff",
              500: "#2563eb",   /* primary blue */
              600: "#1d4ed8",
              700: "#1e40af"
            },
            ink:  "#0f172a",
            soft: "#e2e8f0",
            ok:   "#16a34a"
          },
          boxShadow: {
            soft: "0 8px 24px rgba(2,6,23,.08)"
          }
        }
      }
    }
  </script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-slate-100 text-slate-800">

  <!-- PAGE -->
  <div class="min-h-screen p-4 md:p-8">
    <div class="mx-auto max-w-6xl">
      <!-- Header -->
      <header class="mb-6">
        <h1 class="text-xl md:text-2xl font-semibold text-ink">
          All Completed Documents
        </h1>
        <p class="text-slate-500">Static demo layout (responsive).</p>
      </header>

      <!-- Content Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- LEFT: Profile Card -->
        <section class="bg-white rounded-2xl shadow-soft p-6">
          <div class="flex flex-col items-center text-center">
            <div class="w-36 h-36 rounded-full bg-red-600 text-white flex items-center justify-center text-3xl font-bold select-none">
              Photo
            </div>

            <h2 class="mt-4 text-lg font-bold tracking-wide">MD JAKIR HOSSEN</h2>

            <div class="mt-6 w-full space-y-3 text-sm">
              <div class="flex items-center justify-between border-b border-soft pb-2">
                <span class="text-slate-500">Account Status</span>
                <span class="font-semibold text-ok">Active</span>
              </div>
              <div class="flex items-center justify-between border-b border-soft pb-2">
                <span class="text-slate-500">Balance</span>
                <span class="font-semibold">10.00 <span class="text-slate-500">SR</span></span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-slate-500">Total Document</span>
                <span class="font-semibold">10</span>
              </div>
            </div>
          </div>
        </section>

        <!-- RIGHT: Documents List -->
        <section class="lg:col-span-2 bg-white rounded-2xl shadow-soft p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">All Completed Documents List</h3>
            <span class="text-xs px-2 py-1 rounded-full bg-brand-100 text-brand-700">Static</span>
          </div>

          <!-- List -->
          <ul class="space-y-3">
            <!-- Row item -->
            <li class="w-full">
              <div class="flex items-center gap-3 bg-brand-500/95 hover:bg-brand-600 text-white rounded-xl px-4 py-3 transition">
                <span class="flex-1 font-medium truncate">Jakir CV</span>

                <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                  <i class="fa-regular fa-eye"></i> View
                </a>

                <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                  <i class="fa-solid fa-arrow-down-to-line"></i> Download
                </a>
              </div>
            </li>

            <!-- Duplicate static rows -->
            <li><div class="flex items-center gap-3 bg-brand-500/95 hover:bg-brand-600 text-white rounded-xl px-4 py-3 transition">
              <span class="flex-1 font-medium truncate">Jakir CV</span>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-regular fa-eye"></i> View
              </a>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-solid fa-arrow-down-to-line"></i> Download
              </a>
            </div></li>

            <li><div class="flex items-center gap-3 bg-brand-500/95 hover:bg-brand-600 text-white rounded-xl px-4 py-3 transition">
              <span class="flex-1 font-medium truncate">Jakir CV</span>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-regular fa-eye"></i> View
              </a>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-solid fa-arrow-down-to-line"></i> Download
              </a>
            </div></li>

            <li><div class="flex items-center gap-3 bg-brand-500/95 hover:bg-brand-600 text-white rounded-xl px-4 py-3 transition">
              <span class="flex-1 font-medium truncate">Jakir CV</span>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-regular fa-eye"></i> View
              </a>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-solid fa-arrow-down-to-line"></i> Download
              </a>
            </div></li>

            <li><div class="flex items-center gap-3 bg-brand-500/95 hover:bg-brand-600 text-white rounded-xl px-4 py-3 transition">
              <span class="flex-1 font-medium truncate">Jakir CV</span>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-regular fa-eye"></i> View
              </a>
              <a href="#" class="inline-flex items-center gap-2 text-white/90 hover:text-white text-sm font-semibold bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition">
                <i class="fa-solid fa-arrow-down-to-line"></i> Download
              </a>
            </div></li>

            <!-- Add more static items as needed -->
          </ul>

          <!-- View More -->
          <div class="mt-5">
            <a href="#"
               class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-ink text-white px-5 py-3 font-semibold hover:bg-slate-900 transition">
              <i class="fa-solid fa-ellipsis"></i>
              View More
            </a>
          </div>
        </section>
      </div>
    </div>
  </div>

</body>
</html>
