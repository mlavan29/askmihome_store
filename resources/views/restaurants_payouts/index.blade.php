@extends('layouts.app')

@section('content')
        <div class="page-wrapper">


            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">{{trans('lang.stores_payout_plural')}}</h3>

                </div>

                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('lang.stores_payout_plural')}}</li>
                    </ol>
                </div>

                <div>

                </div>

            </div>

      

            <div class="container-fluid">
                <div id="data-table_processing" class="dataTables_processing panel panel-default" style="display: none;">{{trans('lang.processing')}}</div>
                <div class="row">

                    <div class="col-12">
                       
                        <div class="card">
                            
                             <div class="card-header">
                                    <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                                        <li class="nav-item active">
                                            <a class="nav-link active" href="{!! url()->current() !!}"><i
                                                        class="fa fa-list mr-2"></i>{{trans('lang.vendors_payout_table')}}</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{!! route('payments.create') !!}"><i
                                                        class="fa fa-plus mr-2"></i>{{trans('lang.vendors_payout_create')}}</a>

                                        </li>

                                    </ul>
                                </div>

                            <div class="card-body">


                                <div class="table-responsive m-t-10">


                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered table table-striped" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th>{{trans('lang.paid_amount')}}</th>
                                                <th>{{trans('lang.date')}}</th>
                                                <th>{{trans('lang.stores_payout_note')}}</th>
                                                <th>{{trans('lang.status')}}</th>
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
    var offest=1;
    var pagesize=10; 
    var end = null;
    var endarray=[];
    var start = null;
    var user_number = [];
    var vendorUserId = "<?php echo $id; ?>";
    var currentCurrency ='';
    var currencyAtRight = false;
    var decimal_degits = 0;

    var refCurrency = database.collection('currencies').where('isActive', '==' , true);
    refCurrency.get().then( async function(snapshots){
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;

        
        if (currencyData.decimal_degits) {
            decimal_degits = currencyData.decimal_degits;
        }
    });

    var append_list = '';
    var ref = '';
    var refData = ''
    getVendorId(vendorUserId).then(data => {
        vendorId= data;

        refData = database.collection('payouts').where('vendorID','==',vendorId);
        ref = refData.orderBy('paidDate', 'desc');

        $(document).ready(function() {

            $(document.body).on('click', '.redirecttopage' ,function(){    
                var url=$(this).attr('data-url');
                window.location.href = url;
            });

            var inx= parseInt(offest) * parseInt(pagesize);
            jQuery("#data-table_processing").show();
          
            append_list = document.getElementById('append_list1');
            append_list.innerHTML='';
            ref.get().then( async function(snapshots){  
            html='';
            
            html=await buildHTML(snapshots);
            
            if(html!=''){
                append_list.innerHTML=html;
                start = snapshots.docs[snapshots.docs.length - 1];
                endarray.push(snapshots.docs[0]);

             }
             jQuery("#data-table_processing").hide();

            if(snapshots.docs.length < pagesize){ 
   
                jQuery("#data-table_paginate").hide();
            }else{

                jQuery("#data-table_paginate").show();
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
                        {orderable: false, targets: [3]},
                    ],
                    order: [['1', 'desc']],
                    "language": {
                        "zeroRecords": "{{trans("lang.no_record_found")}}",
                        "emptyTable": "{{trans("lang.no_record_found")}}"
                    },
                    responsive: true
                });

          }); 
         
        });
    })


  async function buildHTML(snapshots){
        var html='';
            await Promise.all(snapshots.docs.map(async (listval) => {
            var datas=listval.data();
            var getData = await getListData(datas);
             html += getData;

        }));
        return html;
    }
 async function getListData(val) {
                html='';
                html=html+'<tr >';
            if (currencyAtRight) {
                price_val = parseFloat(val.amount).toFixed(decimal_degits) + "" + currentCurrency;
            } else {
                price_val = currentCurrency + "" + parseFloat(val.amount).toFixed(decimal_degits);
            }

            html = html+'<td class="text-danger">('+price_val+')</td>';
            var date =  val.paidDate.toDate().toDateString();
            var time = val.paidDate.toDate().toLocaleTimeString('en-US');
            html = html+'<td>'+date+' '+time+'</td>';

            if(val.note){
            html = html+'<td>'+val.note+'</td>';

            }else{
             html = html+'<td></td>';

            }

            if(val.paymentStatus){
            html = html+'<td>'+val.paymentStatus+'</td>';

            }else{
              html = html+'<td></td>';

            }
            html=html+'</tr>';
            return html;      

 }                

async function getVendorId(vendorUser){
    var vendorId = '';
    var ref;
    await database.collection('vendors').where('author',"==",vendorUser).get().then(async function(vendorSnapshots){
        var vendorData = vendorSnapshots.docs[0].data();    
        vendorId = vendorData.id;
    })
    
            return vendorId;
}



</script>



@endsection
