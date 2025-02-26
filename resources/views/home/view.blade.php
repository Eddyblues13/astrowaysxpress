<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Tracking - {{ $package->tracking_number }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        /* Custom Styles */
        .header {
            background-color: #2a2a80;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .tracking-status {
            text-align: center;
            padding: 15px;
            background: #eef0f8;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            color: #2a2a80;
        }

        .progress-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 30px 0;
            position: relative;
        }

        .progress-step {
            width: 40px;
            height: 40px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
            color: #6c757d;
            position: relative;
            transition: all 0.5s ease;
        }

        .progress-step.active-step {
            background: #2a2a80;
            color: #fff;
            transform: scale(1.1);
        }

        .progress-label {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
            color: #6c757d;
        }

        .progress-label.active-label {
            color: #2a2a80;
            font-weight: bold;
        }

        .progress {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            margin: 20px 0;
        }

        .progress-bar {
            background-color: #2a2a80;
            transition: width 2s ease-in-out;
        }

        /* Current Location Styling */
        .current-location {
            text-align: center;
            padding: 15px;
            background: #eef0f8;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            color: #2a2a80;
            margin-top: 20px;
        }

        /* Receipt Styling */
        .receipt {
            margin-top: 30px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Courier New', Courier, monospace;
        }

        .receipt h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2a2a80;
            text-align: center;
        }

        .receipt .receipt-info {
            margin-bottom: 20px;
        }

        .receipt .receipt-info p {
            margin: 5px 0;
            font-size: 14px;
        }

        .receipt .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .receipt .barcode svg {
            width: 100%;
            height: auto;
        }

        .btn-download {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            background: #2a2a80;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-download:hover {
            background: #1a1a60;
        }
    </style>
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
    _smartsupp.key = '6eb717078641427db6a3894d53e34ecd51951c0c';
    window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>
    <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</head>

<body>

    <div class="header">Package Tracking</div>

    <div class="container">
        <div class="tracking-status">
            Tracking Number: <strong>{{ $package->tracking_number }}</strong>
            <br>
            Status: <span style="color: {{ $package->parcel_status == 'Delivered' ? 'green' : '#2a2a80' }};">{{
                ucfirst($package->parcel_status) }}</span>
        </div>

        <!-- Current Location Section -->
        <div class="current-location">
            Current Location: <strong>{{ $package->current_location }}</strong>
        </div>

        <!-- Progress Tracking Section -->
        <div class="progress-container">
            <div class="progress-step {{ $package->parcel_status != 'Ordered' ? 'active-step' : '' }}">1</div>
            <div
                class="progress-step {{ $package->parcel_status != 'Ordered' && $package->parcel_status != 'In transit' ? 'active-step' : '' }}">
                2</div>
            <div
                class="progress-step {{ $package->parcel_status == 'Out for Delivery' || $package->parcel_status == 'Delivered' ? 'active-step' : '' }}">
                3</div>
            <div class="progress-step {{ $package->parcel_status == 'Delivered' ? 'active-step' : '' }}">4</div>
        </div>

        <!-- Bootstrap Progress Bar -->
        <div class="progress">
            <div class="progress-bar" role="progressbar"
                style="width: {{ $package->parcel_status == 'Delivered' ? '100%' : ($package->parcel_status == 'Out for Delivery' ? '75%' : ($package->parcel_status == 'In transit' ? '50%' : '25%')) }};"
                aria-valuenow="{{ $package->parcel_status == 'Delivered' ? '100' : ($package->parcel_status == 'Out for Delivery' ? '75' : ($package->parcel_status == 'In transit' ? '50' : '25')) }}"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="progress-container">
            <div class="progress-label {{ $package->parcel_status != 'Ordered' ? 'active-label' : '' }}">Ordered</div>
            <div
                class="progress-label {{ $package->parcel_status != 'Ordered' && $package->parcel_status != 'In transit' ? 'active-label' : '' }}">
                In Transit</div>
            <div
                class="progress-label {{ $package->parcel_status == 'Out for Delivery' || $package->parcel_status == 'Delivered' ? 'active-label' : '' }}">
                Out for Delivery</div>
            <div class="progress-label {{ $package->parcel_status == 'Delivered' ? 'active-label' : '' }}">Delivered
            </div>
        </div>

        <!-- Sender and Receiver Details in Bootstrap Cards -->
        <div class="row mt-4">
            <!-- Sender Details Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Sender Details</strong>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $package->sender_name }}</p>
                        <p><strong>Phone:</strong> {{ $package->sender_phone }}</p>
                        <p><strong>Email:</strong> {{ $package->sender_email }}</p>
                        <p><strong>Address:</strong> {{ $package->sender_address }}</p>
                    </div>
                </div>
            </div>

            <!-- Receiver Details Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <strong>Receiver Details</strong>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $package->receiver_name }}</p>
                        <p><strong>Phone:</strong> {{ $package->receiver_phone }}</p>
                        <p><strong>Email:</strong> {{ $package->receiver_email }}</p>
                        <p><strong>Address:</strong> {{ $package->receiver_address }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Receipt Section -->
        <div class="receipt" id="receipt">
            <h3>Receipt</h3>
            <div class="receipt-info">
                <p><strong>Tracking Number:</strong> {{ $package->tracking_number }}</p>
                <p><strong>Sender:</strong> {{ $package->sender_name }}</p>
                <p><strong>Receiver:</strong> {{ $package->receiver_name }}</p>
                <p><strong>Dispatch Date:</strong> {{ \Carbon\Carbon::parse($package->dispatch_date)->format('F j, Y')
                    }}</p>
                <p><strong>Expected Delivery:</strong> {{ \Carbon\Carbon::parse($package->delivery_date)->format('F j,
                    Y') }}</p>
            </div>
            <div class="barcode">
                <svg id="barcode"></svg>
            </div>
        </div>

        <!-- Download Receipt Button -->
        <button class="btn-download" onclick="downloadReceipt()">Download Receipt</button>

        <a href="/" class="btn btn-primary btn-lg w-100 mt-4">Track Another Package</a>
    </div>

    <script>
        // Generate barcode
        JsBarcode("#barcode", "{{ $package->tracking_number }}", {
            format: "CODE128",
            lineColor: "#2a2a80",
            width: 2,
            height: 40,
            displayValue: true
        });

        // Download Receipt as PDF
        function downloadReceipt() {
            const receipt = document.getElementById("receipt");

            html2canvas(receipt).then((canvas) => {
                const imgData = canvas.toDataURL("image/png");
                const pdf = new jspdf.jsPDF();
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, "PNG", 0, 0, pdfWidth, pdfHeight);
                pdf.save("receipt.pdf");
            });
        }

        // Animate progress bar
        const progressBar = document.querySelector('.progress-bar');
        progressBar.style.transition = 'width 2s ease-in-out';
        progressBar.style.width = progressBar.getAttribute('aria-valuenow') + '%';
    </script>
</body>

</html>