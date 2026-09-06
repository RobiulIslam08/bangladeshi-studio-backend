
@include('user.header')

<style>
    .topup-link:hover {
    color: #ffa64d; /* Change color on hover */
    font-weight: bold; /* Any style you want */
}
</style>
<!-- Content: Profile + Documents (no scroll, 5 items only) -->
<div class="max-w-6xl mx-auto px-3 md:px-0 py-6">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- LEFT: Profile Card -->
    <div class="lg:col-span-1 bg-white rounded-2xl p-6 shadow">
      <div class="flex flex-col items-center text-center">
        <div class="w-36 h-36 rounded-full bg-red-600 text-white flex items-center justify-center text-3xl font-bold select-none">
          Photo
        </div>

        <h2 class="mt-4 text-lg font-bold tracking-wide">{{$UserData->fname}}</h2>

        <div class="mt-6 w-full space-y-3 text-sm">
          <div class="flex items-center justify-between border-b border-gray-200 pb-2">
            <span class="text-gray-600">Account Status</span>
            <span class="font-semibold text-green-600">{{$UserData->acount_satatus}}</span>
          </div>
          <div class="flex items-center justify-between border-b border-gray-200 pb-2">
            <span class="text-gray-600">Balance</span>
            <span class="font-semibold">{{$UserData->balance}} SR <span class="font-semibold text-green-600"> <a href="{{route('user.payment')}}" class="topup-link">TopUp</a> </span></span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-gray-600">Total Document</span>
            <span class="font-semibold">{{ $userDocuments->count() }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT: Documents List (exactly 5 rows, no overflow scroll) -->
    <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow">
      <h3 class="font-semibold text-gray-800 mb-4">All Completed Documents List</h3>

      <div class="space-y-3">
    {{-- ✅ Loop শুরু --}}
    @foreach($userDocuments as $doc)
        <div class="flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-4 py-3 transition">
            <span class="flex-1 font-medium truncate">
                {{ $doc->user_name ?? 'No Type' }} — {{ $doc->document_type }}
            </span>

            {{-- View Button --}}
            <a href="{{ $doc->document_link ?? '#' }}" target="_blank"
               class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition text-sm font-semibold">
                <i class="fa-regular fa-eye"></i> View
            </a>

            {{-- Download Button --}}
            <a href="{{ $doc->document_link ?? '#' }}" download
               class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition text-sm font-semibold">
                <i class="fa-solid fa-arrow-down"></i> Download
            </a>
        </div>
    @endforeach
    {{-- ✅ Loop শেষ --}}

    {{-- যদি কোনো ডকুমেন্ট না থাকে --}}
    @if($userDocuments->isEmpty())
        <div class="text-gray-500 text-center py-4 bg-gray-100 rounded-xl">
            No documents found for this user.
        </div>
    @endif
</div>


      <!-- Same old "View More" button -->
      <button class="w-full text-center mt-5 bg-gray-900 hover:bg-black text-white font-semibold py-3 rounded-xl">
        View More
      </button>
    </div>

  </div>
</div>



@include('user.project')
@include('user.footer')
