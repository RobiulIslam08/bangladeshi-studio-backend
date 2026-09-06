<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard | By Code Info</title>

  <link rel="stylesheet" href="style.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

  <!-- Bootstrap 3 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery + Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Tailwind CDN (optional) -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="container">
    <nav>
      <ul>

        <!-- Logo / Dashboard -->
        <li>
          <a href="#" class="logo">
            <img src="{{ asset('frontsite/logo.jpeg') }}" alt="">
            <span class="nav-item">DashBoard</span>
          </a>
        </li>

        <!-- Home -->
        <li>
          <a href="/dashboard">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a>
        </li>

        

        <!-- Image -->
        <li>
          <a href="/newsdpn">
            <i class="fas fa-user"></i>
            <span class="nav-item">Image</span>
          </a>
        </li>

       

        <!-- ======================= -->
        <!--     MUQEEM DROPDOWN     -->
        <!-- ======================= -->

        <li class="has-muqeem-menu">
          <!-- IMPORTANT: no data-toggle, no href="#..." -->
          <a href="javascript:void(0);" id="muqeemToggle">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Muqeem</span>
            <i class="fas fa-angle-down" style="margin-left:20px;"></i>
          </a>

          <!-- By default hidden (display:none) -->
          <ul id="muqeemMenu" style="list-style:none; padding-left:20px; display:none;">

            <li>
              <a href="/muqeem">
                <i class="fas fa-circle"></i> Muqeem PDF
              </a>
            </li>

            <li>
              <a href="/muqeem-english">
                <i class="fas fa-circle"></i> Muqeem English
              </a>
            </li>

            <li>
              <a href="/muqeem-arabic">
                <i class="fas fa-circle"></i> Muqeem Arabic
              </a>
            </li>

            <li>
              <a href="/muqeem-business">
                <i class="fas fa-circle"></i> Muqeem Business
              </a>
            </li>

            <li>
              <a href="/muqeem-english-search">
                <i class="fas fa-circle"></i> Search Muqeem
              </a>
            </li>

          </ul>
        </li>
        
        
        
        
        <!-- ======================= -->
<!--   MEDICAL DROPDOWN      -->
<!-- ======================= -->
<li class="has-medical-menu">
  <a href="javascript:void(0);" id="medicalToggle">
    <i class="fas fa-wallet"></i>
    <span class="nav-item">Medical Report</span>
  </a>

  <!-- By default hidden -->
  <ul id="medicalMenu" style="list-style:none; padding-left:20px; display:none;">

    <li>
      <a href="/createReport">
        <i class="fas fa-circle"></i> Create Report
      </a>
    </li>

    <li>
      <a href="/searchReport">
        <i class="fas fa-circle"></i> Search Report
      </a>
    </li>

    <li>
      <a href="/editReport">
        <i class="fas fa-circle"></i> Edit Report
      </a>
    </li>

  </ul>
</li>

        
        
         <!-- Document -->
        <li>
          <a href="/document">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Document</span>
          </a>
        </li>
         <!-- Visa -->
        <li>
          <a href="/visaForm">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Visa</span>
          </a>
        </li>
        
        <!-- Agent List -->
        <li>
          <a href="/agentList">
            <i class="fas fa-users"></i>
            <span class="nav-item">Agent List</span>
          </a>
        </li>

        

        <!-- Logout -->
        <li>
          <a href="" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>

      </ul>
    </nav>

    {{-- Main content --}}
    @yield('content')
  </div>

  {{-- Extra scripts from child views --}}
  @stack('scripts')

  <!-- === Muqeem Dropdown Script (Custom, conflict-free) === -->
<script>
  $(document).ready(function () {

      // Muqeem dropdown
      $('#muqeemToggle').on('click', function (e) {
          e.preventDefault();
          $('#muqeemMenu').slideToggle(200); // open/close smoothly
      });

      // Medical Report dropdown
      $('#medicalToggle').on('click', function (e) {
          e.preventDefault();
          $('#medicalMenu').slideToggle(200); // open/close smoothly
      });

  });
</script>


