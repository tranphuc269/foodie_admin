@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="row page-titles">

        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('lang.restaurant_plural')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a
                            href="{!! route('restaurants') !!}">{{trans('lang.restaurant_plural')}}</a></li>
                <li class="breadcrumb-item active">{{trans('lang.restaurant_edit')}}</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="resttab-sec">
                    <div id="data-table_processing" class="dataTables_processing panel panel-default"
                         style="display: none;">{{trans('lang.processing')}}
                    </div>
                    <div class="error_top"></div>
                    <div class="row restaurant_payout_create">
                        <div class="restaurant_payout_create-inner">

                            <fieldset>
                                <legend>{{trans('lang.admin_area')}}</legend>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.first_name')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control user_first_name" required>
                                        <div class="form-text text-muted">
                                            {{ trans("lang.user_first_name_help") }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.last_name')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control user_last_name">
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

                                {{--
                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.password')}}</label>
                                    <div class="col-7">
                                        <input type="password" class="form-control user_password" required>
                                        <div class="form-text text-muted">
                                            {{ trans("lang.user_password_help") }}
                                        </div>
                                    </div>
                                </div>
                                --}}

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.user_phone')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control user_phone">
                                        <div class="form-text text-muted w-50">
                                            {{ trans("lang.user_phone_help") }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row width-100">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_image')}}</label>
                                    <input type="file" onChange="handleFileSelectowner(event,'vendor')"
                                           class="col-7">
                                    <div id="uploding_image_owner"></div>

                                    <div class="uploaded_image_owner" style="display:none;"><img
                                                id="uploaded_image_owner" src="" width="150px" height="150px;">
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset>
                                <legend>{{trans('lang.restaurant_details')}}</legend>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_name')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control restaurant_name">
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_name_help") }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_cuisines')}}</label>
                                    <div class="col-7">
                                        <select id='restaurant_cuisines' class="form-control">
                                            <option value="">Select Cuisines</option>
                                        </select>
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_cuisines_help") }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_phone')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control restaurant_phone">
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_phone_help") }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_address')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control restaurant_address">
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_address_help") }}
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
                                    <label class="col-3 control-label">{{trans('lang.restaurant_latitude')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control restaurant_latitude">
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_latitude_help") }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row width-50">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_longitude')}}</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control restaurant_longitude">
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_longitude_help") }}
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row width-100">
                                    <label class="col-3 control-label ">{{trans('lang.restaurant_description')}}</label>
                                    <div class="col-7">
                                            <textarea rows="7" class="restaurant_description form-control"
                                                      id="restaurant_description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row width-100">
                                    <label class="col-3 control-label">{{trans('lang.restaurant_image')}}</label>
                                    <div class="col-7">
                                        <input type="file" onChange="handleFileSelect(event,'photo')">
                                        <div id="uploding_image"></div>
                                        <div class="uploaded_image" style="display:none;"><img id="uploaded_image"
                                                                                               src="" width="150px"
                                                                                               height="150px;">
                                        </div>
                                        <div class="form-text text-muted">
                                            {{ trans("lang.restaurant_image_help") }}
                                        </div>
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset>
                                <legend>{{trans('lang.gallery')}}</legend>

                                <div class="form-group row width-50 restaurant_image">
                                    <div class="">
                                        <div id="photos"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div>
                                        <input type="file" id="galleryImage"
                                               onChange="handleFileSelect(event,'photos')">
                                        <div id="uploding_image_photos"></div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
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
                                    <label class="col-12 control-label"
                                           style="color:red;font-size:15px;">{{trans('lang.working_hour_note')}}</label>
                                    <div class="form-group row width-100">
                                        <div class="col-7">
                                            <button type="button"
                                                    class="btn btn-primary  add_working_hours_restaurant_btn">
                                                <i></i>{{trans('lang.add_working_hours')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="working_hours_div" style="display:none">


                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.sunday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary add_more_sunday"
                                                        onclick="addMorehour('Sunday','sunday', '1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>


                                        <div class="restaurant_working_hour_Sunday_div restaurant_discount mb-5"
                                             style="display:none">


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

                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.monday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary add_more_sunday"
                                                        onclick="addMorehour('Monday','monday', '1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>

                                        <div class="restaurant_working_hour_Monday_div restaurant_discount mb-5"
                                             style="display:none">

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
                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.tuesday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="addMorehour('Tuesday','tuesday', '1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>

                                        <div class="restaurant_working_hour_Tuesday_div restaurant_discount mb-5"
                                             style="display:none">

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
                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.wednesday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="addMorehour('Wednesday','wednesday', '1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>


                                        <div class="restaurant_working_hour_Wednesday_div restaurant_discount mb-5"
                                             style="display:none">
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

                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.thursday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="addMorehour('Thursday','thursday', '1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>

                                        <div class="restaurant_working_hour_Thursday_div restaurant_discount mb-5"
                                             style="display:none">
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

                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.friday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="addMorehour('Friday','friday', '1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>

                                        <div class="restaurant_working_hour_Friday_div restaurant_discount mb-5"
                                             style="display:none">
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


                                        <div class="form-group row mb-0">
                                            <label class="col-1 control-label">{{trans('lang.Saturday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="addMorehour('Saturday','Saturday','1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="restaurant_working_hour_Saturday_div restaurant_discount mb-5"
                                             style="display:none">
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
                            </fieldset>


                            <fieldset>
                                <legend>{{trans('restaurant')}} {{trans('lang.active_deactive')}}</legend>
                                <div class="form-group row width-100">
                                    <div class="form-check">
                                        <input type="checkbox" id="is_active">
                                        <label class="col-3 control-label"
                                               for="is_active">{{trans('lang.active')}}</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="reset_password">
                                        <label class="col-3 control-label" for="reset_password">{{trans('lang.reset_restaurant_password')}}</label>
                                        <div class="form-text text-muted w-100 col-12">
                                            {{ trans("lang.note_reset_restaurant_password_email") }}
                                        </div>
                                    </div>

                                    <div class="form-button" style="margin-top: 16px;margin-left: 20px;">
                                        <button type="button" class="btn btn-primary"
                                                id="send_mail">{{trans('lang.send_mail')}}
                                        </button>
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset>
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
                                                <input type="number" class="form-control restaurant_cost" required>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100 restaurant_image">
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
                                <legend>{{trans('lang.pickup_future_setting')}}</legend>

                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <div class="form-check width-100">
                                            <input type="checkbox" id="pickup_feature" class="">
                                            <label class="col-3 control-label"
                                                   for="pickup_feature">{{trans('lang.enable_pickup_feature')}}</label>
                                        </div>
                                    </div>
                                    <div class="pickup_future_div" style="display:none">


                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="openPickupTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="closePickupTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">Cost</label>
                                            <div class="col-7">
                                                <input type="number" class="form-control restaurant_cost" required>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100 restaurant_image">
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
                                <legend>{{trans('lang.delivery_future_setting')}}</legend>

                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <div class="form-check width-100">
                                            <input type="checkbox" id="delivery_feature" class="">
                                            <label class="col-3 control-label"
                                                   for="delivery_feature">{{trans('lang.enable_delivery_feature')}}</label>
                                        </div>
                                    </div>
                                    <div class="delivery_future_div" style="display:none">


                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="openDeliveryTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="closeDeliveryTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">Cost</label>
                                            <div class="col-7">
                                                <input type="number" class="form-control restaurant_cost" required>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100 restaurant_image">
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
                                <legend>{{trans('lang.catering_future_setting')}}</legend>

                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <div class="form-check width-100">
                                            <input type="checkbox" id="catering_feature" class="">
                                            <label class="col-3 control-label"
                                                   for="catering_feature">{{trans('lang.enable_catering_feature')}}</label>
                                        </div>
                                    </div>
                                    <div class="catering_div" style="display:none">


                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            <div class="col-7">
                                                <label for="openCateringTime"></label><input type="time"
                                                                                             class="form-control"
                                                                                             id="openCateringTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="closeCateringTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">Cost</label>
                                            <div class="col-7">
                                                <input type="number" class="form-control restaurant_cost" required>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100 restaurant_image">
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
                                <legend>{{trans('lang.home_dining_future_setting')}}</legend>

                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <div class="form-check width-100">
                                            <input type="checkbox" id="home_dining_feature" class="">
                                            <label class="col-3 control-label"
                                                   for="home_dining_feature">{{trans('lang.enable_home_dining_feature')}}</label>
                                        </div>
                                    </div>
                                    <div class="home_dining_div" style="display:none">


                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="openHomeDiningTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="closeHomeDiningTime" required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">Cost</label>
                                            <div class="col-7">
                                                <input type="number" class="form-control restaurant_cost" required>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100 restaurant_image">
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
                                <legend>{{trans('lang.special_occasion_future_setting')}}</legend>

                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <div class="form-check width-100">
                                            <input type="checkbox" id="special_occasion_future" class="">
                                            <label class="col-3 control-label"
                                                   for="special_occasion_future">{{trans('lang.enable_special_occasion_feature')}}</label>
                                        </div>
                                    </div>
                                    <div class="special_occasion_div" style="display:none">


                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="openSpecialOccasionTime"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                            <div class="col-7">
                                                <input type="time" class="form-control" id="closeSpecialOccasionTime"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group row width-50">
                                            <label class="col-3 control-label">Cost</label>
                                            <div class="col-7">
                                                <input type="number" class="form-control restaurant_cost" required>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100 restaurant_image">
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
                                <legend>{{trans('lang.bankdetails')}}</legend>

                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <label class="col-4 control-label">{{
                                            trans('lang.bank_name')}}</label>
                                        <div class="col-7">
                                            <input type="text" name="bank_name" class="form-control" id="bankName">
                                        </div>
                                    </div>

                                    <div class="form-group row width-100">
                                        <label class="col-4 control-label">{{
                                            trans('lang.branch_name')}}</label>
                                        <div class="col-7">
                                            <input type="text" name="branch_name" class="form-control"
                                                   id="branchName">
                                        </div>
                                    </div>


                                    <div class="form-group row width-100">
                                        <label class="col-4 control-label">{{
                                            trans('lang.holer_name')}}</label>
                                        <div class="col-7">
                                            <input type="text" name="holer_name" class="form-control"
                                                   id="holderName">
                                        </div>
                                    </div>

                                    <div class="form-group row width-100">
                                        <label class="col-4 control-label">{{
                                            trans('lang.account_number')}}</label>
                                        <div class="col-7">
                                            <input type="text" name="account_number" class="form-control"
                                                   id="accountNumber">
                                        </div>
                                    </div>

                                    <div class="form-group row width-100">
                                        <label class="col-4 control-label">{{
                                            trans('lang.other_information')}}</label>
                                        <div class="col-7">
                                            <input type="text" name="other_information" class="form-control"
                                                   id="otherDetails">
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>{{trans('lang.special_offer')}}</legend>

                                <div class="form-group row">
                                    <label class="col-12 control-label" style="color:red;font-size:15px;">NOTE :
                                        Please Click on Edit Button After Making Changes in Special Discount,
                                        Otherwise Data may not Save!! </label>
                                </div>
                                <div class="form-group row">

                                    <div class="form-group row width-100">
                                        <div class="col-7">
                                            <button type="button"
                                                    class="btn btn-primary  add_special_offer_restaurant_btn">
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


                                        <div class="restaurant_discount_options_Sunday_div restaurant_discount"
                                             style="display:none">


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
                                                            {{trans('lang.type')}}</label>
                                                    </th>

                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>

                                            </table>

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

                                        <div class="restaurant_discount_options_Monday_div restaurant_discount"
                                             style="display:none">

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
                                                            {{trans('lang.type')}}</label>
                                                    </th>
                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>
                                            </table>
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

                                        <div class="restaurant_discount_options_Tuesday_div restaurant_discount"
                                             style="display:none">

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
                                                            {{trans('lang.type')}}</label>
                                                    </th>

                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>

                                            </table>
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


                                        <div class="restaurant_discount_options_Wednesday_div restaurant_discount"
                                             style="display:none">
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
                                                            {{trans('lang.type')}}</label>
                                                    </th>

                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>

                                            </table>
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

                                        <div class="restaurant_discount_options_Thursday_div restaurant_discount"
                                             style="display:none">
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
                                                            {{trans('lang.type')}}</label>
                                                    </th>

                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>

                                            </table>
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

                                        <div class="restaurant_discount_options_Friday_div restaurant_discount"
                                             style="display:none">
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
                                                            {{trans('lang.type')}}</label>
                                                    </th>

                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>

                                            </table>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-1 control-label">{{trans('lang.Saturday')}}</label>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="addMoreButton('Saturday','Saturday','1')">
                                                    {{trans('lang.add_more')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="restaurant_discount_options_Saturday_div restaurant_discount"
                                             style="display:none">
                                            <table class="booking-table" id="special_offer_table_Saturday">
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
                                                            {{trans('lang.type')}}</label>
                                                    </th>

                                                    <th>
                                                        <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </fieldset>
                            <fieldset id="story_upload_div" style="display: none;">
                                <legend>Story</legend>

                                <div class="form-group row vendor_image">
                                    <label class="col-12 control-label">Choose humbling GIF/Image</label>
                                    <div class="col-12">
                                        <div id="story_thumbnail" class="row"></div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="file" id="file" onChange="handleStoryThumbnailFileSelect(event)">
                                        <div id="uploding_story_thumbnail"></div>
                                    </div>
                                </div>

                                <div class="restaurant_uploadStory_div">
                                    <div class="form-group row vendor_image">
                                        <label class="col-12 control-label">Select Story Video</label>
                                        <div class="col-12">
                                            <div id="story_vedios" class="row"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input type="file" id="video_file" onChange="handleStoryFileSelect(event)">
                                            <div id="uploding_story_video"></div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group col-12 text-center btm-btn">
                <button type="button" class="btn btn-primary  save_restaurant_btn"><i
                            class="fa fa-save"></i> {{trans('lang.save')}}
                </button>
                <a href="{!! route('restaurants') !!}" class="btn btn-default"><i
                            class="fa fa-undo"></i>{{trans('lang.cancel')}}</a>
            </div>

        </div>
    </div>
</div>


@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"
        integrity="sha512-VaRptAfSxXFAv+vx33XixtIVT9A/9unb1Q8fp63y1ljF+Sbka+eMJWoDAArdm7jOYuLQHVx5v60TQ+t3EA8weA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var id = "<?php echo $id;?>";
    var rest_id = "<?php echo $id;?>";
    var database = firebase.firestore();
    var ref_deliverycharge = database.collection('settings').doc("DeliveryCharge");
    var ref = database.collection('vendors').where("id", "==", id);
    var storageRef = firebase.storage().ref('images');
    var photo = "";
    var restaurnt_photos = "";
    var restaurantOwnerId = "";
    var restaurantOwnerOnline = false;
    var photocount = 0;
    var restaurantPhoto = '';
    var ownerPhoto = '';
    var ownerId = '';
    var menuPhotoCount = 0;
    var restaurantMenuPhotos = "";
    var restaurant_menu_photos = [];
    var placeholderImage = '';

    var workingHours = [];
    var timeslotworkSunday = [];
    var timeslotworkMonday = [];
    var timeslotworkTuesday = [];
    var timeslotworkWednesday = [];
    var timeslotworkFriday = [];
    var timeslotworkSaturday = [];
    var timeslotworkThursday = [];


    var specialDiscount = [];
    var timeslotSunday = [];
    var timeslotMonday = [];
    var timeslotTuesday = [];
    var timeslotWednesday = [];
    var timeslotFriday = [];
    var timeslotSaturday = [];
    var timeslotThursday = [];

    var story_upload_time = [];
    var story_vedios = [];
    var story_thumbnail = '';

    var storevideoDuration = 0;

    var storyCount = 0;
    var storyRef = firebase.storage().ref('Story');
    var storyImagesRef = firebase.storage().ref('Story/images');

    var placeholder = database.collection('settings').doc('placeHolderImage');
    placeholder.get().then(async function (snapshotsimage) {
        var placeholderImageData = snapshotsimage.data();
        placeholderImage = placeholderImageData.image;
    })

    $("#send_mail").click(function () {
        if ($("#reset_password").is(":checked")) {
            var email = $(".user_email").val();
            firebase.auth().sendPasswordResetEmail(email)
                .then((res) => {
                    alert('{{trans("lang.restaurant_mail_sent")}}');
                })
                .catch((error) => {
                    console.log('Error password reset: ', error);
                });
        } else {
            alert('{{trans("lang.error_reset_restaurant_password")}}');
        }
    });

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

    database.collection('settings').doc("story").get().then(async function (snapshots) {
        var story_data = snapshots.data();
        if (story_data.isEnabled) {
            $("#story_upload_div").show();
        }
        storevideoDuration = story_data.videoDuration;
    });

    database.collection('settings').doc("specialDiscountOffer").get().then(async function (snapshots) {
        var specialDiscountOffer = snapshots.data();
        specialDiscountOfferisEnable = specialDiscountOffer.isEnable;
    });

    var currentCurrency = '';
    var currencyAtRight = false;
    var refCurrency = database.collection('currencies').where('isActive', '==', true);
    refCurrency.get().then(async function (snapshots) {
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;
    });
    $(document).ready(function () {

        jQuery("#data-table_processing").show();
        ref.get().then(async function (snapshots) {
            try {

                var restaurant = snapshots.docs[0].data();
                var name = restaurant.authorName.split(" ");
                $(".user_first_name").val(name[0]);
                $(".user_last_name").val(name[1]);
                $(".user_phone").val(restaurant.phonenumber);
                $(".restaurant_name").val(restaurant.title);
                if (restaurant.filters) {
                    $(".restaurant_cuisines").val(restaurant.filters.Cuisine);

                }
                $(".restaurant_address").val(restaurant.location);
                $(".restaurant_latitude").val(restaurant.latitude);
                $(".restaurant_longitude").val(restaurant.longitude);
                $(".restaurant_description").val(restaurant.description);
                if (restaurant.photo) {
                    if (restaurant.photo !== '') {
                        $("#uploaded_image").attr('src', restaurant.photo);
                        $(".uploaded_image").show();
                    } else {
                        $("#uploaded_image").attr('src', placeholderImage);
                        $(".uploaded_image").show();
                    }
                } else {
                    $("#uploaded_image").attr('src', placeholderImage);
                    $(".uploaded_image").show();
                }

                if (restaurant.openDineTime) {
                    restaurant.openDineTime = moment(restaurant.openDineTime, 'hh:mm A').format('HH:mm');
                }

                if (restaurant.closeDineTime) {
                    restaurant.closeDineTime = moment(restaurant.closeDineTime, 'hh:mm A').format('HH:mm');
                }
                $("#openDineTime").val(restaurant.openDineTime);
                $("#closeDineTime").val(restaurant.closeDineTime);


                if (restaurant.openDeliveryTime) {
                    restaurant.openDeliveryTime = moment(restaurant.openDeliveryTime, 'hh:mm A').format('HH:mm');
                }

                if (restaurant.closeDeliveryTime) {
                    restaurant.closeDeliveryTime = moment(restaurant.closeDeliveryTime, 'hh:mm A').format('HH:mm');
                }
                $("#openDeliveryTime").val(restaurant.openDeliveryTime);
                $("#closeDeliveryTime").val(restaurant.closeDeliveryTime);

                if (restaurant.openCateringTime) {
                    restaurant.openCateringTime = moment(restaurant.openCateringTime, 'hh:mm A').format('HH:mm');
                }

                if (restaurant.closeCateringTime) {
                    restaurant.closeCateringTime = moment(restaurant.closeCateringTime, 'hh:mm A').format('HH:mm');
                }
                $("#openCateringTime").val(restaurant.openCateringTime);
                $("#closeCateringTime").val(restaurant.closeCateringTime);

                if (restaurant.openHomeDiningTime) {
                    restaurant.openHomeDiningTime = moment(restaurant.openHomeDiningTime, 'hh:mm A').format('HH:mm');
                }

                if (restaurant.closeHomeDiningTime) {
                    restaurant.closeHomeDiningTime = moment(restaurant.closeHomeDiningTime, 'hh:mm A').format('HH:mm');
                }
                $("#openHomeDiningTime").val(restaurant.openHomeDiningTime);
                $("#closeHomeDiningTime").val(restaurant.closeHomeDiningTime);

                if (restaurant.openSpecialOccasionTime) {
                    restaurant.openSpecialOccasionTime = moment(restaurant.openSpecialOccasionTime, 'hh:mm A').format('HH:mm');
                }

                if (restaurant.closeSpecialOccasionTime) {
                    restaurant.closeSpecialOccasionTime = moment(restaurant.closeSpecialOccasionTime, 'hh:mm A').format('HH:mm');
                }
                $("#openSpecialOccasionTime").val(restaurant.openSpecialOccasionTime);
                $("#closeSpecialOccasionTime").val(restaurant.closeSpecialOccasionTime);

                if (restaurant.hasOwnProperty('enabledDiveInFuture')) {
                    if (restaurant.enabledDiveInFuture) {
                        $("#dine_in_feature").prop("checked", true);
                    }
                }

                restaurantPhoto = restaurant.photo;
                if (restaurant.hasOwnProperty('restaurantMenuPhotos')) {
                    restaurantMenuPhotos = restaurant.restaurantMenuPhotos;
                }

                if (restaurant.hasOwnProperty('restaurantCost')) {
                    $(".restaurant_cost").val(restaurant.restaurantCost);
                }

                for (var key in restaurant.filters) {

                    if (key == "Free Wi-Fi" && restaurant.filters[key] == "Yes") {
                        $("#Free_Wi_Fi").prop("checked", true);
                    }
                    if (key == "Good for Breakfast" && restaurant.filters[key] == "Yes") {
                        $("#Good_for_Breakfast").prop("checked", true);
                    }
                    if (key == "Good for Dinner" && restaurant.filters[key] == "Yes") {
                        $("#Good_for_Dinner").prop("checked", true);
                    }
                    if (key == "Good for Lunch" && restaurant.filters[key] == "Yes") {
                        $("#Good_for_Lunch").prop("checked", true);
                    }
                    if (key == "Live Music" && restaurant.filters[key] == "Yes") {
                        $("#Live_Music").prop("checked", true);
                    }
                    if (key == "Outdoor Seating" && restaurant.filters[key] == "Yes") {
                        $("#Outdoor_Seating").prop("checked", true);
                    }
                    if (key == "Takes Reservations" && restaurant.filters[key] == "Yes") {
                        $("#Takes_Reservations").prop("checked", true);
                    }
                    if (key == "Vegetarian Friendly" && restaurant.filters[key] == "Yes") {
                        $("#Vegetarian_Friendly").prop("checked", true);
                    }


                }

                if (restaurant.hasOwnProperty('specialDiscount')) {
                    for (i = 0; i < restaurant.specialDiscount.length; i++) {
                        var day = restaurant.specialDiscount[i]['day'];

                        if (restaurant.specialDiscount[i]['timeslot'].length != 0) {
                            for (j = 0; j < restaurant.specialDiscount[i]['timeslot'].length; j++) {
                                console.log(restaurant.specialDiscount[i]['timeslot'])
                                $(".restaurant_discount_options_" + day + "_div").show();
                                var timeslot = restaurant.specialDiscount[i]['timeslot'][j];
                                var discount = restaurant.specialDiscount[i]['timeslot'][j]['discount'];
                                var TimeslotVar = {
                                    'discount': timeslot[`discount`],
                                    'from': timeslot[`from`],
                                    'to': timeslot[`to`],
                                    'type': timeslot[`type`],
                                    'discount_type': timeslot[`discount_type`]
                                };
                                if (day == 'Sunday') {
                                    timeslotSunday.push(TimeslotVar);
                                } else if (day == 'Monday') {
                                    timeslotMonday.push(TimeslotVar);
                                } else if (day == 'Tuesday') {
                                    timeslotTuesday.push(TimeslotVar);
                                } else if (day == 'Wednesday') {
                                    timeslotWednesday.push(TimeslotVar);
                                } else if (day == 'Thursday') {
                                    timeslotThursday.push(TimeslotVar);
                                } else if (day == 'Friday') {
                                    timeslotFriday.push(TimeslotVar);
                                } else if (day == 'Saturday') {
                                    timeslotSaturday.push(TimeslotVar);
                                }


                                $('#special_offer_table_' + day + ' tr:last').after('<tr>' +
                                    '<td class="" style="width:10%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`from`] + '" id="openTime' + day + j + i + '"></td>' +
                                    '<td class="" style="width:10%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`to`] + '" id="closeTime' + day + j + i + '"></td>' +
                                    '<td class="" style="width:30%;">' +
                                    '<input type="number" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`discount`] + '" style="width:60%;" id="discount' + day + j + i + '">' +
                                    '<select id="discount_type' + day + j + i + '" class="form-control ' + i + '_' + j + '_row"  style="width:40%;"><option value="percentage"/>%</option><option value="amount"/>' + currentCurrency + '</option></select></td>' +
                                    '<td style="width:30%;"><select id="type' + day + j + i + '" class="form-control ' + i + '_' + j + '_row"><option value="delivery"/>Delivery Discount</option><option value="dinein"/>Dine-In Discount</option></select>' +
                                    '</td>' +
                                    '<td class="action-btn" style="width:20%;">' +
                                    '<button type="button" class="btn btn-primary ' + i + '_' + j + '_row"  onclick="updateMoreFunctionButton(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-edit"></i></button>' +
                                    '&nbsp;&nbsp;<button type="button" class="btn btn-primary ' + i + '_' + j + '_row" onclick="deleteOffer(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-trash"></i></button>' +
                                    '</td></tr>');

                                if (timeslot[`type`] == 'amount') {
                                    $('#discount_type' + day + j + i).val(timeslot[`type`]);
                                }
                                if (timeslot[`discount_type`] == 'dinein') {
                                    $('#type' + day + j + i).val(timeslot[`discount_type`]);
                                }
                            }
                            $('.special_offer_div').css('display', 'block');
                        }
                    }
                }
                console.log(restaurant)

                if (restaurant.hasOwnProperty('workingHours')) {

                    for (i = 0; i < restaurant.workingHours.length; i++) {
                        var day = restaurant.workingHours[i]['day'];
                        if (restaurant.workingHours[i]['timeslot'].length != 0) {
                            for (j = 0; j < restaurant.workingHours[i]['timeslot'].length; j++) {
                                $(".restaurant_working_hour_" + day + "_div").show();
                                var timeslot = restaurant.workingHours[i]['timeslot'][j];

                                var discount = restaurant.workingHours[i]['timeslot'][j]['discount'];
                                var TimeslotHourVar = {'from': timeslot[`from`], 'to': timeslot[`to`]};
                                if (day == 'Sunday') {
                                    timeslotworkSunday.push(TimeslotHourVar);
                                } else if (day == 'Monday') {
                                    timeslotworkMonday.push(TimeslotHourVar);
                                } else if (day == 'Tuesday') {
                                    timeslotworkTuesday.push(TimeslotHourVar);
                                } else if (day == 'Wednesday') {
                                    timeslotworkWednesday.push(TimeslotHourVar);
                                } else if (day == 'Thursday') {
                                    timeslotworkThursday.push(TimeslotHourVar);
                                } else if (day == 'Friday') {
                                    timeslotworkFriday.push(TimeslotHourVar);
                                } else if (day == 'Saturday') {
                                    timeslotworkSaturday.push(TimeslotHourVar);
                                }

                                $('#working_hour_table_' + day + ' tr:last').after('<tr>' +
                                    '<td class="" style="width:50%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`from`] + '" id="from' + day + j + i + '" ></td>' +
                                    '<td class="" style="width:50%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`to`] + '" id="to' + day + j + i + '" ></td>' +
                                    '<td class="action-btn" style="width:20%;">' +
                                    '<button type="button" class="btn btn-primary ' + i + '_' + j + '_row workingHours_' + i + '_' + j + '"  onclick="updatehoursFunctionButton(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-edit"></i></button>' +
                                    '&nbsp;&nbsp;<button type="button" class="btn btn-primary ' + i + '_' + j + '_row" onclick="deleteWorkingHour(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-trash"></i></button>' +
                                    '</td></tr>');


                            }
                            $('.working_hours_div').css('display', 'block');
                        }
                    }
                }

                restaurnt_photos = restaurant.photos;
                var photos = '';
                var menuCardPhotos = ''
                restaurant.photos.forEach((photo) => {
                    photocount++;
                    photos = photos + '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn remove-photo-btn" data-id="' + photocount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                })
                if (photos) {
                    $("#photos").html(photos);
                } else {
                    $("#photos").html('<p>photos not available.</p>');
                }
                if (restaurant.hasOwnProperty('restaurantMenuPhotos')) {
                    restaurant_menu_photos = restaurant.restaurantMenuPhotos;
                    restaurant.restaurantMenuPhotos.forEach((photo) => {
                        menuPhotoCount++;
                        menuCardPhotos = menuCardPhotos + '<span class="image-item" id="photo_menu' + menuPhotoCount + '"><span class="remove-btn remove-menu-btn" data-id="' + menuPhotoCount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                    })
                }


                if (menuCardPhotos) {
                    $("#photos_menu_card").html(menuCardPhotos);
                } else {
                    $("#photos_menu_card").html('<p>Menu card photos not available.</p>');
                }


                restaurantOwnerOnline = restaurant.isActive;
                if (restaurant.hasOwnProperty('enabledDiveInFuture') && restaurant.enabledDiveInFuture == true) {
                    $(".divein_div").show();
                }


                photo = restaurant.photo;
                restaurantOwnerId = restaurant.author;
                await database.collection('users').where("id", "==", restaurant.author).get().then(async function (snapshots) {
                    snapshots.docs.forEach((listval) => {
                        var user = listval.data();

                        ownerId = user.id;
                        ownerphoto = user.profilePictureURL
                        $(".user_first_name").val(user.firstName);
                        $(".user_last_name").val(user.lastName);
                        $(".user_email").val(user.email);
                        $(".user_phone").val(user.phoneNumber);
                        if (user.profilePictureURL != '') {
                            $("#uploaded_image_owner").attr('src', user.profilePictureURL);
                            $(".uploaded_image_owner").show();
                        } else {
                            $("#uploaded_image_owner").attr('src', placeholderImage);
                            $(".uploaded_image_owner").show();
                        }

                        if (user.active) {
                            restaurant_active = true;
                            $("#is_active").prop("checked", true);
                        }

                        if (user.userBankDetails) {
                            if (user.userBankDetails.bankName != undefined) {
                                $("#bankName").val(user.userBankDetails.bankName);
                            }
                            if (user.userBankDetails.branchName != undefined) {
                                $("#branchName").val(user.userBankDetails.branchName);
                            }
                            if (user.userBankDetails.holderName != undefined) {
                                $("#holderName").val(user.userBankDetails.holderName);
                            }
                            if (user.userBankDetails.accountNumber != undefined) {
                                $("#accountNumber").val(user.userBankDetails.accountNumber);
                            }
                            if (user.userBankDetails.otherDetails != undefined) {
                                $("#otherDetails").val(user.userBankDetails.otherDetails);
                            }
                        }

                    })

                });

                await database.collection('vendor_categories').where('publish', '==', true).get().then(async function (snapshots) {
                    snapshots.docs.forEach((listval) => {
                        var data = listval.data();
                        if (data.id == restaurant.categoryID) {
                            $('#restaurant_cuisines').append($("<option selected></option>")
                                .attr("value", data.id)
                                .text(data.title));
                        } else {
                            $('#restaurant_cuisines').append($("<option></option>")
                                .attr("value", data.id)
                                .text(data.title));
                        }
                    })

                });


                if (restaurant.hasOwnProperty('phonenumber')) {
                    $(".restaurant_phone").val(restaurant.phonenumber);
                }
                if (restaurant.DeliveryCharge) {
                    $("#delivery_charges_per_km").val(restaurant.DeliveryCharge.delivery_charges_per_km);
                    $("#minimum_delivery_charges").val(restaurant.DeliveryCharge.minimum_delivery_charges);
                    $("#minimum_delivery_charges_within_km").val(restaurant.DeliveryCharge.minimum_delivery_charges_within_km);
                }

                await getRestaurantStory(restaurant.id);

                if (story_vedios.length > 0) {
                    var html = '';
                    for (var i = 0; i < story_vedios.length; i++) {
                        html += '<div class="col-md-3" id="story_div_' + i + '">\n' +
                            '<div class="video-inner"><video width="320px" height="240px"\n' +
                            '                                   controls="controls">\n' +
                            '                            <source src="' + story_vedios[i] + '"\n' +
                            '            type="video/mp4"></video><span class="remove-story-video" data-id="' + i + '" data-img="' + story_vedios[i] + '"><i class="fa fa-remove"></i></span></div></div>';

                    }
                    jQuery("#story_vedios").append(html);
                }

                if (story_thumbnail) {

                    html = '<div class="col-md-3"><div class="thumbnail-inner"><span class="remove-story-thumbnail" data-img="' + story_thumbnail + '"><i class="fa fa-remove"></i></span><img id="story_thumbnail_image" src="' + story_thumbnail + '" width="150px" height="150px;"></div></div>';
                    jQuery("#story_thumbnail").html(html);

                }

            } catch (error) {

            }


            jQuery("#data-table_processing").hide();
        })


        async function getRestaurantStory(restaurantId) {
            await database.collection('story').where('vendorID', '==', restaurantId).get().then(async function (snapshots) {

                if (snapshots.docs.length > 0) {

                    var story_data = snapshots.docs[0].data();

                    story_vedios = story_data.videoUrl;
                    story_thumbnail = story_data.videoThumbnail;

                }
            });
        }

        $(".save_restaurant_btn").click(function () {

            var restaurantname = $(".restaurant_name").val();
            var cuisines = $("#restaurant_cuisines option:selected").val();
            var address = $(".restaurant_address").val();
            var latitude = parseFloat($(".restaurant_latitude").val());
            var longitude = parseFloat($(".restaurant_longitude").val());
            var description = $(".restaurant_description").val();
            var phonenumber = $(".restaurant_phone").val();
            var categoryTitle = $("#restaurant_cuisines option:selected").text();

            var userFirstName = $(".user_first_name").val();
            var userLastName = $(".user_last_name").val();
            var email = $(".user_email").val();
            var userPhone = $(".user_phone").val();
            var enabledDiveInFuture = $("#dine_in_feature").is(':checked');
            var reststatus = true;
            var restaurantCost = $(".restaurant_cost").val();

            var specialDiscount = [];

            var sunday = {'day': 'Sunday', 'timeslot': timeslotSunday};
            var monday = {'day': 'Monday', 'timeslot': timeslotMonday};
            var tuesday = {'day': 'Tuesday', 'timeslot': timeslotTuesday};
            var wednesday = {'day': 'Wednesday', 'timeslot': timeslotWednesday};
            var thursday = {'day': 'Thursday', 'timeslot': timeslotThursday};
            var friday = {'day': 'Friday', 'timeslot': timeslotFriday};
            var Saturday = {'day': 'Saturday', 'timeslot': timeslotSaturday};

            specialDiscount.push(monday);
            specialDiscount.push(tuesday);
            specialDiscount.push(wednesday);
            specialDiscount.push(thursday);
            specialDiscount.push(friday);
            specialDiscount.push(Saturday);
            specialDiscount.push(sunday);

            var workingHours = [];

            var sunday = {'day': 'Sunday', 'timeslot': timeslotworkSunday};
            var monday = {'day': 'Monday', 'timeslot': timeslotworkMonday};
            var tuesday = {'day': 'Tuesday', 'timeslot': timeslotworkTuesday};
            var wednesday = {'day': 'Wednesday', 'timeslot': timeslotworkWednesday};
            var thursday = {'day': 'Thursday', 'timeslot': timeslotworkThursday};
            var friday = {'day': 'Friday', 'timeslot': timeslotworkFriday};
            var Saturday = {'day': 'Saturday', 'timeslot': timeslotworkSaturday};

            workingHours.push(monday);
            workingHours.push(tuesday);
            workingHours.push(wednesday);
            workingHours.push(thursday);
            workingHours.push(friday);
            workingHours.push(Saturday);
            workingHours.push(sunday);


            var restaurant_active = false;
            if ($("#is_active").is(':checked')) {
                restaurant_active = true;
            }

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

            const openDeliveryTime = $("#openDeliveryTime").val();
            const closeDeliveryTime = $("#closeDeliveryTime").val();
            const openCateringTime = $("#openCateringTime").val();
            const closeCateringTime = $("#closeCateringTime").val();
            const openHomeDiningTime = $("#openHomeDiningTime").val();
            const closeHomeDiningTime = $("#closeHomeDiningTime").val();
            const openSpecialOccasionTime = $("#openSpecialOccasionTime").val();
            const closeSpecialOccasionTime = $("#closeSpecialOccasionTime").val();

            var Free_Wi_Fi = "No";
            if ($("#Free_Wi_Fi").is(':checked')) {
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
            } else if (userPhone == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.enter_owners_phone')}}</p>");
                window.scrollTo(0, 0);
            } else if (restaurantname == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_name_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (cuisines == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_cuisine_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (phonenumber == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_phone_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (address == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_address_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (isNaN(latitude)) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_lattitude_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (latitude < -90 || latitude > 90) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_lattitude_limit_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (isNaN(longitude)) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_longitude_error')}}</p>");
                window.scrollTo(0, 0);

            } else if (longitude < -180 || longitude > 180) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_longitude_limit_error')}}</p>");
                window.scrollTo(0, 0);

            } else if (description == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.restaurant_description_error')}}</p>");
                window.scrollTo(0, 0);

            } else {


                var bankName = $("#bankName").val();
                var branchName = $("#branchName").val();
                var holderName = $("#holderName").val();
                var accountNumber = $("#accountNumber").val();
                var otherDetails = $("#otherDetails").val();
                var userBankDetails = {
                    'bankName': bankName,
                    'branchName': branchName,
                    'holderName': holderName,
                    'accountNumber': accountNumber,
                    'accountNumber': accountNumber,
                    'otherDetails': otherDetails,
                };

                var delivery_charges_per_km = parseInt($("#delivery_charges_per_km").val());
                var minimum_delivery_charges = parseInt($("#minimum_delivery_charges").val());
                var minimum_delivery_charges_within_km = parseInt($("#minimum_delivery_charges_within_km").val());
                var DeliveryCharge = {
                    'delivery_charges_per_km': delivery_charges_per_km,
                    'minimum_delivery_charges': minimum_delivery_charges,
                    'minimum_delivery_charges_within_km': minimum_delivery_charges_within_km
                };
                coordinates = new firebase.firestore.GeoPoint(latitude, longitude);


                database.collection('users').doc(ownerId).update({
                    'firstName': userFirstName,
                    'lastName': userLastName,
                    'email': email,
                    'phoneNumber': userPhone,
                    'profilePictureURL': ownerphoto,
                    'active': restaurant_active,
                    'userBankDetails': userBankDetails
                }).then(function (result) {


                    geoFirestore.collection('vendors').doc(id).update({
                        'title': restaurantname,
                        'description': description,
                        'latitude': latitude,
                        'longitude': longitude,
                        'location': address,
                        'photo': restaurantPhoto,
                        'photos': restaurnt_photos,
                        'categoryID': cuisines,
                        'phonenumber': phonenumber,
                        'categoryTitle': categoryTitle,
                        'coordinates': coordinates,
                        'filters': filters_new,
                        'reststatus': reststatus,
                        'enabledDiveInFuture': enabledDiveInFuture,
                        'restaurantMenuPhotos': restaurant_menu_photos,
                        'restaurantCost': restaurantCost,
                        'openDineTime': openDineTime,
                        'closeDineTime': closeDineTime,

                        'openDeliveryTime': openDeliveryTime,
                        'closeDeliveryTime': closeDeliveryTime,

                        'openCateringTime': openCateringTime,
                        'closeCateringTime': closeCateringTime,

                        'openHomeDiningTime': openHomeDiningTime,
                        'closeHomeDiningTime': closeHomeDiningTime,

                        'openSpecialOccasionTime': openSpecialOccasionTime,
                        'closeSpecialOccasionTime': closeSpecialOccasionTime,

                        'DeliveryCharge': DeliveryCharge,
                        'specialDiscount': specialDiscount,
                        'workingHours': workingHours,
                    }).then(function (result) {

                        if (story_vedios.length > 0 || story_thumbnail != '') {

                            if (story_vedios.length > 0 && story_thumbnail == '') {
                                $(".error_top").show();
                                $(".error_top").html("");
                                $(".error_top").append("<p>{{trans('lang.story_error')}}</p>");
                                window.scrollTo(0, 0);
                            } else if (story_thumbnail && story_vedios.length == 0) {
                                $(".error_top").show();
                                $(".error_top").html("");
                                $(".error_top").append("<p>{{trans('lang.story_error')}}</p>");
                                window.scrollTo(0, 0);
                            } else {
                                database.collection('story').doc(id).set({
                                    'createdAt': new Date(),
                                    'vendorID': id,
                                    'videoThumbnail': story_thumbnail,
                                    'videoUrl': story_vedios,
                                }).then(function (result) {
                                    window.location.href = '{{ route("restaurants")}}';
                                });
                            }

                        } else {
                            window.location.href = '{{ route("restaurants")}}';
                        }

                    });
                })

            }

        })
    })

    function handleStoryFileSelect(evt) {

        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }

        var f = evt.target.files[0];
        var reader = new FileReader();

        var story_video_duration = $("#story_video_duration").val();
        var isVideo = document.getElementById('video_file');
        var videoValue = isVideo.value;
        var allowedExtensions = /(\.mp4)$/i;
        ;

        if (!allowedExtensions.exec(videoValue)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Error: Invalid video type</p>");
            window.scrollTo(0, 0);
            isVideo.value = '';
            return false;
        }

        var video = document.createElement('video');


        video.preload = 'metadata';

        video.onloadedmetadata = function () {

            window.URL.revokeObjectURL(video.src);


            if (video.duration > storevideoDuration) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>Error: Story video duration maximum allow to " + storevideoDuration + " seconds</p>");
                window.scrollTo(0, 0);
                evt.target.value = '';
                return false;
            }


            reader.onload = (function (theFile) {

                return function (e) {

                    var filePayload = e.target.result;
                    var val = f.name;
                    var ext = val.split('.')[1];
                    var docName = val.split('fakepath')[1];
                    var filename = (f.name).replace(/C:\\fakepath\\/i, '')

                    var timestamp = Number(new Date());
                    var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;

                    var uploadTask = storyRef.child(filename).put(theFile);

                    uploadTask.on('state_changed', function (snapshot) {

                        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                        console.log('Upload is ' + progress + '% done');
                        jQuery("#uploding_story_video").text("video is uploading...");

                    }, function (error) {
                    }, function () {
                        uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
                            jQuery("#uploding_story_video").text("Upload is completed");
                            setTimeout(function () {
                                jQuery("#uploding_story_video").empty();
                            }, 3000);

                            var nextCount = $("#story_vedios").children().length;
                            html = '<div class="col-md-3" id="story_div_' + nextCount + '">\n' +
                                '<div class="video-inner"><video width="320px" height="240px"\n' +
                                '                                   controls="controls">\n' +
                                '                            <source src="' + downloadURL + '"\n' +
                                '            type="video/mp4"></video><span class="remove-story-video" data-id="' + nextCount + '" data-img="' + downloadURL + '"><i class="fa fa-remove"></i></span></div></div>';

                            jQuery("#story_vedios").append(html);
                            story_vedios.push(downloadURL);
                            $("#video_file").val('');
                        });
                    });
                };
            })(f);

            reader.readAsDataURL(f);
        }
        video.src = URL.createObjectURL(f);
    }

    $(document).on("click", ".remove-story-video", function () {

        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }

        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
        firebase.storage().refFromURL(photo_remove).delete();
        $("#story_div_" + id).remove();
        index = story_vedios.indexOf(photo_remove);
        $("#video_file").val('');
        if (index > -1) {
            story_vedios.splice(index, 1); // 2nd parameter means remove one item only
        }

        var newhtml = '';
        if (story_vedios.length > 0) {
            for (var i = 0; i < story_vedios.length; i++) {
                newhtml += '<div class="col-md-3" id="story_div_' + i + '">\n' +
                    '<div class="video-inner"><video width="320px" height="240px"\n' +
                    'controls="controls">\n' +
                    '<source src="' + story_vedios[i] + '"\n' +
                    'type="video/mp4"></video><span class="remove-story-video" data-id="' + i + '" data-img="' + story_vedios[i] + '"><i class="fa fa-remove"></i></span></div></div>';
            }
        }
        jQuery("#story_vedios").html(newhtml);
        deleteStoryfromCollection();
    });

    $(document).on("click", ".remove-story-thumbnail", function () {

        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }

        var photo_remove = $(this).attr('data-img');
        firebase.storage().refFromURL(photo_remove).delete();
        $("#story_thumbnail").empty();
        story_thumbnail = '';
        deleteStoryfromCollection();
    });

    function deleteStoryfromCollection() {
        if (story_vedios.length == 0 && story_thumbnail == '') {
            database.collection('story').where('vendorID', '==', id).get().then(async function (snapshot) {
                if (snapshot.docs.length > 0) {
                    database.collection('story').doc(id).delete();
                }
            });
        }
    }

    function handleStoryThumbnailFileSelect(evt) {

        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }

        var f = evt.target.files[0];
        var reader = new FileReader();
        var fileInput =
            document.getElementById('file');

        var filePath = fileInput.value;

        // Allowing file type
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        ;

        if (!allowedExtensions.exec(filePath)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Error: Invalid File type</p>");
            window.scrollTo(0, 0);
            fileInput.value = '';
            return false;
        }

        reader.onload = (function (theFile) {
            return function (e) {

                var filePayload = e.target.result;
                var val = f.name;
                var ext = val.split('.')[1];
                var docName = val.split('fakepath')[1];
                var filename = (f.name).replace(/C:\\fakepath\\/i, '')

                var timestamp = Number(new Date());
                var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;

                var uploadTask = storyImagesRef.child(filename).put(theFile);

                uploadTask.on('state_changed', function (snapshot) {

                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    console.log('Upload is ' + progress + '% done');
                    jQuery("#uploding_story_thumbnail").text("Image is uploading...");
                }, function (error) {

                }, function () {
                    uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
                        jQuery("#uploding_story_thumbnail").text("Upload is completed");
                        setTimeout(function () {
                            jQuery("#uploding_story_thumbnail").empty();
                        }, 3000);
                        var html = '<div class="col-md-3"><div class="thumbnail-inner"><span class="remove-story-thumbnail" data-img="' + downloadURL + '"><i class="fa fa-remove"></i></span><img id="story_thumbnail_image" src="' + downloadURL + '" width="150px" height="150px;"></div></div>';
                        jQuery("#story_thumbnail").html(html);
                        story_thumbnail = downloadURL;
                        $("#file").val('');
                    });
                });

            };
        })(f);
        reader.readAsDataURL(f);
    }

    $(document).on("click", ".remove-photo-btn", function () {
        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
        firebase.storage().refFromURL(photo_remove).delete();
        $("#photo_" + id).remove();
        index = restaurnt_photos.indexOf(photo_remove);
        if (index > -1) {
            restaurnt_photos.splice(index, 1); // 2nd parameter means remove one item only
        }
    });

    $(document).on("click", ".remove-menu-btn", function () {
        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
        firebase.storage().refFromURL(photo_remove).delete();
        $("#photo_menu" + id).remove();
        index = restaurant_menu_photos.indexOf(photo_remove);
        if (index > -1) {
            restaurant_menu_photos.splice(index, 1); // 2nd parameter means remove one item only
        }
    });

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
                                jQuery("#uploding_image_restaurant").text("Image is uploading...");
                            } else {
                                jQuery("#uploding_image_photos").text("Image is uploading...");
                            }

                        }, function (error) {
                        }, function () {
                            uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {

                                if (type == "photo") {
                                    jQuery("#uploding_image_restaurant").text("Upload is completed");
                                } else {
                                    jQuery("#uploding_image_photos").text("Upload is completed");
                                }

                                photo = downloadURL;
                                if (type == "photo") {
                                    restaurantPhoto = downloadURL;
                                }

                                if (photo) {
                                    if (type == 'photo') {
                                        $("#uploaded_image").attr('src', photo);
                                        $(".uploaded_image").show();
                                    } else if (type == 'photos') {

                                        photocount++;
                                        photos_html = '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn remove-photo-btn" data-id="' + photocount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
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
                console.log(err.message);
            },
        });
    }

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
                console.log(err.message);
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
                                    restaurant_menu_photos.push(photo);
                                }


                            });
                        });

                    };
                })(f);
                reader.readAsDataURL(f);

            },
            error(err) {
                console.log(err.message);
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

    $(".add_special_offer_restaurant_btn").click(function () {
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
        $(".restaurant_discount_options_" + day + "_div").show();

        $('#special_offer_table_' + day + ' tr:last').after('<tr>' +
            '<td class="" style="width:10%;"><input type="time" class="form-control" id="openTime' + day + count + '"></td>' +
            '<td class="" style="width:10%;"><input type="time" class="form-control" id="closeTime' + day + count + '"></td>' +
            '<td class="" style="width:30%;">' +
            '<input type="number" class="form-control" id="discount' + day + count + '" style="width:60%;">' +
            '<select id="discount_type' + day + count + '" class="form-control" style="width:40%;"><option value="percentage"/>%</option><option value="amount"/>' + currentCurrency + '</option></select>' +
            '</td>' +
            '<td style="width:30%;"><select id="type' + day + count + '" class="form-control"><option value="delivery"/>Delivery Discount</option><option value="dinein"/>Dine-In Discount</option></select></td>' +
            '<td class="action-btn" style="width:20%;">' +
            '<button type="button" class="btn btn-primary save_option_day_button' + day + count + '" onclick="addMoreFunctionButton(`' + day2 + '`,`' + day + '`,' + countAddButton + ')" style="width:62%;"><i class="fa fa-save"></i> Save</button>' +
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
            } else if (day1 == 'Saturday') {
                timeslotSaturday.push(timeslotVar);
            }

            $(".save_option_day_button" + day2 + count).hide();
            $("#discount" + day2 + count).attr('disabled', "true");
            $("#discount_type" + day2 + count).attr('disabled', "true");
            $("#type" + day2 + count).attr('disabled', "true");
            $("#closeTime" + day2 + count).attr('disabled', "true");
            $("#openTime" + day2 + count).attr('disabled', "true");
        }

    }

    function updateMoreFunctionButton(day, rowCount, dayCount) {
        var discount = $("#discount" + day + rowCount + dayCount + "").val();
        var discount_type = $('#discount_type' + day + rowCount + dayCount + "").val();
        var type = $('#type' + day + rowCount + dayCount + "").val();
        var closeTime = $("#closeTime" + day + rowCount + dayCount + "").val();
        var openTime = $("#openTime" + day + rowCount + dayCount + "").val();
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
            if (day == 'Sunday') {
                console.log(timeslotSunday[rowCount]);
                timeslotSunday[rowCount] = timeslotVar;
            } else if (day == 'Monday') {
                console.log(timeslotMonday[rowCount]);
                timeslotMonday[rowCount] = timeslotVar;

            } else if (day == 'Tuesday') {

                console.log(timeslotTuesday[rowCount]);
                timeslotTuesday[rowCount] = timeslotVar;
            } else if (day == 'Wednesday') {
                console.log(timeslotWednesday[rowCount]);
                timeslotWednesday[rowCount] = timeslotVar;


            } else if (day == 'Thursday') {
                console.log(timeslotThursday[rowCount]);
                timeslotThursday[rowCount] = timeslotVar;

            } else if (day == 'Friday') {
                console.log(timeslotFriday[rowCount]);
                timeslotFriday[rowCount] = timeslotVar;

            } else if (day == 'Saturday') {
                console.log(timeslotSaturday[rowCount]);
                timeslotSaturday[rowCount] = timeslotVar;
            }
        }

    }

    function deleteOffer(day, count, i) {
        $('.' + i + '_' + count + '_row').hide();
        if (day == 'Sunday') {
            timeslotSunday.splice(count, 1);
        } else if (day == 'Monday') {
            timeslotMonday.splice(count, 1);
        } else if (day == 'Tuesday') {
            timeslotTuesday.splice(count, 1);
        } else if (day == 'Wednesday') {
            timeslotWednesday.splice(count, 1);
        } else if (day == 'Thursday') {
            timeslotThursday.splice(count, 1);
        } else if (day == 'Friday') {
            timeslotFriday.splice(count, 1);
        } else if (day == 'Saturday') {
            timeslotSaturday.splice(count, 1);
        }

        var specialDiscount = [];
        var sunday = {'day': 'Sunday', 'timeslot': timeslotSunday};
        var monday = {'day': 'Monday', 'timeslot': timeslotMonday};
        var tuesday = {'day': 'Tuesday', 'timeslot': timeslotTuesday};
        var wednesday = {'day': 'Wednesday', 'timeslot': timeslotWednesday};
        var thursday = {'day': 'Thursday', 'timeslot': timeslotThursday};
        var friday = {'day': 'Friday', 'timeslot': timeslotFriday};
        var Saturday = {'day': 'Saturday', 'timeslot': timeslotSaturday};

        specialDiscount.push(monday);
        specialDiscount.push(tuesday);
        specialDiscount.push(wednesday);
        specialDiscount.push(thursday);
        specialDiscount.push(friday);
        specialDiscount.push(Saturday);
        specialDiscount.push(sunday);


        database.collection('vendors').doc(id).update({'specialDiscount': specialDiscount}).then(function (result) {

        });
    }

    $(".add_working_hours_restaurant_btn").click(function () {
        $(".working_hours_div").show();
    })
    var countAddhours = 1;

    function addMorehour(day, day2, count) {
        count = countAddhours;
        $(".restaurant_working_hour_" + day + "_div").show();

        $('#working_hour_table_' + day + ' tr:last').after('<tr>' +
            '<td class="" style="width:50%;"><input type="time" class="form-control" id="from' + day + count + '"></td>' +
            '<td class="" style="width:50%;"><input type="time" class="form-control" id="to' + day + count + '"></td>' +
            '<td><button type="button" class="btn btn-primary save_option_day_button' + day + count + '" onclick="addMoreFunctionhour(`' + day2 + '`,`' + day + '`,' + countAddhours + ')" style="width:62%;"><i class="fa fa-save" title="Save""></i></button>' +
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
            } else if (day1 == 'Saturday') {
                timeslotworkSaturday.push(timeslotworkVar);
            }

            $(".save_option_day_button" + day2 + count).hide();
            $("#to" + day2 + count).attr('disabled', "true");
            $("#from" + day2 + count).attr('disabled', "true");
        }

    }

    function deleteWorkingHour(day, count, i) {
        $('.' + i + '_' + count + '_row').hide();
        if (day == 'Sunday') {
            timeslotworkSunday.splice(count, 1);
        } else if (day == 'Monday') {
            timeslotworkMonday.splice(count, 1);
        } else if (day == 'Tuesday') {
            timeslotworkTuesday.splice(count, 1);
        } else if (day == 'Wednesday') {
            timeslotworkWednesday.splice(count, 1);
        } else if (day == 'Thursday') {
            timeslotworkThursday.splice(count, 1);
        } else if (day == 'Friday') {
            timeslotworkFriday.splice(count, 1);
        } else if (day == 'Saturday') {
            timeslotworkSaturday.splice(count, 1);
        }

        var workingHours = [];
        var sunday = {'day': 'Sunday', 'timeslot': timeslotworkSunday};
        var monday = {'day': 'Monday', 'timeslot': timeslotworkMonday};
        var tuesday = {'day': 'Tuesday', 'timeslot': timeslotworkTuesday};
        var wednesday = {'day': 'Wednesday', 'timeslot': timeslotworkWednesday};
        var thursday = {'day': 'Thursday', 'timeslot': timeslotworkThursday};
        var friday = {'day': 'Friday', 'timeslot': timeslotworkFriday};
        var Saturday = {'day': 'Saturday', 'timeslot': timeslotworkSaturday};

        workingHours.push(monday);
        workingHours.push(tuesday);
        workingHours.push(wednesday);
        workingHours.push(thursday);
        workingHours.push(friday);
        workingHours.push(Saturday);
        workingHours.push(sunday);


        database.collection('vendors').doc(id).update({'workingHours': workingHours}).then(function (result) {

        });
    }

    function updatehoursFunctionButton(day, rowCount, dayCount) {
        var to = $("#to" + day + rowCount + dayCount + "").val();
        var from = $("#from" + day + rowCount + dayCount + "").val();
        if (to == '' && from == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid time </p>");
            window.scrollTo(0, 0);

        } else {

            var timeslotworkVar = {'from': from, 'to': to};
            if (day == 'Sunday') {
                console.log(timeslotworkSunday[rowCount]);
                timeslotworkSunday[rowCount] = timeslotworkVar;
            } else if (day == 'Monday') {
                console.log(timeslotworkMonday[rowCount]);
                timeslotworkMonday[rowCount] = timeslotworkVar;

            } else if (day == 'Tuesday') {

                console.log(timeslotworkTuesday[rowCount]);
                timeslotworkTuesday[rowCount] = timeslotworkVar;
            } else if (day == 'Wednesday') {
                console.log(timeslotworkWednesday[rowCount]);
                timeslotworkWednesday[rowCount] = timeslotworkVar;


            } else if (day == 'Thursday') {
                console.log(timeslotworkThursday[rowCount]);
                timeslotworkThursday[rowCount] = timeslotworkVar;

            } else if (day == 'Friday') {
                console.log(timeslotworkFriday[rowCount]);
                timeslotworkFriday[rowCount] = timeslotworkVar;

            } else if (day == 'Saturday') {
                console.log(timeslotworkSaturday[rowCount]);
                timeslotworkSaturday[rowCount] = timeslotworkVar;
            }
        }

    }
</script>
@endsection
