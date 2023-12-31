    <div class="profile container w-75">
        <div class="row mt-2 p-2">
            <div class="col-auto mt-2">
                @if($user->profile != null && $user->profile->avatar) 
                    <img src="{{ $user->profile->avatar }}" alt="{{$user->name}}" class="header-image img-thumbnail rounded-circle ">
                @else
                    <i class="fa-solid fa-circle-user icon-user"></i>
                @endif 
            </div>
            <div class="col-auto">
                <div class="display-5 mt-4">{{ $user->name }}</div>
            </div>
            <div class="col-auto">
                <div class="vertical-line mt-4">
                    <h3>{{ $count_restaurant }}</h3><p class="p-1">Restaurant</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="vertical-line mt-4">
                    <h3>{{ $count_reservation }}</h3><p class="p-1">Resevation</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="vertical-line mt-4">
                    <h3>{{ $count_review }}</h3><p class="p-1">Reviews</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="vertical-line mt-4">
                    <h3>{{ $count_bookmark }}</h3><p class="p-1">Bookmarks</p>
                </div>
            </div>
            
        </div>
    </div>
