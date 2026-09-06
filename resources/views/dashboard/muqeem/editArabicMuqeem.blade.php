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
<section class="main">
  
@if(session('success'))
    <div class="alert alert-success alert-horizontal" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="main-top">
        <h1>Create Muqeem-Arabic</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills" style="width:50px;">
       
     <form action="/submit-form-muqeem-arabic" method="post">
    @csrf
    <table class="table" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr><th colspan="3" style="text-align: center;">بيانات مقيم = Resident's Information</th></tr>

            <tr>
                <th style="color: orange;">Report Date = تاريخ التقرير</th>
                
                <th style="color: orange;">Operator ID = رقم المشغل</th>
                
                <th style="color: orange;">Location = الموقع</th>
                
            </tr>
            <tr>
                
                <th><input id="reportDate" name="reportDate" type="text" value="{{$record->name}}"></th>
                
                <th><input id="operatorId" name="operatorId" type="text" value="{{$record->name}}"></th>
                
                <th><input id="location" name="location" type="text" value="ا{{$record->name}}"></th>
            </tr>

            <tr><th colspan="3" style="text-align: center;">Person Information - Head of Household = بيانات الشخص - رب أسرة</th></tr>

            <tr>
                <th style="color: orange;">Iqama Number = رقم الإقامة</th>
                
                <th style="color: orange;">Version Number = رقم النسخة</th>
                
                <th style="color: orange;">Gender = الجنس</th>
                
            </tr>
            <tr>
                
                <th><input name="iqamaNumber" type="text" value="{{$record->name}}"></th>
                
                <th><input name="versionNumber" type="text" value="{{$record->name}}"></th>
               
                <th><input name="gender" type="text" value="{{$record->name}}"></th>
            </tr>

            <tr>
                <th style="color: orange;">Name = الاسم</th>
                
                <th colspan="2" style="color: orange;">Translated Name = الاسم المترجم</th>
                
            </tr>
            <tr>
                
                <th><input name="name" type="text" value="{{$record->name}}"></th>
              
                <th colspan="2"><input name="translatedName" type="text" value="مهدي رفيق حسن الاسلام" style="width: 100%;"></th>
            </tr>

            <tr>
                <th style="color: orange;">Birth Date = تاريخ الميلاد</th>
                
                <th style="color: orange;">Birth Country = دولة الميلاد</th>

                <th style="color: orange;">Marital Status = الحالة الاجتماعية</th>
               
            </tr>
            <tr>
              
                <th><input name="birthDate" type="text" value="{{$record->name}}"></th>
               
                <th><input name="birthCountry" type="text" value="{{$record->name}}"></th>
               
                <th><input name="maritalStatus" type="text" value="{{$record->name}}"></th>
            </tr>

            <tr>
                <th style="color: orange;">Religion = الديانة</th>
               
                <th style="color: orange;">Occupation = المهنة</th>
               
                <th style="color: orange;">Status = الحالة</th>
               
            </tr>
            <tr>
             
                <th><input name="religion" type="text" value="{{$record->name}}"></th>
          
                <th><input name="occupation" type="text" value="{{$record->name}}"></th>
             
                <th><input name="status" type="text" value="{{$record->name}}"></th>
            </tr>

            <tr>
                <th style="color: orange;">Entry Date = تاريخ الدخول</th>

                <th style="color: orange;">Entry Location = مكان الدخول</th>
                
            </tr>
            <tr>
                
                <th><input name="entryDate" type="text" value="{{$record->name}}"></th>
                
                <th colspan="3"><input name="entryLocation" type="text" value="مطار الملك فهد" style="width: 100%;"></th>
            </tr>

            <tr><th colspan="3" style="text-align: center;">Passport Information = بيانات الجواز</th></tr>

            <tr>
                <th style="color: orange;">Passport Number = الرقم</th>
                
                <th style="color: orange;">Nationality = الجنسية</th>
              
                <th style="color: orange;">Issue Location = مكان الإصدار</th>
               
            </tr>
            <tr>
               
                <th><input name="passportNumber" type="text" value="{{$record->name}}"></th>
             
                <th><input name="nationality" type="text" value="{{$record->name}}></th>
               
                <th><input name="passportIssueLocation" type="text" value="{{$record->name}}></th>
            </tr>
            <tr>
              
                                <th style="color: orange; white-space: nowrap;">Passport Issue Date =   تاريخ إصدار جواز السفر  </th>
                
             
                                <th style="color: orange; white-space: nowrap;">Passport Expire Date = تاريخ انتهاء صلاحية جواز السفر  </th>
            </tr>
            <tr>
               
                <th><input name="passportIssueDate" type="text" value="{{$record->name}}"></th>
               
                <th colspan="3"><input name="passportExpiryDate" type="text" value="{{$record->name}}" style="width: 100%;"></th>
            </tr>

            <tr><th colspan="3" style="text-align: center;">Iqama Information = بيانات الإقامة</th></tr>

            <tr>
                <th style="color: orange;">Issue Date = تاريخ الإصدار</th>

                <th style="color: orange;">Expiry Date = تاريخ الانتهاء</th>
               
                <th style="color: orange;">Issue Location = مكان الإصدار</th>
               
            </tr>
            <tr>
               
                <th><input name="iqamaIssueDate" type="text" value="{{$record->name}}"></th>
               
                <th><input name="iqamaExpiryDate" type="text" value="{{$record->name}}"></th>
               
                <th><input name="iqamaIssueLocation" type="text" value="{{$record->name}}" ></th>
            </tr>

            <tr><th colspan="3" style="text-align: center;">Employer Information = بيانات صاحب العمل</th></tr>

            <tr>
                <th style="color: orange;">Employer Number = الرقم</th>
               
                <th style="color: orange;">Employer Name = الاسم</th>
                
            </tr>
            <tr>
               
                <th><input name="employerNumber" type="text" value="{{$record->name}}"></th>
                
                <th colspan="3"><input name="employerName" type="text" value="{{$record->name}}" style="width: 100%;"></th>
            </tr>

            <tr>
                <th colspan="3">
                    <input type="submit" value="Submit Data" style="background: blue; color: white; width: 100%; padding: 10px;">
                </th>
            </tr>
        </thead>
    </table>
</form>




      </div>

     
    </section>
@endsection
