@extends('mastering')
@section('content')
<style>
  tbody tr td input,
  tbody tr td select,
  tbody tr td textarea {
    border: 1px solid black;
    width: 100%;
    height: 30px;
    padding: 3px 6px;
    font-size: 13px;
  }

  tbody tr td textarea {
    height: 60px;
    resize: vertical;
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
      <span>{{!! session('success') !!}}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="main-top">
    <h1>Create New Visa</h1>
    <i class="fas fa-user-cog"></i>
  </div>

  <div class="main-skills">
    {{-- FORM START --}}
    <form action="{{ route('visaStore') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="4" class="text-center">
              Visa Information Input Form
            </th>
          </tr>
        </thead>

        <tbody>
          {{-- Header / Top Line --}}
          <tr>
            <td style="width: 25%;">Header Date & Time</td>
            <td style="width: 25%;">
              <input type="text" 
       id="header_datetime"
       name="header_datetime"
       placeholder="4/29/25, 5:09 PM"
       class="form-control">
            </td>
            
            
          </tr>


          {{-- Images --}}
          <tr>
            <td>Profile Photo</td>
            <td>
              <input type="file" name="profile_photo" accept="image/*">
            </td>
            
          </tr>

          

          {{-- Main Visa Top Section --}}
          <tr>
            <td>Visa No.</td>
            <td>
              <input type="text" name="visa_no" value="{{ $data['visa_num'] }}">
            </td>
            <td>Duration of Stay</td>
            <td>
              <input type="text" name="duration_of_stay" value="90 Days">
            </td>
          </tr>

          <tr>
            <td>Valid From</td>
            <td>
             <input type="text" 
       id="valid_from"
       name="valid_from"
       value="{{ $data['today'] }}"
       class="form-control">

            </td>
            <td>Valid Until</td>
            <td>
              <input type="text" name="valid_until" value="{{ $data['todayPlus90'] }}">
            </td>
          </tr>

          

          {{-- Visa Type / Name / Nationality --}}
          <tr>
            
            <td>First Name</td>
            <td>
              <input type="text" name="f_name" placeholder="First Name">
            </td>
            <td>Last Name</td>
            <td>
              <input type="text" name="l_name" placeholder="Last Name">
            </td>
          </tr>

          <tr>
              <td>Visa Type</td>
            <td>
              <input type="text" name="visa_type" value="عمل - Work">
            </td>
            
            <td>Birth Date</td>
            <td>
              <input type="date" name="birth_date">
            </td>
          </tr>

          {{-- Passport / Ref / Ref Date --}}
          <tr>
            <td>Passport No.</td>
            <td>
              <input type="text" name="passport_no">
            </td>
            <td>Ref. No.</td>
            <td>
              <input type="text" name="ref_no" value="{{$data['rep_num']}}">
            </td>
          </tr>

          <tr>
            
            <td>Application No.</td>
            <td>
              <input type="text" name="application_no" value="{{$data['appl_num']}}">
            </td>
          </tr>

          {{-- Occupation / Employer / Visa Fees --}}
          <tr>
            <td>Occupation</td>
            <td>
              <input type="text" name="occupation"
                     value="عامل تحميل وتنزيل - Load and unload worker">
            </td>
            <td>Employer Name</td>
            <td>
              <input type="text" name="employer_name"
                     value="شركة معاذ حمد العتيبي التجارية">
            </td>
          </tr>
          
          {{-- Visa Footer Title --}}
          <tr>
  <td>Visa Footer Title</td>
  <td colspan="3">
    <textarea id="visafooterTitle" name="visafooterTitle"
              rows="4"
              class="form-control">1<BGDRAKIB<<MD<<<<<<<<<<<<<<<<<<<<<<<<<<<
EM02021029BGD0202199181211120289<<<<<<<<<<<<02</textarea>
  </td>
</tr>


        </tbody>

        <tfoot>
          <tr>
            <td colspan="4">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-paper-plane"></i> Submit
              </button>
            </td>
          </tr>
        </tfoot>
      </table>
    </form>
    {{-- FORM END --}}
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let input = document.getElementById("header_datetime");

    // বর্তমান সময়
    let now = new Date();

    let month = now.getMonth() + 1;
    let day   = now.getDate();
    let year  = now.getFullYear().toString().slice(-2); // last 2 digits

    let hours = now.getHours();
    let minutes = now.getMinutes().toString().padStart(2, '0');
    
    // AM/PM format
    let ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12; // 12-hour format
       
    // Format: M/D/YY, H:MM AM/PM
    let formatted = month + "/" + day + "/" + year + ", " + hours + ":" + minutes + " " + ampm;

    // Input-এ default value সেট করুন
    input.value = formatted;
});
</script>


@endsection


