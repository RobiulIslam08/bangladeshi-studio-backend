<!DOCTYPE html>
<html lang="ar">

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
    <link rel="stylesheet" href="muqeem-assets/css/style-rtl.css">
</head>

<body>
    <div class="page-wrapper">
        <section class="page-header">
            <div class="page-header__logo logo-retina">
                <a href="index.html">
                    <img src="muqeem-assets/images/logo.png" alt="logo">
                </a>
            </div><!-- /.page-header__logo -->
            <h1 class="page-header__title">بيانات مقيم</h1><!-- /.page-header__title -->
            <ul class="page-header__info">
                <li>
                    <span class="page-header__info__title">تاريخ التقرير</span>
                    <span class="page-header__info__text">{{ $record->reportDate }}</span>
                </li>
                <li>
                    <span class="page-header__info__title">رقم المشغل</span>
                    <span class="page-header__info__text">{{ $record->operatorId }}</span>
                </li>
                <li>
                    <span class="page-header__info__title">الموقع</span>
                    <span class="page-header__info__text font-weight-800">{{ $record->location }}</span>
                </li>
            </ul><!-- /.page-header__info -->
        </section><!-- /.page-header -->

        <section class="person-information">
            <!-- *********** Person Information - Head of Household *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">بيانات الشخص - رب أسرة</h2>
                <div class="person-information__row">
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">رقم الإقامة</span>
                                <span class="person-information__text">{{ $record->iqamaNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">الاسم</span>
                                <span class="person-information__text white-space-nowrap">{{ $record->name }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">الاسم المترجم</span>
                                <span class="person-information__text white-space-nowrap">{{ $record->translatedName }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">تاريخ الميلاد</span>
                                <span class="person-information__text">{{ $record->birthDate }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">الديانة</span>
                                <span class="person-information__text">{{ $record->religion }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">الحالة</span>
                                <span class="person-information__text">{{ $record->status }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li class="mb-80">
                                <span class="person-information__title">رقم النسخة</span>
                                <span class="person-information__text">{{ $record->versionNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">دولة الميلاد</span>
                                <span class="person-information__text">{{ $record->birthCountry }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">المهنة</span>
                                <span class="person-information__text white-space-nowrap">{{ $record->occupation }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">تاريخ الدخول</span>
                                <span class="person-information__text">{{ $record->entryDate }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li class="mb-80">
                                <span class="person-information__title">الجنس</span>
                                <span class="person-information__text">{{ $record->gender }}</span>
                            </li>
                            <li class="mb-48">
                                <span class="person-information__title">الحالة الاجتماعية</span>
                                <span class="person-information__text">{{ $record->maritalStatus }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">مكان الدخول</span>
                                <span class="person-information__text">{{ $record->entryLocation }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Person Information - Head of Household *********** -->

            <!-- *********** Passport Information *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">بيانات الجواز</h2>
                <div class="person-information__row">
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">الرقم</span>
                                <span class="person-information__text">{{ $record->passportNumber }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">تاريخ الاصدار</span>
                                <span class="person-information__text">{{ $record->passportExpiryDate }}</span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">الجنسية</span>
                                <span class="person-information__text white-space-nowrap">{{ $record->nationality }}</span>
                            </li>
                            <li>
                                <span class="person-information__title">تاريخ الانتهاء</span>
                                <span class="person-information__text"> {{ $record->passportIssueDate }} </span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li class="mt-33">
                                <span class="person-information__title">مكان الإصدار</span>
                                <span class="person-information__text"> {{ $record->passportIssueLocation }} </span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Passport Information *********** -->

            <!-- *********** Iqama Information *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">بيانات الاقامة</h2>
                <div class="person-information__row">
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">تاريخ الإصدار</span>
                                <span class="person-information__text"> {{ $record->iqamaIssueDate }} </span>
                            </li>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">تاريخ الانتهاء</span>
                               <span class="person-information__text"> {{ $record->iqamaExpiryDate }} </span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                    <div class="person-information__column">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">مكان الإصدار</span>
                                <span class="person-information__text"> {{ $record->iqamaIssueLocation }} </span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Iqama Information *********** -->

            <!-- *********** Employer Information *********** -->
            <div class="person-information__item">
                <h2 class="person-information__top-title">بيانات صاحب العمل</h2>
                <div class="person-information__row">
                    <div class="person-information__column person-information__column--full">
                        <ul class="person-information__list">
                            <li>
                                <span class="person-information__title">الرقم</span>
                                <span class="person-information__text"> {{ $record->employerNumber }} </span>
                            </li>
                            <li>
                                <span class="person-information__title">الاسم</span>
                                <span class="person-information__text"> {{ $record->employerName }} </span>
                            </li>
                        </ul><!-- /.person-information__list -->
                    </div><!-- /.person-information__column -->
                </div><!-- /.person-information__row -->
            </div><!-- /.person-information__item -->
            <!-- *********** Employer Information *********** -->
        </section><!-- /.person-information -->
    </div><!-- /.page-wrapper -->

    <div class="button-box">
        <button type="button" class="button-box__btn">تحميل PDF</button>
    </div><!-- /.btn-box -->

    <script>
        document.querySelector(".button-box__btn").addEventListener("click", function() {
            window.print();
        });
    </script>
</body>

</html>