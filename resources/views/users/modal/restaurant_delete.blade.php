<div class="modal fade" id="restaurantDelete" tabindex="-1" aria-labelledby="restaurantDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    Delete Restaurant
                </h3>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
                <h3>{{ $restaurant->name }}</h3>
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('restaurant.destroy', $restaurant->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>