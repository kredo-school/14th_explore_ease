<div class="modal fade" id="reservationCancel-{{ $reservation->id }}" tabindex="-1" aria-labelledby="reservationCancelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    Delete Reservation
                </h3>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this reservation?</p>
                <h3>Restaurant: {{ $reservation->restaurant->name }}</h3>
                <h3>Date: {{ $reservation->reservation_start_date }}</h3>
                <h3>Start time: {{ $reservation->reservation_start_time }}</h3>
                <h3>Number of people: {{ $reservation->number_of_people }}</h3>
                @if(empty($reservation->course_id))
                    <h3>Menu: ー (Only Seat)</h3>
                @else
                    <h3>Menu: Course {{ $reservation->course_id }}</h3>
                @endif
                @if(empty($reservation->course_id))
                    <h3>Course Price: ー</h3>
                @else
                    <h3>Course Price: {{$reservation->course->price}}</h3>
                @endif

            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('reservation.cancel', $reservation->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-danger btn-sm">Reservation Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>