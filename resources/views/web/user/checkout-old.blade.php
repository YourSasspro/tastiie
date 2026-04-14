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
        <section class="mt-5 mb-5">
            <div class="container">
                {{-- Alert message --}}
                <x-alerts.alert :type="session('type')" :message="session('message')" />

                <x-forms.form action="{{ route('checkout.store') }}" method="POST">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h4>
                                    @lang('gen.billing_details')
                                </h4>
                            </div>
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
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-3">
                                    <h4>
                                        @lang('gen.my_orders')
                                    </h4>
                                </div>
                                <div class="table table-responsive table-hover text-center">
                                    
                                    <!---->
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-secondary">
                                                    @lang('gen.image')
                                                </th>
                                                <th class="text-secondary">
                                                    @lang('gen.product')
                                                </th>
                                                <th class="text-secondary">
                                                    @lang('gen.price')
                                                </th>
                                                <th class="text-secondary">
                                                    @lang('gen.quantity')
                                                </th>
                                                <th class="text-secondary">
                                                    @lang('gen.total')
                                                </th>
                                                <th class="text-secondary">
                                                    @lang('gen.remove')
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
            
                                            @php
                                                $grand_total = 0;
                                            @endphp
                                            @forelse (getAuthUser()->carts as $item)
                                                @php
                                                    $subtotal = $item->price * $item->quantity;
                                                    $grand_total += $subtotal;
                                                @endphp
                                                <tr data-id="{{ $item->id }}">
                                                    <td class=" align-middle">
                                                        <x-misc.img :src="asset('storage/'.$item->product?->image)" width="70" height="70" alt=""
                                                            class="img-fluid" />
                                                    </td>
                                                    <td class=" align-middle">
                                                        <div>
                                                            <h2 class="heading fs-6 mb-1">
                                                                {{ $item->product?->name }}
                                                            </h2>
                                                        </div>
                                                    </td>
                                                    <td class=" align-middle">
                                                        €{{ number_format($item->price, 2) }}
                                                    </td>
                                                    <td class=" align-middle">
                                                        <!--<div class="d-flex gap-3 align-items-center w-100">-->
                                                        <!--    <div class="quantity d-flex justify-content-center">-->
                                                                <!--<button class="btn orange-bg text-white minusBtn rounded-0 px-1">-->
                                                                <!--    --->
                                                                <!--</button>-->
                                                                <!--<input type="number" class="form-control quantityInput" data-id="{{ $item->id }}" style="width: 50px" value="{{ $item->quantity }}" />-->
            
                                                                <!--<button class="btn orange-bg text-white plusBtn rounded-0 px-1">-->
                                                                <!--    +-->
                                                                <!--</button>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td class=" align-middle">
                                                        €{{ number_format($subtotal, 2) }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#" class="remove-btn text-decoration-underline text-dark removeBtn" data-id="{{ $item->id }}">
                                                            <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        @lang('gen.no_result_found')
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="border-0 pt-3">@lang('gen.total')</th>
                                                <td colspan="2" class="text-end border-0 pt-3">
                                                    <span class="h4 text-primary fw-bold">
                                                        €{{ number_format($grand_total ?? 0, 2) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <div class="bt-1 border-color-1 mt-3 mb-3"></div>
                                <div class="payment_method">
                                    <div class="heading_s1">
                                        <h4>
                                            @lang('gen.payment')
                                        </h4>
                                    </div>
                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input payment-radio" type="radio"
                                                id="exampleRadios4" name="payment_method" value="stripe" checked>
                                            <label class="form-check-label" for="exampleRadios4">Stripe</label>
                                            <p data-method="stripe" class="payment-text">
                                                Payez via Stripe ; vous pouvez payer par carte bancaire même si vous n'avez pas de compte Stripe.
                                            </p>
                                        </div>
                                        {{-- <div class="custome-radio">
                                            <input class="form-check-input payment-radio" type="radio"
                                                id="exampleRadios5" name="payment_method" value="paypal">
                                            <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                            <p data-method="paypal" class="payment-text">
                                                Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.
                                            </p>
                                        </div> --}}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-30">
                                    @lang('gen.place_order')
                                </button>
                            </div>
                        </div>
                    </div>
                </x-forms.form>
            </div>
        </section>
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
