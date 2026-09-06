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
  
@error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('sdpn_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      <div class="main-top">
        <h1>Old Image SDPN</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
       
      <form action="/oldallsdpnStorageData" method="post" enctype="multipart/form-data">
        @csrf
  <table class="table">
    <thead>
      <tr>
        <th>Select Images</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> <i class="fas fa-users"></i> <input type="file" name="image[]" multiple required></td>
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

