@extends('mastering')

@section('content')
<style>
  .alert-horizontal{
    display:flex;
    justify-content:space-between;
    align-items:center;
  }

  /* Modern card form */
  .search-card{
    max-width: 720px;
    background:#fff;
    border:1px solid rgba(0,0,0,.08);
    border-radius:16px;
    box-shadow: 0 10px 30px rgba(0,0,0,.06);
    overflow:hidden;
  }

  .search-card__header{
    padding:18px 20px;
    background: linear-gradient(135deg, rgba(13,110,253,.10), rgba(13,110,253,.02));
    border-bottom:1px solid rgba(0,0,0,.06);
  }

  .search-card__title{
    margin:0;
    font-size:18px;
    font-weight:700;
  }

  .search-card__subtitle{
    margin:6px 0 0 0;
    font-size:13px;
    color:#6c757d;
  }

  .search-card__body{
    padding:20px;
  }

  .form-label{
    font-weight:600;
    font-size:14px;
  }

  .input-group-text{
    background:#f8f9fa;
    border-color: rgba(0,0,0,.12);
  }

  .form-control{
    border-color: rgba(0,0,0,.12);
    border-radius: 12px;
    padding: 12px 12px;
  }

  .form-control:focus{
    box-shadow: 0 0 0 .2rem rgba(13,110,253,.15);
    border-color: rgba(13,110,253,.45);
  }

  .btn-modern{
    border-radius:12px;
    padding: 12px 14px;
    font-weight:700;
  }

  .helper-text{
    font-size:12px;
    color:#6c757d;
    margin-top:6px;
  }
</style>

<section class="main">

  {{-- Success Message --}}
  @if(session('success'))
    <div class="alert alert-success alert-horizontal" role="alert">
      <span>{{!! session('success') !!}}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Error Message (optional) --}}
  @if(session('error'))
    <div class="alert alert-danger alert-horizontal" role="alert">
      <span>{{ session('error') }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Validation Errors --}}
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="main-top">
    <h1>Search Medical Report</h1>
    <i class="fas fa-user-cog"></i>
  </div>

  <div class="mt-3">
    <div class="search-card">
      <div class="search-card__header">
        <h2 class="search-card__title">Find Your Report</h2>
        <p class="search-card__subtitle">Enter Passport/Iqama number to search your medical report.</p>
      </div>

      <div class="search-card__body">
        <form action="{{ url('/searchReportData') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="passport_or_iqama" class="form-label">Passport / Iqama No.</label>

            <div class="input-group">
              <span class="input-group-text" aria-hidden="true">
                <i class="fa-solid fa-id-card"></i>
              </span>

              <input
                class="form-control"
                id="passport_or_iqama"
                name="passport_or_iqama"
                type="text"
                value="{{ old('passport_or_iqama') }}"
                placeholder="e.g. A1234567 / 1234567890"
                autocomplete="off"
                required
              >
            </div>

            <div class="helper-text">
              Tip: No spaces. Use the same number that was used during registration.
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100 btn-modern">
            Search Report
          </button>
        </form>
      </div>
    </div>
  </div>

</section>
@endsection
