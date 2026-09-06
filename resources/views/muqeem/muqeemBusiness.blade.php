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
  <h2 class="text-2xl font-bold text-center text-secondary mb-6">Create Muqeem-Business</h2>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative" role="alert">
      <strong class="font-bold">Success!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <button type="button" onclick="this.parentElement.parentElement.remove();">&times;</button>
      </span>
    </div>
  @endif

  <form action="/submit-form-muqeem-business" method="POST" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div><label>Report Date</label><input type="text" name="reportDate" class="input"></div>
      <div><label>Operator ID</label><input type="text" name="operatorId" class="input"></div>
      <div><label>Location</label><input type="text" name="location" value="Muqeem Portal" class="input"></div>

      <div><label>Iqama Number</label><input type="text" name="iqamaNumber" class="input"></div>
      <div><label>Version Number</label><input type="text" name="versionNumber" class="input"></div>
      <div><label>Gender</label><input type="text" name="gender" value="Male" class="input"></div>

      <div><label>Name</label><input type="text" name="name" class="input"></div>
      <div class="md:col-span-2"><label>Translated Name</label><input type="text" name="translatedName" class="input"></div>

      <div><label>Birth Date</label><input type="text" name="birthDate" class="input"></div>
      <div><label>Birth Country</label><input type="text" name="birthCountry" class="input"></div>
      <div><label>Marital Status</label><input type="text" name="maritalStatus" value="Single" class="input"></div>

      <div><label>Religion</label><input type="text" name="religion" class="input"></div>
      <div><label>Occupation</label><input type="text" name="occupation" class="input"></div>
      <div><label>Status</label><input type="text" name="status" value="Valid" class="input"></div>

      <div><label>Entry Date</label><input type="text" name="entryDate" class="input"></div>
      <div><label>Entry Location</label><input type="text" name="entryLocation" value="King Fahd" class="input"></div>

      <div><label>Passport Number</label><input type="text" name="passportNumber" class="input"></div>
      <div><label>Nationality</label><input type="text" name="nationality" class="input"></div>
      <div><label>Passport Issue Date</label><input type="text" name="passportIssueDate" class="input"></div>
      <div><label>Passport Expiry Date</label><input type="text" name="passportExpiryDate" class="input"></div>
      <div><label>Passport Issue Location</label><input type="text" name="passportIssueLocation" value="دكا" class="input"></div>

      <div><label>Iqama Issue Date</label><input type="text" name="iqamaIssueDate" class="input"></div>
      <div><label>Iqama Expiry Date</label><input type="text" name="iqamaExpiryDate" class="input"></div>
      <div><label>Iqama Issue Location</label><input type="text" name="iqamaIssueLocation" value="Company Science" class="input"></div>

      <div><label>Employer Number</label><input type="text" name="employerNumber" class="input"></div>
      <div class="md:col-span-2"><label>Employer Name</label><input type="text" name="employerName" class="input"></div>
    </div>

    <div class="text-center mt-6">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">Submit</button>
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

