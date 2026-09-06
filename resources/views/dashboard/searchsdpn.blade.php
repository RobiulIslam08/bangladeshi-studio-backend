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
        <span>{{ session('unsuccess') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="main-top">
        <h1>Search Image</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
       
      <form action="{{ route('search.image') }}" method="POST">
    @csrf
    <table class="table">
        <tbody>
            <tr>
                <td><input type="text" name="info" placeholder="Enter information"></td>
                <td>
                    <select name="infoType">
                        <option value="iqama_no">Iqama</option>
                        <option value="passport_no">Passport</option>
                        <option value="phone">Phone</option>
                        <option value="sdpn_no">SDPN No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="btn bg-info" style="width: 100%;" value="Search Image">
                </td>
            </tr>
           @if(session('result'))
    <img style="width:250px; height:250px;" src="{{ asset('uploads/images/' . session('result')->image) }}" alt="Image" width="100">
    <br>
    <a href="{{ asset('uploads/images/' . session('result')->image) }}" download class="btn bg-info text-white text-bold mt-3">Download Image</a>
@else
    <p>your data not match</p>
@endif



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
