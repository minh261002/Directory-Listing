@extends('frontend.layouts.master')

@section('content')
    <section id="dashboard" style="padding-top: 20px !important">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>Edit Listing</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('listing.update', $listing->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <img src="{{ asset($listing->image) }}" alt="photo" class="custom-img"
                                            id="image-preview">
                                        <label for="image" class="btn btn-outline-warning mt-3">Select Image</label>
                                        <input type="file" class="d-none" id="image" name="image">
                                        <input type="hidden" name="old_image" value="{{ $listing->image }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <img src="{{ asset($listing->thumbnail_image) }}" alt="photo" class="custom-img"
                                            id="thumbnail-preview">
                                        <label for="thumbnail" class="btn btn-outline-warning mt-3">Select Thumbnail</label>
                                        <input type="file" class="d-none" id="thumbnail" name="thumbnail">
                                        <input type="hidden" name="old_thumbnail" value="{{ $listing->thumbnail_image }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $listing->title }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="category_id">Category</label>
                                        <select class="form-control select_2" id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $listing->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="location_id">Location</label>
                                        <select class="form-control select_2" id="location_id" name="location_id">
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ $listing->location_id == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $listing->address }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $listing->phone }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $listing->email }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                            value="{{ $listing->website }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{ $listing->facebook }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            value="{{ $listing->twitter }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                                            value="{{ $listing->linkedin }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                            value="{{ $listing->instagram }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="attachment">Attachment</label>
                                        <input type="file" class="form-control" id="attachment" name="attachment">
                                        <input type="hidden" name="old_attachment" value="{{ $listing->attachment }}">
                                        @if ($listing->attachment)
                                            <a href="{{ asset($listing->attachment) }}" target="_blank">View
                                                Attachment</a>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="amenities">Amenities</label>
                                        <select class="form-control select_2" id="amenities" name="amenities[]" multiple>
                                            @foreach ($amenities as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ in_array($item->id, $listing->amenities->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="description">Description</label>
                                        <textarea class="summer_note" id="description" name="description" rows="10">{{ $listing->description }}</textarea>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="google_embed_map">Google Embed Map</label>
                                        <textarea class="form-control" id="google_embed_map" name="google_embed_map" rows="2">{{ $listing->google_embed_map }}</textarea>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            value="{{ $listing->seo_title }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ $listing->seo_description }}</textarea>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control select_2" id="status" name="status">
                                            <option value="1" {{ $listing->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $listing->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="is_featured">Is Featured</label>
                                        <select class="form-control select_2" id="is_featured" name="is_featured">
                                            <option value="1" {{ $listing->is_featured == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0" {{ $listing->is_featured == 0 ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="read_btn">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#thumbnail').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#thumbnail-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush
