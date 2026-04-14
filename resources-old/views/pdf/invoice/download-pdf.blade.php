<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            /* font-family: "Nunito", sans-serif; */
            font-family: 'DejaVu Sans', sans-serif;
            width: 100%;
            margin: 0 auto;
            font-size: 16px;
        }

        .container {
            /* width: 100%;
            margin: 0 auto; */
            padding: 4px;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
        }

        .info {
            width: 100%;
            margin-bottom: 20px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 5px;
            vertical-align: top;
        }

        .info .left,
        .info .right {
            width: 50%;
        }

        .endright {
            text-align: right;
            width: 100%;
        }

        .details {
            width: 100%;
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
        }

        .details th,
        .details td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        .details th {
            background-color: #f2f2f2;
        }

        .footer {
            font-size: 12px;
        }


        .border-one {
            border: 3px solid #000 !important;
        }

        .row-border {
            border-bottom: 3px solid #000;
        }

        .border-end {
            border-right: 3px solid #343a40;
        }

        .fw-bold {
            font-weight: bold;
        }


    </style>
</head>

<body>
    <div class="container border-one">

        <div class="info">
            <table>
                <tr>
                    <td class="left">
                        @php
                            $logoPath = getGeneralSettings()?->site_logo ? public_path('storage/' . getGeneralSettings()?->site_logo) : 'https://placehold.co/600x400';
                        @endphp

                        <x-misc.img :src="$logoPath" height="120" class="logo" alt="No Logo" />
                        {{-- @if ($logoPath && file_exists($logoPath))
                        @else
                            <h4>{{ $site->business_name ?? '' }}</h4>
                        @endif --}}
                    </td>
                    <td class="right">

                    </td>
                    <td class="right">
                        <h4>
                            {{ getGeneralSettings()?->site_name ?? 'Site Name' }}
                        </h4>
                        <p>{{ getGeneralSettings()?->site_address ?? 'Site Address' }}<br>Phone:
                            {{ getGeneralSettings()?->site_phone ?? 'Site Phone' }}<br>{{ getGeneralSettings()?->site_email ?? 'example@gmail.com' }}
                        </p>
                    </td>

                </tr>
            </table>
        </div>

        <div class="info">
            <table>
                <tr>
                    <td class="left">
                        <strong>SHIP TO:</strong><br>
                        {{ $order?->shippingAddress?->name ?? 'Name' }}<br>
                        {{ $order?->shippingAddress?->address ?? 'Address' }}<br>
                        Phone: {{ $order?->shippingAddress?->phone_no ?? '454543' }}<br>
                        Email {{ $order?->shippingAddress?->email ?? 'example@gmail.com' }}
                    </td>
                    <td class="right">
                        <strong>SOLD TO:</strong><br>
                        {{ $order?->user?->name ?? 'Name' }}<br>
                        {{ $order?->user?->address ?? 'Address' }}<br>
                        Phone: {{ $order?->user?->phone_no ?? '' }}<br>
                        Email {{ $order?->user?->email ?? '' }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Date:</th>
                    <th>Invoice#:</th>
                    <th>Payment Method:</th>
                    <th>Status:</th>
                </tr>
                <tr>
                    <td>
                        {{ $order->created_at ?? '0000-00-00' }}
                    </td>
                    <td>
                        {{ $order->order_number ?? '123456' }}
                    </td>
                    <td>
                        {{ $order->payment_method ?? 'Pending' }}
                    </td>
                    <td>
                        {{ $order->status ?? 'Pending' }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="details">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Add your product rows here -->
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name ?? 'Product Name' }}</td>
                            <td>€{{ $item->price ?? '0.00' }}</td>
                            <td>{{ $item->quantity ?? '0' }}</td>
                            <td>€{{ $item->subtotal ?? '0.00' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="info">
            <table>
                <tr>
                    <td class="left"></td>
                    <td class="" style="width: 300px;text-align: end;">
                        <p>
                            <span class="fw-bold">Grand Total:</span>
                            <span style="text-decoration: underline;">€{{ $order->total_amount ?? '0.00' }}</span><br>
                            {{-- <span class="fw-bold">Shipping Fee:</span> <span style="text-decoration: underline;">€{{ $order->shipping ?? '0.00' }}</span><br>
                            <span class="fw-bold">Discounts:</span> <span style="text-decoration: underline;">€{{ $order->discount ?? '0.00' }}</span><br> --}}
                            <span class="fw-bold">Payment Method:</span>
                            <span>
                                {{ $order->payment_method ?? '' }}
                            </span>
                            <br>
                        </p>
                    </td>

                </tr>
            </table>
        </div>


        <div class="footer">
            {{-- {!! QrCode::size(60)->generate($order->order_number) !!} --}}
        </div>
        <div class="footer">
            <p>Powered By {{ getGeneralSettings()?->site_name ?? 'Site Name' }}</p>
        </div>
    </div>
</body>

</html>
