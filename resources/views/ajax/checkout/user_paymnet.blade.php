@php $key = 1; $subtotal =0; @endphp
@foreach(session('cart') as $id => $details)
    @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp
@endforeach
<div class="row summary mb-4">
    <div class="col-sm-12 text-left">
        <div class="payment accordion radio-type mt-3">
            <div class="summary-subtitle">Payment Methods</div>
            <ul class="payment-metho-radio d-flex">
                <li>
                    <div class="radio-item_1">
                        <input id="pay_on_delivery" value="pay_on_delivery"  class="payment_option" name="payment_method" type="radio" checked>
                        <label for="pay_on_delivery" class="radio-label_1">Pay In Delivery</label>
                    </div>
                </li>
                <li>
                    <div class="radio-item_1">
                        <input id="pay_on_store" value="pay_on_store"  class="payment_option" name="payment_method" type="radio" required="">
                        <label for="pay_on_store" class="radio-label_1">Pay In Store</label>
                    </div>
                </li>
                <li>
                    <div class="radio-item_1">
                        <input id="payonline" value="payonline" class="payment_option"  name="payment_method" type="radio" required="">
                        <label for="payonline" class="radio-label_1">Pay Online</label>
                    </div>
                </li>
            </ul>
            <div class="payment">
            <div class="payment-meth" data-method="stripe" id="stripe_paymnet_form" style="display: none;">
             @include('ajax.checkout.stripe_credit_card_form')
         </div>
            </div>
            <div class="col-sm-12">
                <ul class="total-summary-list">
                    <li class="subtotal">
                        <span class="key">SUBTOTAL (1 ITEMS): </span>
                        <span class="value">${{ $subtotal }}</span>
                    </li>

                    <li class="charges ">
                        <span class="key">Coupon Discount:</span>
                        <span class="value">$0.00</span>
                    </li>

                    <li class="charges">
                        <span class="key">Shipping Fee:</span>
                        <span class="value" data-value="{{4.25}}">${{4.25}}</span>
                    </li>

                    <li class="grand-total">
                        <span class="key">GRAND TOTAL:</span>
                        <input type="hidden" name="tototal_amount" value="{{ $subtotal > 50 ? $subtotal + 50 : $subtotal + 0 }}">
                        <span class="value">${{ $subtotal > 50 ? $subtotal + 50 : $subtotal + 0 }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
