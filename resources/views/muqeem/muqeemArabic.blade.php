<!--header-->
@include('muqeem/header')

<!-- main-content.blade.php-->
<!--user-->
 <section class="px-4 md:px-16 py-10 bg-gray-100 min-h-screen">
  <div class="flex flex-col lg:flex-row gap-8">

    <!-- Left Sidebar Menu -->
    @include('muqeem/sideber')


    <!-- Right User Profile Section -->
    <main class="w-full lg:w-3/4 bg-white rounded-xl shadow p-8">
  <h2 class="text-2xl font-bold text-center text-secondary mb-6">Create Muqeem-Arabic</h2>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative" role="alert">
      <strong class="font-bold">تم بنجاح!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <button type="button" onclick="this.parentElement.parentElement.remove();">&times;</button>
      </span>
    </div>
  @endif
  


  <form action="{{route('muqeemArabicUserSubmit')}}" method="POST" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 text-right">
      <div><label>Report Date = تاريخ التقرير</label><input type="text" name="reportDate" class="input"></div>
      <div><label>Operator ID = رقم المشغل</label><input type="text" name="operatorId" class="input"></div>
      <div><label>Location = الموقع</label><input type="text" name="location" value="بوابة مقيم" class="input"></div>

      <div><label>Iqama Number = رقم الإقامة</label><input type="text" name="iqamaNumber" class="input"></div>
      <div><label>Version Number = رقم النسخة</label><input type="text" name="versionNumber" class="input"></div>
      <div><label>Gender = الجنس</label><input type="text" name="gender" value="ذكر" class="input"></div>

      <div><label>Name = الاسم</label><input type="text" name="name" class="input"></div>
      <div class="md:col-span-2"><label>Translated Name = الاسم المترجم</label><input type="text" name="translatedName" value="مهدي رفيق حسن الاسلام" class="input"></div>

      <div><label>Birth Date = تاريخ الميلاد</label><input type="text" name="birthDate" value="1423-12-30" class="input"></div>
      <div><label>Birth Country = دولة الميلاد</label><input type="text" name="birthCountry" value="بنجلاديش" class="input"></div>
      <div><label>Marital Status = الحالة الاجتماعية</label><input type="text" name="maritalStatus" value="أعزب" class="input"></div>

      <div><label>Religion = الديانة</label><input type="text" name="religion" value="الاسلام" class="input"></div>
      <div><label>Occupation = المهنة</label><input type="text" name="occupation" class="input"></div>
      <div><label>Status = الحالة</label><input type="text" name="status" class="input"></div>

      <div><label>Entry Date = تاريخ الدخول</label><input type="text" name="entryDate" class="input"></div>
      <div class="md:col-span-2"><label>Entry Location = مكان الدخول</label><input type="text" name="entryLocation" value="مطار الملك فهد" class="input"></div>

      <div><label>Passport Number = الرقم</label><input type="text" name="passportNumber" class="input"></div>
      <div><label>Nationality = الجنسية</label><input type="text" name="nationality" value="بنجلاديش" class="input"></div>
      <div><label>Issue Location = مكان الإصدار</label><input type="text" name="passportIssueLocation" value="دكا" class="input"></div>

      <div><label>Passport Issue Date = تاريخ إصدار جواز السفر</label><input type="text" name="passportIssueDate" class="input"></div>
      <div class="md:col-span-2"><label>Passport Expire Date = تاريخ انتهاء صلاحية جواز السفر</label><input type="text" name="passportExpiryDate" class="input"></div>

      <div><label>Issue Date = تاريخ الإصدار</label><input type="text" name="iqamaIssueDate" class="input"></div>
      <div><label>Expiry Date = تاريخ الانتهاء</label><input type="text" name="iqamaExpiryDate" class="input"></div>
      <div><label>Issue Location = مكان الإصدار</label><input type="text" name="iqamaIssueLocation" value="بوابة وزارة" class="input"></div>

      <div><label>Employer Number = الرقم</label><input type="text" name="employerNumber" class="input"></div>
      <div class="md:col-span-2"><label>Employer Name = الاسم</label><input type="text" name="employerName" class="input"></div>
    </div>

    <div class="text-center mt-6">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">Submit Data</button>
    </div>
  </form>
</main>

<style>
.input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-top: 4px;
  direction: rtl;
  text-align: right;
}
label {
  display: block;
  font-weight: 600;
  color: #424242;
  margin-bottom: 4px;
}
</style>


  </div>
</section>

<!-- footer.blade.php -->
@include('muqeem/footer')

