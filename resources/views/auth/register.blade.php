@include('auth.default')
<div class="container">
    <div class="row page-titles ">

        <div class="col-md-12 align-self-center text-center">
            <h3 class="text-themecolor  ">{{trans('lang.sign_up_with_us')}}</h3>
        </div>

        <div class="card-body">
            <div id="data-table_processing" class="dataTables_processing panel panel-default"
                 style="display: none;">{{trans('lang.processing')}}
            </div>
            <div class="error_top"></div>
            <div class="alert alert-success" style="display:none;"></div>
            <div class="row restaurant_payout_create">
                <div class="restaurant_payout_create-inner">
                    <fieldset>
                        <legend>{{trans('lang.admin_area')}}</legend>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.first_name')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control user_first_name" required
                                      onkeypress="return chkNumbers2(event,'error4')">
                                <div id="error4" class="err"></div>

                                <div class="form-text text-muted">
                                    {{ trans("lang.user_first_name_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.last_name')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control user_last_name" onkeypress="return chkNumbers2(event,'error5')">
                                     <div id="error5" class="err"></div>

                                <div class="form-text text-muted">
                                    {{ trans("lang.user_last_name_help") }}
                                </div>
                            </div>
                        </div>


                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.email')}}</label>
                            <div class="col-7">
                                <input type="email" class="form-control user_email" required>
                                <div class="form-text text-muted">
                                    {{ trans("lang.user_email_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.password')}}</label>
                            <div class="col-7">
                                <input type="password" class="form-control user_password" required>
                                <div class="form-text text-muted">
                                    {{ trans("lang.user_password_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.user_phone')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control user_phone"
                                     onkeypress="return chkAlphabets2(event,'error1')">
                                       <div id="error1" class="err"></div>

                                <div class="form-text text-muted w-50">
                                    {{ trans("lang.user_phone_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-100">
                            <label class="col-3 control-label">{{trans('lang.profile_image')}}</label>
                            <div class="col-9">
                            <input type="file" onChange="handleFileSelectowner(event)">
                            <div id="uploding_image_owner"></div>
                            <div class="uploaded_image_owner" style="display:none;"><img
                                        id="uploaded_image_owner"
                                        src="" width="150px"
                                        height="150px;"></div>
                             </div>           
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>{{trans('lang.store_details')}}</legend>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.store_name')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control store_name" required>
                                <div class="form-text text-muted">
                                    {{ trans("lang.store_name_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.category')}}</label>
                            <div class="col-7">
                                <select id='store_cuisines' class="form-control" required>
                                    <option value="">{{ trans("lang.select_cuisines") }}</option>
                                </select>
                                <div class="form-text text-muted">
                                    {{ trans("lang.store_cuisines_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.store_phone')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control store_phone" required
                                     onkeypress="return chkAlphabets2(event,'error2')">
                                       <div id="error2" class="err"></div>

                                <div class="form-text text-muted">
                                    {{ trans("lang.store_phone_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.store_address')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control store_address" required>
                                <div class="form-text text-muted">
                                    {{ trans("lang.store_address_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-100">
                            <div class="col-12">
                                <h6>* Don't Know your cordinates ? use <a target="_blank"
                                                                          href="https://www.latlong.net/">Latitude
                                        and Longitude Finder</a></h6>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.store_latitude')}}</label>
                            <div class="col-7">
                                <input class="form-control store_latitude" type="number" min="-90"
                                       max="90">
                                <div class="form-text text-muted">
                                    {{ trans("lang.store_latitude_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.store_longitude')}}</label>
                            <div class="col-7">
                                <input class="form-control store_longitude" type="number" min="-180"
                                       max="180">
                                <div class="form-text text-muted">
                                    {{ trans("lang.store_longitude_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-50">
                            <label class="col-3 control-label">{{trans('lang.store_image')}}</label>
                            <div class="col-7">
                                <input type="file" onChange="handleFileSelect(event,'photo')">
                                <div id="uploding_image_store"></div>
                                <div class="uploaded_image" style="display:none;"><img id="uploaded_image"
                                                                                       src=""
                                                                                       width="150px"
                                                                                       height="150px;"></div>
                                <div class="form-text text-muted">
                                    {{ trans("lang.store_image_help") }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row width-100">
                            <label class="col-3 control-label ">{{trans('lang.store_description')}}</label>
                            <div class="col-7">
                                    <textarea rows="7" class="store_description form-control"
                                              id="store_description"></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>{{trans('lang.gallery')}}</legend>

                        <div class="form-group row width-50 store_image">
                            <div class="">
                                <div id="photos"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div>
                                <input type="file" onChange="handleFileSelect(event,'photos')">
                                <div id="uploding_image_photos"></div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset style="display:none">
                        <legend>{{trans('lang.services')}}</legend>

                        <div class="form-group row">

                            <div class="form-check width-100">
                                <input type="checkbox" id="Free_Wi_Fi">
                                <label class="col-3 control-label"
                                       for="Free_Wi_Fi">{{trans('lang.free_wi_fi')}}</label>
                            </div>
                            <div class="form-check width-100">
                                <input type="checkbox" id="Good_for_Breakfast">
                                <label class="col-3 control-label"
                                       for="Good_for_Breakfast">{{trans('lang.good_for_breakfast')}}</label>
                            </div>
                            <div class="form-check width-100">
                                <input type="checkbox" id="Good_for_Dinner">
                                <label class="col-3 control-label"
                                       for="Good_for_Dinner">{{trans('lang.good_for_dinner')}}</label>
                            </div>
                            <div class="form-check width-100">
                                <input type="checkbox" id="Good_for_Lunch">
                                <label class="col-3 control-label"
                                       for="Good_for_Lunch">{{trans('lang.good_for_lunch')}}</label>
                            </div>

                            <div class="form-check width-100">
                                <input type="checkbox" id="Live_Music">
                                <label class="col-3 control-label"
                                       for="Live_Music">{{trans('lang.live_music')}}</label>
                            </div>

                            <div class="form-check width-100">
                                <input type="checkbox" id="Outdoor_Seating">
                                <label class="col-3 control-label"
                                       for="Outdoor_Seating">{{trans('lang.outdoor_seating')}}</label>
                            </div>

                            <div class="form-check width-100">
                                <input type="checkbox" id="Takes_Reservations">
                                <label class="col-3 control-label"
                                       for="Takes_Reservations">{{trans('lang.takes_reservations')}}</label>
                            </div>

                            <div class="form-check width-100">
                                <input type="checkbox" id="Vegetarian_Friendly">
                                <label class="col-3 control-label"
                                       for="Vegetarian_Friendly">{{trans('lang.vegetarian_friendly')}}</label>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>{{trans('lang.working_hours')}}</legend>

                        <div class="form-group row">

                            <div class="form-group row width-100">
                                <div class="col-7">
                                    <button type="button"
                                            class="btn btn-primary  add_working_hours_store_btn">
                                        <i></i>{{trans('lang.add_working_hours')}}
                                    </button>
                                </div>
                            </div>
                            <div class="working_hours_div" style="display:none">


                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.sunday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary add_more_sunday"
                                                onclick="addMorehour('Sunday','sunday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>


                                <div class="store_working_hour_Sunday_div store_discount form-group row mt-2"
                                     style="display:none">

                                    <div class="col-12">
                                    <table class="booking-table" id="working_hour_table_Sunday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.monday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary add_more_sunday"
                                                onclick="addMorehour('Monday','monday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_working_hour_Monday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="working_hour_table_Monday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.tuesday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMorehour('Tuesday','tuesday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_working_hour_Tuesday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="working_hour_table_Tuesday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.wednesday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMorehour('Wednesday','wednesday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>


                                <div class="store_working_hour_Wednesday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="working_hour_table_Wednesday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.thursday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMorehour('Thursday','thursday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_working_hour_Thursday_div store_discount form-group row mt-2"
                                     style="display:none">
                                 <div class="col-12">

                                    <table class="booking-table" id="working_hour_table_Thursday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                 </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.friday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMorehour('Friday','friday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_working_hour_Friday_div store_discount form-group row mt-2"
                                     style="display:none">
                                <div class="col-12">

                                    <table class="booking-table" id="working_hour_table_Friday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.Saturday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMorehour('Saturday','Saturday','1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>
                                <div class="store_working_hour_Saturday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="working_hour_table_Saturday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    {{--  <fieldset>
                          <legend>{{trans('lang.store_status')}}</legend>

                          <div class="form-group row">

                              <div class="form-group row width-50">
                                  <div class="form-check width-100">
                                      <input type="checkbox" id="is_open">
                                      <label class="col-3 control-label"
                                             for="is_open">{{trans('lang.Is_Open')}}</label>
                                  </div>
                              </div>

                          </div>
                      </fieldset>--}}

                    {{-- <fieldset>
                         <legend>{{trans('store')}} {{trans('lang.active_deactive')}}</legend>
                         <div class="form-group row">

                             <div class="form-group row width-50">
                                 <div class="form-check width-100">
                                     <input type="checkbox" id="is_active">
                                     <label class="col-3 control-label"
                                            for="is_active">{{trans('lang.active')}}</label>
                                 </div>
                             </div>

                         </div>
                     </fieldset> --}}

                    <fieldset style="display:none">
                        <legend>{{trans('lang.dine_in_future_setting')}}</legend>

                        <div class="form-group row">

                            <div class="form-group row width-100">
                                <div class="form-check width-100">
                                    <input type="checkbox" id="dine_in_feature" class="">
                                    <label class="col-3 control-label"
                                           for="dine_in_feature">{{trans('lang.enable_dine_in_feature')}}</label>
                                </div>
                            </div>
                            <div class="divein_div" style="display:none">


                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                    <div class="col-7">
                                        <input type="time" class="form-control" id="openDineTime" required>
                                    </div>
                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                    <div class="col-7">
                                        <input type="time" class="form-control" id="closeDineTime" required>
                                    </div>
                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">Cost</label>
                                    <div class="col-7">
                                        <input type="number" class="form-control store_cost" required>
                                    </div>
                                </div>
                                <div class="form-group row width-100 store_image">
                                    <label class="col-3 control-label">Menu Card Images</label>
                                    <div class="">
                                        <div id="photos_menu_card"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div>
                                        <input type="file" onChange="handleFileSelectMenuCard(event)">
                                        <div id="uploaded_image_menu"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>{{trans('lang.deliveryCharge')}}</legend>

                        <div class="form-group row">

                            <div class="form-group row width-100">
                                <label class="col-4 control-label">{{
                                        trans('lang.delivery_charges_per_km')}}</label>
                                <div class="col-7">
                                    <input type="number" class="form-control" id="delivery_charges_per_km">
                                </div>
                            </div>
                            <div class="form-group row width-100">
                                <label class="col-4 control-label">{{
                                        trans('lang.minimum_delivery_charges')}}</label>
                                <div class="col-7">
                                    <input type="number" class="form-control" id="minimum_delivery_charges">
                                </div>
                            </div>
                            <div class="form-group row width-100">
                                <label class="col-4 control-label">{{
                                        trans('lang.minimum_delivery_charges_within_km')}}</label>
                                <div class="col-7">
                                    <input type="number" class="form-control"
                                           id="minimum_delivery_charges_within_km">
                                </div>
                            </div>

                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>{{trans('lang.special_offer')}}</legend>

                        <div class="form-group row">

                            <div class="form-group row width-100">
                                <div class="col-7">
                                    <button type="button"
                                            class="btn btn-primary  add_special_offer_store_btn">
                                        <i></i>{{trans('lang.add_special_offer')}}
                                    </button>
                                </div>
                            </div>
                            <div class="special_offer_div" style="display:none">


                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.sunday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary add_more_sunday"
                                                onclick="addMoreButton('Sunday','sunday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>


                                <div class="store_discount_options_Sunday_div store_discount form-group row mt-2"
                                     style="display:none">

                                    <div class="col-12">
                                    <table class="booking-table" id="special_offer_table_Sunday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>

                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>
                                     </div>
                                    </table>
                                </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.monday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary add_more_sunday"
                                                onclick="addMoreButton('Monday','monday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_discount_options_Monday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="special_offer_table_Monday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.tuesday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMoreButton('Tuesday','tuesday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_discount_options_Tuesday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="special_offer_table_Tuesday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>

                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.wednesday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMoreButton('Wednesday','wednesday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>


                                <div class="store_discount_options_Wednesday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="special_offer_table_Wednesday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>

                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.thursday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMoreButton('Thursday','thursday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_discount_options_Thursday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="special_offer_table_Thursday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>

                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.friday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMoreButton('Friday','friday', '1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="store_discount_options_Friday_div store_discount form-group row mt-2"
                                     style="display:none">
                                <div class="col-12">

                                    <table class="booking-table" id="special_offer_table_Friday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>

                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>

                                    </table>
                                </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-1 control-label">{{trans('lang.Saturday')}}</label>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                                onclick="addMoreButton('Satuarday','satuarday','1')">
                                            {{trans('lang.add_more')}}
                                        </button>
                                    </div>
                                </div>
                                <div class="store_discount_options_Satuarday_div store_discount form-group row mt-2"
                                     style="display:none">
                                    <div class="col-12">

                                    <table class="booking-table" id="special_offer_table_Satuarday">
                                        <tr>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
                                            </th>
                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.coupon_discount')}}
                                                    {{trans('lang.type')}}</label></th>

                                            <th>
                                                <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                            </th>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </fieldset>

                </div>
            </div>
        </div>


        <div class="form-group col-12 text-center">
            <button type="button" class="btn btn-primary  create_store_btn"><i class="fa fa-save"></i>
                {{trans('lang.save')}}
            </button>
            <div class="or-line mb-4 ">
                <span>OR</span>
            </div>

            {{--  <div class="new-acc d-flex align-items-center justify-content-center">

                  <a href="{{route('register.phone')}}" class="btn btn-primary" id="btn-signup-phone">

                        <i class="fa fa-phone"> </i> {{trans('lang.signup_with_phone')}}

                  </a>

              </div>--}}
            <a href="{{route('login')}}">

                <p class="text-center m-0">  {{trans('lang.already_an_account')}}  {{trans('lang.sign_in')}}</p>

            </a>
        </div>


    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"
        integrity="sha512-VaRptAfSxXFAv+vx33XixtIVT9A/9unb1Q8fp63y1ljF+Sbka+eMJWoDAArdm7jOYuLQHVx5v60TQ+t3EA8weA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-database.js"></script>
<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>
<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>
<script src="{{ asset('js/crypto-js.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>

<script>
    var database = firebase.firestore();
    var geoFirestore = new GeoFirestore(database);
    var ref_deliverycharge = database.collection('settings').doc("DeliveryCharge");
    var storageRef = firebase.storage().ref('images');
    var photo = "";
    var menuPhotoCount = 0;
    var storeMenuPhotos = "";
    var store_menu_photos = [];
    var storePhoto = '';
    var storeOwnerId = "";
    var storeOwnerOnline = false;
    var photocount = 0;
    var restaurnt_photos = [];
    var ownerphoto = '';
    var workingHours = [];
    var timeslotworkSunday = [];
    var timeslotworkMonday = [];
    var timeslotworkTuesday = [];
    var timeslotworkWednesday = [];
    var timeslotworkFriday = [];
    var timeslotworkSatuarday = [];
    var timeslotworkThursday = [];

    var specialDiscount = [];
    var timeslotSunday = [];
    var timeslotMonday = [];
    var timeslotTuesday = [];
    var timeslotWednesday = [];
    var timeslotFriday = [];
    var timeslotSatuarday = [];
    var timeslotThursday = [];


    var createdAt = firebase.firestore.FieldValue.serverTimestamp();
    var currentCurrency = '';
    var currencyAtRight = false;
    var refCurrency = database.collection('currencies').where('isActive', '==', true);
    var autoAprroveRestaurant = database.collection('settings').doc("restaurant");
    refCurrency.get().then(async function (snapshots) {
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;
    });
    database.collection('settings').doc("specialDiscountOffer").get().then(async function (snapshots) {
        var specialDiscountOffer = snapshots.data();
        specialDiscountOfferisEnable = specialDiscountOffer.isEnable;
    });

    var adminEmail = '';

    var emailSetting = database.collection('settings').doc('emailSetting');
    var email_templates = database.collection('email_templates').where('type', '==', 'new_vendor_signup');

    var emailTemplatesData = null;

    $(document).ready(async function () {

        jQuery("#data-table_processing").show();

        await email_templates.get().then(async function (snapshots) {
            emailTemplatesData = snapshots.docs[0].data();
        });

        await emailSetting.get().then(async function (snapshots) {
            var emailSettingData = snapshots.data();

            adminEmail = emailSettingData.userName;
        });

        database.collection('vendor_categories').where('publish', '==', true).get().then(async function (snapshots) {
            snapshots.docs.forEach((listval) => {
                var data = listval.data();

                $('#store_cuisines').append($("<option></option>")
                    .attr("value", data.id)
                    .text(data.title));
            })
        });

        jQuery("#data-table_processing").hide();

        ref_deliverycharge.get().then(async function (snapshots_charge) {
            var deliveryChargeSettings = snapshots_charge.data();
            try {
                if (deliveryChargeSettings.vendor_can_modify) {
                    $("#delivery_charges_per_km").val(deliveryChargeSettings.delivery_charges_per_km);
                    $("#minimum_delivery_charges").val(deliveryChargeSettings.minimum_delivery_charges);
                    $("#minimum_delivery_charges_within_km").val(deliveryChargeSettings.minimum_delivery_charges_within_km);
                } else {
                    $("#delivery_charges_per_km").val(deliveryChargeSettings.delivery_charges_per_km);
                    $("#minimum_delivery_charges").val(deliveryChargeSettings.minimum_delivery_charges);
                    $("#minimum_delivery_charges_within_km").val(deliveryChargeSettings.minimum_delivery_charges_within_km);
                    $("#delivery_charges_per_km").prop('disabled', true);
                    $("#minimum_delivery_charges").prop('disabled', true);
                    $("#minimum_delivery_charges_within_km").prop('disabled', true);
                }
            } catch (error) {

            }
        });

    })


    $(".create_store_btn").click(function () {

        $(".error_top").hide();

        var storename = $(".store_name").val();
        var cuisines = $("#store_cuisines option:selected").val();
        var storeOwner = $("#store_owners option:selected").val();
        var address = $(".store_address").val();
        var latitude = parseFloat($(".store_latitude").val());
        var longitude = parseFloat($(".store_longitude").val());
        var description = $(".store_description").val();
        var phonenumber = $(".store_phone").val();
        var categoryTitle = $("#store_cuisines option:selected").text();

        var userFirstName = $(".user_first_name").val();
        var userLastName = $(".user_last_name").val();
        var email = $(".user_email").val();
        var password = $(".user_password").val();
        var userPhone = $(".user_phone").val();


        var enabledDiveInFuture = $("#dine_in_feature").is(':checked');
        var reststatus = false;
        var storeCost = $(".store_cost").val();

        var reststatus = false;
        if ($("#is_open").is(':checked')) {
            reststatus = true;
        }

        var store_active = false;

        autoAprroveRestaurant.get().then(async function (snapshots) {
            var storedata = snapshots.data();
            if (storedata.auto_approve_restaurant == true) {
                store_active = true;
            }
        });

        var user_name = userFirstName + " " + userLastName;
        var user_id = "<?php echo uniqid(); ?>";
        var store_id = database.collection("tmp").doc().id;
        var name = userFirstName + " " + userLastName;


        var openDineTime = $("#openDineTime").val();
        var openDineTime_val = $("#openDineTime").val();
        if (openDineTime) {
            openDineTime = new Date('1970-01-01T' + openDineTime + 'Z')
                .toLocaleTimeString('en-US',
                    {timeZone: 'UTC', hour12: true, hour: 'numeric', minute: 'numeric'}
                );
        }

        var closeDineTime = $("#closeDineTime").val();
        var closeDineTime_val = $("#closeDineTime").val();
        if (closeDineTime) {
            closeDineTime = new Date('1970-01-01T' + closeDineTime + 'Z')
                .toLocaleTimeString('en-US',
                    {timeZone: 'UTC', hour12: true, hour: 'numeric', minute: 'numeric'}
                );
        }

        var specialDiscount = [];

        var sunday = {'day': 'Sunday', 'timeslot': timeslotSunday};
        var monday = {'day': 'Monday', 'timeslot': timeslotMonday};
        var tuesday = {'day': 'Tuesday', 'timeslot': timeslotTuesday};
        var wednesday = {'day': 'Wednesday', 'timeslot': timeslotWednesday};
        var thursday = {'day': 'Thursday', 'timeslot': timeslotThursday};
        var friday = {'day': 'Friday', 'timeslot': timeslotFriday};
        var satuarday = {'day': 'Satuarday', 'timeslot': timeslotSatuarday};

        specialDiscount.push(monday);
        specialDiscount.push(tuesday);
        specialDiscount.push(wednesday);
        specialDiscount.push(thursday);
        specialDiscount.push(friday);
        specialDiscount.push(satuarday);
        specialDiscount.push(sunday);

        var workingHours = [];

        var sunday = {'day': 'Sunday', 'timeslot': timeslotworkSunday};
        var monday = {'day': 'Monday', 'timeslot': timeslotworkMonday};
        var tuesday = {'day': 'Tuesday', 'timeslot': timeslotworkTuesday};
        var wednesday = {'day': 'Wednesday', 'timeslot': timeslotworkWednesday};
        var thursday = {'day': 'Thursday', 'timeslot': timeslotworkThursday};
        var friday = {'day': 'Friday', 'timeslot': timeslotworkFriday};
        var satuarday = {'day': 'Satuarday', 'timeslot': timeslotworkSatuarday};

        workingHours.push(monday);
        workingHours.push(tuesday);
        workingHours.push(wednesday);
        workingHours.push(thursday);
        workingHours.push(friday);
        workingHours.push(satuarday);
        workingHours.push(sunday);

        var Free_Wi_Fi = "No";
        if ($("#Free_Wi_Fi").is(":checked")) {
            Free_Wi_Fi = "Yes";
        }
        var Good_for_Breakfast = "No";
        if ($("#Good_for_Breakfast").is(':checked')) {
            Good_for_Breakfast = "Yes";
        }
        var Good_for_Dinner = "No";
        if ($("#Good_for_Dinner").is(':checked')) {
            Good_for_Dinner = "Yes";
        }
        var Good_for_Lunch = "No";
        if ($("#Good_for_Lunch").is(':checked')) {
            Good_for_Lunch = "Yes";
        }
        var Live_Music = "No";
        if ($("#Live_Music").is(':checked')) {
            Live_Music = "Yes";
        }
        var Outdoor_Seating = "No";
        if ($("#Outdoor_Seating").is(':checked')) {
            Outdoor_Seating = "Yes";
        }
        var Takes_Reservations = "No";
        if ($("#Takes_Reservations").is(':checked')) {
            Takes_Reservations = "Yes";
        }
        var Vegetarian_Friendly = "No";
        if ($("#Vegetarian_Friendly").is(':checked')) {
            Vegetarian_Friendly = "Yes";
        }

        var filters_new = {
            "Free Wi-Fi": Free_Wi_Fi,
            "Good for Breakfast": Good_for_Breakfast,
            "Good for Dinner": Good_for_Dinner,
            "Good for Lunch": Good_for_Lunch,
            "Live Music": Live_Music,
            "Outdoor Seating": Outdoor_Seating,
            "Takes Reservations": Takes_Reservations,
            "Vegetarian Friendly": Vegetarian_Friendly
        };

        if (userFirstName == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.enter_owners_name_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (email == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.enter_owners_email')}}</p>");
            window.scrollTo(0, 0);
        } else if (password == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.enter_owners_password_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (userPhone == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.enter_owners_phone')}}</p>");
            window.scrollTo(0, 0);
        } else if (storename == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_name_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (cuisines == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_cuisine_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (phonenumber == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_phone_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (address == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_address_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (isNaN(latitude)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_lattitude_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (latitude < -90 || latitude > 90) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_lattitude_limit_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (isNaN(longitude)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_longitude_error')}}</p>");
            window.scrollTo(0, 0);

        } else if (longitude < -180 || longitude > 180) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_longitude_limit_error')}}</p>");
            window.scrollTo(0, 0);

        } else if (description == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.store_description_error')}}</p>");
            window.scrollTo(0, 0);

        } else {


            var delivery_charges_per_km = parseInt($("#delivery_charges_per_km").val());
            var minimum_delivery_charges = parseInt($("#minimum_delivery_charges").val());
            var minimum_delivery_charges_within_km = parseInt($("#minimum_delivery_charges_within_km").val());
            var DeliveryCharge = {
                'delivery_charges_per_km': delivery_charges_per_km,
                'minimum_delivery_charges': minimum_delivery_charges,
                'minimum_delivery_charges_within_km': minimum_delivery_charges_within_km
            };

            firebase.auth().createUserWithEmailAndPassword(email, password)
                .then(function (firebaseUser) {
                    user_id = firebaseUser.user.uid;
                    database.collection('users').doc(user_id).set({
                        'firstName': userFirstName,
                        'lastName': userLastName,
                        'email': email,
                        'phoneNumber': userPhone,
                        'profilePictureURL': ownerphoto,
                        'role': 'vendor',
                        'id': user_id,
                        'vendorID': store_id,
                        'active': store_active,
                        'createdAt': createdAt
                    }).then(function (result) {

                        coordinates = new firebase.firestore.GeoPoint(latitude, longitude);


                        geoFirestore.collection('vendors').doc(store_id).set({
                            'title': storename,
                            'description': description,
                            'latitude': latitude,
                            'longitude': longitude,
                            'location': address,
                            'photo': storePhoto,
                            'categoryID': cuisines,
                            'phonenumber': phonenumber,
                            'categoryTitle': categoryTitle,
                            'coordinates': coordinates,
                            'id': store_id,
                            'filters': filters_new,
                            'photos': restaurnt_photos,
                            'author': user_id,
                            'authorName': name,
                            'authorProfilePic': ownerphoto,
                            'reststatus': reststatus,
                            hidephotos: false,
                            createdAt: createdAt,
                            'enabledDiveInFuture': enabledDiveInFuture,
                            'storeMenuPhotos': store_menu_photos,
                            'storeCost': storeCost,
                            'openDineTime': openDineTime,
                            'closeDineTime': closeDineTime,
                            'workingHours': workingHours,
                            'specialDiscount': specialDiscount
                        }).then(async function (result) {
                            autoAprroveRestaurant.get().then(async function (snapshots) {
                                var formattedDate = new Date();
                                var month = formattedDate.getMonth() + 1;
                                var day = formattedDate.getDate();
                                var year = formattedDate.getFullYear();

                                month = month < 10 ? '0' + month : month;
                                day = day < 10 ? '0' + day : day;

                                formattedDate = day + '-' + month + '-' + year;

                                var message = emailTemplatesData.message;
                                message = message.replace(/{userid}/g, user_id);
                                message = message.replace(/{username}/g, userFirstName + ' ' + userLastName);
                                message = message.replace(/{useremail}/g, email);
                                message = message.replace(/{userphone}/g, userPhone);
                                message = message.replace(/{date}/g, formattedDate);

                                emailTemplatesData.message = message;

                                var url = "{{url('send-email')}}";

                                var sendEmailStatus = await sendEmail(url, emailTemplatesData.subject, emailTemplatesData.message, [adminEmail]);

                                if (sendEmailStatus) {

                                    var storedata = snapshots.data();
                                    if (storedata.auto_approve_restaurant == false) {
                                        $(".alert-success").show();
                                        $(".alert-success").html("");
                                        $(".alert-success").append("<p>{{trans('lang.signup_waiting_approval')}}</p>");
                                        window.scrollTo(0, 0);
                                        setTimeout(function () {
                                            window.location.href = '{{ route("login")}}';
                                        }, 5000);
                                    } else {
                                        $(".alert-success").show();
                                        $(".alert-success").html("");
                                        $(".alert-success").append("<p>{{trans('lang.thank_you_signup_msg')}}</p>");
                                        window.scrollTo(0, 0);
                                        setTimeout(function () {
                                            window.location.href = '{{ url("/")}}';
                                        }, 5000);
                                    }

                                }
                            });
                        });

                    })

                }).catch(function (error) {

                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>" + error + "</p>");
                window.scrollTo(0, 0);
            });
        }

    })

    $(document).on("click", ".remove-btn", function () {
        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
        firebase.storage().refFromURL(photo_remove).delete();
        $("#photo_" + id).remove();
        index = restaurnt_photos.indexOf(photo_remove);
        if (index > -1) {
            restaurnt_photos.splice(index, 1); // 2nd parameter means remove one item only
        }
    });

    function handleFileSelectowner(evt) {
        var f = evt.target.files[0];
        var reader = new FileReader();

        new Compressor(f, {
            quality: <?php echo env('IMAGE_COMPRESSOR_QUALITY', 0.8); ?>,
            success(result) {
                f = result;

                reader.onload = (function (theFile) {
                    return function (e) {

                        var filePayload = e.target.result;
                        var hash = CryptoJS.SHA256(Math.random() + CryptoJS.SHA256(filePayload));
                        var val = f.name;
                        var ext = val.split('.')[1];
                        var docName = val.split('fakepath')[1];
                        var filename = (f.name).replace(/C:\\fakepath\\/i, '')

                        var timestamp = Number(new Date());
                        var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;

                        var uploadTask = storageRef.child(filename).put(theFile);
                        uploadTask.on('state_changed', function (snapshot) {

                            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                            jQuery("#uploding_image_owner").text("Image is uploading...");
                        }, function (error) {
                        }, function () {
                            uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
                                jQuery("#uploding_image_owner").text("Upload is completed");
                                ownerphoto = downloadURL;

                                $("#uploaded_image_owner").attr('src', ownerphoto);
                                $(".uploaded_image_owner").show();

                            });
                        });

                    };
                })(f);
                reader.readAsDataURL(f);

            },
            error(err) {
            },
        });
    }


    function handleFileSelect(evt, type) {
        var f = evt.target.files[0];
        var reader = new FileReader();

        new Compressor(f, {
            quality: <?php echo env('IMAGE_COMPRESSOR_QUALITY', 0.8); ?>,
            success(result) {
                f = result;

                reader.onload = (function (theFile) {
                    return function (e) {

                        var filePayload = e.target.result;
                        var hash = CryptoJS.SHA256(Math.random() + CryptoJS.SHA256(filePayload));
                        var val = f.name;
                        var ext = val.split('.')[1];
                        var docName = val.split('fakepath')[1];
                        var filename = (f.name).replace(/C:\\fakepath\\/i, '')

                        var timestamp = Number(new Date());
                        var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;

                        var uploadTask = storageRef.child(filename).put(theFile);
                        uploadTask.on('state_changed', function (snapshot) {

                            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                            if (type == "photo") {
                                jQuery("#uploding_image_store").text("Image is uploading...");
                            } else {
                                jQuery("#uploding_image_photos").text("Image is uploading...");
                            }

                        }, function (error) {
                        }, function () {
                            uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {

                                if (type == "photo") {
                                    jQuery("#uploding_image_store").text("Upload is completed");
                                } else {
                                    jQuery("#uploding_image_photos").text("Upload is completed");
                                }

                                photo = downloadURL;
                                if (type == "photo") {
                                    storePhoto = downloadURL;
                                }

                                if (photo) {
                                    if (type == 'photo') {
                                        $("#uploaded_image").attr('src', photo);
                                        $(".uploaded_image").show();
                                    } else if (type == 'photos') {

                                        photocount++;
                                        photos_html = '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn" data-id="' + photocount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                                        $("#photos").append(photos_html);
                                        restaurnt_photos.push(photo);
                                    }
                                }


                            });
                        });

                    };
                })(f);
                reader.readAsDataURL(f);
            },
            error(err) {
            },
        });
    }


    function handleFileSelectMenuCard(evt) {
        var f = evt.target.files[0];
        var reader = new FileReader();

        new Compressor(f, {
            quality: <?php echo env('IMAGE_COMPRESSOR_QUALITY', 0.8); ?>,
            success(result) {
                f = result;

                reader.onload = (function (theFile) {
                    return function (e) {

                        var filePayload = e.target.result;
                        var hash = CryptoJS.SHA256(Math.random() + CryptoJS.SHA256(filePayload));
                        var val = f.name;
                        var ext = val.split('.')[1];
                        var docName = val.split('fakepath')[1];
                        var filename = (f.name).replace(/C:\\fakepath\\/i, '')

                        var timestamp = Number(new Date());
                        var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;

                        var uploadTask = storageRef.child(filename).put(theFile);
                        uploadTask.on('state_changed', function (snapshot) {

                            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;

                            jQuery("#uploaded_image_menu").text("Image is uploading...");


                        }, function (error) {
                        }, function () {
                            uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {

                                jQuery("#uploaded_image_menu").text("Upload is completed");

                                photo = downloadURL;

                                if (photo) {

                                    menuPhotoCount++;
                                    photos_html = '<span class="image-item" id="photo_menu' + menuPhotoCount + '"><span class="remove-btn remove-menu-btn" data-id="' + menuPhotoCount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                                    $("#photos_menu_card").append(photos_html);
                                    store_menu_photos.push(photo);
                                }


                            });
                        });

                    };
                })(f);
                reader.readAsDataURL(f);
            },
            error(err) {
            },
        });
    }

    $("#dine_in_feature").change(function () {
        if (this.checked) {
            $(".divein_div").show();
        } else {
            $(".divein_div").hide();
        }
    });


    $(".add_special_offer_store_btn").click(function () {
        if (specialDiscountOfferisEnable) {
            $(".special_offer_div").show();
        } else {
            alert("{{trans('lang.special_offer_disabled')}}");
            return false;
        }
    })

    var countAddButton = 1;

    function addMoreButton(day, day2, count) {
        count = countAddButton;
        $(".store_discount_options_" + day + "_div").show();

        $('#special_offer_table_' + day + ' tr:last').after('<tr>' +
            '<td class="" style="width:10% !important;"><input type="time" class="form-control" id="openTime' + day + count + '"></td>' +
            '<td class="" style="width:10% !important;"><input type="time" class="form-control" id="closeTime' + day + count + '"></td>' +
            '<td class="" style="width:30%;">' +
            '<input type="number" class="form-control" id="discount' + day + count + '" style="width:60%;">' +
            '<select id="discount_type' + day + count + '" class="form-control" style="width:40%;"><option value="percentage"/>%</option><option value="amount"/>' + currentCurrency + '</option></select>' +
            '</td>' +
            '<td style="width:30%;"><select id="type' + day + count + '" class="form-control"><option value="delivery"/>Delivery Discount</option></select></td>' +
            '<td class="action-btn" style="width:20% !important;">' +
            '<button type="button" class="btn btn-primary save_option_day_button' + day + count + '" onclick="addMoreFunctionButton(`' + day2 + '`,`' + day + '`,' + countAddButton + ')" style="width:90%;">Save</button>' +
            '</td></tr>');
        countAddButton++;

    }

    function addMoreFunctionButton(day1, day2, count) {
        var discount = $("#discount" + day2 + count).val();
        var discount_type = $('#discount_type' + day2 + count).val();
        var type = $('#type' + day2 + count).val();
        var closeTime = $("#closeTime" + day2 + count).val();
        var openTime = $("#openTime" + day2 + count).val();
        if (discount == "" && closeTime == '' && openTime == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid time or discount</p>");
            window.scrollTo(0, 0);
        } else if (discount > 100 || discount == 0) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid discount</p>");
            window.scrollTo(0, 0);
        } else {

            var timeslotVar = {
                'discount': discount,
                'from': openTime,
                'to': closeTime,
                'type': discount_type,
                'discount_type': type
            };

            if (day1 == 'sunday') {
                timeslotSunday.push(timeslotVar);
            } else if (day1 == 'monday') {
                timeslotMonday.push(timeslotVar);
            } else if (day1 == 'tuesday') {
                timeslotTuesday.push(timeslotVar);
            } else if (day1 == 'wednesday') {
                timeslotWednesday.push(timeslotVar);
            } else if (day1 == 'thursday') {
                timeslotThursday.push(timeslotVar);
            } else if (day1 == 'friday') {
                timeslotFriday.push(timeslotVar);
            } else if (day1 == 'satuarday') {
                timeslotSatuarday.push(timeslotVar);
            }

            $(".save_option_day_button" + day2 + count).hide();
            $("#discount" + day2 + count).attr('disabled', "true");
            $("#discount_type" + day2 + count).attr('disabled', "true");
            $("#type" + day2 + count).attr('disabled', "true");
            $("#closeTime" + day2 + count).attr('disabled', "true");
            $("#openTime" + day2 + count).attr('disabled', "true");
        }

    }

    $(".add_working_hours_store_btn").click(function () {
        $(".working_hours_div").show();
    })
    var countAddhours = 1;

    function addMorehour(day, day2, count) {
        count = countAddhours;
        $(".store_working_hour_" + day + "_div").show();

        $('#working_hour_table_' + day + ' tr:last').after('<tr>' +
            '<td class="" style="width:50%;"><input type="time" class="form-control" id="from' + day + count + '"></td>' +
            '<td class="" style="width:50%;"><input type="time" class="form-control" id="to' + day + count + '"></td>' +
            '<td><button type="button" class="btn btn-primary save_option_day_button' + day + count + '" onclick="addMoreFunctionhour(`' + day2 + '`,`' + day + '`,' + countAddhours + ')" style="width:90%;">Save</button>' +
            '</td></tr>');
        countAddhours++;

    }

    function addMoreFunctionhour(day1, day2, count) {
        var to = $("#to" + day2 + count).val();
        var from = $("#from" + day2 + count).val();
        if (to == '' && from == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid time</p>");
            window.scrollTo(0, 0);

        } else {

            var timeslotworkVar = {'from': from, 'to': to,};
            if (day1 == 'sunday') {
                timeslotworkSunday.push(timeslotworkVar);
            } else if (day1 == 'monday') {
                timeslotworkMonday.push(timeslotworkVar);
            } else if (day1 == 'tuesday') {
                timeslotworkTuesday.push(timeslotworkVar);
            } else if (day1 == 'wednesday') {
                timeslotworkWednesday.push(timeslotworkVar);
            } else if (day1 == 'thursday') {
                timeslotworkThursday.push(timeslotworkVar);
            } else if (day1 == 'friday') {
                timeslotworkFriday.push(timeslotworkVar);
            } else if (day1 == 'satuarday') {
                timeslotworkSatuarday.push(timeslotworkVar);
            }

            $(".save_option_day_button" + day2 + count).hide();
            $("#to" + day2 + count).attr('disabled', "true");
            $("#from" + day2 + count).attr('disabled', "true");
        }

    }

    async function sendEmail(url, subject, message, recipients) {

        var checkFlag = false;

        await $.ajax({

            type: 'POST',
            data: {
                subject: subject,
                message: message,
                recipients: recipients
            },
            url: url,
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                checkFlag = true;
            },
            error: function (xhr, status, error) {
                checkFlag = true;
            }
        });

        return checkFlag;

    }
    function chkAlphabets2(event,msg)
	{
		if(!(event.which>=48  && event.which<=57)
		)
		{
		document.getElementById(msg).innerHTML="Accept only Number";
		return false;
		}
		else
		{
		document.getElementById(msg).innerHTML="";
		return true;
		}
	}
    function chkNumbers2(event,msg)
	{
		if(!(event.which>64  && event.which<91 || event.which>96 && event.which<123))
		{
		document.getElementById(msg).innerHTML="Accept only letters";
		return false;
		}
		else
		{
		document.getElementById(msg).innerHTML="";
		return true;
		}
	}


</script>
