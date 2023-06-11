@foreach ($carousel as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalEdit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Carousel</h1>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home-carousel-landing-page.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="header_carousel">Header Carousel</label>
                            <input type="text" name="header_carousel" id="header_carousel" class="form-control"
                                value="{{ $item->header_carousel }}" required>
                        </div>

                        <div class="form-group">
                            <label for="sub_header_carousel">Title Carousel</label>
                            <input type="text" name="sub_header_carousel" id="sub_header_carousel"
                                class="form-control" value="{{ $item->sub_header_carousel }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image_carousel">Image</label>
                            <input type="file" name="image_carousel" id="image_carousel" class="form-control-file">
                            <img src="{{ Storage::url($item->image_carousel) }}" alt="{{ $item->id }}"
                                class="rounded mt-3" width="150">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@push('style')
    <style>
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        }

        .custom-select:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .custom-select:disabled {
            background-color: #e9ecef;
            opacity: 1;
        }
    </style>
@endpush

@push('script')
@endpush
