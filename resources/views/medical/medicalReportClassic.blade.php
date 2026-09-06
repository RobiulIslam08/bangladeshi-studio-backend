<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Medical Check-Up Certificate</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('medical/assets/images/favicons/apple-touch-icon.png') }}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('medical/assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('medical/assets/images/favicons/favicon-16x16.png') }}" />

    <link rel="stylesheet" href="{{ asset('medical/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('medical/assets/fonts/stylesheet.css') }}">
    <style>
        .medical-info__qr svg {
            width: 100%;
            height: 100%;
            display: block;
        }
    </style>
</head>

<body>
    <main class="page-wrapper">
        <div class="page-wrapper__content">
            <div class="page-wrapper__bg" style="background-image: url({{ asset('medical/assets/images/background.png') }})"></div>
            <div class="page-wrapper__inner">
                <header class="page-header">
                    <div class="page-header__logo">
                        <img src="{{ asset('medical/assets/images/logo.png') }}" alt="Jubail Medicare Co. Logo">
                    </div>
                </header>
                <section class="medical-info mb-8px">
                    <div class="medical-info__top">
                        <h1 class="medical-info__top__title title">MEDICAL CHECK UP SUMMARY / CERTIFICATE</h1>
                       <div class="medical-info__qr">
                            {!! QrCode::format('svg')->size(200)->margin(0)->generate($qrText) !!}
                        </div>
                    </div>
                    <div class="medical-info__row-1 grid">
                        <div class="medical-info__item-1 grid">
                            <span class="info-title">TO</span>
                            <div class="info-box">{{ $data->to_name }}</div>
                        </div>
                        <div class="medical-info__item-2 grid">
                            <span class="info-title">DATE</span>
                            <div class="info-box">{{ $data->report_date }} {{ $data->time ? date('h:ia', strtotime($data->time)) : '' }}</div>
                        </div>
                    </div>
                    <div class="medical-info__row-2 grid">
                        <div class="medical-info__item-3 grid">
                            <span class="info-title">FILE NO</span>
                            <div class="info-box">{{ $data->serialFileNo() }}</div>
                        </div>
                        <div class="medical-info__item-4 grid">
                            <span class="info-title text-right">CATEGORY</span>
                            <div class="info-box">NEW</div>
                        </div>
                        <div class="medical-info__item-5 grid">
                            <span class="info-title">BLOOD GROUP</span>
                            <div class="info-box">{{ $data->blood_group }}</div>
                        </div>
                    </div>
                </section>
                <section class="personal-info mb-8px">
                    <h2 class="section-title title">PERSONAL DETAILS</h2>
                    <div class="personal-info__row-1 grid">
                        <span class="info-title">NAME</span>
                        <div class="info-box">{{ $data->name }}</div>
                    </div>
                    <div class="personal-info__row-2 grid">
                        <div class="personal-info__item-1 grid">
                            <span class="info-title">NATIONALITY</span>
                            <div class="info-box capitalize">{{ $data->nationality }}</div>
                        </div>
                        <div class="personal-info__item-2 grid">
                            <span class="info-title">AGE</span>
                            <div class="info-box">{{ $ageYears }} YRS</div>
                        </div>
                        <div class="personal-info__item-3 grid">
                            <span class="info-title">SEX</span>
                            <div class="info-box">{{ $data->sex }}</div>
                        </div>
                    </div>
                    <div class="personal-info__row-3 grid">
                        <div class="personal-info__item-4 grid">
                            <span class="info-title">PASSPORT NO/IQAMA</span>
                            <div class="info-box">{{ $data->passport_or_iqama }}</div>
                        </div>
                        <div class="personal-info__item-5 grid">
                            <span class="info-title">DATE OF BIRTH</span>
                            <div class="info-box">{{ $data->date_of_birth }}</div>
                        </div>
                    </div>
                </section>
                <section class="employment-info mb-8px">
                    <h2 class="section-title title">EMPLOYMENT DETAILS</h2>
                    <div class="employment-info__row-1 grid">
                        <span class="info-title">SPONSOR / COMPANY</span>
                        <div class="info-box">{{ $data->sponsor_company }}</div>
                    </div>
                    <div class="employment-info__row-2 grid">
                        <div class="employment-info__item-1 grid">
                            <span class="info-title">JOB DESCRIPTION</span>
                            <div class="info-box">{{ $data->job_desc }}</div>
                        </div>
                        <div class="employment-info__item-2 grid">
                            <span class="info-title">CITY</span>
                            <div class="info-box">{{ $data->city }}</div>
                        </div>
                    </div>
                </section>
                <section class="examination-info">
                    <h2 class="section-title title">MEDICAL EXAMINATION</h2>
                    <div class="examination-info__row-1 grid">
                        <div class="examination-info__item-1 grid">
                            <span class="info-title">HEIGHT</span>
                            <div class="info-box lowercase">{{ $data->height }}</div>
                        </div>
                        <div class="examination-info__item-2 grid">
                            <span class="info-title text-right">WEIGHT</span>
                            <div class="info-box lowercase">{{ $data->weight }}</div>
                        </div>
                    </div>
                    <div class="examination-info__row-2 grid">
                        <div class="examination-info__item-3 grid">
                            <span class="info-title">PULSE</span>
                            <div class="info-box lowercase">{{ $data->pulse }}</div>
                        </div>
                        <div class="examination-info__item-4 grid">
                            <span class="info-title text-right">B.P</span>
                            <div class="info-box lowercase">{{ $data->bp }}</div>
                        </div>
                        <div class="examination-info__item-5 grid">
                            <span class="info-title text-right">TEMP</span>
                            <div class="info-box">{{ $data->temp }}</div>
                        </div>
                    </div>
                    <div class="examination-info__row-3 grid">
                        <span class="info-title">LUNGS & CHEST</span>
                        <div class="info-box">NORMAL</div>
                    </div>
                    <div class="examination-info__row-3 grid">
                        <span class="info-title">CURDIO VASCULAR</span>
                        <div class="info-box">NORMAL</div>
                    </div>
                    <div class="examination-info__row-3 grid">
                        <span class="info-title">NEUROLOGICAL</span>
                        <div class="info-box">NORMAL</div>
                    </div>
                    <div class="examination-info__row-4 grid">
                        <span class="info-title">VISION</span>
                        <div class="info-title">N6 = NORMAL</div>
                    </div>
                    <div class="examination-info__row-5 grid">
                        <div class="examination-info__item-6 grid">
                            <span class="info-title info-title--double"><span>NEAR</span> <span>LEFT</span></span>
                            <div class="info-box">6/6=NORMAL</div>
                        </div>
                        <div class="examination-info__item-7 grid">
                            <span class="info-title text-right">RIGHT</span>
                            <div class="info-box">6/6=NORMAL</div>
                        </div>
                    </div>
                    <div class="examination-info__row-5 grid">
                        <div class="examination-info__item-6 grid">
                            <span class="info-title info-title--double"><span>EAR</span> <span>LEFT</span></span>
                            <div class="info-box">6/6=NORMAL</div>
                        </div>
                        <div class="examination-info__item-7 grid">
                            <span class="info-title text-right">RIGHT</span>
                            <div class="info-box">6/6=NORMAL</div>
                        </div>
                    </div>
                    <div class="examination-info__row-5 examination-info__row-5--5 grid">
                        <div class="examination-info__item-6 grid">
                            <span class="info-title info-title--double"><span>LEFT</span></span>
                            <div class="info-box">NORMAL</div>
                        </div>
                        <div class="examination-info__item-7 grid">
                            <span class="info-title text-right">RIGHT</span>
                            <div class="info-box">NORMAL</div>
                        </div>
                    </div>
                    <div class="examination-info__row-6 grid">
                        <span class="info-title info-title--sm">GENERAL HEAL TH CONDITION</span>
                        <div class="info-box info-box--sm">NO COUGH-NO FEVER-NO BREATHING DEFFICULTY</div>
                    </div>
                    <div class="examination-info__row-6 grid">
                        <div></div>
                        <div class="info-box info-box--sm">NO COVID-19 SYMPTOMS</div>
                    </div>
                    <div class="examination-info__row-6 grid">
                        <span class="info-title info-title--sm">APPEARANCE</span>
                        <div class="info-box info-box--sm">NORMAL</div>
                    </div>
                    <div class="examination-info__row-6 grid">
                        <span class="info-title info-title--sm">IF SUFFERING FROM ANY CHRONIC DISEASES</span>
                        <div class="info-box info-box--sm">NIL</div>
                    </div>
                    <div class="examination-info__row-6 grid">
                        <span class="info-title info-title--sm">ADDITIONAL COMMENTS IF ANY</span>
                        <div class="info-box info-box--sm">FIT FOR WORK</div>
                    </div>
                </section>
                <h2 class="medical-note">
                    <span>NOTE: THIS MEDICAL FITNESS REPORT IS VALID TILL
                        {{ $data->report_date ? \Carbon\Carbon::createFromFormat('d/m/Y', $data->report_date)->addDays(364)->format('d/m/Y') : 'N/A' }}
                    </span>
                </h2>
                <section class="medical-doctor">
                    <div class="medical-doctor__item">
                        <h4 class="medical-doctor__name">DR. SHAHID HUSSAIN ()</h4>
                        <p class="medical-doctor__designation info-title">ATTENDING PHYSICIAN</p>
                        <img src="{{ asset('medical/assets/images/signature-1.png') }}" alt="signature" class="medical-doctor__signature">
                    </div>
                    <div class="medical-doctor__item">
                        <img src="{{ asset('medical/assets/images/logo-circle.png') }}" alt="signature" class="medical-doctor__logo">
                    </div>
                    <div class="medical-doctor__item">
                        <h4 class="medical-doctor__name text-right">DR. SAEED ABDUL KHALIQ ()</h4>
                        <p class="medical-doctor__designation info-title text-right">MEDICAL DERECTOR</p>
                        <img src="{{ asset('medical/assets/images/signature-2.png')}}" alt="signature"
                            class="medical-doctor__signature medical-doctor__signature--2">
                    </div>
                </section>
                <footer class="medical-footer">
                    <p dir="rtl" class="medical-footer__text medical-footer__text--arabic">
                        س.ت. ٢٠٥٥٠٢٣٨٤٨ : تلفون - ‎+٩٦٦ ١٣ ٣٦٣ ١٨٨٨ - ‎+٩٦٦ ١٣ ٣٦٣ ٢٨٨٨ - ص.ب. ٢٨٧ - الجبيل ٣١٩٥١ -
                        المملكة العربية السعودية
                    </p>
                    <p class="medical-footer__text">C.R. 2055023848 - Tel.: +966 13 363 1888 - +966 13 363 2888 - P.O.
                        Box 284 Jubail 31951 - Kingdom of Saudi Arabia</p>
                    <p class="medical-footer__text medical-footer__text--info">E-mail: <a
                            href="#" class="lowercase">info@jubailmedicare.com</a> - Website: <a
                            href="#" class="lowercase">www.jubailmedicare.com</a></p>
                </footer>
            </div>
        </div>
    </main>

    <div class="button-box">
        <button type="button" class="button-box__btn">Download PDF</button>
    </div>

    <script>
        document.querySelector(".button-box__btn").addEventListener("click", function () {
            window.print();
        });
    </script>
</body>

</html>
