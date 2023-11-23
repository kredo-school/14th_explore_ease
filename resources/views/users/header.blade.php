    <div class="profile container w-75">
        <div class="row mt-2 p-2">
            <div class="col mt-2">
                @if($user->profile->avatar) 
                    <img src="{{ $user->profile->avatar }}" alt="{{$user->name}}" class="img-thumbnail rounded-circle ">
                @else
                    <i class="fa-solid fa-circle-user icon-user"></i>
                @endif 
            </div>
            <div class="col">
                <div class="display-5 mt-4">{{ $user->name }}</div>
            </div>
            <div class="col-2">
                <div class="vertical-line mt-4">
                    <h3>5</h3><p class="p-1">Restaurant</p>
                </div>
            </div>
            <div class="col-2">
                <div class="vertical-line mt-4">
                    <h3>5</h3><p class="p-1">Resevation</p>
                </div>
            </div>
            <div class="col-2">
                <div class="vertical-line mt-4">
                    <h3>5</h3><p class="p-1">Reviews</p>
                </div>
            </div>
            <div class="col-2">
                <div class="vertical-line mt-4">
                    <h3>5</h3><p class="p-1">Bookmarks</p>
                </div>
            </div>
            
        </div>
    </div>
