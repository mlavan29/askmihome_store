<nav class="sidebar-nav">

    <ul id="sidebarnav">

        <li><a class="waves-effect waves-dark" href="{!! url('dashboard') !!}" aria-expanded="false">

                <i class="mdi mdi-home"></i>

                <span class="hide-menu">{{trans('lang.dashboard')}}</span>

            </a>
        </li>

        <li>
            <a class="waves-effect waves-dark" href="{!! url('items') !!}" aria-expanded="false">

                <i class="mdi mdi-food"></i>

                <span class="hide-menu">{{trans('lang.item_plural')}}</span>

            </a>

        </li>

        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">

                <i class="mdi mdi-reorder-horizontal"></i>

                <span class="hide-menu">{{trans('lang.order_plural')}}</span>

            </a>

            <ul aria-expanded="false" class="collapse">

                <li><a href="{!! url('orders') !!}">{{trans('lang.order_plural')}}</a></li>

                <li><a href="{!! url('placedOrders') !!}">{{trans('lang.placed_orders')}}</a></li>

                <li><a href="{!! url('acceptedOrders') !!}">{{trans('lang.accepted_orders')}}</a></li>

                <li><a href="{!! url('rejectedOrders') !!}">{{trans('lang.rejected_orders')}}</a></li>

                {{--<li><a href="{!! url('orderReview') !!}">{{trans('lang.order_review')}}</a></li>--}}

            </ul>

        </li>
        <li><a class="waves-effect waves-dark" href="{!! url('coupons') !!}" aria-expanded="false">

                <i class="mdi mdi-sale"></i>

                <span class="hide-menu">{{trans('lang.coupon_plural')}}</span>

            </a>
        </li>

        <li class="dineInHistory hide"><a class="waves-effect waves-dark" href="{!! url('booktable') !!}"
                                          aria-expanded="false">

                <i class="fa fa-table "></i>

                <span class="hide-menu">{{trans('lang.book_table')}} / DINE IN History</span>

            </a>
        </li>

        <li class="specialOfferDiv hide"><a class="has-arrow waves-effect waves-dark"
                                            href="{!! url('special-offer') !!}" aria-expanded="false">

                <i class="fa fa-table "></i>

                <span class="hide-menu">{{trans('lang.special_offer')}}</span>

            </a>
        </li>

        <li><a class="waves-effect waves-dark" href="{!! url('payments') !!}" aria-expanded="false">

                <i class="mdi mdi-wallet"></i>

                <span class="hide-menu">{{trans('lang.payment_plural')}}</span>

            </a>
        </li>
        <li><a class="waves-effect waves-dark" href="{!! url('wallettransaction') !!}" aria-expanded="false">

                <i class="mdi mdi-swap-horizontal"></i>

                <span class="hide-menu">{{trans('lang.wallet_transaction_plural')}}</span>

            </a>
        </li>

    </ul>

    <p class="web_version"></p>

</nav>

<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-database.js"></script>
<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>
<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('js/crypto-js.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>

<script type="text/javascript">
    var database = firebase.firestore();
    var vendorUserId = "<?php echo $id; ?>";
    $(document).ready(function () {

        if (vendorUserId) {
            database.collection('vendors').where('author', "==", vendorUserId).get().then(async function (vendorSnapshots) {

                if (vendorSnapshots.docs[0]) {
                    var vendorData = vendorSnapshots.docs[0].data();
                    var enabledDiveInFuture = vendorData.enabledDiveInFuture;
                    if (enabledDiveInFuture) {
                        $('.dineInHistory').show();
                    } else {
                        $('.dineInHistory').hide();
                    }
                }
            })
        }

    });

</script>