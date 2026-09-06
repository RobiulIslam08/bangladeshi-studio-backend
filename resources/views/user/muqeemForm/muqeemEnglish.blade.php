{{-- resources/views/muqeemForm/muqeemEnglish.blade.php --}}
@include('user.header')

<div class="max-w-6xl mx-auto px-3 md:px-0 py-6">

  {{-- Error flash --}}
  @if($errors->any())
    <div class="mb-4 border border-red-200 bg-red-50 text-red-800 rounded-xl px-4 py-3">
      <ul class="list-disc list-inside text-sm">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Success flash --}}
  @if(session('success'))
    <div class="flex items-center justify-between bg-green-50 text-green-800 border border-green-200 rounded-xl px-4 py-3 mb-4">
      <span>{!! session('success') !!}</span>
      <button type="button" class="text-green-600" onclick="this.closest('div').remove()">✕</button>
    </div>
  @endif


  <div class="bg-white rounded-2xl shadow p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-xl font-bold text-gray-800">Create Muqeem-English</h1>
      <i class="fas fa-user-cog text-gray-500"></i>
    </div>

    <form action="/submit-form-muqeem-english" method="post" enctype="multipart/form-data" class="space-y-8">
      @csrf

      {{-- Resident's Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Resident's Information</h2>
        <div class="space-y-4">
          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="reportDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Report Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="reportDate" name="reportDate" type="text"
              value="{{ old('reportDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="operatorId" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Operator ID
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="operatorId" name="operatorId" type="text"
              value="{{ old('operatorId') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="location" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Location
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="location" name="location" type="text"
              value="{{ old('location', 'Muqeem Portal') }}">
          </div>
        </div>
      </div>

      {{-- Person Information - Head of Household --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Person Information - Head of Household</h2>
        <div class="space-y-4">

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="iqamaNumber" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Iqama Number
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="iqamaNumber" name="iqamaNumber" type="text"
              value="{{ old('iqamaNumber') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="versionNumber" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Version Number
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="versionNumber" name="versionNumber" type="text"
              value="{{ old('versionNumber') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="gender" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Gender
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="gender" name="gender" type="text"
              value="{{ old('gender', 'Male') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="name" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Name
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="name" name="name" type="text"
              value="{{ old('name') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="translatedName" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Translated Name
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="translatedName" name="translatedName" type="text"
              value="{{ old('translatedName') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="birthDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Birth Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="birthDate" name="birthDate" type="text"
              value="{{ old('birthDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="birthCountry" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Birth Country
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="birthCountry" name="birthCountry" type="text"
              value="{{ old('birthCountry') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="maritalStatus" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Marital Status
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="maritalStatus" name="maritalStatus" type="text"
              value="{{ old('maritalStatus', 'Single') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="religion" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Religion
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="religion" name="religion" type="text"
              value="{{ old('religion') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="occupation" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Occupation
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="occupation" name="occupation" type="text"
              value="{{ old('occupation') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="status" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Status
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="status" name="status" type="text"
              value="{{ old('status', 'Valid') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="entryDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Entry Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="entryDate" name="entryDate" type="text"
              value="{{ old('entryDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="entryLocation" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Entry Location
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="entryLocation" name="entryLocation" type="text"
              value="{{ old('entryLocation', 'King Fahd') }}">
          </div>
        </div>
      </div>

      {{-- Passport Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Passport Information</h2>
        <div class="space-y-4">

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="passportNumber" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Number
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="passportNumber" name="passportNumber" type="text"
              value="{{ old('passportNumber') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="nationality" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Nationality
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="nationality" name="nationality" type="text"
              value="{{ old('nationality') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="passportIssueDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Issue Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="passportIssueDate" name="passportIssueDate" type="text"
              value="{{ old('passportIssueDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="passportExpiryDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Expiry Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="passportExpiryDate" name="passportExpiryDate" type="text"
              value="{{ old('passportExpiryDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="passportIssueLocation" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Issue Location
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="passportIssueLocation" name="passportIssueLocation" type="text"
              value="{{ old('passportIssueLocation', 'دكا') }}">
          </div>
        </div>
      </div>

      {{-- Iqama Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Iqama Information</h2>
        <div class="space-y-4">

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="iqamaIssueDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Issue Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="iqamaIssueDate" name="iqamaIssueDate" type="text"
              value="{{ old('iqamaIssueDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="iqamaExpiryDate" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Expiry Date
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="iqamaExpiryDate" name="iqamaExpiryDate" type="text"
              value="{{ old('iqamaExpiryDate') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="iqamaIssueLocation" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Issue Location
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="iqamaIssueLocation" name="iqamaIssueLocation" type="text"
              value="{{ old('iqamaIssueLocation', 'Company Science') }}">
          </div>
        </div>
      </div>

      {{-- Employer Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Employer Information</h2>
        <div class="space-y-4">

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="employerNumber" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Number
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="employerNumber" name="employerNumber" type="text"
              value="{{ old('employerNumber') }}">
          </div>

          <div class="field flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="employerName" class="label-fixed w-40 shrink-0 text-xs font-medium text-gray-600">
              Name
            </label>
            <input
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              id="employerName" name="employerName" type="text"
              value="{{ old('employerName') }}">
          </div>
        </div>
      </div>

      {{-- Hidden user info --}}
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
