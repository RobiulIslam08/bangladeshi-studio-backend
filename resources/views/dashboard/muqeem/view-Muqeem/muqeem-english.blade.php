
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Person Information</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="muqeem-assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="muqeem-assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="muqeem-assets/images/favicons/favicon-16x16.png" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <!-- css style -->
    <link rel="stylesheet" href="muqeem-assets/css/style.css">
</head>

<body>
    
    <div class="page-wrapper">
        <section class="page-header">
            <div class="page-header__logo logo-retina">
                <a href="index.html">
                    <img src="muqeem-assets/images/logo.png" alt="logo">
                </a>
            </div><!-- /.page-header__logo -->
            <h1 class="page-header__title">Resident's Information</h1><!-- /.page-header__title -->
            <ul class="page-header__info">
                <li>
                    <span class="page-header__info__title">Report Date</span>
                    <span class="page-header__info__text">{{ $record->reportDate }}</span>
                </li>
                <li>
                    <span class="page-header__info__title">Operator ID</span>
                    <span class="page-header__info__text">{{ $record->operatorId }}</span>
                </li>
                <li>
                    <span class="page-header__info__title">Location</span>
                    <span class="page-header__info__text font-weight-800">{{ $record->location }}</span>
                </li>
            </ul><!-- /.page-header__info -->
        </section><!-- /.page-header -->

        <section class="person-information">
            <!-- *********** Person Information - Head of Household *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">Person Information - Head of Household</h2>
                <div class="person-information__row">
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Iqama Number</span>
                                <span class="person-information__text">{{ $record->iqamaNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Name</span>
                                @php
    $name = $record->name;
    $words = explode(' ', $name);
@endphp

<span class="person-information__text white-space-nowrap">
    @if (strlen($name) > 14 || count($words) > 2)
        {{ implode(' ', array_slice($words, 0, 2)) }}<br>{{ implode(' ', array_slice($words, 2)) }}
    @else
        {{ $name }}
    @endif
</span>

                            </li>
                            <li>
                                <span class="person-information__title">Translated Name</span>
                                <span class="person-information__text secondary-font white-space-nowrap">{{ $record->translatedName }}   </span>
                            </li>
                            <li>
                                <span class="person-information__title">Birth Date</span>
                                <span class="person-information__text">{{ $record->birthDate }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Religion</span>
                                <span class="person-information__text">{{ $record->religion }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Status</span>
                                <span class="person-information__text">{{ $record->status }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li class="mb-80">
                                <span class="person-information__title">Version Number</span>
                                <span class="person-information__text">{{ $record->versionNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Birth Country</span>
                                <span class="person-information__text">{{ $record->birthCountry }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Occupation</span>
                                <span class="person-information__text white-space-nowrap">{{ $record->occupation }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Entry Date</span>
                                <span class="person-information__text">{{ $record->entryDate }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li class="mb-80">
                                <span class="person-information__title">Gender</span>
                                <span class="person-information__text">{{ $record->gender }}</span>
                            </li>
                            <li class="mb-48">
                                <span class="person-information__title">Martial Status</span>
                                <span class="person-information__text">{{ $record->maritalStatus }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Entry Location</span>
                                <span class="person-information__text">{{ $record->entryLocation }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Person Information - Head of Household *********** -->

            <!-- *********** Passport Information *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">Passport Information</h2>
                <div class="person-information__row">
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Number</span>
                                <span class="person-information__text">{{ $record->passportNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Issue Date</span>
                                <span class="person-information__text">{{ $record->passportIssueDate }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Nationality</span>
                                <span class="person-information__text white-space-nowrap">{{ $record->nationality }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Expiry Date</span>
                                <span class="person-information__text">{{ $record->passportExpiryDate }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li class="mt-33">
                                <span class="person-information__title">Issue Location</span>
                                <span class="person-information__text">{{ $record->passportIssueLocation }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Passport Information *********** -->

            <!-- *********** Iqama Information *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">Iqama Information</h2>
                <div class="person-information__row">
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Issue Date</span>
                                <span class="person-information__text">{{ $record->iqamaIssueDate }}</span>
                            </li>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Expiry Date</span>
                                <span class="person-information__text">{{ $record->iqamaExpiryDate }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Issue Location</span>
                                <span class="person-information__text">{{ $record->iqamaIssueLocation }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
             <!-- *********** Iqama Information *********** -->

            <!-- *********** Employer Information *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">Employer Information</h2><!-- /.person-information__top-title -->
                <div class="person-information__row">
                    <div class="person-information__column person-information__column--full">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">Number</span>
                                <span class="person-information__text">{{ $record->employerNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">Name</span>
                                <span class="person-information__text secondary-font">{{ $record->employerName }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Employer Information *********** -->
        </section><!-- /.person-information -->
    </div><!-- /.page-wrapper -->
    <div class="button-box">
        <button type="button" class="button-box__btn">Download PDF</button>
    </div><!-- /.btn-box -->

    <script>
        document.querySelector(".button-box__btn").addEventListener("click", function() {
            window.print();
        });
    </script>
</body>

</html>