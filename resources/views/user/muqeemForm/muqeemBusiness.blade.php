{{-- resources/views/muqeemForm/muqeemBusiness.blade.php --}}
@include('user.header')

<style>
  .dn {
      display: none;
  }
</style>

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
      <h1 class="text-xl font-bold text-gray-800">Create Muqeem-Business</h1>
      <i class="fas fa-user-cog text-gray-500"></i>
    </div>

    <form action="/submit-form-muqeem-business" method="post" enctype="multipart/form-data" class="space-y-8">
      @csrf

      {{-- Passport and Visa Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Passport and Visa Information
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="passportNumber" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Passport Number - رقم جواز السفر
            </label>
            <input
              id="passportNumber" name="passportNumber" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('passportNumber') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="passportIssuancePlace" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Passport Issuance Place - مكان إصدار جواز السفر
            </label>
            <input
              id="passportIssuancePlace" name="passportIssuancePlace" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('passportIssuancePlace') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="PassportIssuanceDate" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Passport Issuance Date - تاريخ إصدار جواز السفر
            </label>
            <input
              id="PassportIssuanceDate" name="PassportIssuanceDate" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('PassportIssuanceDate') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="PassportExpiryDate" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Passport Expiry Date - تاريخ انتهاء صلاحية جواز السفر
            </label>
            <input
              id="PassportExpiryDate" name="PassportExpiryDate" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('PassportExpiryDate') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="PassportStatus" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Passport Status - حالة جواز السفر
            </label>
            <input
              id="PassportStatus" name="PassportStatus" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('PassportStatus') }}">
          </div>

          {{-- Hidden / optional Visa fields --}}
          <div class="dn space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
              <label for="VisaExpiryDate" class="w-48 shrink-0 text-xs font-medium text-gray-600">
                Visa Expiry Date - تاريخ انتهاء صلاحية التأشيرة
              </label>
              <input
                id="VisaExpiryDate" name="VisaExpiryDate" type="text"
                class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('VisaExpiryDate', '-') }}">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
              <label for="VisaIssuancePlace" class="w-48 shrink-0 text-xs font-medium text-gray-600">
                Visa Issuance Place - مكان إصدار التأشيرة
              </label>
              <input
                id="VisaIssuancePlace" name="VisaIssuancePlace" type="text"
                class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('VisaIssuancePlace', '-') }}">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
              <label for="DateLastExit" class="w-48 shrink-0 text-xs font-medium text-gray-600">
                Date of Last Exit - تاريخ الخروج الأخير
              </label>
              <input
                id="DateLastExit" name="DateLastExit" type="text"
                class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('DateLastExit') }}">
            </div>
          </div>
        </div>
      </div>

      {{-- Health Insurance Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Health Insurance Information - معلومات التأمين الصحي
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="HealthInsurance" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Health Insurance - التأمين الصحي
            </label>
            <input
              id="HealthInsurance" name="HealthInsurance" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('HealthInsurance') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="ExpiryDate" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Expiry Date - تاريخ انتهاء الصلاحية
            </label>
            <input
              id="ExpiryDate" name="ExpiryDate" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('ExpiryDate') }}">
          </div>
        </div>
      </div>

      {{-- Vehicles Insurance (hidden section) --}}
      <div class="dn">
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Vehicles Insurance - تأمين المركبات
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="NumberofVehicles" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Number of Vehicles - عدد المركبات
            </label>
            <input
              id="NumberofVehicles" name="NumberofVehicles" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('NumberofVehicles', '0') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="TrafficViolationsNumber" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Traffic Violations Number - عدد المخالفات المرورية
            </label>
            <input
              id="TrafficViolationsNumber" name="TrafficViolationsNumber" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('TrafficViolationsNumber', '0') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="NumberofLicenses" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Number of Licenses - عدد الرخص
            </label>
            <input
              id="NumberofLicenses" name="NumberofLicenses" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('NumberofLicenses') }}">
          </div>
        </div>
      </div>

      {{-- Hajj Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Hajj Information - معلومات الحج
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="hajjEligibility" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Hajj Eligibility - أهلية الحج
            </label>
            <select
              id="hajjEligibility" name="hajjEligibility"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
              <option value="">Select an option</option>
              <option value="yes" {{ old('hajjEligibility') == 'yes' ? 'selected' : '' }}>Yes</option>
              <option value="No" {{ old('hajjEligibility') == 'No' ? 'selected' : '' }}>No</option>
            </select>
          </div>

          <div class="dn flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="last_year_hajj" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Last Year Of Hajj - آخر سنة حج
            </label>
            <input
              id="last_year_hajj" name="last_year_hajj" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('last_year_hajj') }}">
          </div>
        </div>
      </div>

      {{-- Sponsor Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Sponsor Information - معلومات الراعي
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="SponsorIDNumber" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Sponsor ID Number - رقم هوية الكفيل
            </label>
            <input
              id="SponsorIDNumber" name="SponsorIDNumber" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('SponsorIDNumber') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="SponsorName" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Sponsor Name - اسم الكفيل
            </label>
            <input
              id="SponsorName" name="SponsorName" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('SponsorName') }}">
          </div>
        </div>
      </div>

      {{-- Family Members (hidden section) --}}
      <div class="dn">
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Family Members - أفراد العائلة
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="NumberOfFamilyMembers" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Number of Family Members - عدد أفراد العائلة
            </label>
            <input
              id="NumberOfFamilyMembers" name="NumberOfFamilyMembers" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('NumberOfFamilyMembers', '0') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="FamilyMembersInside" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Family Members Inside - أفراد العائلة داخل المملكة
            </label>
            <input
              id="FamilyMembersInside" name="FamilyMembersInside" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('FamilyMembersInside', '0') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="FamilyMembersOutside" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Family Members Outside - أفراد العائلة خارج المملكة
            </label>
            <input
              id="FamilyMembersOutside" name="FamilyMembersOutside" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('FamilyMembersOutside', '0') }}">
          </div>
        </div>
      </div>

      {{-- Personal Information --}}
      <div>
        <h2 class="text-sm font-semibold text-gray-600 mb-3">
          Personal Information - البيانات الشخصية
        </h2>
        <div class="space-y-4">
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="arabicName" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Arabic Name
            </label>
            <input
              id="arabicName" name="arabicName" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('arabicName') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="nameEnglish" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Name in English
            </label>
            <input
              id="nameEnglish" name="nameEnglish" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('nameEnglish') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label for="slId" class="w-48 shrink-0 text-xs font-medium text-gray-600">
              SL No. (Unique Id)
            </label>
            <input
              id="slId" name="slId" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('slId') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
            <span class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Image
            </span>
            <div class="flex flex-col sm:flex-row gap-2 items-start sm:items-center w-full">
              <button
                type="button"
                onclick="clicked('customerImage')"
                class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg px-4 py-2 transition">
                Upload Image
              </button>
              <input
                name="customerImage" id="customerImage" type="file"
                class="hidden">
            </div>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Iqama Number - رقم الإقامة
            </label>
            <input
              name="iqama_number" type="number"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_number') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Iqama Version - نسخة الإقامة
            </label>
            <input
              name="id_version" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('id_version') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Iqama Status - صالحة
            </label>
            <input
              name="iqama_statuse" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_statuse', 'صالحة') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Iqama Expiry Date - تاريخ انتهاء الإقامة
            </label>
            <input
              name="iqama_exp_date" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_exp_date') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Iqama Issuance Date - تاريخ إصدار الإقامة
            </label>
            <input
              name="iqama_issue_date" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_issue_date') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Occupation - المهنة
            </label>
            <input
              name="iqama_occapation" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_occapation', 'مستقل') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Marital Status - الحالة الاجتماعية
            </label>
            <input
              name="iqama_marital_statuse" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_marital_statuse') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Nationality - الجنسية
            </label>
            <input
              name="nationality" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('nationality', 'بنجلاديش') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Blood Type - فصيلة الدم
            </label>
            <input
              name="blood_type" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('blood_type') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Place of Birth - مكان الميلاد
            </label>
            <input
              name="place_of_birth" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('place_of_birth') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Date of Birth - تاريخ الميلاد
            </label>
            <input
              name="date_of_birth" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('date_of_birth') }}">
          </div>

          <div class="dn flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Iqama Issuance Place - مكان إصدار الإقامة
            </label>
            <input
              name="iqama_issue_place" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('iqama_issue_place', 'KSA') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Gender - الجنس
            </label>
            <select
              name="gender" id="gender"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
              <option value="Male" {{ old('gender', 'Male') == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Inside Kingdom - داخل المملكة
            </label>
            <select
              name="inside_kingdom" id="inside_kingdom"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
              <option value="Yes" {{ old('inside_kingdom', 'Yes') == 'Yes' ? 'selected' : '' }}>Yes</option>
              <option value="No" {{ old('inside_kingdom') == 'No' ? 'selected' : '' }}>No</option>
            </select>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Religion - الديانة
            </label>
            <input
              name="religion" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('religion', 'الإسلام') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Is There A Finger Print? - هل توجد بصمة
            </label>
            <select
              name="finger_print"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
              <option value="Yes" {{ old('finger_print', 'Yes') == 'Yes' ? 'selected' : '' }}>Yes</option>
              <option value="No" {{ old('finger_print') == 'No' ? 'selected' : '' }}>No</option>
            </select>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              No. of Sponsorship Transfers - عدد مرات نقل الكفالة
            </label>
            <input
              name="sponsor_transfer" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('sponsor_transfer', '1') }}">
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4">
            <label class="w-48 shrink-0 text-xs font-medium text-gray-600">
              Muqeem Created Date
            </label>
            <input
              name="muqeemCreateDate" type="text"
              class="form-control w-full flex-1 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
              value="{{ old('muqeemCreateDate', date('d/m/Y')) }}">
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

<script>
  function clicked(selectedFile) {
      document.getElementById(selectedFile).click();
  }
</script>

@include('user.footer')
