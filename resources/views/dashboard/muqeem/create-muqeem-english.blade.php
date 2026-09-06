@extends('mastering')
@section('content')
<style>
 

    .alert-horizontal {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
   thead th input {
    border: 1px solid black;
    padding:3px;
}

</style>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
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


<section class="main">
  
@if(session('success'))
    <div class="alert alert-success alert-horizontal" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="main-top">
        <h1>Create Muqeem-English</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills" style="width:50px;">
       
      <form action="/submit-form-muqeem-english" method="post" >
        @csrf
  <table class="table" >
  <thead>
    <tr>
      <th colspan="3">Resident's Information</th>
    </tr>
    <tr>
      <th>Report Date</th>
      
      <th>Operator ID</th>
      
      <th>Location</th>
      
    </tr>
    <tr>
      
      <th><input id="reportDate" name="reportDate" type="text" value=""></th>
      
      <th><input id="operatorId" name="operatorId" type="text" value=""></th>
      
      <th><input id="location" name="location" type="text" value="Muqeem Portal"></th>
    </tr>

    <tr><th colspan="3">Person Information - Head of Household</th></tr>
    <tr>
      <th>Iqama Number</th>
     
      <th>Version Number</th>
      
      <th>Gender</th>
      
    </tr>
    <tr>
      
      <th><input id="iqamaNumber" name="iqamaNumber" type="text" value=""></th>
      
      <th><input id="versionNumber" name="versionNumber" type="text" value=""></th>
      
      <th><input id="gender" name="gender" type="text" value="Male"></th>
    </tr>
    <tr>
      <th>Name</th>
      
      <th>Translated Name</th>
      
    </tr>
    <tr>
      
      <th><input id="name" name="name" type="text" value=""></th>
      
      <th colspan="3"><input id="translatedName" name="translatedName" type="text" value=""></th>
    </tr>
    <tr>
      <th>Birth Date</th>
      
      <th>Birth Country</th>
      
      <th>Marital Status</th>
      
    </tr>
    <tr>
      
      <th><input id="birthDate" name="birthDate" type="text" value=""></th>
      
      <th><input id="birthCountry" name="birthCountry" type="text" value=""></th>
     
      <th><input id="maritalStatus" name="maritalStatus" type="text" value="Single"></th>
    </tr>
    <tr>
      <th>Religion</th>
      
      <th>Occupation</th>
      
      <th>Status</th>
      
    </tr>
    <tr>
      
      <th><input id="religion" name="religion" type="text" value=""></th>
      
      <th><input id="occupation" name="occupation" type="text" value=""></th>
      
      <th><input id="status" name="status" type="text" value="Valid"></th>
    </tr>
    <tr>
      <th>Entry Date</th>
     
      <th>Entry Location</th>
      
    </tr>
    <tr>
      
      <th><input id="entryDate" name="entryDate" type="text" value=""></th>
      
      <th><input id="entryLocation" name="entryLocation" type="text" value="King Fahd"></th>
    </tr>

    <tr><th colspan="3">Passport Information</th></tr>
    <tr>
      <th>Number</th>
      
      <th>Nationality</th>
      
      
    </tr>
    <tr>
      
      <th><input id="passportNumber" name="passportNumber" type="text" value=""></th>
      
      <th><input id="nationality" name="nationality" type="text" value=""></th>
    </tr>
    <tr>
        <th>Issue Date</th>
        <th>Expiry Date</th>
        <th>Issue Location</th>
    </tr>
    <tr>
  <td><input style="border: 1px solid black; padding:5px;" id="passportIssueDate" name="passportIssueDate" type="text" value=""></td>
  <td><input style="border: 1px solid black; padding:5px;" id="passportExpiryDate" name="passportExpiryDate" type="text" value=""></td>
  <td><input style="border: 1px solid black; padding:5px;" id="passportIssueLocation" name="passportIssueLocation" type="text" value="دکا"></td>
</tr>

    <tr><th colspan="3">Iqama Information</th></tr>
    <tr>
      <th>Issue Date</th>
      
      <th>Expiry Date</th>
     
      <th>Issue Location</th>
      
    </tr>
    <tr>
      
      <th><input id="iqamaIssueDate" name="iqamaIssueDate" type="text" value=""></th>
      
      <th><input id="iqamaExpiryDate" name="iqamaExpiryDate" type="text" value=""></th>
      
      <th><input id="iqamaIssueLocation" name="iqamaIssueLocation" type="text" value="Company Science"></th>
    </tr>

    <tr><th colspan="3">Employer Information</th></tr>
    <tr>
      <th>Number</th>
      
      <th colspan="2">Name</th>
      
    </tr>
    <tr>
      
      <th><input id="employerNumber" name="employerNumber" type="text" value=""></th>
      
      <th colspan="1"><input id="employerName" name="employerName" type="text" value=""></th>
    </tr>
    
     <input style="display:none;" name="user_id" value="1">
      <input style="display:none;" name="user_roll" value="Admin">
    
    <tr><th colspan="3"> <input type="submit" value="Submit" style="background:blue; color:white;width:100%;"> </th></tr>
  </thead>
</table>

</form>

      </div>

      
    </section>
@endsection
