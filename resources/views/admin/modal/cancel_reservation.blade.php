<div class="modal fade" id="cancel-reservation-{{ $reservation->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-user-slash"></i> Cancel Reservation
                </h3>
            </div>

            <div class="modal-body">
                Are you sure you want to cancel <span class="fw-bold"> Reservation {{ $reservation->id }} ?</span>
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('admin_reservation.cancel', $reservation->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-danger btn-sm">Cancel Resevation</button>
                </form>
            </div>
        </div>
    </div>
</div>
