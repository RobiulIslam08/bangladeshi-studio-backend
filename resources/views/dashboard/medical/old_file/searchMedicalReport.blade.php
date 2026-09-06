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



<section class="main" style="width:80%;">
  
@if(session('success'))
    <div class="alert alert-success alert-horizontal" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

      <div class="main-skills">
       
      
  <table class="table">
    <thead>
        <tr>
            <th>Information</th>
            <th>Info Type</th>
            <th>Action</th>
        </tr>
        <form action="{{ route('searchMedicalReport') }}" method="post">
            @csrf
      <tr>
        <th>
            <input name="information" type="text" class="form-control border">
        </th>
        <th>
            <select name="infoType" class="form-control border" >
                <option value="PassIqamaNumber">Iqama Number or Passfort</option>
                <option value="file">File Number</option>
                <option value="name">Name</option>
                <option value="id">id</option>
            </select>
        </th>
        
        <th> <input type="submit" class="btn bg-info text-white" </th>
      </tr>
      </form>
      <tr>
        <th>Admin Name</th>
        <th>Patient Name</th>
        <th>Delete</th>
        <th>Check and Download</th>
        <th>Date</th>
      </tr>
    </thead>
<tbody>
    @if(isset($medicalRecords) && is_array($medicalRecords) && count($medicalRecords) > 0)
        @foreach($medicalRecords as $record)
            <tr>
                <td><span>{{ $record['admin_name'] ?? 'N/A' }}</span></td>
                <td>{{ $record['name'] ?? 'N/A' }}</td>
                <td><i onclick="pageLink('http://medicaltestcertificate.online/edit_report.php?edit_id={{ $record['id'] }}')" style="cursor:pointer; color: green;" class="fas fa-pen"> Edit</i>
</td>
                <td>
                    <a href="https://www.medicaltestcertificate.online/downloadFile/update/index.php?pid={{ $record['id'] ?? '' }}">
                        Check and Download
                    </a>
                </td>
                <td>{{ $record['time'] ?? 'N/A' }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" class="text-center">No medical records found.</td>
        </tr>
    @endif
</tbody>


  </table>

      </div>

      
           <section class="main-course">
        <button class="btn btn-primary btn-lg rounded-pill shadow" onclick="pageLink('medical')">Medical Report</button>
        <button class="btn btn-primary btn-lg rounded-pill shadow" onclick="pageLink('searrchmedicalreport')">Search Report</button>
        <button class="btn btn-primary btn-lg rounded-pill shadow" onclick="pageLink('adminDetails')">Admin Details</button>
        
      </section>
    </section>
@endsection

<script>
  function handleDateInputs(value) {
    const dateInputs = document.getElementById('dateInputs');
    const singleDate = document.getElementById('singleDate');
    const customDate = document.getElementById('customDate');

    // Hide all first
    dateInputs.style.display = 'none';
    singleDate.style.display = 'none';
    customDate.style.display = 'none';

    if (value === 'single') {
      dateInputs.style.display = 'block';
      singleDate.style.display = 'block';
    } else if (value === 'custom') {
      dateInputs.style.display = 'block';
      customDate.style.display = 'block';
    }
  }
//  page link
    function pageLink(page) {
      window.location.href = page;
    }
  </script>
