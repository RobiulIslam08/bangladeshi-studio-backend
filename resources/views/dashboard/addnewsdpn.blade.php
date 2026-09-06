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
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="main-top">
        <h1>Add New SDPN</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
       
      <form action="/sdpnStorageData" method="post" enctype="multipart/form-data">
        @csrf
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Iqama No</th>
        <th>Passport No</th>
        <th>Phone</th>
        <th>SDPN No</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="file" name="image" required></td>
        <td><input type="number" name="iqama_no" ></td>
        <td><input type="text" name="passport_no" ></td>
        <td><input type="number" name="phone" ></td>
        <td><input type="text" name="sdpn_no" ></td>
      </tr>
      <tr>
        <td colspan="5">
          <input type="submit" class="btn bg-info" style="width: 100%;" value="Add to SDPN">
        </td>
      </tr>
    </tbody>
  </table>
</form>

      </div>

      <section class="main-course">
        <button class="btn btn-primary btn-lg rounded-pill shadow" onclick="pageLink('newsdpn')">New SDPN</button>
        <button class="btn btn-primary btn-lg rounded-pill shadow" onclick="pageLink('searchsdpn')">Search Image</button>
        <button class="btn btn-primary btn-lg rounded-pill shadow" onclick="pageLink('newsdpnoldimg')">Old All New SDPN</button>
        
      </section>
    </section>
@endsection
  <script>
    function pageLink(page) {
      window.location.href = page;
    }
  </script>
