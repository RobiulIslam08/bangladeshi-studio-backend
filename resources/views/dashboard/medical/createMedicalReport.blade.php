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

 .textRight{
    text-align:right;
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
        <h1>Create Medical Report</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills" style="width:50px;">
       
      <form action="/insertReportData" method="post" enctype="multipart/form-data" >
        @csrf
  <table class="table" >
  <thead>
    <tr>
      <th colspan="6">Information</th>
    </tr>
    <tr>
         <th class="dn">To</th>
         <th>Date</th>
         
         <th>Time</th>
         <th>File No</th>
    </tr>
    <tr>
      <th class="dn" ><input class="form-control" id="to" name="to" type="text" value=""></th>
      
      <th>
  <input class="form-control" id="Date" name="Date" type="text" placeholder="dd/mm/yyyy" onfocus="(this.type='date')" onblur="formatDate(this)">
</th>
     
      <th><input class="form-control" id="Time" name="Time" type="time" value=""></th>
       <th><input class="form-control" id="File_no" name="File_no" type="text" value="{{$last_idValue}}"></th>
    </tr>
    
    <tr>
         <th>Name</th>
         <th>Nationality</th>
         <th class="dn" >Age</th>
         <th>Sex</th>
    </tr>
    <tr>
      <th><input class="form-control" id="name" name="name" type="text" value=""></th>
      <th><input class="form-control" id="nationality" name="nationality" type="text" value="Bangladesh"></th>
      <th class="dn" ><input class="form-control" id="age" name="age" type="text" value=""></th>
      <th>
          
          
          <select  class="form-control" id="sex" name="sex">
              <option value="M">M</option>
              <option value="F">F</option>
          </select>
          
          
          
          </th>
    </tr>
    
    <tr>
         <th>Blood Group</th>
         <th>date of Birth</th>
         <th>Passport/iqama No.</th>
    </tr>
    <tr>
        <th>
            <select id="blood_group" name="blood_group" class="form-control">
    <option value="">-- Select Blood Group --</option>
    <option value="A+VE">A+</option>
    <option value="A-VE">A-</option>
    <option value="B+VE">B+</option>
    <option value="B-VE">B-</option>
    <option value="AB+VE">AB+</option>
    <option value="AB-VE">AB-</option>
    <option value="O+VE">O+</option>
    <option value="O-VE">O-</option>
</select>

            
        </th>
        <!-- Add/change this on the DOB input so age updates automatically -->
<th>
  <!-- Hidden real date input -->
<input type="date" id="dob_hidden" name="dob_hidden" 
       oninput="updateDob(this)" class="form-control" style="display:none;">

<!-- Readonly visible display -->
<input type="text" id="date_of_birth" name="date_of_birth" 
       class="form-control" placeholder="dd/mm/yyyy"
       onfocus="(this.type='date')" onblur="formatDate(this)"
      >

</th>

        <th><input class="form-control" id="passport_or_iqama" name="passport_or_iqama" type="text" value=""></th>
        
    </tr>
    <tr>
         <th>SPONSOR / COMPANY</th>
         <th class="dn" >JOB DESCRIPTION</th>
         <th>City</th>
         <th>HEIGHT</th>
    </tr>
    <tr>
      
      <th><input class="form-control" id="sponsoreCompany" name="sponsoreCompany" type="text" value=""></th>
      <th class="dn" ><input class="form-control" id="job_desc" name="job_desc" type="text" value=""></th>
      <th><input class="form-control" id="city" name="city" type="text" value=""></th>
      <th><input class="form-control textRight" id="height" name="height" type="text" value="cm"></th>
    </tr>
  
    
    <tr>
         <th>WEIGHT</th>
         <th>Pulse</th>
         <th>B.P</th>
         <th>Temp</th>
    </tr>
    <tr>
      <th><input class="textRight"  id="weight" name="weight" type="text" value=" kg"></th>
      
      <th>
  <input
    class="textRight"
    id="pulse"
    name="pulse"
    type="text"
    list="pulseList"
    placeholder="Type pulse">

  <datalist id="pulseList">
    <option value="70 b/min"></option>
    <option value="71 b/min"></option>
    <option value="72 b/min"></option>
    <option value="73 b/min"></option>
    <option value="74 b/min"></option>
    <option value="75 b/min"></option>
  </datalist>
</th>

      
      
      
      
      
     <th>
      <input
        class="textRight"
        id="bp"
        name="bp"
        type="text"
        list="bpList"
        placeholder="Type BP">

      <datalist id="bpList">
        <option value="110/70 mmHg"></option>
        <option value="120/70 mmHg"></option>
        <option value="120/80 mmHg"></option>
        <option value="130/70 mmHg"></option>
        <option value="130/80 mmHg"></option>
      </datalist>
     </th>

      
     
      
      <th>
  <input 
    class="textRight"
    id="temp"
    name="temp"
    type="text"
    list="tempList"
    placeholder="Type temperature">

  <datalist id="tempList">
    <option value="36.3 &deg;C"></option>
    <option value="36.4 &deg;C"></option>
    <option value="36.5 &deg;C"></option>
    <option value="36.6 &deg;C"></option>
    <option value="36.7 &deg;C"></option>
    <option value="36.8 &deg;C"></option>
    <option value="36.9 &deg;C"></option>
  </datalist>
</th>

      
      
    </tr>
  
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
     
     
     
     
     function formatDate(input) {
  if (input.value) {
    const [year, month, day] = input.value.split("-");
    input.type = 'text';
    input.value = `${day}/${month}/${year}`;
  }
}

  
 </script>
@endsection
