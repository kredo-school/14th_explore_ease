@extends('layouts.app')

@section('title', $restaurant->name)

@section('content')

{{-- Main V --}}

<div class="container-fluid mb-4 p-0 overflow-hidden" style="height: 560px">
    <img src="../storage/vegetable-skewer-3317060_1920.jpg" alt="restaurant_reservation_image" class="img-fluid overflow-hidden" style="width: 100%; height: auto">
</div>
<div class="container w-50">
        {{-- Message Area --}}
        <div class="container mb-5">
            <h2 class="mb-4">{{}}Greate Restaurant in Tokyo</h2>
            <h3 class="mb-2">Message from Venue</h3>
            <p>▶ As regards the specification of the seat, we may not be able to comply with your request, so please be forewarned.<br>
                ▶ In the case of reservation for two people, there may be table seats to be hanged side  by side and sofa seat of low table. Please note.<br>
                ▶ When crowded, it may be seated for the second turn. In that case we may wait about 10 minutes to enter the store. Please note.<br>
                ▶ If you can not contact us after 30 minutes from the time of reservation, we will be forced to treat you as a cancellation so please be sure to contact us if you are late.<br>
                ▶ Please contact the store directly when booking more than 9 people.<br>
                ▶ If children also eat the course, please put in the number of adults even under 12 years old. <br>
                There is no preparation for children's menu only. If you would like a single curry please contact us by phone.Inquiries by telephone on the above: 03-3613-4020</p>

            {{-- Check Box  --}}
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked"> 
                I confirm I've read the Message from Venue above
                </label>
            </div>

            {{-- Select Box --}}
            <div class="container row mb-4">
                <div class="container row col-4">
                <div class="container col-2">
                    <i class="fa-solid fa-user fs-3"></i>
                </div>
                <div class="container col">
                    <select class="form-selectx" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                </div>
                <div class="container row col-4">
                <div class="container col-2 fs-3">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="container col">
                    <select class="form-selectx" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                </div>
                <div class="container row col-4">
                <div class="container col-2 fs-3 pb-1">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div class="container col">
                    <select class="form-selectx" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                </div>
            </div>
            {{-- Check Box  --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                Seat only
                </label>
            </div>
        </div>

        {{-- Couse Area --}}
        <h2 class="mb-4">Couse</h2>
        <div class="container mb-6">
            <div class="container mb-5 border-bottom">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Couse1 <span>¥ 6,000</span></h5>
                      <p class="card-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<a href="#">>Read More</a></p>
                      <button type="button" class="btn btn-warning mb-3">Select</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="container">
            <div class="container mb-6 border-bottom">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Couse2 <span>¥ 12,000</span></h5>
                      <p class="card-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<a href="#">>Read More</a></p>
                      <button type="button" class="btn btn-warning mb-3">Select</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container mb-4 border-bottom">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Couse3 <span>¥ 18,000</span></h5>
                      <p class="card-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<a href="#">>Read More</a></p>
                      <button type="button" class="btn btn-warning mb-3">Select</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>

    {{-- Request --}}
    <h2 class="mb-4">Requests</h2>
        <div class="form-group  mb-5">
            <textarea class="form-control" placeholder="leave a comment such as a special requests" id="floatingTextarea" rows="5"></textarea>
        </div>
    </div>
</div>
@endsection

