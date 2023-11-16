@extends('layouts.app')

@section('title', 'Adding Restaurant')
@section('content')
@vite(['resources/js/restaurant.js', 'resources/js/restaurantmap.js'])

<div class="container" style="width: 1000px;">
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
                    <option value="">Select area</option>
                    <option value="">Ginza</option>
                    <option value="">Shibuya</option>
                    <option value="">Ikebukuro</option>
                    <option value="">Shinjuku</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="restaurant_address" class="form-label h3">Restaurant address</label>
                <input type="text" id="restaurant_address" class="form-control" placeholder="Restaurant address" name="restaurant_address">
            </div>
            <div class="mb-3">
                <label for="restaurant_location" class="form-label h3">Please place the pin accurately at your outlet's location on the map</label>
                <div id="map" class="py-5 bg-secondary" style='width: 100%; height: 300px;'>ここにどうやってlatitudeとlongitudeを取り出すnameを入れるのか</div>
            </div>
            <div class="mb-3">
                <label for="open_hours" class="form-label h3">Open hours</label>
                <br>
                <?php
                $days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Holidays'];
                ?>
                @foreach($days_of_week as $day)
                    <div class="row">
                        <div class="col ms-5">
                            <label for="open_{{$day}}" class="form-label h4">{{$day}}</label>
                        </div>
                        <div class="col ms-3">
                            <select id="open_{{$day}}" class="form-select h4">
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i}}:00" name="open_{{$days}}">{{$i}}:00 a.m.</option>
                                @endfor
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i}}:00" name="open_{{$day}}">{{$i}}:00 p.m.</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="h4">~</div>
                        </div>
                        <div class="col me-5">
                            <select id="close_{{$day}}" class="form-select h4">
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                @endfor
                                @for($i=0; $i<12; $i++)
                                <option value="{{$i}}:00">{{$i}}:00 p.m.</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                                <input type="radio" name="closed_{{$day}}" value="closed_{{$day}}" id="closed_{{$day}}">
                                <label for="closed_{{$day}}" class="h4">Closed</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="Menu" class="form-label h3">Menu</label><br>
                <textarea type="textarea" id="Menu" rows="4" name="Menu" class="form-control"></textarea>
            </div>
            <div class="mb-3" id="course-menu-parent">
                <label for="Course_menu" class="form-label h3">Course Menu</label><br>
                <div class="row mb-3">
                    <div class="col-3">
                            <input type="file" name="photo">
                    </div>
                    <div class="col-9">
                        <textarea type="textarea" id="Course_menu" rows="4" name="Course_menu" class="form-control" Placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="rounded d-flex justify-content-center align-items-center flex-column" style="height: 150px; background-color: rgba(0,0,0,0.3); cursor: pointer;" onclick="addCourseMenu()">
                        <i class="fa-solid fa-circle-plus h1"></i>Add more
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="seats" class="form-label h3">Seats only reservation</label><br>
                <input type="radio" name="seats" value="available" class="h4"><span class="me-5 h4">Available</span>
                <input type="radio" name="seats" value="unavailable" class="h4"><span class="h4">Unavailable</span>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label h3">Photo</label><br>
                <div class="row">
                    <div class="col-4">
                        <input type="file" name="photo">
                    </div>
                    <div class="col-4">
                        <input type="file" name="photo">
                    </div>
                    <div class="col-4">
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="foodtype" class="form-label h3">Food type</label>
                <select id="foodtype" class="form-select">
                    <option value="">Select</option>
                    <option value="">Japanese food</option>
                    <option value="">Chinese food</option>
                    <option value="">Korean food</option>
                    <option value="">Italian</option>
                    <option value="">French</option>
                    <option value="">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label h3">Budget</label><br>
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="h4">Lunch</div>
                    </div>
                    <div class="col-auto">
                        <div class="btn-group" style="width: 800px;" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="budget1" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget1">￥</label>

                            <input type="checkbox" class="btn-check" id="budget2" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget2">￥￥</label>

                            <input type="checkbox" class="btn-check" id="budget3" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget3">￥￥￥</label>

                            <input type="checkbox" class="btn-check" id="budget4" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget4">￥￥￥￥</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="h4">Dinner</div>
                    </div>
                    <div class="col-auto">
                        <div class="btn-group" style="width: 800px;" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="budget1" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget1">￥</label>

                            <input type="checkbox" class="btn-check" id="budget2" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget2">￥￥</label>

                            <input type="checkbox" class="btn-check" id="budget3" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget3">￥￥￥</label>

                            <input type="checkbox" class="btn-check" id="budget4" autocomplete="off">
                            <label class="btn btn-outline-dark" for="budget4">￥￥￥￥</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="features" class="form-label h3">Features</label><br>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="vegan" name="features" value="vegan">
                    <label class="form-check-label" for="vegan">Vegan</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="vegetable" name="features" value="vegetable">
                    <label class="form-check-label" for="vegetable">Vegetable</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="haral" name="features" value="haral">
                    <label class="form-check-label" for="haral">Haral</label>
                </div>
                <div class="form-check-inline h4">
                    <input class="form-check-input" type="checkbox" id="gluten" name="features" value="gluten">
                    <label class="form-check-label" for="gluten">Gluten</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="descritpiont" class="form-label h3">Description</label><br>
                <textarea type="textarea" id="description" rows="4" name="dexcription" class="form-control"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn-secondary h3 me-5" style="width: 263px; height: 56px;">Cancel</button>
                <button type="submit" class="btn-secondary h3" style="width: 263px; height: 56px;">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection