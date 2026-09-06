<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 PDF with Images</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #ffffff;
        }
        .a4-container {
            width: 793px; /* A4 width */
            height: 1122px; /* A4 height */
            position: relative;
            background: url("{{ asset('muqeemStorage/format3.JPG') }}") no-repeat center center; 
            background-size: contain;
            border: 2px solid #000;
            background-color: #ffffff;
        }
        .image1 {
            position: absolute;
            top: 28px;
            left: 48%;
            transform: translateX(-50%);
            width: 120px;
            height:170px;
        }
        .image2 {
            position: absolute;
            left: 30px;
            top: 750px;
            transform: translateY(-50%);
            width: 750px;
        }
        .download-btn {
            margin-top: 150px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .download-back {
            margin-top: 20px;
            padding: 10px 20px;
            background: #ff0015;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .download-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="a4-container" id="a4Div">
        <img src="{{ asset($muqeemInfo->personImg) }}" alt="{{ $muqeemInfo->personImg }}" class="image1" >
        
        
        
        
        
        <img src="{{ asset($muqeemInfo->detailsImg) }}" alt="{{$muqeemInfo->detailsImg}}" class="image2" >
       

    </div>

    <button class="download-btn" onclick="downloadPDF()">Download PDF</button>
    <button class="download-back" onclick="back()">Back</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <script>
        async function downloadPDF() {
            const { jsPDF } = window.jspdf;
            let element = document.querySelector("#a4Div");

            try {
                let canvas = await html2canvas(element, {
                    scale: 2,
                    useCORS: true,
                    backgroundColor: null
                });
                let imgData = canvas.toDataURL("image/png");
                let pdf = new jsPDF("p", "mm", "a4");
                pdf.addImage(imgData, "PNG", 0, 0, 210, 297);
                pdf.save("document.pdf");
            } catch (error) {
                console.error("PDF Generation Error:", error);
            }
        }
        function back() {
                            window.history.back();
                       }

    </script>

</body>
</html>