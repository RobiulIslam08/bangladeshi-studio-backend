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

.dn{
    display:none;
}

</style>



<section class="main">
  
@if(session('success'))
    <div class="alert alert-success alert-horizontal" role="alert">
        <span>{{!! session('success') !!}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="main-top">
        <h1>Create Muqeem-Business</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills" style="width:50px;">
       
      <form action="/submit-form-muqeem-business" method="post" enctype="multipart/form-data" >
        @csrf
  <table class="table" >
  <thead>
    <tr>
      <th colspan="6">Passport and Visa Information</th>
    </tr>
    <tr>
      <th>Passport Number - رقم جواز السفر</th>
      <th>Passport Issuance Place - مكان إصدار جواز السفر</th>
      <th>Passport Issuance Date - تاريخ إصدار جواز السفر</th>     
      <th>Passport Expiry Date - تاريخ انتهاء صلاحية جواز السفر    </th>
      
    </tr>
    <tr>
        <th><input id="passportNumber" name="passportNumber" type="text" value=""></th>
      
      <th><input id="passportIssuancePlace" name="passportIssuancePlace" type="text" value=""></th>
    
      <th><input id="PassportIssuanceDate" name="PassportIssuanceDate" type="text" value=""></th>
      <th><input id="PassportExpiryDate" name="PassportExpiryDate" type="text" value=""></th>
    </tr>
    
    <tr>
      <th>Passport Status - حالة جواز السفر </th>
      <th class="dn" >Visa Expiry Date - تاريخ انتهاء صلاحية التأشيرة</th>
      <th class="dn" >Visa Issuance Place - مكان إصدار التأشيرة </th>     
      <th class="dn" >Date of Last Exit - تارتاريخ الخروج الأخير    </th>
      
    </tr>
    
    <tr>
        <th><input id="PassportStatus" name="PassportStatus" type="text" value=""></th>
      
      <th class="dn"><input id="VisaExpiryDate" name="VisaExpiryDate" type="text" value="-"></th>
    
      <th class="dn" ><input id="VisaIssuancePlace" name="VisaIssuancePlace" type="text" value="-"></th>
      <th class="dn" ><input id="DateLastExit" name="DateLastExit" type="text" value=""></th>
    </tr>

    <tr><th colspan="6">Health Insurance Information - معلومات التأمين الصحي</th></tr>
    <tr>
      
      <th>Health Insurance - التأمين الصحي</th>
      
      <th>Expiry Date - تاريخ انتهاء الصلاحية</th>
      
    </tr>
    <tr>
        <th><input id="HealthInsurance" name="HealthInsurance" type="text" value=""></th>
        <th><input id="ExpiryDate" name="ExpiryDate" type="text" value=""></th>
    </tr>
    
     <tr class="dn" ><th colspan="6">Vehicles Insurance - تأمين المركبات </th> </tr> 
    <tr class="dn" >
      
      <th>Number of Vehicles - عدد المركبات </th>
      <th>Traffic Violations Number - عدد المخالفات المرورية</th>
      <th>Number of Licenses - عدد الرخص</th>
    </tr>
    <tr class="dn" >
        <th><input id="NumberofVehicles" name="NumberofVehicles" type="text" value="0"></th>
        <th><input id="TrafficViolationsNumber" name="TrafficViolationsNumber" type="text" value="0"></th>
        <th><input id="NumberofLicenses" name="NumberofLicenses" type="text" value=""></th>
       
    </tr>
    
    <tr><th colspan="6">Hajj Information - مامعلومات الحج
    
    
    </th></tr>
    <tr>
        <th>Hajj Eligibility -   أهلية الحج  </th>
        <th class="dn" >Last Year Of Hajj - آخر سنة حج </th>
    </tr>
    <tr>
        <th>
            <select id="hajjEligibility" name="hajjEligibility">
                <option value="">select a Option</option>
                <option value="yes">Yes</option>
                <option value="No">No</option>
                </select>
        </th>
        <th class="dn"><input id="last_year_hajj" name="last_year_hajj" type="text" value=""></th>
    </tr>
    <tr><th colspan="6">Sponsor Information - معلومات الراعي </th></tr>
    <tr>
        <th>Sponsor ID Number - رقم هوية الكفيل</th>
        <th>Sponsor Name - اسم الكفيل</th>
    </tr>
    <tr>
        <th><input id="SponsorIDNumber" name="SponsorIDNumber" type="text" value=""></th>
        <th><input id="SponsorName" name="SponsorName" type="text" value=""></th>
    </tr>
      <tr class="dn" ><th colspan="6"> Family Members - أفراد العائلة </th></tr>
    <tr class="dn" >
        <th>Number of Family Members - عدد أفراد العائلة</th>
        <th>Family Members Inside - أفراد العائلة داخل المملكة</th>
        <th>Family Members Outside - أفراد العائلة خارج المملكة</th>
    </tr>
    <tr class="dn" >
        <th><input id="NumberOfFamilyMembers" name="NumberOfFamilyMembers" type="text" value="0"></th>
        <th><input id="FamilyMembersInside" name="FamilyMembersInside" type="text" value="0"></th>
        <th><input id="FamilyMembersOutside" name="FamilyMembersOutside" type="text" value="0"></th>
    </tr>
    
      <tr><th colspan="6"> Personal Information - البيانات الشخصية </th></tr>
    <tr>
         <th>Arabic Name</th>
         <th>Name in English</th>
         <th>SL No. (Uniqe Id)</th>
         <th>Image</th>
         
    </tr>
    <tr>
        <th><input id="arabicName" name="arabicName" type="text" value=""></th>
        <th><input id="nameEnglish" name="nameEnglish" type="text" value=""></th>
        <th><input id="slId" name="slId" type="text" value=""></th>
        <th> <button type="button" onclick="clicked('customerImage')" style="background:blue; color:white; padding:5px;">Upload Image</button> <input name="customerImage" id="customerImage" type="file"  style="display:none;"> </th>
      
    </tr>
    <tr>
        <th>Iqama Number - رقم الإقامة</th>
        <th>Iqama Version - نسخة الإقامة</th>
        <th>Iqama Status - صالحة</th>
        <th>Iqama Expiry Date - تاريخ انتهاء الإقامة</th>
        
    </tr>
    <tr>
        <th><input name="iqama_number" type="number" value=""></th>
        <th><input name="id_version" type="text" value=""></th>
        <th><input name="iqama_statuse" type="text" value="صالحة"></th>
        <th><input name="iqama_exp_date" type="text" value=""></th>
    </tr>
    <tr>
        <th>Iqama Issuance Date - تاريخ إصدار الإقامة </th>
        <th>Occupation - المهنة</th>
        <th>Marital Status - الحالة الاجتماعية</th>
        <th>Nationality - الجنسية</th>
        
    </tr>
    <tr>
        <th><input name="iqama_issue_date" type="text"></th>
        <th><input name="iqama_occapation" type="text" value="مستقل"></th>
        <th><input name="iqama_marital_statuse" type="text"></th>
        <th><input name="nationality" type="text" value="بنجلاديش"></th>
    </tr>
    <tr>
        <th>Blood Type - فصيلة الدم</th>
        <th>Place of Birth - مكان الميلاد</th>
        <th>Date of Birth - تاريخ الميلاد</th>
        <th class="dn" >Iqama Issuance Place - مكان إصدار الإقامة</th>
        
    </tr>
    <tr>
        <th><input name="blood_type" value="" type="text"></th>
        <th><input name="place_of_birth" value="" type="text"></th>
        <th><input name="date_of_birth" value="" type="text"></th>
        <th><input class="dn"  name="iqama_issue_place" value="KSA" type="text"></th>
    </tr>
    
    <tr>
         <th>Gender - الجنس</th>
         <th>Inside Kingdom - داخل المملكة</th>
         <th>Religion - الديانة</th>
         <th>Is There A Finger Print? - هل توجد بصمة</th>
    </tr>
    <tr>
        <th>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </th>
        <th>
            <select name="inside_kingdom" id="inside_kingdom">
                <option>Yes</option>
                <option>No</option>
            </select>
        </th>
        <th> <input name="religion" type="text" value="الإسلام"> </th>
        <th>
            <select name="finger_print" type="text">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </th>
    </tr>
    <tr>
        <th>No. of Sponsorship Transfers - عدد مرات نقل الكفالة</th>
        <th>Muqeem Created Date</th>
    </tr>
    <tr>
        <th>
            <input type="text" name="sponsor_transfer" value="1">
        </th>
        <th>
           
            <input type="text" name="muqeemCreateDate" value="{{ date('d/m/Y') }}">
        </th>
        
    </tr>


    <input style="display:none;" name="user_id" value="1">
      <input style="display:none;" name="user_roll" value="Admin">

   
    <tr><th colspan="6"> <input type="submit" value="Submit" style="background:blue; color:white;width:100%;"> </th></tr>
  </thead>
</table>

</form>

      </div>

      
    </section>
 <script>
     function clicked(selectedFile){
         
         document.getElementById(selectedFile).click();
     }
 </script>
@endsection
