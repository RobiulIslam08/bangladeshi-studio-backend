<!-- header -->
@include('muqeem/header')

<!-- main-content.blade.php -->
<section class="px-4 md:px-16 py-10 bg-gray-100 min-h-screen">
  <div class="flex flex-col lg:flex-row gap-8 bg-white rounded-xl shadow p-5">

    <!-- Left Sidebar Menu -->
    @include('muqeem/sideber')

    <!-- Limit Package Section -->
    <section class="px-4 py-8 w-full">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-center text-secondary mb-10">Please Choose a Package to Increase Your Limit</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

          <!-- Single Package -->
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Single</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR5</p>
            <p class="text-sm text-gray-600 mb-4">+1 Additional Limits</p>
            <button onclick="showPayment(5, 'paypal-btn-1', 1, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-1" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Starter</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR20</p>
            <p class="text-sm text-gray-600 mb-4">+5 Additional Limits</p>
            <button onclick="showPayment(20, 'paypal-btn-2', 5, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-2" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Essential</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR42</p>
            <p class="text-sm text-gray-600 mb-4">+11 Additional Limits</p>
            <button onclick="showPayment(42, 'paypal-btn-3', 11, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-3" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Growth</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR80</p>
            <p class="text-sm text-gray-600 mb-4">+22 Additional Limits</p>
            <button onclick="showPayment(80, 'paypal-btn-4', 22, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-4" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Advanced</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR99</p>
            <p class="text-sm text-gray-600 mb-4">+29 Additional Limits</p>
            <button onclick="showPayment(99, 'paypal-btn-5', 29, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-5" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Business Pro</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR199</p>
            <p class="text-sm text-gray-600 mb-4">+60 Additional Limits</p>
            <button onclick="showPayment(199, 'paypal-btn-6', 60, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-6" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Elite Business</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR299</p>
            <p class="text-sm text-gray-600 mb-4">+105 Additional Limits</p>
            <button onclick="showPayment(299, 'paypal-btn-7', 105, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-7" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Sales Agent</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR499</p>
            <p class="text-sm text-gray-600 mb-4">+200 Additional Limits</p>
            <button onclick="showPayment(499, 'paypal-btn-8', 200, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-8" class="mt-2"></div>
          </div>
          <div class="bg-white rounded-lg shadow p-6 text-center border border-gray-200 hover:shadow-lg transition-all">
            <h3 class="text-xl font-semibold text-primary mb-2">Executive Elite</h3>
            <p class="text-3xl font-bold text-secondary mb-2">SAR999</p>
            <p class="text-sm text-gray-600 mb-4">+450 Additional Limits</p>
            <button onclick="showPayment(999, 'paypal-btn-9', 450, admin_id)" class="w-full bg-primary hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Buy Now</button>
            <div id="paypal-btn-9" class="mt-2"></div>
          </div>

        </div>
      </div>
    </section>

  </div>
</section>

<!-- footer -->
@include('muqeem/footer')

<!-- Paypal Script -->
<script src="https://www.paypal.com/sdk/js?client-id=AXcO9HENDR7h-46f37-ISTAHHU9O1pcOmPNd_d-WgAKrxBEU5Zpm7wiN3rTPBEJkK_5_gjjKoRv8IPkB&components=buttons,hosted-fields,funding-eligibility&currency=USD"></script>

<!-- Custom Payment Script -->
<script>
    const admin_id = {{ Auth::user()->id }}; // Get logged-in user ID

    function showPayment(amountsar, elementId, Limit, admin_id) {
        // convert sar to usd
        var amount = (amountsar / 3.90).toFixed(2);
      // Clear previous button
      document.getElementById(elementId).innerHTML = '';

      paypal.Buttons({
        style: {
          layout: 'vertical',
          color: 'blue',
          shape: 'rect',
          label: 'paypal'
        },
        enableStandardCardFields: true,

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: amount.toString()
              }
            }]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            successFunction(Limit, admin_id);
          });
        }
      }).render('#' + elementId);
    }

    function successFunction(limit, admin_id) {
      fetch('/update-limit-muqeem', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          limit: limit,
          admin_id: admin_id
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('✅ Your limit has been updated successfully!');
          location.reload();
        } else {
          alert('❌ Failed to update limit. Please try again.');
        }
      });
    }
</script>
 