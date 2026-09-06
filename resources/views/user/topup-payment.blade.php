@include('user.header')

<style>
    /* ===== Payment Box Wrapper ===== */
    .payment-box-wrapper{
        max-width: 620px;
        margin: 30px auto;
        background:#ffffff;
        border:1px solid #dcdcdc;
        border-radius:6px;
        box-shadow:0 0 4px rgba(0,0,0,0.05);
        font-family: Arial, Helvetica, sans-serif;
    }

    /* ===== Tabs ===== */
    .payment-tabs{
        display:flex;
        border-bottom:1px solid #dcdcdc;
    }
    .payment-tab{
        flex:1;
        padding:12px 10px;
        text-align:center;
        font-size:14px;
        font-weight:600;
        cursor:pointer;
        border-right:1px solid #dcdcdc;
        background:#f5f5f5;
        color:#004085;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:8px;
    }
    .payment-tab:last-child{
        border-right:none;
    }
    .payment-tab.active{
        background:#1455d1;
        color:#fff;
    }

    /* ===== Form ===== */
    .payment-body{
        padding:18px 20px 22px;
    }
    .pay-row{
        display:flex;
        gap:12px;
        margin-bottom:12px;
        flex-wrap:wrap;
    }
    .pay-col{
        flex:1;
        min-width:0;
    }

    .pay-input-wrap{
        position:relative;
        width:100%;
    }
    .pay-input-wrap i{
        position:absolute;
        left:10px;
        top:50%;
        transform:translateY(-50%);
        font-size:14px;
        color:#999;
    }
    .pay-input{
        width:100%;
        border:1px solid #d4d4d4;
        border-radius:4px;
        padding:10px 10px 10px 34px;
        font-size:14px;
        outline:none;
    }
    .pay-input:focus{
        border-color:#1455d1;
        box-shadow:0 0 0 2px rgba(20,85,209,0.15);
    }
    .pay-input::placeholder{
        color:#b5b5b5;
    }

    /* card badges */
    .card-badges{
        position:absolute;
        right:8px;
        top:50%;
        transform:translateY(-50%);
        display:flex;
        gap:3px;
    }
    .card-badge{
        padding:2px 6px;
        border-radius:4px;
        font-size:10px;
        color:#fff;
        font-weight:600;
        line-height:1.2;
    }
    .badge-link{ background:#064b28; }
    .badge-visa{ background:#1a47b8; }
    .badge-last{ background:#222; }

    /* ===== Pay Button ===== */
    .pay-btn{
        margin-top:10px;
        width:100%;
        border:none;
        border-radius:4px;
        background:#1455d1;
        color:#fff;
        font-size:15px;
        font-weight:600;
        padding:11px 0;
        cursor:pointer;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:8px;
    }
    .pay-btn:hover{
        background:#0f45aa;
    }

    /* Paypal section small text */
    .paypal-info{
        font-size:14px;
        color:#555;
        line-height:1.4;
    }

    /* hide section helper */
    .hidden-payment{
        display:none;
    }
</style>

<div class="payment-box-wrapper">

    {{-- Tabs --}}
    <div class="payment-tabs">
        <div class="payment-tab active" data-target="cardForm">
            <i class="fa fa-credit-card"></i>
            <span>Credit &amp; Debit</span>
        </div>
        <div class="payment-tab" data-target="paypalForm">
            <div class="flex items-center justify-center">
    <svg width="20" height="20" viewBox="0 0 24 24">
        <path fill="#003087" d="M20.4 5.3C19.9 3 17.7 2 15.2 2H7.3C6.9 2 6.5 2.3 6.4 2.7L4 17.9c-0.1 0.4 0.2 0.8 0.6 0.8h4.5l1-6.3v0.2c0.1-0.4 0.5-0.7 0.9-0.7h2.9c3.2 0 5.7-1.3 6.5-4.3 0.2-0.9 0.2-1.7 0-2.3z"/>
        <path fill="#009CDE" d="M19.2 9.7c-0.8 3-3.3 4.3-6.5 4.3h-2.9c-0.5 0-0.8 0.3-0.9 0.7l-1.3 7.8c-0.1 0.4 0.2 0.8 0.6 0.8H12c0.4 0 0.8-0.3 0.9-0.7l0.6-3.4c0.1-0.4 0.5-0.7 0.9-0.7h1.8c2.4 0 4.3-1 5-3.6 0.5-1.6 0.5-3.1 0.1-4.2z"/>
    </svg>
</div>

            <span>PayPal</span>
        </div>
    </div>

    <div class="payment-body">
        {{-- ================= CARD FORM ================ --}}
        <form id="cardForm">
            
            <div class="pay-row">
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-user"></i>
                        <input type="text" class="pay-input" placeholder="Card Name *">
                    </div>
                </div>
            </div>

            {{-- Email + Phone --}}
            <div class="pay-row">
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-envelope"></i>
                        <input type="email" class="pay-input" placeholder="Email">
                    </div>
                </div>
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-phone"></i>
                        <input type="text" class="pay-input" placeholder="phone">
                    </div>
                </div>
            </div>

            {{-- Card number --}}
            <!-- Card Number -->
<!-- CARD NUMBER + EXP + CVV (All in ONE line) -->
<div class="pay-row" style="display:flex; gap:12px;">

    <!-- Card Number -->
    <div class="pay-col" style="flex:2;">
        <div class="pay-input-wrap">
            <i class="fa fa-credit-card"></i>
            <input type="text" class="pay-input" placeholder="Card Number *">
        </div>
    </div>

    <!-- Expiry -->
    <div class="pay-col" style="flex:1;">
        <div class="pay-input-wrap">
            <i class="fa fa-calendar"></i>
            <input type="text" class="pay-input" placeholder="MM/YY *">
        </div>
    </div>

    <!-- CVV -->
    <div class="pay-col" style="flex:1;">
        <div class="pay-input-wrap">
            <i class="fa fa-lock"></i>
            <input type="text" class="pay-input" placeholder="CVV *">
        </div>
    </div>

</div>



            {{-- Country + City --}}
            <div class="pay-row">
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-globe"></i>
                        <input type="text" class="pay-input" placeholder="Country *">
                    </div>
                </div>
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-calendar"></i>
                        <input type="text" class="pay-input" placeholder="City *">
                    </div>
                </div>
            </div>

            {{-- Address --}}
            <div class="pay-row">
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-map-marker"></i>
                        <input type="text" class="pay-input" placeholder="Address">
                    </div>
                </div>
            </div>

            {{-- State / Province + Zip --}}
            <div class="pay-row">
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-building"></i>
                        <input type="text" class="pay-input" placeholder="State / Province">
                    </div>
                </div>
                <div class="pay-col">
                    <div class="pay-input-wrap">
                        <i class="fa fa-location-arrow"></i>
                        <input type="text" class="pay-input" placeholder="Zip Code">
                    </div>
                </div>
            </div>

            {{-- Pay Now button --}}
            <button type="button" class="pay-btn">
                <i class="fa fa-paper-plane"></i>
                Pay Now
            </button>
        </form>

        {{-- ================= PAYPAL SECTION ================ --}}
        <div id="paypalForm" class="hidden-payment">
            <p class="paypal-info">
                You selected <strong>PayPal</strong>. After clicking the button below, you will be redirected to
                PayPal secure checkout page to complete your payment.
            </p>

            <button type="button" class="pay-btn" style="margin-top:18px;">
                <i class="fa fa-paypal"></i>
                Pay with PayPal
            </button>
        </div>
    </div>
</div>

<script>
    // Simple tab toggle (Card <-> PayPal)
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.payment-tab');
        const cardForm = document.getElementById('cardForm');
        const paypalForm = document.getElementById('paypalForm');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                // active tab design
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const target = this.getAttribute('data-target');

                if (target === 'cardForm') {
                    cardForm.style.display = 'block';
                    paypalForm.style.display = 'none';
                } else {
                    cardForm.style.display = 'none';
                    paypalForm.style.display = 'block';
                }
            });
        });
    });
</script>

@include('user.footer')
