
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
      <div class="main-top">
        <h1>Report List</h1>
        <i class="fas fa-user-cog"></i>
      </div>
    <form method="POST" action="{{ route('filter.admin.report') }}">
    @csrf

    <div class="d-flex gap-3 mb-3 flex-wrap" style="max-width: 100%;">

        {{-- Date Range Dropdown --}}
        <div>
            <label for="reportRange" class="form-label">Business Analysis</label>
            <select class="form-select" id="reportRange" name="reportRange" onchange="handleDateInputs(this.value)">
                <option value="today">Today</option>
                <option value="7days">Last 7 Days</option>
                <option value="30days">Last 30 Days</option>
                <option value="365days">Last 365 Days</option>
                <option value="lifetime">Lifetime</option>
                <option value="single">Single Date</option>
                <option value="custom">Custom Date</option>
            </select>
        </div>

        {{-- Admin Checkbox Dropdown --}}
        <div class="dropdown">
            <label class="form-label d-block">Select Admin</label>
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="adminCheckboxDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Select Admin
            </button>
            <ul class="dropdown-menu p-3" style="width: 250px;" aria-labelledby="adminCheckboxDropdown">
                <li>
                    <div class="form-check">
                        <input class="form-check-input admin-check" type="checkbox" value="All Admin" id="allAdmin">
                        <label class="form-check-label" for="allAdmin">All Admin</label>
                    </div>
                </li>
                @if(is_array($adminRecords))
                    @foreach($adminRecords as $name)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input admin-check" type="checkbox" value="{{ $name }}" id="admin_{{ $loop->index }}">
                                <label class="form-check-label" for="admin_{{ $loop->index }}">{{ $name }}</label>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <input type="hidden" name="selectedAdmins" id="selectedAdmins">
        </div>

    </div>

    {{-- Date Inputs --}}
    <div id="dateInputs" class="mb-3" style="display: none;">
        <div class="form-group mb-2" id="singleDate" style="display: none;">
            <label for="single">Select Date</label>
            <input type="date" class="form-control" name="singleDate" id="single">
        </div>
        <div class="form-group" id="customDate" style="display: none;">
            <label>From</label>
            <input type="date" class="form-control mb-2" name="fromDate">
            <label>To</label>
            <input type="date" class="form-control" name="toDate">
        </div>
    </div>

    <button type="submit" class="btn btn-success" style="margin-top:15px;">Filter Report</button>
</form>





      <div class="main-skills">
       
      
  <table class="table">
    <thead>
      
      <tr>
        <th>Admin Name</th>
        <th>Patient Name</th>
        <th>Delete</th>
        <th>Check and Download</th>
        <th>old</th>
        <th>Date</th>
      </tr>
    </thead>
<tbody>
    @if(isset($medicalRecords) && is_array($medicalRecords) && count($medicalRecords) > 0)
        @foreach($medicalRecords as $record)
            <tr>
                <td><span>{{ $record['admin_name'] ?? 'N/A' }}</span></td>
                <td>{{ $record['name'] ?? 'N/A' }}</td>
                <td><i class="fas fa-trash" style="color: red;"></i></td>
                <td>
                    <a href="https://www.medicaltestcertificate.online/downloadFile/index2.php?pid={{ $record['id'] ?? '' }}">
                        Check and Download
                    </a>
                </td>
                <td>
                    <a href="https://www.medicaltestcertificate.online/downloadFile/index.php?pid={{ $record['id'] ?? '' }}">
                        Old Download
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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allAdminCheckbox = document.getElementById('allAdmin');
        const otherAdminCheckboxes = document.querySelectorAll('.admin-check:not(#allAdmin)');
        const hiddenInput = document.getElementById('selectedAdmins');
        const dropdownBtn = document.getElementById('adminCheckboxDropdown');

        function updateSelectedAdmins() {
            const selected = Array.from(document.querySelectorAll('.admin-check:checked'))
                                  .map(cb => cb.value);
            hiddenInput.value = selected.join(',');
            dropdownBtn.textContent = selected.length > 0 ? selected.join(', ') : 'Select Admin';
        }

        allAdminCheckbox.addEventListener('change', function () {
            if (this.checked) {
                otherAdminCheckboxes.forEach(cb => cb.checked = false);
            }
            updateSelectedAdmins();
        });

        otherAdminCheckboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                if (this.checked) {
                    allAdminCheckbox.checked = false;
                }
                updateSelectedAdmins();
            });
        });
    });

    // Date input control
    function handleDateInputs(value) {
        const dateInputs = document.getElementById('dateInputs');
        const singleDate = document.getElementById('singleDate');
        const customDate = document.getElementById('customDate');

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
</script>
@endpush



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
  
