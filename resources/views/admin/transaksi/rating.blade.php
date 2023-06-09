@foreach ($bookings as $item)
    <!-- Rating Modal -->
    <div class="modal fade" id="ratingModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="ratingModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel{{ $item->id }}">Beri Rating</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ratingForm{{ $item->id }}"
                        action="{{ route('booking-cucis.rating.store', $item->id) }}" method="POST">
                        @csrf

                        <div class="starability-basic">
                            <input type="radio" id="rate1{{ $item->id }}" name="rating" value="1">
                            <label for="rate1{{ $item->id }}" title="Terrible">1 star</label>

                            <input type="radio" id="rate2{{ $item->id }}" name="rating" value="2">
                            <label for="rate2{{ $item->id }}" title="Not good">2 stars</label>

                            <input type="radio" id="rate3{{ $item->id }}" name="rating" value="3">
                            <label for="rate3{{ $item->id }}" title="Average">3 stars</label>

                            <input type="radio" id="rate4{{ $item->id }}" name="rating" value="4">
                            <label for="rate4{{ $item->id }}" title="Very good">4 stars</label>

                            <input type="radio" id="rate5{{ $item->id }}" name="rating" value="5" checked>
                            <label for="rate5{{ $item->id }}" title="Excellent">5 stars</label>
                        </div>

                        <div class="form-group">
                            <label for="ulasan">Ulasan:</label>
                            <textarea class="form-control" name="ulasan" id="ulasan" rows="4" placeholder="Tuliskan Pengalaman anda"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@push('style')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/starability/starability-minified/starability-all.min.css">
    <style>
        .starability-basic>input:checked~label {
            color: orange;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/starability/starability-minified/starability.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('form[id^="ratingForm"]').submit(function(event) {
                event.preventDefault();
                var form = $(this);
                var ratingValue = form.find('input[name="rating"]:checked').val();
                var ulasanValue = form.find('textarea[name="ulasan"]').val();

                // Perform AJAX request to send the rating data to your backend
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: {
                        rating: ratingValue,
                        ulasan: ulasanValue
                    },
                    success: function(response) {
                        // Handle the success response (e.g., display a success message)
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response (e.g., display an error message)
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
