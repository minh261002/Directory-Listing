@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.listing.index') }}">Listings</a></div>
                <div class="breadcrumb-item">Edit Listing</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Listing</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing.update', $listing->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <label for="">Image <span class="text-danger">*</span></label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                            <input type="hidden" name="old_image" value="{{ $listing->image }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <label for="">Thumbnail Image <span class="text-danger">*</span></label>
                                        <div id="image-preview-2" class="image-preview">
                                            <label for="image-upload-2" id="image-label-2">Choose File</label>
                                            <input type="file" name="thumbnail" id="image-upload-2" />
                                            <input type="hidden" name="old_thumbnail"
                                                value="{{ $listing->thumbnail_image }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ old('title') ?? $listing->title }}">
                                    </div>

                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <label for="category_id">Category <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $listing->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <label for="location_id">Location <span class="text-danger">*</span></label>
                                        <select name="location_id" id="location_id" class="form-control">
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ $location->id == $listing->location_id ? 'selected' : '' }}>
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ old('address') ?? $listing->address }}">
                                    </div>

                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone') ?? $listing->phone }}">
                                    </div>

                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email') ?? $listing->email }}">
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="website">Website</label>
                                        <input type="text" name="website" id="website" class="form-control"
                                            value="{{ old('website') ?? $listing->website }}">
                                    </div>

                                    <div class="form-group col-12 col-md-3 mb-4">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" id="facebook" class="form-control"
                                            value="{{ old('facebook') ?? $listing->facebook }}">
                                    </div>

                                    <div class="form-group col-12 col-md-3 mb-4">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" id="twitter" class="form-control"
                                            value="{{ old('twitter') ?? $listing->twitter }}">
                                    </div>

                                    <div class="form-group col-12 col-md-3 mb-4">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" name="linkedin" id="linkedin" class="form-control"
                                            value="{{ old('linkedin') ?? $listing->linkedin }}">
                                    </div>

                                    <div class="form-group col-12 col-md-3 mb-4">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" name="instagram" id="instagram" class="form-control"
                                            value="{{ old('instagram') ?? $listing->instagram }}">
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="attachment">Attachment</label>
                                        <input type="file" name="attachment" id="attachment" class="form-control">
                                        <input type="hidden" name="old_attachment" value="{{ $listing->attachment }}">
                                        @if ($listing->attachment)
                                            <a href="{{ asset($listing->attachment) }}" target="_blank">View
                                                Attachment</a>
                                        @endif
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label>Amenities</label>
                                        <select class="form-control select2" multiple="" name="amenities[]">
                                            @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->id }}"
                                                    {{ in_array($amenity->id, $listing->amenities->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $amenity->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="summernote">{!! $listing->description !!}</textarea>
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="google_embed_map">Google Embed Map</label>
                                        <textarea name="google_embed_map" id="google_embed_map" class="form-control">{!! $listing->google_embed_map !!}</textarea>
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control"
                                            value="{{ $listing->seo_title }}">
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control">{!! $listing->seo_description !!}</textarea>
                                    </div>

                                    <div class="form-group col-12 col-md-4 mb-4">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $listing->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $listing->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-md-4 mb-4">
                                        <label for="is_featured">Is Featured</label>
                                        <select name="is_featured" id="is_featured" class="form-control">
                                            <option value="0" {{ $listing->is_featured == 0 ? 'selected' : '' }}>No
                                            </option>
                                            <option value="1" {{ $listing->is_featured == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-md-4 mb-4">
                                        <label for="is_verified">Is Verified</label>
                                        <select name="is_verified" id="is_verified" class="form-control">
                                            <option value="0" {{ $listing->is_verified == 0 ? 'selected' : '' }}>No
                                            </option>
                                            <option value="1" {{ $listing->is_verified == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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

            //render preview image
            $('#image-preview').css('background-image', 'url({{ asset($listing->image) }})');
            $('#image-preview').css('background-size', 'cover');
            $('#image-preview').css('background-position', 'center center');
            $('#image-preview').css('background-repeat', 'no-repeat');
            $('#image-upload').change(function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-label').text(file.name);
                    $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(file);
            });

            //render preview image
            $('#image-preview-2').css('background-image', 'url({{ asset($listing->thumbnail_image) }})');
            $('#image-preview-2').css('background-size', 'cover');
            $('#image-preview-2').css('background-position', 'center center');
            $('#image-preview-2').css('background-repeat', 'no-repeat');
            $('#image-upload-2').change(function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-label-2').text(file.name);
                    $('#image-preview-2').css('background-image', 'url(' + e.target.result + ')');
                    $('#image-preview-2').hide();
                    $('#image-preview-2').fadeIn(650);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
