{{-- resources/views/medical/reportPDF.blade.php --}}
@php
    use Carbon\Carbon;

    // Safe time/dates
    $reportDate = null;
    try { $reportDate = Carbon::createFromFormat('d/m/Y', $data->report_date); } catch (\Throwable $e) {}
    $validTill  = $reportDate ? $reportDate->copy()->addDays(364)->format('d/m/Y') : 'N/A';

    $timeStr = '';
    try { $timeStr = Carbon::parse($data->time)->format('h:ia'); } catch (\Throwable $e) { $timeStr = $data->time ?? ''; }

    // Local image absolute paths for DomPDF
    $logoPath       = public_path('medical/assets/images/logo.png');
    $logoCirclePath = public_path('medical/assets/images/logo-circle.png');
    $sign1Path      = public_path('medical/assets/images/signature-1.png');
    $sign2Path      = public_path('medical/assets/images/signature-2.png');

    // Background image: DomPDF-এ background-image সীমিত; বড় ব্যাকগ্রাউন্ড দরকার হলে <img> ব্যবহার করুন
    $bgPath         = public_path('medical/assets/images/background.png');
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Medical Check-Up Certificate</title>
 <style>
  /* DomPDF-safe base */
  @page { margin: 14mm; }
  * { box-sizing: border-box; }
  body { font-family: "DejaVu Sans", sans-serif; font-size: 12px; color: #111; margin: 0; }

  /* Headings & titles */
  .title { font-weight: 700; text-align: center; font-size: 16px; margin: 0 0 10px; }
  .section-title { font-weight: 700; font-size: 14px; margin: 12px 0 8px; text-transform: uppercase; }

  /* Tables */
  table { width: 100%; border-collapse: collapse; }
  table.meta { margin-bottom: 8px; }
  table.meta td.t { width: 180px; font-weight: 700; vertical-align: top; padding: 4px 6px; }
  table.meta td.v { border: 1px solid #333; padding: 4px 6px; }

  .header td { vertical-align: middle; padding: 4px 0; }
  .logo { height: 48px; }

  .qr { width: 120px; height: 120px; border: 1px solid #ddd; padding: 6px; margin-left: auto; }

  .center { text-align: center; }
  .right  { text-align: right; }
  .sm     { font-size: 11px; }

  table.pairs td { padding: 4px 6px; }

  .note { margin-top: 10px; text-align: center; font-weight: 700; text-transform: uppercase; }

  /* Footer */
  .footer { margin-top: 8px; text-align: center; font-size: 11px; }
  .rtl    { direction: rtl; }
</style>

</head>
<body>

  {{-- Optional background image (prints behind content if supported) --}}
  @if(is_file($bgPath))
    <div style="position:fixed; top:0; left:0; right:0; bottom:0; z-index:-1; opacity:.08;">
      <img src="{{ $bgPath }}" style="width:100%; height:100%;">
    </div>
  @endif

  {{-- Header --}}
  <table class="header">
    <tr>
      <td>
        @if(is_file($logoPath))
          <img class="logo" src="{{ $logoPath }}" alt="Logo">
        @endif
      </td>
      <td class="right">
        <div class="qr">
          {{-- SVG QR renders well in DomPDF --}}
          {!! QrCode::format('svg')->size(120)->margin(0)->generate($qrText) !!}
        </div>
      </td>
    </tr>
  </table>

  <h1 class="title">MEDICAL CHECK UP SUMMARY / CERTIFICATE</h1>

  {{-- Top meta --}}
  <table class="meta">
    <tr>
      <td class="t">TO</td>
      <td class="v">&nbsp;</td>
    </tr>
    <tr>
      <td class="t">DATE</td>
      <td class="v">{{ $data->report_date }} {{ $timeStr }}</td>
    </tr>
  </table>

  {{-- Row 2 --}}
  <table class="meta">
    <tr>
      <td class="t">FILE NO</td>
      <td class="v">{{ $data->file_no }}</td>
    </tr>
    <tr>
      <td class="t right">CATEGORY</td>
      <td class="v">NEW</td>
    </tr>
    <tr>
      <td class="t">BLOOD GROUP</td>
      <td class="v">{{ $data->blood_group }}</td>
    </tr>
  </table>

  {{-- Personal --}}
  <div class="section-title">PERSONAL DETAILS</div>
  <table class="meta">
    <tr>
      <td class="t">NAME</td>
      <td class="v">{{ $data->name }}</td>
    </tr>
  </table>
  <table class="meta">
    <tr>
      <td class="t">NATIONALITY</td>
      <td class="v" style="text-transform:capitalize;">{{ $data->nationality }}</td>
    </tr>
    <tr>
      <td class="t">AGE</td>
      <td class="v">{{ $ageYears ? $ageYears.' YRS' : '' }}</td>
    </tr>
    <tr>
      <td class="t">SEX</td>
      <td class="v">{{ $data->sex }}</td>
    </tr>
  </table>
  <table class="meta">
    <tr>
      <td class="t">PASSPORT NO/IQAMA</td>
      <td class="v">{{ $data->passport_or_iqama }}</td>
    </tr>
    <tr>
      <td class="t">DATE OF BIRTH</td>
      <td class="v">{{ $data->date_of_birth }}</td>
    </tr>
  </table>

  {{-- Employment --}}
  <div class="section-title">EMPLOYMENT DETAILS</div>
  <table class="meta">
    <tr>
      <td class="t">SPONSOR / COMPANY</td>
      <td class="v">{{ $data->sponsor_company }}</td>
    </tr>
    <tr>
      <td class="t">JOB DESCRIPTION</td>
      <td class="v"></td>
    </tr>
    <tr>
      <td class="t">CITY</td>
      <td class="v">{{ $data->city }}</td>
    </tr>
  </table>

  {{-- Examination --}}
  <div class="section-title">MEDICAL EXAMINATION</div>
  <table class="meta">
    <tr>
      <td class="t">HEIGHT</td>
      <td class="v" style="text-transform:lowercase;">{{ $data->height }}</td>
    </tr>
    <tr>
      <td class="t right">WEIGHT</td>
      <td class="v" style="text-transform:lowercase;">{{ $data->weight }}</td>
    </tr>
    <tr>
      <td class="t">PULSE</td>
      <td class="v" style="text-transform:lowercase;">{{ $data->pulse }}</td>
    </tr>
    <tr>
      <td class="t right">B.P</td>
      <td class="v" style="text-transform:lowercase;">{{ $data->bp }}</td>
    </tr>
    <tr>
      <td class="t right">TEMP</td>
      <td class="v">{{ $data->temp }}</td>
    </tr>
    <tr>
      <td class="t">LUNGS & CHEST</td>
      <td class="v">NORMAL</td>
    </tr>
    <tr>
      <td class="t">CURDIO VASCULAR</td>
      <td class="v">NORMAL</td>
    </tr>
    <tr>
      <td class="t">NEUROLOGICAL</td>
      <td class="v">NORMAL</td>
    </tr>
    <tr>
      <td class="t">VISION</td>
      <td class="v">N6 = NORMAL</td>
    </tr>
    <tr>
      <td class="t">NEAR / LEFT</td>
      <td class="v">6/6 = NORMAL</td>
    </tr>
    <tr>
      <td class="t right">RIGHT</td>
      <td class="v">6/6 = NORMAL</td>
    </tr>
    <tr>
      <td class="t">EAR / LEFT</td>
      <td class="v">6/6 = NORMAL</td>
    </tr>
    <tr>
      <td class="t right">RIGHT</td>
      <td class="v">6/6 = NORMAL</td>
    </tr>
    <tr>
      <td class="t">LEFT</td>
      <td class="v">NORMAL</td>
    </tr>
    <tr>
      <td class="t right">RIGHT</td>
      <td class="v">NORMAL</td>
    </tr>
    <tr>
      <td class="t sm">GENERAL HEALTH CONDITION</td>
      <td class="v sm">NO COUGH - NO FEVER - NO BREATHING DIFFICULTY</td>
    </tr>
    <tr>
      <td class="t"></td>
      <td class="v sm">NO COVID-19 SYMPTOMS</td>
    </tr>
    <tr>
      <td class="t sm">APPEARANCE</td>
      <td class="v sm">NORMAL</td>
    </tr>
    <tr>
      <td class="t sm">IF SUFFERING FROM ANY CHRONIC DISEASES</td>
      <td class="v sm">NIL</td>
    </tr>
    <tr>
      <td class="t sm">ADDITIONAL COMMENTS IF ANY</td>
      <td class="v sm">FIT FOR WORK</td>
    </tr>
  </table>

  <div class="note">
    NOTE: THIS MEDICAL FITNESS REPORT IS VALID TILL {{ $validTill }}
  </div>

  {{-- Doctor/signatures --}}
  <div class="divider"></div>
  <table class="pairs">
    <tr>
      <td style="width:40%; vertical-align:top;">
        <div class="center" style="margin-bottom:6px;">
          @if(is_file($sign1Path))
            <img src="{{ $sign1Path }}" alt="signature-1" style="height:36px;">
          @endif
        </div>
        <div class="center" style="font-weight:700;">DR. SHAHID HUSSAIN ()</div>
        <div class="center sm">ATTENDING PHYSICIAN</div>
      </td>
      <td style="width:20%; vertical-align:top; text-align:center;">
        @if(is_file($logoCirclePath))
          <img src="{{ $logoCirclePath }}" alt="logo-circle" style="height:48px;">
        @endif
      </td>
      <td style="width:40%; vertical-align:top;">
        <div class="center" style="margin-bottom:6px;">
          @if(is_file($sign2Path))
            <img src="{{ $sign2Path }}" alt="signature-2" style="height:36px;">
          @endif
        </div>
        <div class="center" style="font-weight:700;">DR. SAEED ABDUL KHALIQ ()</div>
        <div class="center sm">MEDICAL DIRECTOR</div>
      </td>
    </tr>
  </table>

  {{-- Footer --}}
  <div class="footer rtl">
    س.ت. ٢٠٥٥٠٢٣٨٤٨ : تلفون - ‎+٩٦٦ ١٣ ٣٦٣ ١٨٨٨ - ‎+٩٦٦ ١٣ ٣٦٣ ٢٨٨٨ - ص.ب. ٢٨٧ - الجبيل ٣١٩٥١ - المملكة العربية السعودية
  </div>
  <div class="footer">
    C.R. 2055023848 - Tel.: +966 13 363 1888 - +966 13 363 2888 - P.O. Box 284 Jubail 31951 - Kingdom of Saudi Arabia
  </div>
  <div class="footer">
    E-mail: <span class="lowercase">info@jubailmedicare.com</span> - Website: <span class="lowercase">www.jubailmedicare.com</span>
  </div>

</body>
</html>
