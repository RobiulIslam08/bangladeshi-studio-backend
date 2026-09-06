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
    .input{
        padding: 10px 15px; 
              border: 1px solid #ccc; 
              border-radius: 8px; 
              font-size: 16px; 
              width: 150px; 
              outline: none; 
              transition: border-color 0.3s ease;"
       onfocus="this.style.borderColor='#007bff'"
       onblur="this.style.borderColor='#ccc'
    }
    .hiddenElement{
        display:none;
    }
    .removeHidden{
        display:block;
    }
</style>



<section class="main" style="width:80%;">
<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Floating Box -->
<div id="floatingBox"
     class="border border-dark rounded p-3 text-center shadow position-absolute top-0 start-50 translate-middle-x hiddenElement"
     style="width: 300px; height: 200px; background-color: #a6d8a2; font-family: Arial, sans-serif; top: 50px; z-index: 1;">

  <!-- Close Icon -->
  <button onclick="closeFloatingBox()"
          type="button"
          class="btn-close position-absolute top-0 end-0 m-2 btn-close-white"
          aria-label="Close"></button>

  <div class="bg-white border rounded-pill px-3 py-1 fw-bold d-inline-block mb-2" id="admin_Name_alert_box">
    MD JAKIR HOSSEN
  </div>

  <table class="table table-bordered table-sm mb-2" style="width: auto; margin: 0 auto;">
    <thead class="table-success">
      <tr>
        <th>Previous</th>
        <th>New</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="fw-bold fs-5 bg-white" id="availableLimit">100</td>
        <td class="fw-bold fs-5 bg-white">
          <input id="add_limit" type="number" style="width:60px;" value="0" onkeyup="limitCal()">
          <input id="admin_id" value="0" type="hidden">
        </td>
        <td class="fw-bold fs-5 bg-white" id="totalLimit">100</td>
      </tr>
      <tr>
        <td colspan="3" class="text-center">
          <button onclick="updateLimitAPI()" type="submit" class="btn btn-sm btn-primary rounded-pill px-3">Submit</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>



@if(session('success'))
 <div class="alert alert-success">
    {{ session('success') }}<br>
    <input type="hidden" value="{{ session('login_link') }}" id="login_link_id">
    <b>Login Link: <a href="{{ session('login_link') }}" target="_blank">Go to login page</a></b><br>
   
    <button onclick="copyLoginLink()" class="btn btn-sm btn-outline-primary">Copy Login Link</button>
</div>

@endif

      <div class="main-top">
        <h1>Admin List</h1>
        <i class="fas fa-user-cog"></i>
      </div>
   
      <div class="main-skills">
       
      
  <table class="table">
    <thead>
      
      <tr>
        <th>Admin Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Limit</th>
        <th>Action</th>
      </tr>
    </thead>
<tbody>
    
    
<form action="{{ route('MuqeemUserStore') }}" method="POST">
    @csrf
    <tr>
        <td>
            <input type="text" name="Name" placeholder="Enter Name" class="input">
        </td>
        <td>
            <input type="email" name="email" placeholder="Enter Email" class="input">
        </td>
        <td>
            <input type="text" name="phone" placeholder="Enter Phone" class="input">
        </td>
        <td>
            <select name="status" class="input">
                <option value="Active">Active</option>
                <option value="Deactive">Deactive</option>
            </select>
        </td>
        <td>
            <input type="text" name="limit" value="0" class="input">
        </td>
        <td>
            <button class="input btn bg-info" type="submit">Submit</button>
        </td>
    </tr>
</form>

    
    @if(isset($adminRecords) && is_array($adminRecords) && count($adminRecords) > 0)
        @foreach($adminRecords as $record)
            <tr>
                <td>  <span>{{ $record['Name'] ?? 'N/A' }}</span></td>
                <td>{{ $record['email'] ?? 'N/A' }}</td>
                <td>{{ $record['phone'] ?? 'N/A' }}</td>
                <td onclick="changeStatus(document.getElementById('status-{{ $record['id'] }}'),{{ $record['id'] }})">
    @if($record['admin_status'] == "Active")
        <span id="status-{{ $record['id'] }}" style="display: inline-block; width: 100px; background-color: #28a745; color: white; padding: 4px 10px; border-radius: 20px; font-size: 14px; text-align: center; cursor:pointer;">
            Active
        </span>
    @else
        <span id="status-{{ $record['id'] }}" style="display: inline-block; width: 100px; background-color: #dc3545; color: white; padding: 4px 10px; border-radius: 20px; font-size: 14px; text-align: center;center; cursor:pointer;">
            Deactive
        </span>
    @endif
</td>

                <td>
                    
                   {{ $record['admin_limit'] ?? 'N/A' }}
                </td>
                <td>
                    <button onclick="updatelimit('{{$record['admin_limit']}}','{{$record['Name']}}','{{$record['id']}}')" class="btn btn-sm btn-success rounded-pill px-3">Add Limit</button>
                </td>
                
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
    
    function changeStatus(statusElement,admin_id) {
    var status = statusElement.innerText.trim();
    var updateStatus = "";

    if (status === "Active") {
        statusElement.innerText = "Deactive";
        statusElement.style.backgroundColor = "red"; // অপশনাল, চাইলে রঙও চেঞ্জ করতে পারো
        updateStatus = "Deactive";
    } else {
        statusElement.innerText = "Active";
        statusElement.style.backgroundColor = "green";
        updateStatus = "Active";
    }
    
    var xhr = new XMLHttpRequest();
            xhr.open("POST", "https://medicaltestcertificate.online/api/update_statas.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Server response: " + xhr.responseText);
                }
            };
             xhr.send("admin_id=" + encodeURIComponent(admin_id) + "&status=" + encodeURIComponent(updateStatus));
}
  function updatelimit(limit, Name, admin_id) {
    document.getElementById('availableLimit').innerText = limit;
    document.getElementById('add_limit').value = 0;
    document.getElementById('totalLimit').innerText = limit;
    document.getElementById('admin_Name_alert_box').innerText = Name;
    document.getElementById('admin_id').value = admin_id;
    

    var floatingBox = document.getElementById('floatingBox');
    floatingBox.classList.remove('hiddenElement');
    floatingBox.style.display = 'block';
  }

function limitCal() {
    var previewsLimit = parseInt(document.getElementById('availableLimit').innerText);
    var add_limit = parseInt(document.getElementById('add_limit').value) || 0;
    var totalLimit = previewsLimit + add_limit;
    document.getElementById('totalLimit').innerText = totalLimit;
  }
  
  function closeFloatingBox() {
    var box = document.getElementById('floatingBox');
    box.classList.add('hiddenElement');
    box.style.display = 'none';
  }
function updateLimitAPI() {
    var Total_Limit = document.getElementById('totalLimit').innerText;
    var admin_id = document.getElementById('admin_id').value;

    var XHR = new XMLHttpRequest(); // Corrected: new keyword was missing
    var updateAPI = "https://medicaltestcertificate.online/api/updateLimit.php";

    // Prepare form data
    var formData = new FormData();
    formData.append('admin_id', admin_id);
    formData.append('total_limit', Total_Limit);

    // Send request
    XHR.open('POST', updateAPI, true);
    XHR.onload = function () {
        if (XHR.status === 200) {
            alert("Limit updated successfully: " + XHR.responseText);
        } else {
            alert("Error: " + XHR.status);
        }
    };

    XHR.onerror = function () {
        alert("Network error occurred.");
    };

    XHR.send(formData);
}

// 

function copyLoginLink() {
    var login_link_var = document.getElementById('login_link_id').value;
    const loginLink = login_link_var;
    navigator.clipboard.writeText(loginLink).then(() => {
        alert("Login link copied to clipboard!");
    }).catch(err => {
        alert("Failed to copy the link.");
        console.error(err);
    });
}
  </script>
  
