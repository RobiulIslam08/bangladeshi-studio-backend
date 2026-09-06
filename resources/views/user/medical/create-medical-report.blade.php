{{-- resources/views/pages/home.blade.php --}}
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
      <h1 class="text-xl font-bold text-gray-800">Create Medical Report</h1>
      <i class="fas fa-user-cog text-gray-500"></i>
    </div>

    <form action="/insertReportData" method="post" enctype="multipart/form-data" class="space-y-8">
      @csrf

      <input class="dn" id="to" name="to" type="text" value="">

      {{-- Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Information</h2>

        <div class="space-y-4">
          {{-- Date --}}
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="Date" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Date</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="Date" name="Date" type="text" placeholder="dd/mm/yyyy"
                   onfocus="(this.type='date')" onblur="formatDate(this)">
          </div>

          {{-- Time --}}
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="Time" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Time</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="Time" name="Time" type="time" value="">
          </div>

          {{-- File No --}}
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="File_no" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">File No</label>
            <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   id="File_no" name="File_no" type="text" value="{{ $last_idValue ?? '' }}">
          </div>
        </div>
      </div>

      {{-- Person --}}
      <div class="space-y-4">
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="name" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Name</label>
          <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="name" name="name" type="text" value="">
        </div>

        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="nationality" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Nationality</label>
          <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="nationality" name="nationality" type="text" value="Bangladesh">
        </div>

        <div class="dn">
          <label for="age" class="block text-xs font-medium text-gray-600 mb-1">Age</label>
          <input class="form-control w-full rounded-xl border-gray-300" id="age" name="age" type="text" value="">
        </div>

        {{-- Sex (radio) --}}
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <span class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Sex</span>
          <div class="flex flex-wrap gap-6">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="radio" name="sex" value="M" class="h-4 w-4 text-blue-600 focus:ring-blue-500" checked>
              <span class="text-sm text-gray-700">Male</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="radio" name="sex" value="F" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
              <span class="text-sm text-gray-700">Female</span>
            </label>
          </div>
        </div>
      </div>

      {{-- IDs --}}
      <div class="space-y-4">
        {{-- Blood Group (radio) --}}
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <span class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Blood Group</span>
          <div class="flex flex-wrap gap-x-6 gap-y-2">
            @php
              $bgs = [
                'A+VE' => 'A+','A-VE' => 'A-',
                'B+VE' => 'B+','B-VE' => 'B-',
                'AB+VE'=>'AB+','AB-VE'=>'AB-',
                'O+VE' => 'O+','O-VE' => 'O-'
              ];
            @endphp
            @foreach($bgs as $val => $label)
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="blood_group" value="{{ $val }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700">{{ $label }}</span>
              </label>
            @endforeach
          </div>
        </div>

        {{-- Date of Birth --}}
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="date_of_birth" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Date of Birth</label>
          <input type="text" id="date_of_birth" name="date_of_birth"
                 class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 placeholder="dd/mm/yyyy"
                 onfocus="(this.type='date')" onblur="formatDate(this)">
        </div>

        {{-- Passport/Iqama --}}
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="passport_or_iqama" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Passport/Iqama No.</label>
          <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="passport_or_iqama" name="passport_or_iqama" type="text" value="">
        </div>
      </div>

      {{-- Job / Location --}}
      <div class="space-y-4">
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="sponsoreCompany" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">SPONSOR / COMPANY</label>
          <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="sponsoreCompany" name="sponsoreCompany" type="text" value="">
        </div>

        <div class="dn">
          <label for="job_desc" class="block text-xs font-medium text-gray-600 mb-1">JOB DESCRIPTION</label>
          <input class="form-control w-full rounded-xl border-gray-300"
                 id="job_desc" name="job_desc" type="text" value="">
        </div>

        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="city" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">City</label>
          <input class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="city" name="city" type="text" value="">
        </div>

        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="height" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">HEIGHT</label>
          <input class="form-control textRight w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="height" name="height" type="text" value="cm">
        </div>
      </div>

      {{-- Vitals --}}
      <div class="space-y-4">
        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="weight" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">WEIGHT</label>
          <input class="form-control textRight w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="weight" name="weight" type="text" value=" kg">
        </div>

        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="pulse" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Pulse</label>
          <input class="form-control textRight w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="pulse" name="pulse" type="text" value=" b/min">
        </div>

        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="bp" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">B.P</label>
          <input class="form-control textRight w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="bp" name="bp" type="text" value=" mmHg">
        </div>

        <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
          <label for="temp" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">Temp</label>
          <input class="form-control textRight w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                 id="temp" name="temp" type="text" value=" °C">
        </div>
      </div>
      
      <input name="user_id" value="{{ Auth::id() }}">
      <input name="user_roll" value="user">

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

<script>
  function formatDate(input){
    if (input && input.value && input.type !== 'text') {
      const [year, month, day] = input.value.split("-");
      input.type = 'text';
      input.value = `${day}/${month}/${year}`;
    }
  }
</script>

<style>
  .dn{display:none;}
  .textRight{text-align:right;}
</style>
