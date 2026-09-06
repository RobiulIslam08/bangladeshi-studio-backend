@extends('mastering')
@section('content')

<style>
 

    .alert-horizontal {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
   thead th input, select {
    border: 1px solid black;
    padding:3px;
}
.icon{
    display:flex;
    gap: 10px;
    width:150px;
}
.icon a{
     background: none;
    padding: 5px;
}
.icon a:hover {
    background: none;
    border: 1px solid white;
    border-radius: 10px;
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

@if(session('new_record_id'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (confirm('Are you sure you want to check this Muqeem entry?')) {
                window.location.href = "/muqeemEnglishCheck?id={{ session('new_record_id') }}";
            }
        });
    </script>
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<section class="main">
  
@if(session('success'))
    <div class="alert alert-success alert-horizontal" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="main-top">
        <h1>Search Muqeem</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills" style="width:50px;">
       
      <form action="/searchEnglishMuqeem" method="post" >
        @csrf
  <table class="table" >
  <thead>
    
    <tr>
      <th>Information</th>
      
      <th>Info Type</th>
      <th style="white-space: nowrap;">Muqeem Type</th>
 
      
    </tr>
    <tr>
      
      <th><input id="info" name="info" type="text" value="" placeholder="Iqama, Passport"></th>
      
        <th>
          <select name="info_type" >
              <option value="id">ID</option>
              <option value="iqamaNumber">Iqama</option>
              <option value="passportNumber">Passport</option>
          </select>
        </th>
        <th>
          <select name="muqeem_table_name" >
              <option selected value="Muqeem">PDF</option>
              <option  value="muqeem_english">English Muqeem</option>
              <option value="muqeem_arabics">Arabic Muqeem</option>
              <option value="businessMuqeemg">Business Muqeem</option>
          </select>
        </th>
    </tr>
    <tr><th colspan="3"> <input type="submit" value="Submit" style="background:blue; color:white;width:100%;"> </th></tr>
  </thead>
</table>

</form>


      </div>
@if(session('resultData'))
    @php
        $data = session('resultData');
        $checkLink = session('checkLink');
    @endphp

    <div style="
        
        padding: 15px;
        background-color: blue;
        color: white;
        margin: 10px auto;
        border-radius: 5px;
        font-size: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height:60px;
    ">
        <div>
            <strong>Name: </strong> <span>{{ $data->name ?? 'N/A' }} </span>
            <strong>Iqama: </strong> <span>{{ $data->iqamaNumber ?? 'N/A' }}</span>
        </div>

        <div class="icon">
            @if($checkLink !== "check-muqeem")
    <a href="{{ url('editPageEnglishMuqeem?id=' . $data->id) }}" style="color: white; display: inline-flex; align-items: center; text-decoration: none;">
        <i class="fas fa-pencil-alt"></i>&nbsp;Edit
    </a>
@endif

            <a href="https://bangladeshistudeo.com/{{ $checkLink }}?id={{ $data->id }}" style="color: white; display: inline-flex; align-items: center; text-decoration: none;">
                <i class="fas fa-eye"></i>&nbsp;Check
            </a>
        </div>
    </div>
@endif

@if(session('message'))
    <div style="
        width: 500px;
        height: 100px;
        padding: 15px;
        background-color: #f44336; /* Red background for alert */
        color: white;
        margin: 10px auto;
        border-radius: 5px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        text-align: center;
    ">
        {{ session('message') }}
    </div>
@endif
      
    </section>
@endsection



