<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Account Registered - Bangladeshi Studeo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #f4f6fb;
      font-family: Arial, sans-serif;
    }
    .email-wrapper {
      width: 100%;
      padding: 20px 0;
    }
    .email-container {
      max-width: 620px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 18px rgba(0,0,0,0.07);
    }
    /* HEADER */
    .email-header {
      background: #0b6bd9;
      padding: 18px 24px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .email-header-logo img {
      display: block;
      height: 40px;
      width: auto;
    }
    .email-header-text {
      color: #ffffff;
    }
    .email-header-text h1 {
      margin: 0;
      font-size: 20px;
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .email-header-text p {
      margin: 2px 0 0;
      font-size: 13px;
      opacity: 0.9;
    }

    /* BODY */
    .email-body {
      padding: 26px 24px 10px;
      color: #333333;
      font-size: 14px;
      line-height: 1.7;
    }
    .email-body h2 {
      margin-top: 0;
      font-size: 18px;
      color: #0b6bd9;
      margin-bottom: 8px;
    }
    .highlight-box {
      margin-top: 14px;
      margin-bottom: 18px;
      padding: 14px 16px;
      border-radius: 8px;
      background: #f0f6ff;
      border: 1px solid #d7e4ff;
    }
    .highlight-box p {
      margin: 4px 0;
      font-size: 14px;
    }
    .details-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .details-table td {
      padding: 6px 0;
      font-size: 14px;
    }
    .details-table td.label {
      width: 40%;
      color: #555555;
      font-weight: 600;
    }
    .details-table td.value {
      width: 60%;
      color: #333333;
    }
    .primary-btn {
      display: inline-block;
      margin-top: 18px;
      padding: 10px 22px;
      background: #0b6bd9;
      color: #ffffff !important;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      border-radius: 6px;
    }
    .note-bn {
      margin-top: 20px;
      font-size: 13px;
      color: #444444;
    }

    /* FOOTER */
    .email-footer {
      margin-top: 10px;
      padding: 16px 24px 18px;
      background: #f8f9fc;
      border-top: 1px solid #e2e6f0;
      font-size: 12px;
      color: #777777;
      text-align: center;
    }
    .email-footer a {
      color: #0b6bd9;
      text-decoration: none;
    }
    .email-footer .brand {
      font-weight: 600;
      color: #555555;
    }
    .email-footer .small {
      display: block;
      margin-top: 6px;
      font-size: 11px;
    }
  </style>
</head>
<body>

  <div class="email-wrapper">
    <div class="email-container">

      <!-- HEADER -->
      <div class="email-header">
        <div class="email-header-logo">
          <img src="{{ asset('frontsite/logo.jpeg') }}" alt="Bangladeshi Studeo Logo" />
        </div>
        <div class="email-header-text">
          <h1>Bangladeshi Studeo</h1>
          <p>Trusted Online Document & Service Platform</p>
        </div>
      </div>

      <!-- BODY -->
      <div class="email-body">
        <h2>Account Registration Successful</h2>

        <p>Dear {{ $name }},</p>

        <p>
          Congratulations! Your <strong>Bangladeshi Studeo</strong> account has been
          <strong>successfully created</strong>. You can now log in and start using our
          online document and service platform.
        </p>

        <div class="highlight-box">
          <p><strong>Account Status:</strong> Active</p>
          <p><strong>Registered Email:</strong> {{ $email }}</p>
          <p><strong>Registration Date:</strong> {{ $created_at }}</p>
        </div>

        <table class="details-table">
          <tr>
            <td class="label">Full Name</td>
            <td class="value">{{ $name }}</td>
          </tr>
          <tr>
            <td class="label">Email Address</td>
            <td class="value">{{ $email }}</td>
          </tr>
          <tr>
            <td class="label">Registered On</td>
            <td class="value">{{ $created_at }}</td>
          </tr>
        </table>

        <p>
          Please use your registered email address and password to log in to your account.
          For your security, never share your login details with anyone.
        </p>

        <a href="https://bangladeshistudeo.com/user/login" class="primary-btn">
          Login to Your Account
        </a>

        <p class="note-bn">
          <strong>Important:</strong> If you <strong>did not create this account</strong> or believe
          this email was sent to you by mistake, please contact our support team immediately so we
          can review and secure your information.
        </p>

      </div>

      <!-- FOOTER -->
      <div class="email-footer">
        <span class="brand">Bangladeshi Studeo</span><br/>
        Dammam Jubail KSA<br/>
        Mobile: <a href="tel:01323090887">+966</a> • 
        Email: <a href="mailto:bangladeshistudeo@gmail.com">bangladeshistudeo@gmail.com</a><br/>
        Website: <a href="https://bangladeshistudeo.com" target="_blank">https://bangladeshistudeo.com</a>

        <span class="small">
          © 2025 Bangladeshi Studeo. All rights reserved.<br/>
          This is an automated message about a new account registration. Please do not reply directly to this email.
        </span>
      </div>

    </div>
  </div>

</body>
</html>
