{{-- resources/views/muqeemForm/muqeemArabic.blade.php --}}
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
      <h1 class="text-xl font-bold text-gray-800">Create Muqeem-Arabic</h1>
      <i class="fas fa-user-cog text-gray-500"></i>
    </div>

    <form action="/submit-form-muqeem-arabic" method="post" enctype="multipart/form-data" class="space-y-8">
      @csrf

      {{-- ===============================
           Resident's Information
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          بيانات مقيم = Resident's Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Report Date = تاريخ التقرير
            </label>
            <input id="reportDate" name="reportDate" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Operator ID = رقم المشغل
            </label>
            <input id="operatorId" name="operatorId" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Location = الموقع
            </label>
            <input id="location" name="location" type="text" value="بوابة مقيم"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
           Person Information
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Person Information - Head of Household = بيانات الشخص - رب أسرة
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Iqama Number = رقم الإقامة
            </label>
            <input name="iqamaNumber" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Version Number = رقم النسخة
            </label>
            <input name="versionNumber" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Gender = الجنس
            </label>
            <input name="gender" type="text" value="ذكر"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Name = الاسم
            </label>
            <input name="name" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div class="md:col-span-2">
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Translated Name = الاسم المترجم
            </label>
            <input name="translatedName" type="text" value="مهدي رفيق حسن الاسلام"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
          Birth / Marital
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Birth / Marital Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Birth Date = تاريخ الميلاد
            </label>
            <input name="birthDate" type="text" value="1423-12-30"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Birth Country = دولة الميلاد
            </label>
            <input name="birthCountry" type="text" value="بنجلاديش"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Marital Status = الحالة الاجتماعية
            </label>
            <input name="maritalStatus" type="text" value="أعزب"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
          Religion / Occupation / Status
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Religion / Occupation / Status
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Religion = الديانة
            </label>
            <input name="religion" type="text" value="الاسلام"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Occupation = المهنة
            </label>
            <input name="occupation" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Status = الحالة
            </label>
            <input name="status" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
          Entry Information
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Entry Information = معلومات الدخول
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Entry Date = تاريخ الدخول
            </label>
            <input name="entryDate" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div class="md:col-span-2">
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Entry Location = مكان الدخول
            </label>
            <input name="entryLocation" type="text" value="مطار الملك فهد"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
          Passport Information
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Passport Information = بيانات الجواز
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Passport Number = الرقم
            </label>
            <input name="passportNumber" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Nationality = الجنسية
            </label>
            <input name="nationality" type="text" value="بنجلاديش"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Issue Location = مكان الإصدار
            </label>
            <input name="passportIssueLocation" type="text" value="دكا"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Passport Issue Date = تاريخ إصدار جواز السفر
            </label>
            <input name="passportIssueDate" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Passport Expiry Date = تاريخ انتهاء صلاحية جواز السفر
            </label>
            <input name="passportExpiryDate" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
          Iqama Information
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Iqama Information = بيانات الإقامة
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Issue Date = تاريخ الإصدار
            </label>
            <input name="iqamaIssueDate" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Expiry Date = تاريخ الانتهاء
            </label>
            <input name="iqamaExpiryDate" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Issue Location = مكان الإصدار
            </label>
            <input name="iqamaIssueLocation" type="text" value="بوابة وزارة"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>
        </div>
      </div>


      {{-- ===============================
          Employer Information
      ================================ --}}
      <div class="space-y-3">
        <h2 class="text-center text-sm font-semibold text-gray-700 border-b pb-1">
          Employer Information = بيانات صاحب العمل
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Employer Number = الرقم
            </label>
            <input name="employerNumber" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
          </div>

          <div class="md:col-span-2">
            <label class="block text-xs font-semibold text-orange-600 mb-1">
              Employer Name = الاسم
            </label>
            <input name="employerName" type="text"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
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
