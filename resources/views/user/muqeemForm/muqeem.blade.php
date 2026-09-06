{{-- resources/views/muqeemForm/muqeem.blade.php --}}
@include('user.header')

<div class="max-w-6xl mx-auto px-3 md:px-0 py-6">
  {{-- Success flash --}}
  @if(session('success'))
    <div class="flex items-center justify-between bg-green-50 text-green-800 border border-green-200 rounded-xl px-4 py-3 mb-4">
      <span>{!! session('success') !!}</span>
      <button type="button" class="text-green-600" onclick="this.closest('div').remove()">✕</button>
    </div>
  @endif

  <div class="bg-white rounded-2xl shadow p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-xl font-bold text-gray-800">Create New Muqeem</h1>
      <i class="fas fa-user-cog text-gray-500"></i>
    </div>

    <form action="/storeInfo" method="post" enctype="multipart/form-data" class="space-y-8">
      @csrf

     

      {{-- Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Information</h2>

        <div class="space-y-4">
          
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="Date" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Person Image</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="personImg" name="personImg" type="file" 
                   >
          </div>
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="Date" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Details Image</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="detailsImg" name="detailsImg" type="file" 
                   >
          </div>
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="Date" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Name</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="name" name="name" type="text" 
                   >
          </div>
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="Date" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Iqama Number</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="iqamaNumber" name="iqamaNumber" type="number" 
                   >
          </div>


       
        </div>
      </div>

     

      
      <input style="display:none;" name="user_id" value="{{ Auth::id() }}">
      <input style="display:none;" name="user_roll" value="user">

      {{-- Submit --}}
      <div>
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl py-3 transition">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

@include('user.footer')

