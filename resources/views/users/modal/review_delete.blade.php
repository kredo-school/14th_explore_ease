<div class="modal fade" id="reviewDelete-{{ $review->restaurant_id }}" tabindex="-1" aria-labelledby="reviewDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    Delete Review
                </h3>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this review?</p>
                <h3>Restaurant Name : {{$review->restaurant->name ?? 'None'}}</h3>
                <h3>Comment : {{$review->comment}}</h3>
                <h3>Star : {{ $review->star }} <i class="fa-solid fa-star"></i></h3>
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('review.delete', $review->restaurant_id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Review Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>