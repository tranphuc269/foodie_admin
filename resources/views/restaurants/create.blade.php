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
                <li class="breadcrumb-item active">{{trans('lang.create_restaurant')}}</li>
            </ol>
        </div>
        <div>

            <div class="card-body">
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
                                    <input type="text" class="form-control user_phone">
                                    <div class="form-text text-muted w-50">
                                        {{ trans("lang.user_phone_help") }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row width-100">
                                <label class="col-3 control-label">{{trans('lang.restaurant_image')}}</label>
                                <input type="file" onChange="handleFileSelectowner(event)" class="col-7">
                                <div id="uploding_image_owner"></div>
                                <div class="uploaded_image_owner" style="display:none;"><img
                                        id="uploaded_image_owner"
                                        src="" width="150px" height="150px;"></div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>{{trans('lang.restaurant_details')}}</legend>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.restaurant_name')}}</label>
                                <div class="col-7">
                                    <input type="text" class="form-control restaurant_name" required>
                                    <div class="form-text text-muted">
                                        {{ trans("lang.restaurant_name_help") }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.category')}}</label>
                                <div class="col-7">
                                    <select id='restaurant_cuisines' class="form-control" required>
                                        <option value="">{{ trans("lang.select_cuisines") }}</option>
                                    </select>
                                    <div class="form-text text-muted">
                                        {{ trans("lang.restaurant_cuisines_help") }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.restaurant_phone')}}</label>
                                <div class="col-7">
                                    <input type="text" class="form-control restaurant_phone" required>
                                    <div class="form-text text-muted">
                                        {{ trans("lang.restaurant_phone_help") }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.restaurant_address')}}</label>
                                <div class="col-7">
                                    <input type="text" class="form-control restaurant_address" required>
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
                                    <input class="form-control restaurant_latitude" type="number" min="-90"
                                           max="90">
                                    <div class="form-text text-muted">
                                        {{ trans("lang.restaurant_latitude_help") }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.restaurant_longitude')}}</label>
                                <div class="col-7">
                                    <input class="form-control restaurant_longitude" type="number" min="-180"
                                           max="180">
                                    <div class="form-text text-muted">
                                        {{ trans("lang.restaurant_longitude_help") }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.restaurant_image')}}</label>
                                <div class="col-7">
                                    <input type="file" onChange="handleFileSelect(event,'photo')">
                                    <div id="uploding_image_restaurant"></div>
                                    <div class="uploaded_image" style="display:none;"><img id="uploaded_image"
                                                                                           src=""
                                                                                           width="150px"
                                                                                           height="150px;"></div>
                                    <div class="form-text text-muted">
                                        {{ trans("lang.restaurant_image_help") }}
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


                                    <div class="restaurant_discount_options_Sunday_div restaurant_discount mb-5"
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

                                    <div class="restaurant_discount_options_Monday_div restaurant_discount mb-5"
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

                                    <div class="restaurant_discount_options_Tuesday_div restaurant_discount mb-5"
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


                                    <div class="restaurant_discount_options_Wednesday_div restaurant_discount mb-5"
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

                                    <div class="restaurant_discount_options_Thursday_div restaurant_discount mb-5"
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

                                    <div class="restaurant_discount_options_Friday_div restaurant_discount mb-5"
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
                                    <div class="restaurant_discount_options_Saturday_div restaurant_discount mb-5"
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
                            <div class="form-group row">

                                <div class="form-group row width-50">
                                    <div class="form-check width-100">
                                        <input type="checkbox" id="is_active">
                                        <label class="col-3 control-label"
                                               for="is_active">{{trans('lang.active')}}</label>
                                    </div>
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
                            <legend>{{trans('lang.special_offer')}}</legend>

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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Opening_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.Closing_Time')}}</label>
                                                </th>
                                                <th>
                                                    <label
                                                        class="col-3 control-label">{{trans('lang.coupon_discount')}}</label>
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

                            <div class="form-group row width-50 vendor_image">
                                <label class="col-3 control-label">Choose humbling GIF/Image</label>
                                <div class="">
                                    <div id="story_thumbnail"></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div>
                                    <input type="file" id="file" onChange="handleStoryThumbnailFileSelect(event)">
                                    <div id="uploding_story_thumbnail"></div>
                                </div>
                            </div>


                            <div class="form-group row vendor_image">
                                <label class="col-3 control-label">Select Story Video</label>
                                <div class="">
                                    <div id="story_vedios" class="row"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div>
                                    <input type="file" id="video_file" onChange="handleStoryFileSelect(event)">
                                    <div id="uploding_story_video"></div>
                                </div>
                            </div>


                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="form-group col-12 text-center">
                <button type="button" class="btn btn-primary  create_restaurant_btn"><i class="fa fa-save"></i>
                    {{trans('lang.save')}}
                </button>
                <a href="{!! route('restaurants') !!}" class="btn btn-default"><i
                        class="fa fa-undo"></i>{{trans('lang.cancel')}}</a>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"
        integrity="sha512-VaRptAfSxXFAv+vx33XixtIVT9A/9unb1Q8fp63y1ljF+Sbka+eMJWoDAArdm7jOYuLQHVx5v60TQ+t3EA8weA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var createdAt = firebase.firestore.FieldValue.serverTimestamp();
    var database = firebase.firestore();
    var ref_deliverycharge = database.collection('settings').doc("DeliveryCharge");
    var storageRef = firebase.storage().ref('images');
    var photo = "";
    var menuPhotoCount = 0;
    var restaurantMenuPhotos = "";
    var restaurant_menu_photos = [];
    var restaurantPhoto = '';
    var restaurantOwnerId = "";
    var restaurantOwnerOnline = false;
    var photocount = 0;
    var restaurnt_photos = [];
    var ownerphoto = '';
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
    var storevideoDuration = 0;

    var story_vedios = [];
    var story_thumbnail = '';

    var storyCount = 0;
    var storyRef = firebase.storage().ref('Story');
    var storyImagesRef = firebase.storage().ref('Story/images');
    var restaurant_id = database.collection("tmp").doc().id;

    database.collection('settings').doc("story").get().then(async function (snapshots) {
        var story_data = snapshots.data();
        if (story_data.isEnabled) {
            $("#story_upload_div").show();
        }
        storevideoDuration = story_data.videoDuration;
    });

    var email_templates = database.collection('email_templates').where('type', '==', 'new_vendor_signup');

    var emailTemplatesData = null;

    var adminEmail = '';

    var emailSetting = database.collection('settings').doc('emailSetting');


    database.collection('settings').doc("specialDiscountOffer").get().then(async function (snapshots) {
        var specialDiscountOffer = snapshots.data();
        specialDiscountOfferisEnable = specialDiscountOffer.isEnable;
    });

    //var createdAt= firebase.firestore.FieldValue.serverTimestamp();
    var currentCurrency = '';
    var currencyAtRight = false;
    var refCurrency = database.collection('currencies').where('isActive', '==', true);
    refCurrency.get().then(async function (snapshots) {
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;
    });


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
                $('#restaurant_cuisines').append($("<option></option>")
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


    $(".create_restaurant_btn").click(function () {

        $(".error_top").hide();

        var restaurantname = $(".restaurant_name").val();
        var cuisines = $("#restaurant_cuisines option:selected").val();
        var restaurantOwner = $("#restaurant_owners option:selected").val();
        var address = $(".restaurant_address").val();
        var latitude = parseFloat($(".restaurant_latitude").val());
        var longitude = parseFloat($(".restaurant_longitude").val());
        var description = $(".restaurant_description").val();
        var phonenumber = $(".restaurant_phone").val();
        var categoryTitle = $("#restaurant_cuisines option:selected").text();

        var userFirstName = $(".user_first_name").val();
        var userLastName = $(".user_last_name").val();
        var email = $(".user_email").val();
        var password = $(".user_password").val();
        var userPhone = $(".user_phone").val();

        var enabledDiveInFuture = $("#dine_in_feature").is(':checked');
        var enabledPickupFuture = $("#pickup_feature").is(':checked');
        var enabledDeliveryFeatureFuture = $("#delivery_feature").is(':checked');
        var enabledCateringFuture = $("#catering_feature").is(':checked');
        var enabledHomeDiningFuture = $("#home_dining_feature").is(':checked');
        var enabledSpecialOccasionFuture = $("#special_occasion_future").is(':checked');
        var reststatus = true;
        var restaurantCost = $(".restaurant_cost").val();

        var restaurant_active = false;
        if ($("#is_active").is(':checked')) {
            restaurant_active = true;
        }

        var user_name = userFirstName + " " + userLastName;
        var user_id = "<?php echo uniqid(); ?>";
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

        var openDeliveryTime = $("#openDeliveryTime").val();
        var closeDeliveryTime = $("#closeDeliveryTime").val();
        var openCateringTime = $("#openCateringTime").val();
        var closeCateringTime = $("#closeCateringTime").val();
        var openHomeDiningTime = $("#openHomeDiningTime").val();
        var closeHomeDiningTime = $("#closeHomeDiningTime").val();
        var openSpecialOccasionTime = $("#openSpecialOccasionTime").val();
        var closeSpecialOccasionTime = $("#closeSpecialOccasionTime").val();


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
        console.log(filters_new);

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

            if (story_vedios.length > 0 || story_thumbnail != '') {
                if (story_vedios.length > 0 && story_thumbnail == '') {
                    $(".error_top").show();
                    $(".error_top").html("");
                    $(".error_top").append("<p>{{trans('lang.story_error')}}</p>");
                    window.scrollTo(0, 0);
                    return false;
                } else if (story_thumbnail && story_vedios.length == 0) {
                    $(".error_top").show();
                    $(".error_top").html("");
                    $(".error_top").append("<p>{{trans('lang.story_error')}}</p>");
                    window.scrollTo(0, 0);
                    return false;
                } else {
                    database.collection('story').doc(restaurant_id).set({
                        'createdAt': new Date(),
                        'vendorID': restaurant_id,
                        'videoThumbnail': story_thumbnail,
                        'videoUrl': story_vedios,
                    });
                }
            }

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
                        'vendorID': restaurant_id,
                        'active': restaurant_active,
                        'createdAt': createdAt
                    }).then(function (result) {

                        coordinates = new firebase.firestore.GeoPoint(latitude, longitude);


                        geoFirestore.collection('vendors').doc(restaurant_id).set({
                            'title': restaurantname,
                            'description': description,
                            'latitude': latitude,
                            'longitude': longitude,
                            'location': address,
                            'photo': restaurantPhoto,
                            'categoryID': cuisines,
                            'phonenumber': phonenumber,
                            'categoryTitle': categoryTitle,
                            'coordinates': coordinates,
                            'id': restaurant_id,
                            'filters': filters_new,
                            'photos': restaurnt_photos,
                            'author': user_id,
                            'authorName': name,
                            'authorProfilePic': ownerphoto,
                            'reststatus': reststatus,
                            'hidephotos': false,
                            'createdAt': createdAt,
                            'enabledDiveInFuture': enabledDiveInFuture,
                            'enabledPickupFuture': enabledPickupFuture,
                            'enabledDeliveryFeatureFuture': enabledDeliveryFeatureFuture,
                            'enabledCateringFuture': enabledCateringFuture,
                            'enabledHomeDiningFuture': enabledHomeDiningFuture,
                            'enabledSpecialOccasionFuture': enabledSpecialOccasionFuture,
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

                            'workingHours': workingHours,
                            'specialDiscount': specialDiscount,

                        }).then(async function (result) {

                            var formattedDate = new Date();
                            var month = formattedDate.getMonth() + 1;
                            var day = formattedDate.getDate();
                            var year = formattedDate.getFullYear();

                            month = month < 10 ? '0' + month : month;
                            day = day < 10 ? '0' + day : day;

                            formattedDate = day + '-' + month + '-' + year;

                            var message = emailTemplatesData.message;
                            message = message.replace(/{userid}/g, restaurant_id);
                            message = message.replace(/{username}/g, userFirstName + ' ' + userLastName);
                            message = message.replace(/{useremail}/g, email);
                            message = message.replace(/{userphone}/g, phonenumber);

                            message = message.replace(/{date}/g, formattedDate);

                            emailTemplatesData.message = message;

                            var url = "{{url('send-email')}}";

                            var sendEmailStatus = await sendEmail(url, emailTemplatesData.subject, emailTemplatesData.message, [adminEmail]);

                            if (sendEmailStatus) {
                                window.location.href = '{{ route("restaurants")}}';
                            }

                        });

                    })

                }).catch(function (error) {

                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>" + error + "</p>");
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
                        var val = f.name;
                        var ext = val.split('.')[1];
                        var docName = val.split('fakepath')[1];
                        var filename = (f.name).replace(/C:\\fakepath\\/i, '')

                        var timestamp = Number(new Date());
                        var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;

                        var uploadTask = storageRef.child(filename).put(theFile);
                        console.log(uploadTask);
                        uploadTask.on('state_changed', function (snapshot) {

                            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                            console.log('Upload is ' + progress + '% done');
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
                        console.log(uploadTask);
                        uploadTask.on('state_changed', function (snapshot) {

                            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                            console.log('Upload is ' + progress + '% done');
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
                console.log(err.message);
            },
        });
    }

    function handleStoryFileSelect(evt) {
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
                    console.log(uploadTask);
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
        var photo_remove = $(this).attr('data-img');
        firebase.storage().refFromURL(photo_remove).delete();
        $("#story_thumbnail").empty();
        story_thumbnail = '';
        deleteStoryfromCollection();
    });

    function deleteStoryfromCollection() {
        if (story_vedios.length == 0 && story_thumbnail == '') {
            database.collection('story').where('vendorID', '==', restaurant_id).get().then(async function (snapshot) {
                if (snapshot.docs.length > 0) {
                    database.collection('story').doc(restaurant_id).delete();
                }
            });
        }
    }

    function handleStoryThumbnailFileSelect(evt) {

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
                console.log(uploadTask);
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
                        console.log(uploadTask);
                        uploadTask.on('state_changed', function (snapshot) {

                            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                            console.log('Upload is ' + progress + '% done');

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


    $("#delivery_feature").change(function () {
        if (this.checked) {
            $(".delivery_future_div").show();
        } else {
            $(".delivery_future_div").hide();
        }
    });

    $("#catering_feature").change(function () {
        if (this.checked) {
            $(".catering_div").show();
        } else {
            $(".catering_div").hide();
        }
    });

    $("#home_dining_feature").change(function () {
        if (this.checked) {
            $(".home_dining_div").show();
        } else {
            $(".home_dining_div").hide();
        }
    });

    $("#special_occasion_future").change(function () {
        if (this.checked) {
            $(".special_occasion_div").show();
        } else {
            $(".special_occasion_div").hide();
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
        // 	$(".restaurant_opentime_options_"+day).append('<input type="time" class="form-control" id="openTime'+day+'">');
        // $(".restaurant_closetime_options_"+day).append('<input type="time" class="form-control" id="closeTime'+day+'"  >');
        // $(".restaurant_discount_options_"+day).append('<input type="number" class="form-control" id="discount'+day+'">');
        // $(".restaurant_action_options_"+day+"_div").append('<button type="button" class="btn btn-primary save_option_day_button'+day+'" onclick="addMoreFunctionButton(`'+day2+'`,`'+day+'`)" >Save</button>');

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
            console.log(timeslotVar);

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

            /*$("#discount"+day2+"").remove();
        $("#discount_type"+day2+"").remove();
            $("#closeTime"+day2+"").remove();
            $("#openTime"+day2+"").remove();*/
            $(".save_option_day_button" + day2 + count).hide();
            $("#discount" + day2 + count).attr('disabled', "true");
            $("#discount_type" + day2 + count).attr('disabled', "true");
            $("#type" + day2 + count).attr('disabled', "true");
            $("#closeTime" + day2 + count).attr('disabled', "true");
            $("#openTime" + day2 + count).attr('disabled', "true");
        }

    }


    $(".add_working_hours_restaurant_btn").click(function () {
        $(".working_hours_div").show();
    })
    var countAddhours = 1;

    function addMorehour(day, day2, count) {
        count = countAddhours;
        $(".restaurant_discount_options_" + day + "_div").show();
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
            console.log(timeslotworkVar);

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


</script>
@endsection
