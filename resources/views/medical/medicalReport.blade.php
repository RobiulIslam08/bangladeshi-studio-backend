<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medical Check-Up Certificate</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arial&display=swap" />
    <link rel="stylesheet" href="{{ asset('medical/assets/css/medicare-certificate.css') }}">
</head>
<body class="mc-cert-page">
    <div class="mc-page">
        <div class="mc-cert" id="form-to-download">
            <div class="watermark">
                @for ($i = 0; $i < 19; $i++)
                    <span>JUBAIL <span style="color: #b20000">MEDICARE</span> COMPANY</span>
                @endfor
            </div>

            <div class="content">
                <div class="logo-section">
                    <img src="{{ asset('medical/assets/images/medicare/logo.png') }}" alt="Jubail Medicare Logo" />
                </div>

                <div class="header-section">
                    <div></div>
                    <div class="header-title">
                        <h1 class="header-title">MEDICAL CHECK UP SUMMARY / CERTIFICATE</h1>
                        <hr class="header-hr" />
                    </div>
                    <div class="qr-section">
                        <div class="qr-code">
                            {!! QrCode::format('svg')->size(200)->margin(0)->generate($qrText) !!}
                        </div>
                        <p class="qr-label">
                            Scan QR to Verify
                            <br />
                            Authenticity
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <span class="form-label" style="left: 0">TO</span>
                    <input type="text" class="form-field" readonly value="{{ $data->to_name }}" style="left: 60px; width: 310px" />
                    <span class="form-label" style="left: 375px">DATE</span>
                    <input type="text" class="form-field" readonly value="{{ $reportAt }}" style="left: 440px; width: 160px" />
                </div>

                <div class="form-row">
                    <span class="form-label" style="left: 0">FILE NO</span>
                    <input type="text" class="form-field" readonly value="{{ $data->serialFileNo() }}" style="left: 60px; width: 110px" />
                    <span class="form-label" style="left: 200px">CATEGORY</span>
                    <input type="text" class="form-field" readonly value="NEW" style="left: 265px; width: 105px" />
                    <span class="form-label" style="left: 375px">BLOOD GROUP</span>
                    <input type="text" class="form-field" readonly value="{{ $data->blood_group }}" style="left: 500px; width: 100px" />
                </div>

                <div class="form-section">
                    <h2 class="section-title">PERSONAL DETAILS</h2>

                    <div class="form-row">
                        <span class="form-label" style="left: 0">NAME</span>
                        <input type="text" class="form-field" readonly value="{{ $data->name }}" style="left: 100px; width: 500px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0">NATIONALITY</span>
                        <input type="text" class="form-field" readonly value="{{ $data->nationality }}" style="left: 100px; width: 100px; top: -5px" />
                        <span class="form-label" style="left: 205px; top: -3px">AGE</span>
                        <input type="text" class="form-field" readonly value="{{ $ageYears }} YRS" style="left: 310px; width: 176px; top: -5px" />
                        <span class="form-label" style="left: 490px; top: -3px">SEX</span>
                        <input type="text" class="form-field" readonly value="{{ $data->sex }}" style="left: 530px; width: 70px; top: -5px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -6px">PASSPORT NO/IQAMA</span>
                        <input type="text" class="form-field" readonly value="{{ $data->passport_or_iqama }}" style="left: 200px; width: 110px; top: -10px" />
                        <span class="form-label" style="left: 315px; top: -6px">DATE OF BIRTH</span>
                        <input type="text" class="form-field" readonly value="{{ $data->date_of_birth }}" style="left: 487px; width: 113px; top: -10px" />
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title" style="margin-top: -15px">EMPLOYMENT DETAILS</h2>

                    <div class="form-row">
                        <span class="form-label" style="left: 0">SPONSOR / COMPANY</span>
                        <input type="text" class="form-field" readonly value="{{ $data->sponsor_company }}" style="left: 185px; width: 415px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -3px">JOB DESCRIPTION</span>
                        <input type="text" class="form-field" readonly value="{{ $data->job_desc }}" style="left: 185px; width: 280px; top: -5px" />
                        <span class="form-label" style="left: 470px; top: -3px">CITY</span>
                        <input type="text" class="form-field" readonly value="{{ $data->city }}" style="left: 520px; width: 80px; top: -5px" />
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title" style="margin-top: -15px">MEDICAL EXAMINATION</h2>

                    <div class="form-row">
                        <span class="form-label" style="left: 0">HEIGHT</span>
                        <input type="text" class="form-field" readonly value="{{ $data->height }}" style="left: 155px; width: 80px" />
                        <span class="form-label" style="left: 280px">WEIGHT</span>
                        <input type="text" class="form-field" readonly value="{{ $data->weight }}" style="left: 325px; width: 140px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -3px">PULSE</span>
                        <input type="text" class="form-field" readonly value="{{ $data->pulse }}" style="left: 155px; width: 80px; top: -5px" />
                        <span class="form-label" style="left: 305px; top: -3px">BP</span>
                        <input type="text" class="form-field" readonly value="{{ $data->bp }}" style="left: 325px; width: 140px; top: -5px" />
                        <span class="form-label" style="left: 485px; top: -3px">TEMP</span>
                        <input type="text" class="form-field" readonly value="{{ $data->temp }}" style="left: 520px; width: 80px; top: -5px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -6px">LUNGS &amp; CHEST</span>
                        <input type="text" class="form-field" readonly value="NORMAL" style="left: 155px; width: 445px; top: -10px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -12px">CURDIO VASCULAR</span>
                        <input type="text" class="form-field" readonly value="NORMAL" style="left: 155px; width: 445px; top: -15px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -19px">NEUROLOGICAL</span>
                        <input type="text" class="form-field" readonly value="NORMAL" style="left: 155px; width: 445px; top: -19px" />
                    </div>

                    <div class="form-row" style="top: -5px">
                        <span class="form-label" style="left: 0">VISION</span>
                        <span style="position: absolute; left: 139px; width: 125px; text-align: center; font-size: 11px; font-weight: 600; color: #3c3b3b">N6 = NORMAL</span>
                        <span style="position: absolute; left: 335px; width: 245px; text-align: center; font-size: 11px; font-weight: 600; color: #3c3b3b">N6 = NORMAL</span>
                    </div>

                    <div class="vision-section">
                        <div class="vision-row" style="top: -10px">
                            <span class="form-label" style="left: 35px">NEAR</span>
                            <span class="form-label" style="left: 90px">LEFT</span>
                            <input type="text" class="form-field" readonly value="6/6=NORMAL" style="left: 119px; width: 125px" />
                            <span class="form-label" style="left: 300px">RIGHT</span>
                            <input type="text" class="form-field" readonly value="6/6=NORMAL" style="left: 335px; width: 245px" />
                        </div>

                        <div class="vision-row" style="top: -10px">
                            <span class="form-label" style="left: 40px">FAR</span>
                            <span class="form-label" style="left: 90px">LEFT</span>
                            <input type="text" class="form-field" readonly value="6/6=NORMAL" style="left: 119px; width: 125px; top: -3px" />
                            <span class="form-label" style="left: 300px">RIGHT</span>
                            <input type="text" class="form-field" readonly value="6/6=NORMAL" style="left: 335px; width: 245px; top: -3px" />
                            <span style="position: absolute; left: 335px; width: 245px; top: 18px; text-align: center; font-size: 11px; font-weight: 600; color: #3c3b3b">WITHOUT GLASSES</span>
                        </div>
                    </div>

                    <div class="form-row" style="margin-top: 10px; height: 22px">
                        <span class="form-label" style="left: 0; top: -10px">HEARING</span>
                        <span class="form-label" style="left: 110px">LEFT</span>
                        <input type="text" class="form-field" readonly value="NORMAL" style="left: 139px; width: 125px" />
                        <span class="form-label" style="left: 320px">RIGHT</span>
                        <input type="text" class="form-field" readonly value="NORMAL" style="left: 355px; width: 245px" />
                    </div>

                    <div class="form-row" style="margin-top: 20px">
                        <span class="form-label" style="left: 0">GENERAL HEAL TH CONDITION</span>
                        <input type="text" class="form-field" readonly value="NO COUGH-NO FEVER-NO BREATHING DIFFICULTY" style="left: 265px; width: 335px" />
                    </div>

                    <div class="form-row">
                        <input type="text" class="form-field" readonly value="NO COVID-19  SYMPTOMS" style="left: 265px; width: 335px; top: -5px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -5px">APPEARANCE</span>
                        <input type="text" class="form-field" readonly value="NORMAL" style="left: 265px; width: 335px; top: -10px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -12px">IF SUFFERING FROM ANY CHRONIC DISEASES</span>
                        <input type="text" class="form-field" readonly value="NIL" style="left: 265px; width: 335px; top: -15px" />
                    </div>

                    <div class="form-row">
                        <span class="form-label" style="left: 0; top: -20px">ADDITIONAL COMMENTS IF ANY</span>
                        <input type="text" class="form-field" readonly value="FIT FOR WORK" style="left: 265px; width: 335px; top: -20px" />
                    </div>
                </div>

                <div style="border: 1px solid black; text-align: center; padding: 3px; margin-top: -20px; font-size: 11px; font-weight: 600; color: #3c3b3b; width: 600px">
                    NOTE: THIS MEDICAL FITNESS REPORT IS VALID TILL
                    {{ $data->report_date ? \Carbon\Carbon::createFromFormat('d/m/Y', $data->report_date)->addDays(364)->format('d/m/Y') : 'N/A' }}
                </div>

                <div class="signature-section">
                    <div>
                        <p style="font-size: 13px; color: #000000e3; font-weight: bold; margin-left: -10px">DR. SHAHID HUSSAIN ( )</p>
                        <p style="font-size: 13px; color: #3c3b3b; font-weight: 500; margin-left: -10px">ATTENDING PHYSICIAN</p>
                        <img src="{{ asset('medical/assets/images/medicare/shahed2.png') }}" alt="Signature 1" class="signature-img" style="margin-left: 0" />
                    </div>
                    <img src="{{ asset('medical/assets/images/medicare/logo-signature2.png') }}" alt="Logo Signature" class="logo-signature-img" />
                    <div>
                        <p style="font-size: 13px; color: #000000e3; font-weight: bold; text-align: right; margin-right: -10px">DR. SAEED ABDUL KHALIQ</p>
                        <p style="font-size: 13px; color: #3c3b3b; font-weight: 500; text-align: right; margin-right: -10px">MEDICAL DERECTOR</p>
                        <img src="{{ asset('medical/assets/images/medicare/saeed2.png') }}" alt="Signature 2" class="signature-img saeed-signature" style="transform: translateX(30px)" />
                    </div>
                </div>

                <div class="footer">
                    <hr />
                    <p class="arabic">
                        س.ت ٢٠٥٥٠٢٣٨٤٨ - ص.ب ٢٨٧ - الجبيل ٣١٩٥١ - المملكة العربية السعودية - تلفون : +٩٦٦ ١٣ ٣٦٣ ١٨٨٨ - +٩٦٦ ١٣ ٣٦٣ ٢٨٨٨
                    </p>
                    <p class="contact">
                        C.R. 2055023848 - Tel.: +966 13 363 1888 - +966 13 363 2888 - P.O. Box 287 Jubail 31951 - Kingdom of Saudi Arabia
                    </p>
                    <p class="email">
                        E-mail: info@jubailmedicare.com - Website: www.jubailmedicare.com
                    </p>
                </div>
            </div>
        </div>

        <button type="button" id="download-btn" class="mc-download-btn">Download PDF</button>
    </div>

    <script>
        document.getElementById("download-btn").addEventListener("click", function () {
            window.print();
        });
    </script>
</body>
</html>
