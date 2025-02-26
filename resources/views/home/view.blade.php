<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Tracking - {{ $package->tracking_number }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
        }

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

        .progress-bar {
            flex: 1;
            height: 8px;
            background: #ddd;
            position: relative;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar::before {
            content: "";
            position: absolute;
            height: 8px;

            width: {
                    {
                    $package->parcel_status =='Delivered' ? '100%': ($package->parcel_status =='Out for delivery' ? '75%' : ($package->parcel_status =='In transit' ? '50%' : '25%'))
                }
            }

            ;
            background: #2a2a80;
            border-radius: 4px;
            animation: fillProgress 2s ease-in-out;
        }

        @keyframes fillProgress {
            from {
                width: 0;
            }

            to {
                width: {
                        {
                        $package->parcel_status =='Delivered' ? '100%': ($package->parcel_status =='Out for delivery' ? '75%' : ($package->parcel_status =='In transit' ? '50%' : '25%'))
                    }
                }

                ;
            }
        }

        .progress-step {
            width: 20px;
            height: 20px;
            background: #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            position: relative;
            transition: background 0.5s ease;
        }

        .active-step {
            background: #2a2a80 !important;
        }

        .progress-label {
            text-align: center;
            font-size: 14px;
            margin-top: 5px;
            color: #555;
        }

        .package-info {
            margin-top: 20px;
            padding: 15px;
            background: #f4f4f4;
            border-radius: 8px;
        }

        .package-info p {
            font-size: 16px;
            margin: 8px 0;
        }

        .btn-track {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            background: #ff6b35;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-track:hover {
            background: #e65a2b;
        }

        .receipt {
            margin-top: 30px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .receipt h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2a2a80;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .progress-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .progress-bar {
                width: 100%;
                margin-top: 15px;
            }

            .progress-label {
                text-align: left;
            }
        }
    </style>
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

        <div class="progress-container">
            <div class="progress-step {{ $package->parcel_status != 'Ordered' ? 'active-step' : '' }}">1</div>
            <div class="progress-bar"></div>
            <div
                class="progress-step {{ $package->parcel_status != 'Ordered' && $package->parcel_status != 'In transit' ? 'active-step' : '' }}">
                2</div>
            <div class="progress-bar"></div>
            <div
                class="progress-step {{ $package->parcel_status == 'Out for delivery' || $package->parcel_status == 'Delivered' ? 'active-step' : '' }}">
                3</div>
            <div class="progress-bar"></div>
            <div class="progress-step {{ $package->parcel_status == 'Delivered' ? 'active-step' : '' }}">4</div>
        </div>

        <div class="progress-container">
            <div class="progress-label">Ordered</div>
            <div class="progress-label">In Transit</div>
            <div class="progress-label">Out for Delivery</div>
            <div class="progress-label">Delivered</div>
        </div>

        <div class="package-info">
            <p><strong>Sender:</strong> {{ $package->sender_name }} ({{ $package->sender_phone }})</p>
            <p><strong>Receiver:</strong> {{ $package->receiver_name }} ({{ $package->receiver_phone }})</p>
            <p><strong>Current Location:</strong> {{ $package->current_location }}</p>
            <p><strong>Dispatch Date:</strong> {{ \Carbon\Carbon::parse($package->dispatch_date)->format('F j, Y') }}
            </p>
            <p><strong>Expected Delivery:</strong> {{ \Carbon\Carbon::parse($package->delivery_date)->format('F j, Y')
                }}</p>
        </div>

        <div class="receipt">
            <h3>Receipt</h3>
            <div class="package-info">
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

        <a href="/" class="btn-track">Track Another Package</a>
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
    </script>
</body>

</html>