    <div class="list-group">
        <a href="{{ route('profile.show', Auth::user()->id) }}" class="list-group-item"> Profile </a>
        <a href="{{ route('profile.reservation') }}" class="list-group-item"> Reservation </a>
        <a href="#" class="list-group-item"> Reviews </a>
        <a href="{{ route('profile.bookmark') }}" class="list-group-item"> Bookmarks </a>
    </div>
