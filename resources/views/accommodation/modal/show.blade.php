<div class="modal fade" id="review-accommodation-{{ $accommodation->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="h5 modal-title">Post Your Review</h3>
            </div>
            <form action="{{ route('review.store', $accommodation->id )}}" method="post">
                <div class="modal-body d-flex flex-column">
                    @csrf
                    <div class="mb-3">
                        <textarea name="comment" id="comment" class="form-control w-75 mx-auto" rows="8"></textarea>
                    </div>

                    <div class="star-rating mt-3 d-flex justify-content-center">
                        <input type="radio" id="star5" name="star" value="5">
                        <label for="star5" class="fa fa-star"></label>

                        <input type="radio" id="star4_5" name="star" value="4.5">
                        <label for="star4_5" class="fa fa-star half"></label>

                        <input type="radio" id="star4" name="star" value="4">
                        <label for="star4" class="fa fa-star"></label>

                        <input type="radio" id="star3_5" name="star" value="3.5">
                        <label for="star3_5" class="fa fa-star half"></label>

                        <input type="radio" id="star3" name="star" value="3">
                        <label for="star3" class="fa fa-star"></label>

                        <input type="radio" id="star2_5" name="star" value="2.5">
                        <label for="star2_5" class="fa fa-star half"></label>

                        <input type="radio" id="star2" name="star" value="2">
                        <label for="star2" class="fa fa-star"></label>

                        <input type="radio" id="star1_5" name="star" value="1.5">
                        <label for="star1_5" class="fa fa-star half"></label>

                        <input type="radio" id="star1" name="star" value="1">
                        <label for="star1" class="fa fa-star"></label>

                        <input type="radio" id="star0_5" name="star" value="0.5">
                        <label for="star0_5" class="fa fa-star half"></label>

                    </div>
                    <p onclick="resetStars()" id="reset-btn" class="btn align-items-center my-3 m-0 w-50 mx-auto">Reset Rating</p>
                    <button type="submit" class="btn text-white btn-warning align-items-center my-3 m-0 w-50 mx-auto">Post</button>
                <button type="button" class="btn btn-secondary align-items-center my-3 m-0 w-50 mx-auto" data-bs-dismiss="modal">Cancel</button>


                </div>

            <div class="modal-footer border-0">

            </div>
        </form>



        </div>
    </div>
</div>
