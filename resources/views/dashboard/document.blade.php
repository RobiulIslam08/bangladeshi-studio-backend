@extends('mastering')
@section('content')
<style>
  tbody tr td input {
    border: 1px solid black;
    width: 150px;
    height: 30px;
  }

  .alert-horizontal {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .main button {
    width: 100%;
  }
  #storedDocument {
    display: none;
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
    <h1>Documents</h1>
    <i class="fas fa-user-cog"></i>
  </div>

  <div class="main-skills">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><input class="form-control" name="iqamaNumber" id="iqamaNumber" type="text" placeholder="Iqama Number"></th>
          <th>
            <button class="btn btn-primary" onclick="searchData()">
              <i class="fas fa-search"></i> Search
            </button>
          </th>
        </tr>
      </thead>

      <!-- This will be filled by JS -->
      <tbody id="storedDocument">
        <!-- Dynamic rows inserted here -->
      </tbody>

      <tbody id="newdocumentbox">
        
      </tbody>

      <tfoot>
        <tr>
          <td colspan="2">
            <button class="btn btn-primary" onclick="newField()">
              <i class="fas fa-plus-circle"></i> Add New
            </button>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <button class="btn btn-success" onclick="submit()">
              <i class="fas fa-paper-plane"></i> Submit
            </button>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</section>
@endsection

<script>
function searchData() {
    var iqamaNumber = document.getElementById('iqamaNumber').value;
    var XHR = new XMLHttpRequest();
    var apiLink = "/documentapi?iqama=" + encodeURIComponent(iqamaNumber);

    XHR.onreadystatechange = function () {
        if (XHR.readyState === 4) {
            var storedDocument = document.getElementById('storedDocument');
            storedDocument.innerHTML = ""; // clear previous search results

            if (XHR.status === 200) {
                var data = JSON.parse(XHR.responseText);

                // Add header row
                storedDocument.innerHTML = `
                    <tr>
                      <th>Document Title</th>
                      <th>Document</th>
                    </tr>
                `;

                // Add a row for each document
                data.forEach(function(item) {
                    storedDocument.innerHTML += `
                        <tr>
                          <td>${item.documentTitle}</td>
                          <td>
  <a href="${item.documentFile}" class="btn btn-sm btn-outline-primary" download target="_blank">
    <i class="fas fa-download"></i> Download
  </a>
</td>

                        </tr>
                    `;
                });

                storedDocument.style.display = "table-row-group";
            } else {
                storedDocument.style.display = "none";
            }
        }
    };

    XHR.open("GET", apiLink, true);
    XHR.send();
}

let rowCounter = 0; // initialize counter outside function

function newField() {
    const box = document.getElementById("newdocumentbox");
    const row = document.createElement("tr");

    // generate unique suffix
    rowCounter++;

    // unique IDs using counter
    const titleId = "document_title_" + rowCounter;
    const fileId = "document_" + rowCounter;

    row.innerHTML = `
      <td>
        <input class="form-control" name="document_title[]" id="${titleId}" type="text" placeholder="Write Document Title">
      </td>
      <td>
        <input class="form-control" type="file" name="document[]" id="${fileId}">
      </td>
    `;

    box.appendChild(row);
}

 function submit() {
    var iqamaNumber = document.getElementById('iqamaNumber').value;
    const titles = document.querySelectorAll("input[name='document_title[]']");
    const files = document.querySelectorAll("input[name='document[]']");

    const formData = new FormData();
    formData.append('iqamaNumber', iqamaNumber);

    for (let i = 0; i < titles.length; i++) {
        formData.append(`document_title[${i}]`, titles[i].value);
        formData.append(`document[${i}]`, files[i].files[0]);
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var XHR = new XMLHttpRequest();
    var apiLink = "/documentStoreApi"; // Keep using this since you're on web.php

    XHR.onreadystatechange = function () {
        if (XHR.readyState === 4) {
            if (XHR.status === 200) {
                alert("Documents submitted successfully!");
            } else {
                alert("Error submitting documents.");
            }
        }
    };

    XHR.open("POST", apiLink, true);
    XHR.setRequestHeader("X-CSRF-TOKEN", csrfToken); // 🔐 Send CSRF token
    XHR.send(formData);
}

</script>
