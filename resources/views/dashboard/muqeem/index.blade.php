@extends('mastering')
@section('content')
<style>
  tbody tr td input{
    border:1px solid black;
    width:150px;
    height:30px;
  }

    .alert-horizontal {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        <h1>Create Muqeem</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
       
      <form action="/storeInfo" method="post" enctype="multipart/form-data" >
        @csrf
  <table class="table">
    <thead>
      <tr>
        <th>Person Image</th>
        <th> <input id="personImg" name="personImg" type="file" accept="image/jpeg,image/png,image/jpg"> </th>
        <th>Details Image</th>
        <th>  <input id="detailsImg" name="detailsImg" type="file" accept=".pdf,image/jpeg,image/png,image/jpg"> </th>
        
      </tr>
      <tr>
        <th>Name</th>
        <th>
  <input 
    id="name" 
    name="name" 
    type="text" 
    class="form-control border border-dark p-2" 
    style="width: 160px;">
</th>
        <th>Iqama Number</th>
        <th>
  <input 
    id="iqamaNumber" 
    name="iqamaNumber" 
    type="number" 
    class="form-control border border-dark p-2" 
    style="width: 160px;">
    <input style="display:none;" name="user_id" value="1">
      <input style="display:none;" name="user_roll" value="Admin">
</th>

        <th>Action</th>
        <th>
  <input type="submit" value="Submit" class="btn bg-info text-white" style="width: 100%;">
</th>


      </tr>
      
    </thead>
    
  </table>
</form>

      </div>

      
    </section>
@endsection
