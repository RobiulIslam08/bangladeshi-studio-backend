<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Reset</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .reset-container {
      max-width: 500px;
      margin: 20px auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    .form-label {
      font-weight: 500;
      color: #495057;
    }

    .btn-custom {
      background-color: #7EC8E3;
      color: #fff;
      font-weight: 600;
    }

    .btn-custom:hover {
      background-color: #64b3d4;
    }

    .form-control:focus {
      border-color: #7EC8E3;
      box-shadow: 0 0 0 0.2rem rgba(126, 200, 227, 0.25);
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="reset-container">
      <h3 class="text-center mb-4 text-primary">Reset Your Password</h3>
      <form method="post" action="{{route('setPassword')}}">
          @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="full_name" placeholder="Enter your full name">
          <input hidden  type="text" class="form-control" id="id" name="id" value="{{ $id }}" >
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>

        <div class="mb-3">
          <label for="newPassword" class="form-label">New Password</label>
          <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Create a new password">
        </div>

        <div class="mb-4">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
        </div>

        <div class="d-grid">
          <button type="submit" name="submit" class="btn btn-custom btn-lg">Reset Password</button>
        </div>
      </form>
    </div>
  </div>
   
</body>
</html>