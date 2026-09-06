<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Resident Information</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('business_muqeem/assets/images/favicons/apple-touch-icon.png')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('business_muqeem/assets/images/favicons/favicon-32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('business_muqeem/assets/images/favicons/favicon-16x16.png')}}" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- css style -->

    <link rel="stylesheet" href="{{ asset('business_muqeem/assets/css/style.css') }}">
    <style>
        .resident-information_description_text {
  width: 95px;
  position: absolute;
  top: 0px;
  left: 186px;
  font-family: var(--primary-font);
  font-size: 16px;
  text-align: center;
  color: var(--secondary-color);
  font-weight: 500;
  z-index: 1;
  background-color: var(--white-color);
}
    </style>

</head>

<body>
    <div class="page-wrapper">
        <!-- ********************* page number 01 ********************* -->
        <section class="page-header">
            <div class="page-header__image">
                
                
                <img src="{{ asset('storage/' . $data->customerImage) }}" alt="saruar hosen">

            </div><!-- /.page-header__image -->
            <div class="page-header__logo logo-retina">
                <a href="index.html">
                    <img src="{{ asset('business_muqeem/assets/images/logo.png') }}" alt="{{ asset('business_muqeem/assets/images/logo.png') }}">
                   

                </a>
            </div><!-- /.page-header__logo -->
            <div class="page-header__reference">
                
                <p class="page-header__reference__title" style="background-image: url({{ asset('business_muqeem/assets/images/top-title.png') }});"></p>
                <p class="page-header__reference__number">{{$data->sl_id}}</p>
            </div><!-- /.page-header__reference -->
        </section><!-- /.page-header -->
        <section class="resident-information">
            <h2 class="section-title" style="background-image: url({{ asset('business_muqeem/assets/images/title.png') }});"></h2>
           
            <div class="resident-information__row">
                <div class="resident-information__column resident-information__column--border">
                    <div class="resident-information__item">
                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/passport.png') }});"></div>
                        
                        <ul class="resident-information__list">
                            <li>
                                <span class="resident-information__title">Passport Number</span>
                                <span class="resident-information__text-middle">{{$data->passport_number}}</span>
                               
                                <span class="resident-information__text-arabic" style="width: 47.88px; background-image: url({{ asset('business_muqeem/assets/images/1.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Passport Issuance Place</span>
                                <span class="resident-information__text-middle">{{$data->passport_issuance_place}}ا</span>
                                <span class="resident-information__text-arabic" style="width: 84.63px; background-image: url({{ asset('business_muqeem/assets/images/2.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Passport Issuance Date</span>
                                <span class="resident-information__text-middle">{{$data->passport_issuance_date}}</span>
                                <span class="resident-information__text-arabic" style="width: 84.77px; background-image: url({{ asset('business_muqeem/assets/images/3.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Passport Expiry Date</span>
                                <span class="resident-information__text-middle">{{$data->passport_expiry_date}}</span>
                                <span class="resident-information__text-arabic" style="width: 86.23px; background-image: url({{ asset('business_muqeem/assets/images/4.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Passport Status</span>
                                <span class="resident-information__text-middle">{{$data->passport_status}} </span>
                                <span class="resident-information__text-arabic" style="width: 50.17px; background-image: url({{ asset('business_muqeem/assets/images/5.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Visa Expiry Date</span>
                                <span class="resident-information__text-middle">-</span>
                                <span class="resident-information__text-arabic" style="width: 99.61px; background-image: url({{ asset('business_muqeem/assets/images/6.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Visa Issuance Place</span>
                                <span class="resident-information__text-middle">-</span>
                                <span class="resident-information__text-arabic" style="width: 98px; background-image: url({{ asset('business_muqeem/assets/images/7.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Date of Last Exit</span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic" style="width: 67.92px; background-image: url({{ asset('business_muqeem/assets/images/8.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                    <div class="resident-information__item">
                      
                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/health.png') }});"></div>
                        <ul class="resident-information__list">
                            <li>
                                <span class="resident-information__title">Health Insurance</span>
                                <span class="resident-information__text-middle">{{$data->health_insurance}}</span>
                                <span class="resident-information__text-arabic" style="width: 55.92px; background-image: url({{ asset('business_muqeem/assets/images/9.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Expiry Date</span>
                                <span class="resident-information__text-middle">{{$data->health_insurance_expiry}}</span>
                                <span class="resident-information__text-arabic" style="width: 70.13px; background-image: url({{ asset('business_muqeem/assets/images/10.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                    <div class="resident-information__item">
                       
                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/vehicles.png') }});"></div>
                        <ul class="resident-information__list">
                            <li>
                                <span class="resident-information__title">Number of Vehicles</span>
                                <span class="resident-information__text-middle">0</span>
                                <span class="resident-information__text-arabic" style="width: 62.3px; background-image: url({{ asset('business_muqeem/assets/images/11.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Traffic Violations Number</span>
                                <span class="resident-information__text-middle">0</span>
                                <span class="resident-information__text-arabic" style="width: 111.69px; background-image: url({{ asset('business_muqeem/assets/images/12.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Number of Licenses</span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic" style="width: 81.61px; background-image: url({{ asset('business_muqeem/assets/images/13.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                    <div class="resident-information__item">

                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/hajj.png') }});"></div>
                        <ul class="resident-information__list">
                            <li>
                                <span class="resident-information__title resident-information__title--check">
                                    Hajj Eligibility
                                    <span class="resident-information__check ml-15">
                                        <span class="resident-information__check__box">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                                                                           
                                            Yes                                            
                                        </span>
                                        <span class="resident-information__check__box ml-10">
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                            
                                            No                                            
                                        </span>
                                    </span>
                                </span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic">
                                    <span class="resident-information__check mr-15">
                                        <span class="resident-information__check__box mr-10">
                                            لا 
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                                                                       
                                        </span>
                                        <span class="resident-information__check__box">
                                            نعم 
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                           
                                        </span>
                                    </span>
                                    <span class="resident-information__text-arabic--2" style="width: 51.36px; background-image: url({{ asset('business_muqeem/assets/images/14.png') }});"></span>
                                </span>
                            </li>
                            <li>
                                <span class="resident-information__title">Last Year of Hajj</span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic" style="width: 55.38px; background-image: url({{ asset('business_muqeem/assets/images/15.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                    <div class="resident-information__item">
                        
                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/sponsor.png') }});"></div>
                        <ul class="resident-information__list">
                            <li>
                                <span class="resident-information__title">Sponsor ID Number</span>
                                <span class="resident-information__text-middle">{{$data->sponsor_id_number}}</span>
                                <span class="resident-information__text-arabic" style="width: 77.94px; background-image: url({{ asset('business_muqeem/assets/images/16.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Sponsor Name</span>
                                <span class="resident-information__text-middle resident-information__text-middle--sponsor"> {{$data->sponsor_name}} </span>
                                <span class="resident-information__text-arabic" style="width: 57.08px; background-image: url({{ asset('business_muqeem/assets/images/17.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                </div><!-- /.resident-information__column -->
                <div class="resident-information__column">
                    <div class="resident-information__item">
                        
                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/residental.png') }});"></div>
                        <div class="resident-information__identity">
                            <div class="resident-information__identity__box">
                                <h4 class="resident-information__identity__title resident-information__identity__title--arabic" style="width: 70.58px; background-image: url({{ asset('business_muqeem/assets/images/18.png') }});"></h4>
                                <div class="resident-information__identity__name resident-information__identity__name--arabic">{{$data->arabic_name}}</div>
                            </div><!-- /.resident-information__identity__box -->
                            <div class="resident-information__identity__box">
                                <h4 class="resident-information__identity__title">Name in English</h4>
                                <div class="resident-information__identity__name">{{$data->name_english}}</div>
                            </div><!-- /.resident-information__identity__box -->
                        </div><!-- /.resident-information__identity -->
                        <ul class="resident-information__list resident-information__list--resident">
                            <li>
                                <span class="resident-information__title">Iqama Number</span>
                                <span class="resident-information__text-middle">{{$data->iqama_number}}</span>
                                <span class="resident-information__text-arabic" style="width: 53.59px; background-image: url({{ asset('business_muqeem/assets/images/20.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Iqama Version</span>
                                <span class="resident-information__text-middle">{{$data->id_version}}</span>
                                <span class="resident-information__text-arabic" style="width: 65.23px; background-image: url({{ asset('business_muqeem/assets/images/21.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Iqama Status</span>
                                <span class="resident-information__text-middle">{{$data->iqama_status}}</span>
                                <span class="resident-information__text-arabic" style="width: 55.89px; background-image: url({{ asset('business_muqeem/assets/images/22.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Iqama Expiry Date</span>
                                <span class="resident-information__text-middle">{{$data->iqama_exp_date}}</span>
                                <span class="resident-information__text-arabic" style="width: 91.95px; background-image: url({{ asset('business_muqeem/assets/images/23.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Iqama Issuance Date</span>
                                <span class="resident-information__text-middle">{{$data->iqama_issue_date}}</span>
                                <span class="resident-information__text-arabic" style="width: 90.48px; background-image: url({{ asset('business_muqeem/assets/images/24.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Occupation</span>
                                <span class="resident-information__text-middle">{{$data->iqama_occupation}}</span>
                                <span class="resident-information__text-arabic" style="width: 32.41px; background-image: url({{ asset('business_muqeem/assets/images/25.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Marital Status</span>
                                <span class="resident-information__text-middle">{{$data->iqama_marital_status}}</span>
                                <span class="resident-information__text-arabic" style="width: 79.81px; background-image: url({{ asset('business_muqeem/assets/images/26.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Nationality</span>
                                <span class="resident-information__text-middle"> {{$data->nationality}} </span>
                                <span class="resident-information__text-arabic" style="width: 40.92px; background-image: url({{ asset('business_muqeem/assets/images/27.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Blood Type</span>
                                <span class="resident-information__text-middle">{{$data->blood_type}}</span>
                                <span class="resident-information__text-arabic" style="width: 54.64px; background-image:url({{ asset('business_muqeem/assets/images/28.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Place of Birth</span>
                                <span class="resident-information__text-middle"> {{$data->place_of_birth}} </span>
                                <span class="resident-information__text-arabic" style="width: 58.64px; background-image: url({{ asset('business_muqeem/assets/images/29.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Date of Birth</span>
                                <span class="resident-information__text-middle">{{$data->date_of_birth}}</span>
                                <span class="resident-information__text-arabic" style="width: 58.77px; background-image: url({{ asset('business_muqeem/assets/images/30.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Iqama Issuance Place</span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic" style="width: 210.67px; background-image: url({{ asset('business_muqeem/assets/images/31.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">
                                    Gender
                                    <span class="resident-information__check ml-15">
                                        <span class="resident-information__check__box">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                                                                           
                                            Male                                            
                                        </span>
                                        <span class="resident-information__check__box ml-10">
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                            
                                            Female                                            
                                        </span>
                                    </span>
                                </span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic">
                                    <span class="resident-information__check mr-15">
                                        <span class="resident-information__check__box mr-10">
                                            أنثى 
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                                                                       
                                        </span>
                                        <span class="resident-information__check__box">
                                            ذكر
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                           
                                        </span>
                                    </span>
                                    <span class="resident-information__text-arabic--2" style="width: 34.39px; background-image: url({{ asset('business_muqeem/assets/images/32.png') }});"></span>
                                </span>
                            </li>
                            <li>
                                <span class="resident-information__title">
                                    Inside Kingdom
                                    <span class="resident-information__check ml-15">
                                        <span class="resident-information__check__box">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                                                                           
                                            Yes                                            
                                        </span>
                                        <span class="resident-information__check__box ml-10">
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                            
                                            No                                            
                                        </span>
                                    </span>
                                </span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic">  
                                    <span class="resident-information__check mr-15">
                                        <span class="resident-information__check__box mr-10">
                                            لا 
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                                                                       
                                        </span>
                                        <span class="resident-information__check__box">
                                            نعم 
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                           
                                        </span>
                                    </span>
                                    <span class="resident-information__text-arabic--2" style="width: 64.11px; background-image: url({{ asset('business_muqeem/assets/images/33.png') }});"></span>
                                </span>
                            </li>
                            <li>
                                <span class="resident-information__title">Religion</span>
                                <span class="resident-information__text-middle"> {{$data->religion}} </span>
                                <span class="resident-information__text-arabic" style="width: 30.34px; background-image: url({{ asset('business_muqeem/assets/images/34.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">
                                    Is there a finger print?
                                    <span class="resident-information__check ml-15">
                                        <span class="resident-information__check__box">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                                                                           
                                            Yes                                            
                                        </span>
                                        <span class="resident-information__check__box ml-10">
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                            
                                            No                                            
                                        </span>
                                    </span>
                                </span>
                                <span class="resident-information__text-middle"></span>
                                <span class="resident-information__text-arabic">
                                    <span class="resident-information__check mr-15">
                                        <span class="resident-information__check__box mr-10">
                                            لا 
                                            <svg width="10" height="10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="44" height="44" fill="white" stroke="#000000" stroke-width="4"/>
                                            </svg>                                                                                       
                                        </span>
                                        <span class="resident-information__check__box">
                                            نعم 
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="21" height="21" stroke="#000000" stroke-width="2"/>
                                                <path d="M8 8L16 16M8 16L16 8" stroke="#000000" stroke-width="2"/>
                                            </svg>                                           
                                        </span>
                                    </span>
                                    <span class="resident-information__text-arabic--2" style="width: 76.75px; background-image: url({{ asset('business_muqeem/assets/images/35.png') }});"></span>
                                </span>
                            </li>
                            <li>
                                <span class="resident-information__title">No. of Sponsorship Transfers</span>
                                <span class="resident-information__text-middle">{{$data->sponsor_transfer}}</span>
                                <span class="resident-information__text-arabic" style="width: 101.88px; background-image: url({{ asset('business_muqeem/assets/images/36.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                </div><!-- /.resident-information__column -->
                <div class="resident-information__column resident-information__column--full resident-information__column--full-1">
                    <div class="resident-information__item resident-information__item--family">
                        <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/family.png') }});"></div>
                        
                        <ul class="resident-information__list">
                            <li>
                                <span class="resident-information__title">Number of Family Members</span>
                                <span class="resident-information__text-middle -ml-91">0</span>
                                <span class="resident-information__text-arabic" style="width: 78.73px; background-image: url({{ asset('business_muqeem/assets/images/37.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Family Members Inside</span>
                                <span class="resident-information__text-middle -ml-1">0</span>
                                <span class="resident-information__text-arabic" style="width: 145.48px; background-image: url({{ asset('business_muqeem/assets/images/38.png') }});"></span>
                            </li>
                            <li>
                                <span class="resident-information__title">Family Members Outside</span>
                                <span class="resident-information__text-middle -ml-12">0</span>
                                <span class="resident-information__text-arabic" style="width: 143.02px; background-image: url({{ asset('business_muqeem/assets/images/39.png') }});"></span>
                            </li>
                        </ul><!-- /.resident-information__list -->
                    </div><!-- /.resident-information__item -->
                </div><!-- /.resident-information__column -->
            </div><!-- /.resident-information__row -->
            <div class="resident-information__description-box">
                <div class="resident-information__description-box__bg" style="background-image: url({{ asset('business_muqeem/assets/images/bg-shape.png') }});"></div>
               
                 <div class="resident-information__description" style="width: 615px; background-image: url({{ asset('business_muqeem/assets/images/40.png') }});"><p class="resident-information_description_text">{{$data->muqeemCreateDate}}</p></div>                                
            </div><!-- /.resident-information__description-box -->
        </section><!-- /.resident-information -->

        <!-- ********************* page number 02 ********************* -->
        <div class="page-wrapper__inner">
            <section class="page-header page-header--2">
                <div class="page-header__image page-header__image--2">
                    <img src="{{ asset('business_muqeem/assets/images/saruar-hosen.png')}}" alt="saruar hosen">
                </div><!-- /.page-header__image -->
                <div class="page-header__logo logo-retina">
                    <a href="index.html">
                        <img src="{{ asset('business_muqeem/assets/images/logo.png')}}" alt="logo">
                    </a>
                </div><!-- /.page-header__logo -->
                <div class="page-header__reference">
                    
                    <p class="page-header__reference__title" style="background-image: url({{ asset('business_muqeem/assets/images/top-title.png') }});"></p>
                    <p class="page-header__reference__number">807545368921</p>
                </div><!-- /.page-header__reference -->
            </section><!-- /.page-header -->
            <section class="resident-information resident-information--2">
                <h2 class="section-title">طلب تقرير مقيم</h2>
                <div class="resident-information__inner">
                    <div class="resident-information__row">
                        <div class="resident-information__column resident-information__column--full">
                            <div class="resident-information__item resident-information__item--family">
                                
                                <div class="resident-information__category" style="background-image: url({{ asset('business_muqeem/assets/images/family.png') }});"></div>
                                <ul class="resident-information__list">
                                    <li>
                                        <span class="resident-information__title">Number of Family Members</span>
                                        <span class="resident-information__text-middle -ml-91">0</span>
                                        <span class="resident-information__text-arabic" style="width: 78.73px; background-image: url({{ asset('business_muqeem/assets/images/37.png') }});"></span>
                                    </li>
                                    <li>
                                        <span class="resident-information__title">Family Members Inside</span>
                                        <span class="resident-information__text-middle -ml-1">0</span>
                                        <span class="resident-information__text-arabic" style="width: 145.48px; background-image: url({{ asset('business_muqeem/assets/images/38.png') }});"></span>
                                    </li>
                                    <li>
                                        <span class="resident-information__title">Family Members Outside</span>
                                        <span class="resident-information__text-middle -ml-12">0</span>
                                        <span class="resident-information__text-arabic" style="width: 143.02px; background-image: url({{ asset('business_muqeem/assets/images/39.png') }});"></span>
                                    </li>
                                </ul><!-- /.resident-information__list -->
                            </div><!-- /.resident-information__item -->
                        </div><!-- /.resident-information__column -->
                    </div><!-- /.resident-information__row -->
                    <div class="resident-information__description-box resident-information__description-box--2">

                        <div class="resident-information__description-box__bg" style="background-image: url({{ asset('business_muqeem/assets/images/bg-shape.png') }});"></div>
                        <div class="resident-information__description" style="width: 615px; background-image: url({{ asset('business_muqeem/assets/images/40.png') }});"><p class="resident-information_description_text">{{$data->muqeemCreateDate}}</p></div>                      
                    </div><!-- /.resident-information__description-box -->
                </div><!-- /.resident-information__inner -->
            </section><!-- /.resident-information -->
        </div><!-- /.page-wrapper__inner -->
    </div><!-- /.page-wrapper -->

    <div class="button-box">
        <button type="button" class="button-box__btn">Download PDF</button>
    </div><!-- /.btn-box -->

    <script>
        document.querySelector(".button-box__btn").addEventListener("click", function () {
            window.print();
        });
    </script>
</body>

</html>