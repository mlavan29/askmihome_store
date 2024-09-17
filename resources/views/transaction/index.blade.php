@extends('layouts.app')

@section('content')
<div class="page-wrapper">


    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-themecolor">{{trans('lang.wallet_transaction_plural')}} <span class="userTitle"></span>
            </h3>

        </div>

        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('lang.wallet_transaction_plural')}}</li>
            </ol>
        </div>

        <div>

        </div>

    </div>


    <div class="container-fluid">
        <div id="data-table_processing" class="dataTables_processing panel panel-default"
                            style="display: none;">{{trans('lang.processing')}}
                        </div>
        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                            <li class="nav-item">
                                <a class="nav-link active" href="{!! url()->current() !!}"><i
                                        class="fa fa-list mr-2"></i>{{trans('lang.wallet_transaction_table')}}
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        

                    <div class="table-responsive m-t-10">


                        <table id="example24"
                            class="display nowrap table table-hover table-striped table-bordered table table-striped"
                            cellspacing="0" width="100%">

                            <thead>

                                <tr>
                                    <th>{{trans('lang.amount')}}</th>
                                    <th>{{trans('lang.date')}}</th>
                                    <th>{{trans('lang.payment_methods')}}</th>
                                     <th>{{trans('lang.vendors_payout_note')}}</th>
                                    <th>{{trans('lang.payment_status')}}</th>
                                </tr>

                            </thead>

                            <tbody id="append_list1">


                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</div>
</div>


@endsection


@section('scripts')
<script>

    var database = firebase.firestore();
    var offest = 1;
    var pagesize = 10;
    var end = null;
    var endarray = [];
    var start = null;
    var user_number = [];
    var vendorId="<?php echo $id;?>";
    var refData = database.collection('wallet').where('user_id','==',vendorId).orderBy('date','desc');
    var search = jQuery("#search").val();

    $(document.body).on('keyup', '#search', function () {
        search = jQuery(this).val();
    });


    var append_list = '';

    var currentCurrency = '';
    var currencyAtRight = false;
    var decimal_degits = 0;

    var refCurrency = database.collection('currencies').where('isActive', '==', true);
    refCurrency.get().then(async function (snapshots) {
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;

        if (currencyData.decimal_degits) {
            decimal_degits = currencyData.decimal_degits;
        }
    });

    $(document).ready(function () {


        $(document.body).on('click', '.redirecttopage', function () {
            var url = $(this).attr('data-url');
            window.location.href = url;
        });

        var inx = parseInt(offest) * parseInt(pagesize);
        jQuery("#data-table_processing").show();

        append_list = document.getElementById('append_list1');
        append_list.innerHTML = '';
        refData.get().then(async function (snapshots) {
            html = '';

            html = await buildHTML(snapshots);

            if (html != '') {
                append_list.innerHTML = html;
                start = snapshots.docs[snapshots.docs.length - 1];
                endarray.push(snapshots.docs[0]);
                if (snapshots.docs.length < pagesize) {
                    jQuery("#data-table_paginate").hide();
                }
            }
             $('#example24').DataTable({
                    order: [],
                    columnDefs: [
                        {
                            targets: 1,
                            type: 'date',
                            render: function (data) {

                                return data;
                            }
                        },
                        {orderable: false, targets: [2, 4]},
                    ],
                    order: [['1', 'desc']],
                    "language": {
                        "zeroRecords": "{{trans("lang.no_record_found")}}",
                        "emptyTable": "{{trans("lang.no_record_found")}}"
                    },
                    responsive: true
                });

            jQuery("#data-table_processing").hide();
        });

    });


    async function buildHTML(snapshots) {
        var html = '';
            await Promise.all(snapshots.docs.map(async (listval) => {
            var datas = listval.data();
            var getData = await getListData(datas);
            html += getData;

        }));
        return html;
    }
async function getListData(val) {
            html='';
            html = html + '<tr>';


            amount = val.amount;
            if (!isNaN(amount)) {
                amount = parseFloat(amount).toFixed(decimal_degits);

            }

            var note='';

            if (val.hasOwnProperty('isTopUp') && val.isTopUp) {
                 note="{{trans('lang.order_amount_credited')}}";

                if (currencyAtRight) {
                    html = html + '<td class="text-green">' + parseFloat(amount).toFixed(decimal_degits) + '' + currentCurrency + '</td>';

                } else {
                    html = html + '<td class="text-green">' + currentCurrency + '' + parseFloat(amount).toFixed(decimal_degits) + '</td>';
                }
            } else if (val.hasOwnProperty('isTopUp') && !val.isTopUp) {
                    note="{{trans('lang.admin_commision_debited')}}"

                if (currencyAtRight) {
                    html = html + '<td class="text-red">(' + parseFloat(amount).toFixed(decimal_degits) + '' + currentCurrency + ')</td>';

                } else {
                    html = html + '<td class="text-red">(' + currentCurrency + '' + parseFloat(amount).toFixed(decimal_degits) + ')</td>';
                }

            } else {
                if (currencyAtRight) {
                    html = html + '<td class="">' + parseFloat(amount).toFixed(decimal_degits) + '' + currentCurrency + '</td>';

                } else {
                    html = html + '<td class="">' + currentCurrency + '' + parseFloat(amount).toFixed(decimal_degits) + '</td>';
                }
            }


            var date = "";
            var time = "";
            try {
                if (val.hasOwnProperty("date")) {
                    date = val.date.toDate().toDateString();
                    time = val.date.toDate().toLocaleTimeString('en-US');
                }
            } catch (err) {

            }


            html = html + '<td>' + date + ' ' + time + '</td>';

            var payment_method = '';

            if (val.payment_method) {


                 if (val.payment_method == "Wallet" || val.payment_method=="wallet") {
                    image = '{{asset("images/gromart_wallet.png")}}';
                    payment_method = '<img style="width:100px" alt="image" src="' + image + '" >';

                 }else {
                    payment_method = val.payment_method;
                }
            }


            html = html + '<td class="payment_images">' + payment_method + '</td>';
            html = html + '<td>' + note + '</td>';

            if (val.payment_status == 'success') {
                html = html + '<td class="success"><span>' + val.payment_status + '</span></td>';
            } else if (val.payment_status == 'undefined') {
                html = html + '<td class="undefined"><span>' + val.payment_status + '</span></td>';
            } else if (val.payment_status == 'Refund success') {
                html = html + '<td class="refund_success"><span>' + val.payment_status + '</span></td>';

            } else {
            }

            html = html + '</tr>';

        return html;

 }








</script>


@endsection