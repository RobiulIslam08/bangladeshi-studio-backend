<button id="remotePDF">Download Medical PDF (remote)</button>

<!-- Hidden iframe: পেজ দেখাবে না, কিন্তু লোড হবে -->
<iframe id="reportFrame"
        src=""
        style="position:absolute; left:-9999px; width:0; height:0; visibility:hidden;"
        aria-hidden="true"></iframe>

<script>
  const btn = document.getElementById('remotePDF');
  const iframe = document.getElementById('reportFrame');

  btn.addEventListener('click', () => {
    // 1) Iframe-এ target report পেজ লোড করুন
    const url = '/checkReport?id=326'; // আপনার রুট/URL
    // যদি আগে থেকেই লোড করা থাকে, আবারও সেট করে রিফ্রেশ করান
    iframe.src = url;

    // 2) লোড শেষ হলে print চালান
    const onLoad = () => {
      try {
        // **Option A: Direct print** (সবচেয়ে নিশ্চিত, কারণ আপনার বাটনও এটিই করে)
        iframe.contentWindow.focus(); // কিছু ব্রাউজারে দরকার হয়
        iframe.contentWindow.print();

        // **Option B: বাটনে প্রোগ্রাম্যাটিক ক্লিক** (আপনার কোডে querySelector('.button-box__btn'))
        // const doc = iframe.contentDocument;
        // doc.querySelector('.button-box__btn')?.click();

      } catch (e) {
        alert('Could not trigger print: ' + e.message);
      } finally {
        iframe.removeEventListener('load', onLoad);
      }
    };

    // readyState complete হলে সরাসরি কল, নইলে load event ধরুন
    if (iframe.contentDocument?.readyState === 'complete') onLoad();
    else iframe.addEventListener('load', onLoad, { once: true });
  });
</script>
