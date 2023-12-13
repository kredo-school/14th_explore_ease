<div class="modal fade" id="confirm-reservation">
  <div class="modal-dialog">
      <div class="modal-content border-warning">
          <div class="modal-header border-warning">
              <h3 class="h5 modal-title text-warning">
                  <i class="fa-solid fa-circle-exclamation"></i> confirm reservation
              </h3>
          </div>

          <div class="modal-body">
              <p>Are you sure you want to confirm this</p>
              <div class="mt-3">
                  <p id="confirmation_number_of_people" class="mt-1 text-muted"></p>
                  <p id="confirmation_reservation_start_date" class="mt-1 text-muted"></p>
                  <p id="confirmation_reservation_start_time" class="mt-1 text-muted"></p>
                  <p id="confirmation_reservation_requests" class="mt-1 text-muted"></p>
              </div>
          </div>

          <div class="modal-footer border-0">
              <form  method="post" action="{{ route('restaurant.reservation.store', [$restaurant->id]) }}">
                  @csrf
                  <input name="number_of_people" id="hidden_number_of_people" type="hidden" >
                  <input name="reservation_start_date" id="hidden_reservation_start_date" type="hidden" >
                  <input name="reservation_start_time" id="hidden_reservation_start_time" type="hidden" >
                  
                  <input name="reservation_start_date" id="hidden_reservation_start_date" type="hidden" >
                  <input name="reservation_end_time" id="reservation_end_time" type="hidden" >
                  <input name="reservation_minutes" id="reservation_minutes" type="hidden" >

                  <input name="course" id="hidden_course" type="hidden" >
                  <input name="requests" id="hidden_requests" type="hidden" >
                  <button class="btn  b-color btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn  b-color btn-sm">Confirm</button>
              </form>
          </div>
      </div>
  </div>
</div>
