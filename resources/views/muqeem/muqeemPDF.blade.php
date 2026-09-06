<!--header-->
@include('muqeem/header')

<!-- main-content.blade.php-->
<!--user-->
 <section class="px-4 md:px-16 py-10 bg-gray-100 min-h-screen">
  <div class="flex flex-col lg:flex-row gap-8">

    <!-- Left Sidebar Menu -->
    @include('muqeem/sideber')


    <!-- Muqeem PDF -->
    <main class="w-full lg:w-3/4 bg-white rounded-xl shadow p-8 flex flex-col items-center text-center">
  <h2 class="text-2xl font-bold text-secondary mb-6">Muqeem PDF Submission</h2>
  <form class="w-full max-w-xl space-y-6" method="POST" action="{{route('muqeemPDFuserSubmit')}}" enctype="multipart/form-data">
    @csrf

    <!-- Person Image Upload -->
    <div class="text-left">
      <label class="block mb-1 font-medium text-secondary">Upload Person Image</label>
      <input type="file" name="personImg" class="w-full border border-gray-300 rounded p-2 bg-white" />
    </div>

    <!-- Details Image Upload -->
    <div class="text-left">
      <label class="block mb-1 font-medium text-secondary">Upload Details Image</label>
      <input type="file" name="detailsImg" class="w-full border border-gray-300 rounded p-2 bg-white" />
    </div>

    <!-- Full Name -->
    <div class="text-left">
      <label class="block mb-1 font-medium text-secondary">Full Name</label>
      <input type="text" name="name" placeholder="Enter full name" class="w-full border border-gray-300 rounded p-2 bg-white" />
    </div>

    <!-- Iqama Number -->
    <div class="text-left">
      <label class="block mb-1 font-medium text-secondary">Iqama Number</label>
      <input type="text" name="iqamaNumber" placeholder="Enter iqama number" class="w-full border border-gray-300 rounded p-2 bg-white" />
    </div>

    <!-- Submit Button -->
    <div class="text-center">
      <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-green-700 transition">Submit</button>

    </div>
  </form>
</main>

  </div>
</section>

<!-- footer.blade.php -->
@include('muqeem/footer')

