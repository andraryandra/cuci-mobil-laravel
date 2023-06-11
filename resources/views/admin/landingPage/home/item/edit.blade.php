@foreach ($home_item as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalEdit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Home Body</h1>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home-body-landing-page.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title Body</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $item->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Description Body</label>
                            <textarea name="content" id="content" class="form-control home-item-edit" rows="3" required>{{ $item->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image_home">Image</label>
                            <span>Pastikan Gambar Ukuran 460x678</span>
                            <input type="file" name="image_home" id="image_home" class="form-control-file">
                            <img src="{{ Storage::url($item->image_home) }}" alt="{{ $item->id }}"
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
