@extends('layouts.app')

@section('title', 'Edit Restaurant')
@section('content')
@vite(['resources/js/restaurant.js', 'resources/js/restaurantmap.js'])

<div class="container" style="width: 50%;">
    <form action="{{ route('restaurant.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="h1">RESTAURANT INFORMATION</div>
        <div class="border border-dark p-5">
            <div class="mb-3">
                <label for="restaurant_name" class="form-label h3">Restaurant name</label>
                <input type="text" id="restaurant_name" class="form-control" value="{{$restaurant->name}}" name="restaurant_name">
            </div>
            <div class="mb-3">
                <label for="area" class="form-label h3">Area type</label>
                <select id="area" class="form-select" name="area">
                    <option value="0">Select area</option>
                    @foreach($areatypes as $area)
                        @if($area == $restaurant->areatype)
                            <option value="{{$area->id}}" selected>{{$area->station_name}}({{$area->line_name}})</option>
                        @else
                            <option value="{{$area->id}}">{{$area->station_name}}({{$area->line_name}})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="restaurant_address" class="form-label h3">Restaurant address</label>
                <input type="text" id="restaurant_address" class="form-control" value="{{$restaurant->address}}" name="restaurant_address">
            </div>
            <div class="mb-3">
                <label for="restaurant_location" class="form-label h3">Please place the pin accurately at your outlet's location on the map</label>
                <div id="map" lat="{{$restaurant->latitude}}" lng="{{$restaurant->longitude}}" class="py-5 bg-secondary" style='width: 100%; height: 300px;' onload="initializeMarker()"></div>
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
                                        @if(!empty($openhours[$loop->index]->openinghours) && $openhours[$loop->index]->openinghours ==  $i.":00:00")
                                            <option value="{{$i}}:00" selected>{{$i}}:00 a.m.</option>
                                        @else
                                            <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                        @endif
                                    @endfor
                                    @for($i=0; $i<12; $i++)
                                        @if(!empty($openhours[$loop->index]->openinghours) && $openhours[$loop->index]->openinghours == $i+12 .":00:00")
                                            <option value="{{$i+12}}:00" selected>{{$i}}:00 p.m.</option>
                                        @else
                                            <option value="{{$i+12}}:00">{{$i}}:00 p.m.</option>
                                        @endif
                                    @endfor
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="h4">~</div>
                        </div>
                        <div class="col me-5">
                            <select id="close_{{$day}}" class="form-select h4" name="close_{{$day}}">
                                @for($i=0; $i<12; $i++)
                                    @if(!empty($openhours[$loop->index]->closinghours) && $openhours[$loop->index]->closinghours == $i.":00:00")
                                        <option value="{{$i}}:00" selected>{{$i}}:00 a.m.</option>
                                    @else
                                        <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                    @endif
                                @endfor
                                @for($i=0; $i<12; $i++)
                                    @if(!empty($openhours[$loop->index]->closinghours) && $openhours[$loop->index]->closinghours == $i+12 .":00:00")
                                        <option value="{{$i+12}}:00" selected>{{$i}}:00 p.m.</option>
                                    @else
                                        <option value="{{$i+12}}:00">{{$i}}:00 p.m.</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            @if(!empty($openhours[$loop->index]->closed) && $openhours[$loop->index]->closed == 1)
                                <input type="checkbox" name="closed_checkbox_{{$day}}"  value="1" id="closed_{{$day}}" checked>
                                <label for="closed_{{$day}}" class="h4">Closed</label>
                            @else
                                <input type="checkbox" name="closed_checkbox_{{$day}}"  value="1" id="closed_{{$day}}">
                                <label for="closed_{{$day}}" class="h4">Closed</label>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="Menu" class="form-label h3">Menu</label><br>
                @if(!empty($restaurant->menu))
                    <textarea type="textarea" id="Menu" rows="4" name="menu" class="form-control">{{$restaurant->menu}}</textarea>
                @else
                    <textarea type="textarea" id="Menu" rows="4" name="menu" class="form-control">Menu</textarea>
                @endif
            </div>

            <div class="mb-3" id="course-menu-parent">
                <label for="Course_menu" class="form-label h3">Course Menu</label><br>
                @if(!empty($restaurant->courses))
                    @foreach($courses as $key => $course)
                        <div class="row mb-3">
                            <div class="col-3">
                                <img src="{{$course->photo}}" alt="course_photo".$key+1 class="w-75">
                                <input type="file" name="course_photo".$key+1 href="{{$course->photo}}">
                            </div>
                            <div class="col-9">
                                <input type="text" placeholder="{{$course->name}}" name="course_name".$key+1 class="form-control course-name">
                                <textarea type="textarea" id="Course_menu" rows="4" name="course_description1" class="form-control">{{$course->description}}</textarea>
                            </div>
                        </div>
                    @endforeach
                    <!--This course_name number should be more than 2. need to fix.-->
                    <div class="row mb-3">
                    <div class="rounded d-flex justify-content-center align-items-center flex-column" style="height: 150px; background-color: rgba(0,0,0,0.3); cursor: pointer;" onclick="addCourseMenu()">
                        <i class="fa-solid fa-circle-plus h1"></i>Add more
                    </div>
                @else
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
                        <i class="fa-solid fa-circle-plus h1"></i>Add more
                    </div>
                @endif
                </div>
            </div>
            
            <div class="mb-3">
                <label for="seats" class="form-label h3">Seats only reservation</label><br>
                @if(!empty($restaurant->seat))
                    <input type="radio" name="seat" value="available" class="h4" checked="checked"><span class="me-5 h4">Available</span>
                    <input type="radio" name="seat" value="unavailable" class="h4"><span class="h4">Unavailable</span>
                @else
                    <input type="radio" name="seat" value="available" class="h4"><span class="me-5 h4">Available</span>
                    <input type="radio" name="seat" value="unavailable" class="h4" checked="checked"><span class="h4">Unavailable</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label h3">Photo</label><br>
                <div class="row">
                    @php($a = 0)
                    @while($a < 3)
                        @php($data = false)
                        @if($restaurant_photos == true)
                            @foreach($restaurant_photos as $key => $photo)
                                @if($photo->photoindex == $a+1)
                                <div class="col-4">
                                    <img src="{{$photo->photo}}" alt="" class="w-75">
                                    <input type="file" name="photo_".$key+1>
                                </div>
                                @php($data = true)
                                @endif
                            @endforeach
                        @endif
                        @if($data == false)
                                <div class="col-4">
                                    <input type="file" name="photo_{{$a+1}}">
                                </div>
                        @endif
                        @php($a++)
                    @endwhile
                </div>
            </div>

            <div class="mb-3">
                <label for="foodtype" class="form-label h3">Food type</label>
                <select id="foodtype" class="form-select" name="foodtype">
                    <option value="0">Select</option>
                    @foreach($foodtypes as $foodtype)
                        @if($foodtype == $restaurant->foodtype)
                            <option value="{{$foodtype->id}}" selected>{{$foodtype->name}}</option>
                        @endif
                            <option value="{{$foodtype->id}}">{{$foodtype->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label h3">Budget</label><br>
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="h4">Lunch</div>
                    </div><br>
                    <div class="col-8">
                        <div class="btn-group ms-4" style="width: 125%;" role="group" aria-label="Basic checkbox toggle button group">
                            @php($index = 0)
                            @php($isFound = false)
                            @while($index < 4)
                                @php($isFound = false)
                                @foreach($budgets as $key => $budget)
                                    @if($budget->timezonetype == 1 && $budget->budgetindex == $index+1)
                                        <input type="checkbox" class="btn-check" id="{{'L_budget'.$key+1}}" autocomplete="off" name="{{'L_budget'.$key+1}}" checked>
                                        <label class="btn btn-outline-dark" for="{{'L_budget'.$key+1}}">{!! str_replace("\\",'￥', $budget->budgetvalue) !!}</label>
                                        @php($isFound = true)
                                    @endif 
                                @endforeach
                                @php($index++)
                                @if(!$isFound)
                                    <input type="checkbox" class="btn-check" id="L_budget".$key+1 autocomplete="off" name="{{'L_budget'.$key+1}}">
                                    <label class="btn btn-outline-dark" for="{{'L_budget'.$key+1}}">{{ Str::limit("￥￥￥￥", $index*2, '') }}</label>
                                @endif
                            @endwhile
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="h4">Dinner</div>
                    </div><br>
                    <div class="col-8">
                        <div class="btn-group ms-4" style="width: 125%;" role="group" aria-label="Basic checkbox toggle button group">
                            @php($index=0)
                            @while($index < 4)
                                @php($isFound = false)
                                @foreach($budgets as $key => $budget)
                                    @if($budget->timezonetype == 2 && $budget->budgetindex == $index+1)
                                        <input type="checkbox" class="btn-check" id="{{'D_budget'.$key+1}}" autocomplete="off" name="{{'D_budget'.$key+1}}" checked>
                                        <label class="btn btn-outline-dark" for="{{'D_budget'.$key+1}}">{!! str_replace("\\",'￥', $budget->budgetvalue) !!}</label>
                                        @php($isFound = true)
                                    @endif 
                                @endforeach
                                @php($index++)
                                @if(!$isFound)
                                    <input type="checkbox" class="btn-check" id="D_budget".$key+1 autocomplete="off" name="{{'D_budget'.$key+1}}">
                                    <label class="btn btn-outline-dark" for="{{'D_budget'.$key+1}}">{{ Str::limit("￥￥￥￥", $index*2, '') }}</label>
                                @endif
                            @endwhile
                         </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="features" class="form-label h3">Features</label><br>
                @foreach($features as $key => $feature)
                    <div class="form-check-inline h4">
                        @php($found = false)
                        @foreach($s_features as $s_feature)
                            @if($s_feature->featuretype_id == $feature->id)
                                <input class="form-check-input" type="checkbox" id="{{$feature->name}}" name="features{{$key+1}}" value="1" checked>
                                <label class="form-check-label" for="{{$feature->name}}">{{$feature->name}}</label>            
                                @php($found = true)
                                @break
                            @endif
                        @endforeach

                        @unless($found)
                            <input class="form-check-input" type="checkbox" id="{{$feature->name}}" name="features{{$key+1}}" value="1">
                            <label class="form-check-label" for="{{$feature->name}}">{{$feature->name}}</label>                     
                        @endunless
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="description" class="form-label h3">Description</label><br>
                <textarea type="textarea" id="description" rows="4" name="description" class="form-control">{{$restaurant->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label h3">Message to reservation holders</label><br>
                <textarea type="textarea" id="message" rows="4" name="message" class="form-control">{{$restaurant->message}}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn-secondary h3 me-5" style="width: 263px; height: 56px;">Cancel</button>
                <button type="submit" class="btn-secondary h3" style="width: 263px; height: 56px;">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
