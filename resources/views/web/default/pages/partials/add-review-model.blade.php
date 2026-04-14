<div class="modal fade" id="addReviewModel" aria-hidden="true" aria-labelledby="addReviewModelLabel3"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                    @lang('gen.add_review')
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h2 class="fw-bold heading fs-5">
                        @lang('gen.your_rating') <span class="text-danger">*</span>
                    </h2>

                    <article>
                        <form class="star">
                            <label class="star-label" style="cursor: pointer;font-size: 28px;">
                                ★
                                <input type="radio" name="note" value="1">
                            </label>
                            <label class="star-label" style="cursor: pointer;font-size: 28px;">
                                ★
                                <input type="radio" name="note" value="2">
                            </label>
                            <label class="star-label" style="cursor: pointer;font-size: 28px;">
                                ★
                                <input type="radio" name="note" value="3">
                            </label>
                            <label class="star-label" style="cursor: pointer;font-size: 28px;">
                                ★
                                <input type="radio" name="note" value="4">
                            </label>
                            <label class="star-label" style="cursor: pointer;font-size: 28px;">
                                ★
                                <input type="radio" name="note" value="5">
                            </label>
                        </form>
                    </article>

                </div>
                <x-forms.form :action="route('add.product.review')">
                    {{-- Rating number --}}
                    <div class="mb-3">
                        <input type="hidden" name="rating" id="rating" class="form-control" />
                    </div>
                    <input type="hidden" id="addReviewProductId" name="product_id">
                    <div class="form-group mt-2">
                        <textarea class="form-control subheading" name="review" id="exampleFormControlTextarea1" placeholder="Add Review" rows="5" required></textarea>
                    </div>
                    <button class="btn orange-bg w-100 text-white mt-3 rounded-5">
                        @lang('gen.submit')
                    </button>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>
