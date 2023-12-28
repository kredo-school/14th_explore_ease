    <div class="list-group">
        <a href="{{ route('profile.show', Auth::user()->id) }}" class="list-group-item"> Profile </a>
        {{-- Users can display Reservation, Review and Bookmarks but owners and admins can't display them --}}
        @if(Auth::user()->profile != null && Auth::user()->profile->usertype_id == 2)
            <a href="{{ route('reservation.show', Auth::user()->id) }}" class="list-group-item"> Reservation </a>
            <a href="{{ route('review.show', Auth::user()->id) }}" class="list-group-item"> Reviews </a>
            <a href="{{ route('bookmark.show', Auth::user()->id) }}" class="list-group-item"> Bookmarks </a>
        @endif
    </div>
