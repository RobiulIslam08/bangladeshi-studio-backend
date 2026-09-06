<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Medical Check-Up Certificate</title>
  <style>
    @page { margin: 14mm; }
    body { font-family: sans-serif; font-size: 12px; }
    .title { font-weight: 700; text-align:center; margin-bottom: 10px; }
    .grid { display: grid; grid-template-columns: 160px 1fr; gap: 6px 12px; margin-bottom: 6px; }
    .info-title { font-weight: 700; }
    .info-box { border: 1px solid #ccc; padding: 4px 6px; }
  </style>
</head>
<body>
  <h1 class="title">MEDICAL CHECK UP SUMMARY / CERTIFICATE</h1>

  <div style="width:120px; margin-bottom:8px;">
    {!! QrCode::format('svg')->size(120)->margin(0)->generate($qrText) !!}
  </div>

  <div class="grid">
    <div class="info-title">DATE</div>
    <div class="info-box">{{ $data->report_date }} {{ \Carbon\Carbon::parse($data->time)->format('h:ia') }}</div>

    <div class="info-title">FILE NO</div>
    <div class="info-box">{{ $data->file_no }}</div>

    <div class="info-title">BLOOD GROUP</div>
    <div class="info-box">{{ $data->blood_group }}</div>
  </div>

  {{-- এখানে PERSONAL / EMPLOYMENT / EXAMINATION সেকশনগুলো আপনার HTML অনুযায়ী বসান --}}

  <p style="margin-top:12px;">
    <strong>NOTE:</strong>
    THIS MEDICAL FITNESS REPORT IS VALID TILL
    {{ \Carbon\Carbon::createFromFormat('d/m/Y', $data->report_date)->addDays(364)->format('d/m/Y') }}
  </p>
</body>
</html>
