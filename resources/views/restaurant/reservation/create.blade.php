
@yield('reservations.create')
<form action="{{ route('restaurant.reservations.store')}}" method="post">
    @csrf
    @method
        <div class="container" id="reservasion_area">
            {{-- Select Box --}}
            <div class="container row mb-4">
                <div class="container row col-4">
                <div class="container col-2">
                    <i class="fa-solid fa-user fs-3"></i>
                </div>
                <div class="container col">
                    <select class="form-selectx" name="reservation_ppl" aria-label="Default select example">
                        <option selected>Open this select menu</option>

                        <option value="1">1</option>

                    </select>
                </div>
                </div>
                <div class="container row col-4">
                <div class="container col-2 fs-3">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="container col">
                    <select class="form-selectx" name="reservation_data" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>

                    </select>
                </div>
                </div>
                <div class="container row col-4">
                <div class="container col-2 fs-3 pb-1">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div class="container col">
                    <select class="form-selectx" name="reservation_time" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
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
        <button type="button" class="btn btn-warning mb-3"><a href="{{ route('home')}}"></a>Cancel</button>
        <input type="submit" value="Submit" class="btn btn-warning mb-3">
</form>