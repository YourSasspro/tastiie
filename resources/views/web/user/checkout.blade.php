@extends('web.default.layouts.app')


@push('styles')
    <style>
        /*page header*/
        .page-header .page-title {
            font-weight: 900;
            font-size: 4rem;
        }

        .page-header.breadcrumb-wrap {
            padding: 20px;
            background-color: #f7f8f9;
        }

        .page-header .breadcrumb {
            display: inline-block;
            padding: 0;
            text-transform: capitalize;
            color: #6e6e6e;
            font-size: 0.875rem;
            background: none;
            margin: 0;
            border-radius: 0;
        }

        .page-header .breadcrumb span {
            position: relative;
            text-align: center;
            padding: 0 10px;
        }

        .page-header .breadcrumb span::before {
            content: "\F285";
            font-family: "bootstrap-icons" !important;
            display: inline-block;
            font-size: 9px;
        }

        .order_review {
            border: 1px solid #e2e9e1;
            padding: 30px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 1.5rem;
            border-collapse: collapse;
            vertical-align: middle;
        }

        table td,
        table th {
            padding: 10px 20px;
            border: 1px solid #e2e9e1;
            vertical-align: middle;
        }

        table thead>tr>th {
            vertical-align: middle;
            border-bottom: 0;
        }

        table p {
            margin-bottom: 0;
        }

        table.clean td,
        table.clean th {
            border: 0;
            border-top: 1px solid #e2e9e1;
        }

        table .product-thumbnail img {
            max-width: 80px;
        }

        .payment_option .custome-radio {
            margin-bottom: 10px;
        }

        .payment_option .custome-radio .form-check-label {
            color: #292b2c;
            font-weight: 600;
        }
    </style>

    <!-- Custom CSS -->
    <style>
        .payment-method {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .card-radio {
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .card-radio:hover,
        .card-radio input:checked+.card-body {
            border-color: #007bff;
            background-color: #c4e1f7;
        }

        .card-radio input {
            display: none;
        }
    </style>
    <!--new style-->
    <style>
        body {
            background-color: #F7F5F1;
            font-family: 'Montserrat', sans-serif;
        }

        .checkout-container {
            padding-top: 20px;
            padding-bottom: 50px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .card-title {
            color: #001C69;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .item-row {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .item-details h6 {
            margin-bottom: 5px;
            color: #001C69;
            font-weight: 700;
        }

        .item-details p {
            font-size: 14px;
            color: #666;
            margin-bottom: 0;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 4px;
            gap: 12px;
            width: fit-content;
            border: 1px solid #e9ecef;
        }

        .quantity-btn {
            background: white;
            border: 1px solid #dee2e6;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #001C69;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 700;
            line-height: 1;
        }

        .quantity-btn:hover {
            background: #001C69;
            color: white;
            border-color: #001C69;
            transform: scale(1.1);
            box-shadow: 0 2px 8px rgba(0, 28, 105, 0.2);
        }

        .quantity-value {
            font-weight: 700;
            color: #001C69;
            min-width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .form-label {
            font-weight: 600;
            color: #001C69;
            font-size: 14px;
        }

        .form-control, .form-select {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .btn-apply {
            background-color: #ff8119;
            color: white;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-apply:hover {
            background-color: #e67516;
            transform: translateY(-2px);
        }

        .order-total-card .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .order-total-card .total-row.main-total {
            font-size: 18px;
            font-weight: 800;
            color: #001C69;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #eee;
        }

        .btn-place-order {
            background-color: #001C69;
            color: white;
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            font-weight: 700;
            margin-top: 20px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .btn-place-order:hover {
            background-color: #00144d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 28, 105, 0.3);
        }

        .form-control:focus, .form-select:focus {
            border-color: #001C69;
            box-shadow: 0 0 0 0.2rem rgba(0, 28, 105, 0.1);
        }

        .secure-text {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 15px;
        }

        @media (max-width: 991px) {
            .checkout-container {
                padding-top: 220px;
            }
        }

        /* Mobile Specific Improvements */
        @media (max-width: 991px) {
            .checkout-container {
                padding-top: 200px;
            }
        }

        @media (max-width: 768px) {
            .checkout-container {
                padding-top: 220px;
            }
            .item-img {
                width: 90px;
                height: 90px;
                border-radius: 12px;
            }
            .card {
                padding: 1.5rem !important;
                border-radius: 20px;
            }
            .card-title {
                font-size: 1.2rem;
                border-bottom: 2px solid #f8f9fa;
                padding-bottom: 12px;
            }
        }

        @media (max-width: 576px) {
            .checkout-container {
                padding-top: 130px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .item-row {
                padding: 15px 0;
            }
            .item-container-mobile {
                display: flex;
                gap: 15px;
                align-items: flex-start;
            }
            .item-img {
                width: 80px;
                height: 80px;
                flex-shrink: 0;
            }
            .item-details {
                flex-grow: 1;
                min-width: 0; /* Important for text truncation */
            }
            .item-details h6 {
                font-size: 15px;
                font-weight: 700;
                margin-bottom: 2px;
                color: #001C69;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .item-details p {
                font-size: 13px;
                color: #777;
                margin-bottom: 8px;
            }
            .price-qty-mobile {
                display: flex !important;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                margin-top: 10px;
            }
            .mobile-price {
                font-size: 16px;
                font-weight: 700;
                color: #001C69;
            }
            .quantity-control {
                background: #f1f3f5;
                border-radius: 12px;
                padding: 3px;
                gap: 8px;
                border: none;
                display: flex;
                align-items: center;
            }
            .quantity-btn {
                width: 34px;
                height: 34px;
                font-size: 18px;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.06);
                border: none;
                font-weight: 600;
                color: #001C69;
            }
            .quantity-value {
                font-size: 15px;
                font-weight: 700;
                color: #001C69;
                min-width: 30px;
                text-align: center;
            }
            .logo-heading img {
                width: 110px !important;
            }
            .fixed-top {
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .d-lg-none .bi-basket {
                font-size: 1.8rem !important;
            }
            .d-lg-none .fa-user {
                font-size: 1.5rem !important;
            }
            .card {
                padding: 1rem !important;
                border-radius: 15px;
                margin-bottom: 20px;
            }
            .card-title {
                font-size: 1.1rem;
                margin-bottom: 15px;
            }
            .form-label {
                font-size: 13px;
                font-weight: 700;
                color: #001C69;
            }
            .form-control, .form-select {
                padding: 12px;
                font-size: 14px;
                border-radius: 12px;
            }
            main.checkout-container {
                padding-bottom: 40px;
            }
        }
    </style>
    
@endpush

@section('content')

        <!-- Order Status -->
    <section class="order-status bg-light py-5 mt-5 section-gap">
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <div>
                    <h2 class="heading fs-4 m-0 checkout-border text-secondary">
                        <i class="bi bi-1-circle-fill"></i> @lang('gen.carts')
                    </h2>
                </div>
                <div>
                    <h2 class="heading fs-4 mx-2 m-0 ">
                        <i class="bi bi-2-circle-fill mb-3"></i> @lang('gen.checkout')
                    </h2>
                </div>
                <div>
                    <h2 class="heading fs-4 m-0 text-secondary">
                        <i class="bi bi-3-circle-fill"></i> @lang('gen.order_status')
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Order Status -->
        
        <!--New page-->
        <main class="checkout-container">
            <div class="container px-md-5">
                {{-- Alert message --}}
                <x-alerts.alert :type="session('type')" :message="session('message')" />
                <x-forms.form action="{{ route('checkout.store') }}" method="POST">
                <div class="row">
                    
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Order Summary -->
                           <div class="card p-4">
                                <h4 class="card-title">@lang('gen.my_orders')</h4>
                                <div class="order-items">
                                    @php $grand_total = 0; @endphp
                            
                                    @forelse (getAuthUser()->carts as $item)
                                        @php
                                            $item_price = $item->price;
                                            $subtotal = $item_price * $item->quantity;
                                            $grand_total += $subtotal;
                                            $product_image = $item->product?->image ? asset('storage/'.$item->product->image) : asset('assets/img/default-product.jpg');
                                        @endphp
                            
                                        <div class="row item-row align-items-center" data-id="{{ $item->id }}">
                                            
                                            <div class="col-12 d-md-none">
                                                <div class="item-container-mobile">
                                                    <img src="{{ $product_image }}" alt="{{ $item->product?->name }}" class="item-img">
                                                    <div class="item-details">
                                                        <h6>{{ $item->product?->name }}</h6>
                                                        <!--<p>{{ $item->product?->unit ?? 'Unit' }}</p>-->
                                                        <div class="price-qty-mobile">
                                                            <span class="mobile-price">€{{ number_format($item_price, 2) }}</span>
                                                            <div class="quantity-control">
                                                                <button class="quantity-btn minusBtn" type="button" data-id="{{ $item->id }}">-</button>
                                                                <span class="quantity-value">{{ $item->quantity }}</span>
                                                                <button class="quantity-btn plusBtn" type="button" data-id="{{ $item->id }}">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="col-auto d-none d-md-block">
                                                <img src="{{ $product_image }}" alt="{{ $item->product?->name }}" class="item-img">
                                            </div>
                                            
                                            <div class="col item-details d-none d-md-block">
                                                <h6>{{ $item->product?->name }}</h6>
                                                <!--<p>{{ $item->product?->unit ?? 'Unit' }}</p>-->
                                            </div>
                            
                                            <div class="col-auto text-end d-none d-md-block">
                                                <h6 class="mb-2">€{{ number_format($item_price, 2) }}</h6>
                                                <div class="quantity-control justify-content-end ms-auto">
                                                    <button class="quantity-btn minusBtn" type="button" data-id="{{ $item->id }}">-</button>
                                                    <span class="quantity-value">{{ $item->quantity }}</span>
                                                    <button class="quantity-btn plusBtn" type="button" data-id="{{ $item->id }}">+</button>
                                                </div>
                                            </div>
                            
                                        </div>
                                    @empty
                                        <div class="text-center p-3">
                                            <p>@lang('gen.no_result_found')</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
        
                            <!-- Delivery Information -->
                            <div class="card p-4">
                                <h4 class="card-title">Informations de livraison</h4>
                                
                                    <x-forms.form-input type="hidden" name="total_amount" id="total_amount"
                                    value="{{ getAuthUser()->cartsSubTotal() ?? 0 }}" />
                                <div>
                                    <div class="form-group mb-3">
                                    <x-forms.form-input 
                                        type="text" 
                                        name="first_name" 
                                        id="first_name"
                                        class="{{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                        placeholder="Saisissez votre prénom" 
                                        :value="old('first_name', auth()->user()->first_name)" 
                                    />
                                    <x-forms.input-error :messages="$errors->get('first_name')" />
                                </div>
                                
                                <div class="form-group mb-3">
                                    <x-forms.form-input 
                                        type="text" 
                                        name="last_name" 
                                        id="last_name"
                                        class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                        placeholder="Saisissez votre nom" 
                                        :value="old('last_name', auth()->user()->last_name)" 
                                    />
                                </div>
                                
                                <div class="form-group mb-3">
                                    <x-forms.form-input 
                                        type="email" 
                                        name="email" 
                                        id="email"
                                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}" 
                                        placeholder="Saisissez votre e-mail"
                                        :value="old('email', auth()->user()->email)" 
                                    />
                                </div>
                                
                                <div class="form-group mb-3">
                                    <x-forms.form-input 
                                        type="tel" 
                                        name="phone_no" 
                                        id="phone_no"
                                        class="{{ $errors->has('phone_no') ? 'is-invalid' : '' }}" 
                                        placeholder="Saisissez votre numéro de téléphone"
                                        :value="old('phone_no', auth()->user()->phone_number)" 
                                    />
                                </div>
                                    <div class="form-group mb-3">
                                        <div class="custom_select">
                                            <x-forms.form-select name="country" id="country">
                                                <option value="">Choisissez une option...</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="PW">Belau</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="VG">British Virgin Islands</option>
                                                <option value="BN">Brunei</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo (Brazzaville)</option>
                                                <option value="CD">Congo (Kinshasa)</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">CuraÇao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="CI">Ivory Coast</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Laos</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao S.A.R., China</option>
                                                <option value="MK">Macedonia</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia</option>
                                                <option value="MD">Moldova</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="KP">North Korea</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PS">Palestinian Territory</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="QA">Qatar</option>
                                                <option value="IE">Republic of Ireland</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russia</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="ST">São Tomé and Príncipe</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="SH">Saint Helena</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="SX">Saint Martin (Dutch part)</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="SM">San Marino</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia/Sandwich Islands</option>
                                                <option value="KR">South Korea</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syria</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom (UK)</option>
                                                <option value="US">USA (US)</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VA">Vatican</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Vietnam</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="WS">Western Samoa</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
    
                                            </x-forms.form-select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <x-forms.form-input type="text" name="address" id="address"
                                            class="{{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            placeholder="Saisissez votre adresse" :value="old('address')" />
                                    </div>
                                    <div class="form-group mb-3 position-relative">
                                            <x-forms.form-input type="text" name="city" id="city"
                                                class="{{ $errors->has('city') ? 'is-invalid' : '' }}" 
                                                placeholder="Saisissez votre ville"
                                                autocomplete="off"
                                                :value="old('city')" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <x-forms.form-input type="text" name="state" id="state"
                                            class="{{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="Saisissez l'État"
                                            :value="old('state')" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <x-forms.form-input type="text" name="zip_code" id="zip_code"
                                            class="{{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                                            placeholder="Saisissez le code postal" :value="old('zip_code')" />
                                    </div>
                                    
    
                                    <div class="heading_s1">
                                        <h4>
                                            @lang('gen.additional_information')
                                        </h4>
                                    </div>
                                    <div class="form-group mb-0">
                                        <x-forms.form-textarea name="order_note" id="order_note" row="5"
                                            class="{{ $errors->has('order_note') ? 'is-invalid' : '' }}"
                                            placeholder="Notes de commande" :value="old('order_note')" />
                                    </div>
                                </div>
                                
                            </div>
                        </div>
        
                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Promo Code -->
                            <!--<div class="card p-4 promo-card">-->
                            <!--    <h4 class="card-title">Promo Code</h4>-->
                            <!--    <div class="input-group">-->
                            <!--        <input type="text" class="form-control" placeholder="Enter code">-->
                            <!--        <button class="btn btn-apply">Apply</button>-->
                            <!--    </div>-->
                            <!--</div>-->
        
                            <!-- Order Total -->
                            @php
                                // Configuration - You can pull these from your settings table or .env
                                $delivery_fee = 0.00; 
                                $discount = 0.00; // Example: Set this if you have a coupon system
                                $tax_rate = 0.00; // 5% tax example
                                
                                // Calculations
                                $taxable_amount = ($grand_total + $delivery_fee) - $discount;
                                $tax = $taxable_amount * $tax_rate;
                                $final_total = $taxable_amount + $tax;
                            @endphp
                            
                            <div class="card p-4 order-total-card">
                                <h4 class="card-title">@lang('gen.total')</h4>
                                
                                <div class="total-row">
                                    <span>@lang('gen.subtotal')</span>
                                    <span class="fw-bold">€{{ number_format($grand_total, 2) }}</span>
                                </div>
                            
                                <div class="total-row">
                                    <span>Frais de livraison</span>
                                    <span class="fw-bold">€{{ number_format($delivery_fee, 2) }}</span>
                                </div>
                            
                                @if($discount > 0)
                                    <div class="total-row text-success">
                                        <span>@lang('gen.discount')</span>
                                        <span class="fw-bold">-€{{ number_format($discount, 2) }}</span>
                                    </div>
                                @endif
                            
                                <div class="total-row">
                                    <span>Taxe</span>
                                    <span class="fw-bold">€{{ number_format($tax, 2) }}</span>
                                </div>
                            
                                <div class="total-row main-total">
                                    <span>@lang('gen.total')</span>
                                    <span class="fw-bold">€{{ number_format($final_total, 2) }}</span>
                                </div>
                            
                                <button class="btn btn-place-order w-100 mt-3" type="submit">
                                    <i class="fa-solid fa-lock me-1"></i> @lang('gen.place_order')
                                </button>
                                
                                <p class="secure-text text-center mt-3 small">
                                    <i class="fa-solid fa-shield-halved me-1"></i> 
                                    Paiement sécurisé avec cryptage SSL
                                </p>
                            </div>
                        </div>
                    
                </div>
                </x-forms.form>
            </div>
        </main>
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {
            function updatePaymentText() {
                const selectedValue = $('.payment-radio:checked').val();

                $('.payment-text').each(function() {
                    $(this).toggle($(this).data('method') === selectedValue);
                });
            }

            // Initialize visibility on page load
            updatePaymentText();

            // Update visibility on radio change
            $('.payment-radio').on('change', updatePaymentText);
        });
    </script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script>
$(document).ready(function() {
    // Make sure jQuery UI is loaded before this script
    if (typeof $.ui !== 'undefined') {
        $("#city").autocomplete({
            source: function(request, response) {
                // If you want to log, do it here inside the source function
                

                $.ajax({
                    url: "https://secure.geonames.org/searchJSON",
                    dataType: "jsonp",
                    data: {
                        featureClass: "P",
                        style: "full",
                        maxRows: 12,
                        name_startsWith: request.term,
                        username: "ahsan920" // IMPORTANT: Replace 'demo' with your account to avoid limits
                    },
                    success: function(data) {
                        if (data.geonames) {
                            response($.map(data.geonames, function(item) {
                                return {
                                    label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
                                    value: item.name
                                };
                            }));
                        }
                    }
                });
            },
            minLength: 3,
            select: function(event, ui) {
                console.log("Selected: " + ui.item.label);
            }
        });
    } else {
        console.error("jQuery UI is not loaded!");
    }
});
</script>
<script>
$(document).ready(function() {
    $("#address").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "https://nominatim.openstreetmap.org/search",
                dataType: "json",
                // IMPORTANT: Nominatim requires a User-Agent to identify your app
                headers: {
                    "User-Agent": "YourAppName/1.0 (contact@yourdomain.com)"
                },
                data: {
                    q: request.term,
                    format: "json",
                    addressdetails: 1,
                    limit: 10,
                    countrycodes: 'fr', // Keep or remove based on your target market
                    "accept-language": "fr" // Forces results to be in French
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.display_name,
                            // We set 'value' to the street/name so the input isn't 
                            // cluttered with the full address after selection
                            value: item.address.road || item.display_name,
                            full_data: item.address
                        };
                    }));
                }
            });
        },
        minLength: 3,
        select: function(event, ui) {
            const addr = ui.item.full_data;

            // Fill City
            const city = addr.city || addr.town || addr.village || addr.suburb;
            if (city) $('#city').val(city);

            // Fill Zip Code
            if (addr.postcode) $('#zip_code').val(addr.postcode);

            // Fill State/Region
            const state = addr.state || addr.region;
            if (state) $('#state').val(state);
        }
    });
});
</script>
<script>
function deleteItem(cartId) {
    if (confirm("Are you sure you want to remove this item?")) {
        $.ajax({
            url: '/cart/delete/' + cartId, 
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(result) {
                // Refreshing the page to update total and cart state
                location.reload(); 
            },
            error: function(err) {
                alert("Could not remove item. Please try again.");
            }
        });
    }
}
</script>       
@endpush
