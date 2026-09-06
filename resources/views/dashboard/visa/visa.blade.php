<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
      @media print {
        body * {
          visibility: hidden;
        }
        #visa-document,
        #visa-document * {
          visibility: visible;
        }
        #visa-document {
          position: absolute;
          left: 0;
          top: 0;
        }
        .no-print {
          display: none !important;
        }
      }
    </style>
  </head>
  <body>
    <div
      class="min-h-screen bg-gray-100 pt-8 flex flex-col items-center justify-center gap-6"
    >
      <!-- Download Button -->
      <button
        onclick="downloadPDF()"
        class="no-print bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-lg transition-all duration-200 flex items-center gap-2"
      >
        <svg
          class="w-5 h-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
          />
        </svg>
        Download PDF
      </button>

      <!-- Visa Document -->
      <div
        id="visa-document"
        class="w-[210mm] bg-white shadow-lg"
        style="aspect-ratio: 210/297"
      >
        <!-- header text -->
        <div class="flex justify-between text-sm pl-10 pr-20 pt-5">
          <p>{{ $visa->header_datetime }}</p>
          <p>Visa platform</p>
        </div>

        <!-- Header Section -->
        <div class="px-20 pt-8 pb-6 flex justify-between items-center">
          <div>
            
            <img src="{{ asset('frontsite/visa/header-logo.png') }}" alt="" />
          </div>
          <div class="mr-4">
           
            <img src="{{ asset('frontsite/visa/header-text.png') }}" alt="" />
          </div>
        </div>

        <!-- Main Content -->
        <div
          class="px-20"
          style="
            
            background-image: url('{{ asset('frontsite/visa/visa-watermark.jpeg') }}');
            background-repeat: no-repeat;
            background-position: center -80px;
            background-size: contain;
           
          "
        >
          <div class="flex gap-8 items-center">
            <!-- Photo Section -->
            <div class="">
              <div class="text-gray-500 text-sm">
               
                <img style="width:156px; height:154px;" src="{{ asset('storage/'.$visa->profile_photo) }}" alt="" />
                
              </div>
            </div>

            <!-- Visa Information -->
            <div class="flex-grow">
              <!-- Row 1 -->
              <div class="flex border-b border-gray-800 pb-2 pt-1">
                <div
                  class="w-1/4 px-1 text-right text-gray-700 font-semibold text-xs"
                >
                  رقم التأشيرة
                </div>
                <div
                  class="flex-1 px-1 text-center font-bold text-gray-900 text-xs"
                >
                  {{ $visa->visa_no }}
                </div>
                <div
                  class="w-1/4 px-1 text-left text-gray-700 font-semibold text-xs"
                >
                  Visa No.
                </div>
              </div>

              <!-- Row 2 -->
              <div class="flex border-b border-gray-800 pb-2 pt-1">
                <div
                  class="w-1/4 px-1 text-right text-gray-700 font-semibold text-xs"
                >
                  صالحة اعتبارًا من
                </div>
                <div
                  class="flex-1 px-1 text-center font-bold text-gray-900 text-xs"
                >
                  {{ $visa->valid_from }}
                </div>
                <div
                  class="w-1/4 px-1 text-left text-gray-700 font-semibold text-xs"
                >
                  Valid From
                </div>
              </div>

              <!-- Row 3 -->
              <div class="flex border-b border-gray-800 pb-2 pt-1">
                <div
                  class="w-1/4 px-1 text-right text-gray-700 font-semibold text-xs"
                >
                  صالحة لغاية
                </div>
                <div
                  class="flex-1 px-1 text-center font-bold text-gray-900 text-xs"
                >
                  {{ $visa->valid_until }}
                </div>
                <div
                  class="w-1/4 px-1 text-left text-gray-700 font-semibold text-xs"
                >
                  Valid Until
                </div>
              </div>

              <!-- Row 4 -->
              <div class="flex border-b border-gray-800 pb-2 pt-1">
                <div
                  class="w-1/4 px-1 text-right text-gray-700 font-semibold text-xs"
                >
                  اإلقامة مدة
                </div>
                <div
                  class="flex-1 px-1 text-center font-bold text-gray-900 text-xs"
                >
                  90 Days
                </div>
                <div
                  class="w-1/4 px-1 text-left text-gray-700 font-semibold text-xs"
                >
                  Duration of Stay
                </div>
              </div>

              <!-- Decorative checkmarks line -->
              <div
                class="flex justify-center gap-1 pt-3 text-purple-400 text-sm"
              >
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
                
                <img src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" />
                
                
                <img src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
              </div>
            </div>
          </div>

          <!-- Second Section -->
          <div class="text-sm">
            <!-- Place of Issue -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                مكان الإصدار
              </div>
              <div class="flex-1 text-center font-bold text-gray-900 text-xs">
                الملحقية السعودية بن ظهرا - Saudi Mission In Dhaka
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Place of issue
              </div>
            </div>

            <!-- Row 1 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                نوع التأشيرة
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                عمل - Work
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Visa Type
              </div>
            </div>

            <!-- Row 2 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                االسم
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                {{ $visa->f_name }} {{ $visa->l_name }} 
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Name
              </div>
            </div>

            <!-- Row 3 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                الجنسية
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                بنجالديش - Bangladesh
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Nationality
              </div>
            </div>

            <!-- Row 4 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                تاريخ الميالد
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                {{ $visa->birth_date }} 
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Birth Date
              </div>
            </div>

            <!-- Row 5 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                رقم الجواز
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                 {{ $visa->passport_no }} 
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Passport No.
              </div>
            </div>

            <!-- Row 6 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                رقم المستند
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                {{ $visa->ref_no }} 
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Ref. No.
              </div>
            </div>

            <!-- Row 7 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                التاريخ
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                {{ $visa->valid_from }}
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Ref. Date
              </div>
            </div>

            <!-- Row 8 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                المهنة
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
              {{ $visa->occupation }}
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Occupation
              </div>
            </div>

            <!-- Row 9 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                اسم صاحب العمل
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
             {{ $visa->employer_name }}
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Employer name
              </div>
            </div>

            <!-- Row 10 -->
            <div class="flex border-b border-gray-800 py-1">
              <div
                class="w-1/4 pr-10 text-right text-gray-700 font-semibold text-xs"
              >
                الرسوم
              </div>
              <div
                class="flex-1 px-3 text-center font-bold text-gray-900 text-xs"
              >
                بدون رسوم - Free
              </div>
              <div
                class="w-1/4 pl-12 text-left text-gray-700 font-semibold text-xs"
              >
                Visa Fees
              </div>
            </div>
          </div>

          <!-- Barcode Section -->
          <div
            class="flex justify-between items-center mt-4 py-4 border-gray-800"
          >
            <div class="text-right text-gray-700 font-semibold text-xs">
              رقم الطلب
            </div>
            <div class="">
              <div class="">
                <img src="{{ asset('frontsite/visa/code.png') }}" alt="" />
                <img src="./images/code.png" alt="" />
              </div>
              <div class="text-xs text-center mt-1">{{ $visa->ref_no }}</div>
            </div>
            <div class="text-left text-gray-700 font-semibold text-xs">
              Application No.
            </div>
          </div>

          <!-- Footer Decorative Line -->
          <div class="flex justify-center gap-2 text-purple-400 text-lg">
            <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" /> <img
        
            src="{{ asset('frontsite/visa/white.png') }}" class="h-5 alt="" /> <img <img
          
            
            src="{{ asset('frontsite/visa/blue.png') }}" class="h-5 alt="" />
          </div>
          <!-- footer -->
          <div class="mt-56">
            <!-- Top section with icon, text and QR -->
            <div class="flex justify-between items-start">
              <!-- Left - Fingerprint icon -->
              <div class="flex-shrink-0">
              
                <img src="{{ asset('frontsite/visa/fingerprint.png') }}" alt="" class="w-13 h-13" />
              </div>

              <!-- Middle - Text and QR Code -->
              <div class="flex items-center justify-center gap-4">
                <!-- Text on left of QR -->
                <div class="flex flex-col justify-center text-left">
                  <div class="text-xs text-gray-700 font-semibold">
                    For Visa Inquiry
                  </div>
                  <div class="text-xs text-gray-600">Please scan QR code</div>
                </div>
                <!-- QR Code -->
                <div>
                  <img src="{{ asset('frontsite/visa/qr-code.png') }}" alt="" class="w-20 h-20" />
                 
                </div>
                <!-- Arabic text on right of QR -->
                <div class="flex flex-col justify-center text-right">
                  <div class="text-xs text-gray-700 font-semibold">
                    الاستعلام عن التأشيرة
                  </div>
                  <div class="text-xs text-gray-600">
                    يرجى مسح رمز الاستجابة السريعة
                  </div>
                </div>
              </div>

              <!-- Right - Empty space for balance -->
              <div class="w-12"></div>
            </div>

            <!-- Bottom - MRZ Code -->
            <div class="mt-4 text-center">
              <div
                class="text-base font-mono leading-tight text-gray-900 tracking-tight"
              >
                <div>
                  {{ $visa->visafooterTitle }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="p-4 px-4 text-xs">
          https://visa.mofa.gov.sa/SmartForm/PrintApplication
        </p>
      </div>
    </div>

    <script>
      function downloadPDF() {
        const element = document.getElementById("visa-document");

        // কনফিগারেশন
        const opt = {
          margin: 0,
          filename: "KSA-Visa-Document.pdf",
          image: { type: "jpeg", quality: 0.98 },
          html2canvas: {
            scale: 2,
            useCORS: true, // ছবি লোড করার জন্য এটি জরুরি
            logging: true, // ডিবাগ করার জন্য
            scrollY: 0, // পেজের উপর থেকে শুরু করার জন্য
          },
          jsPDF: {
            unit: "mm",
            format: "a4",
            orientation: "portrait",
          },
        };

        // ডাউনলোড শুরু করার আগে ব্যবহারকারীকে জানানো (অপশনাল)
        console.log("PDF Generation started...");

        // সঠিক ফাংশন চেইন: set -> from -> save
        html2pdf()
          .set(opt)
          .from(element)
          .save()
          .then(() => {
            console.log("PDF Downloaded!");
          })
          .catch((err) => {
            console.error("Error generating PDF:", err);
            alert("PDF ডাউনলোড হচ্ছে না। কারণ: " + err.message);
          });
      }
    </script>
  </body>
</html>
