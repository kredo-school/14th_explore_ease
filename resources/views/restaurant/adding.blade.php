@extends('layouts.app')

@section('title', 'Adding Restaurant')
@section('content')
@vite(['resources/js/restaurant.js', 'resources/js/restaurantmap.js'])

<div class="container w-50 mt-5 mb-5">
    <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="h1">RESTAURANT INFORMATION</div>
        <div class="border border-dark p-5">
            <div class="mb-3">
                <label for="restaurant_name" class="form-label h3">Restaurant name</label>
                <input type="text" id="restaurant_name" class="form-control" placeholder="Restaurant name" name="restaurant_name">
            </div>
            <div class="mb-3">
                <label for="area" class="form-label h3">Area type</label>
                <select id="area" class="form-select" name="area">
                    <option value="0">Select area</option>
                    @foreach($areatypes as $area)
                        <option value="{{$area->id}}">{{$area->station_name}}({{$area->line_name}})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="restaurant_address" class="form-label h3">Restaurant address</label>
                <input type="text" id="restaurant_address" class="form-control" placeholder="Restaurant address" name="restaurant_address">
            </div>
            <div class="mb-3">
                <label for="restaurant_location" class="form-label h3">Please place the pin accurately at your outlet's location on the map</label>
                <div id="map" class="py-5 bg-secondary" style='width: 100%; height: 300px;'></div>
                <input type="hidden" id="marker-input-latitude" name="latitude"/>
                <input type="hidden" id="marker-input-longitude" name="longitude"/>
            </div>
            <div class="mb-3">
                <label for="open_hours" class="form-label h3">Open hours</label>
                <br>
                <?php
                $days_of_week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Holiday'];
                ?>
                @foreach($days_of_week as $day)
                    <div class="row">
                        <div class="col ms-5">
                            <label for="open_{{$day}}" class="form-label h4">{{$day}}</label>
                        </div>
                        <div class="col ms-3">
                            <select id="open_{{$day}}" class="form-select h4" name="open_{{$day}}">
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                @endfor
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i+12}}:00">{{$i}}:00 p.m.</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="h4">~</div>
                        </div>
                        <div class="col me-5">
                            <select id="close_{{$day}}" class="form-select h4" name="close_{{$day}}">
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                @endfor
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i+12}}:00">{{$i}}:00 p.m.</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                                <input type="checkbox" name="closed_checkbox_{{$day}}"  value="1" id="closed_{{$day}}">
                                <label for="closed_{{$day}}" class="h4">Closed</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="Menu" class="form-label h3">Menu</label><br>
                <textarea type="textarea" id="Menu" rows="4" name="menu" class="form-control"></textarea>
            </div>
            <div class="mb-3" id="course-menu-parent">
                <label for="Course_menu" class="form-label h3">Course Menu</label><br>
                <div class="row mb-3">
                    <div class="col-3">
                            <input type="file" name="course_photo1">
                    </div>
                    <div class="col-9">
                        <input type="text" placeholder="Course Name" name="course_name1" class="form-control course-name">
                        <textarea type="textarea" id="Course_menu" rows="4" name="course_description1" class="form-control" Placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="rounded d-flex justify-content-center align-items-center flex-column" style="height: 150px; background-color: rgba(0,0,0,0.3); cursor: pointer;" onclick="addCourseMenu()">
                        <i class="fa-solid fa-plus h1"></i>Add more
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="seats" class="form-label h3">Seats only reservation</label><br>
                <input type="radio" name="seat" value="available" class="h4"><span class="me-5 h4">Available</span>
                <input type="radio" name="seat" value="unavailable" class="h4"><span class="h4">Unavailable</span>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label h3">Photo</label><br>
                <div class="row">
                    <div class="col-4">
                        <input type="file" name="photo_1">
                    </div>
                    <div class="col-4">
                        <input type="file" name="photo_2">
                    </div>
                    <div class="col-4">
                        <input type="file" name="photo_3">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="foodtype" class="form-label h3">Food type</label>
                <select id="foodtype" class="form-select" name="foodtype">
                    <option value="">Select</option>
                    @foreach($foodtypes as $foodtype)
                        <option value="{{$foodtype->id}}">{{$foodtype->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label h3">Budget</label><br>
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="h4">Lunch</div>
                    </div>
                    <div class="col-auto">
                        <div class="btn-group ms-4" style="width: 200%;" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="L_budget1" autocomplete="off" name="L_budget1">
                            <label class="btn btn-outline-dark" for="L_budget1">￥</label>

                            <input type="checkbox" class="btn-check" id="L_budget2" autocomplete="off" name="L_budget2">
                            <label class="btn btn-outline-dark" for="L_budget2">￥￥</label>

                            <input type="checkbox" class="btn-check" id="L_budget3" autocomplete="off" name="L_budget3">
                            <label class="btn btn-outline-dark" for="L_budget3">￥￥￥</label>

                            <input type="checkbox" class="btn-check" id="L_budget4" autocomplete="off" name="L_budget4">
                            <label class="btn btn-outline-dark" for="L_budget4">￥￥￥￥</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="h4">Dinner</div>
                    </div>
                    <div class="col-auto">
                        <div class="btn-group ms-4" style="width: 200%;" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="D_budget1" autocomplete="off" name="D_budget1">
                            <label class="btn btn-outline-dark" for="D_budget1">￥</label>

                            <input type="checkbox" class="btn-check" id="D_budget2" autocomplete="off" name="D_budget2">
                            <label class="btn btn-outline-dark" for="D_budget2">￥￥</label>

                            <input type="checkbox" class="btn-check" id="D_budget3" autocomplete="off" name="D_budget3">
                            <label class="btn btn-outline-dark" for="D_budget3">￥￥￥</label>

                            <input type="checkbox" class="btn-check" id="D_budget4" autocomplete="off" name="D_budget4">
                            <label class="btn btn-outline-dark" for="D_budget4">￥￥￥￥</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="features" class="form-label h3">Features</label><br>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="gluten_free" name="features1" value="1">
                    <label class="form-check-label" for="gluten_free">Gluten free</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="vegetarian" name="features2" value="2">
                    <label class="form-check-label" for="vegetarian">Vegetarian</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="vegan" name="features3" value="3">
                    <label class="form-check-label" for="vegan">Vegan</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="Islam" name="features4" value="4">
                    <label class="form-check-label" for="Islam">Islam</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="hindu" name="features5" value="5">
                    <label class="form-check-label" for="hindu">Hindu</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="judaism" name="features6" value="6">
                    <label class="form-check-label" for="judaism">Judaism</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="Jainism" name="features7" value="7">
                    <label class="form-check-label" for="Jainism">Jainism</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label h3">Description</label><br>
                <textarea type="textarea" id="description" rows="4" name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label h3">Message to reservation holders</label><br>
                <textarea type="textarea" id="message" rows="4" name="message" class="form-control"></textarea>
            </div>


            <div class="text-center">
                <button type="submit" class="btn-secondary h3 me-5" style="width: 263px; height: 56px;">Cancel</button>
                <button type="submit" class="btn-secondary h3" style="width: 263px; height: 56px;">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection