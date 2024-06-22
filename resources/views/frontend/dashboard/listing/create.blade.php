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
                            <h4>Create New Listing</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('listing.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="thumbnail">Thumbnail Image</label>
                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="category_id">Category</label>
                                        <select class="form-control select_2" id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="location_id">Location</label>
                                        <select class="form-control select_2" id="location_id" name="location_id">
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                            value="{{ old('website') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{ old('facebook') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            value="{{ old('twitter') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                                            value="{{ old('linkedin') }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                            value="{{ old('instagram') }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="attachment">Attachment</label>
                                        <input type="file" class="form-control" id="attachment" name="attachment">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="amenities">Amenities</label>
                                        <select class="form-control select_2" id="amenities" name="amenities[]" multiple>
                                            @foreach ($amenities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="description">Description</label>
                                        <textarea class="summer_note" id="description" name="description" rows="10">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="google_embed_map">Google Embed Map</label>
                                        <textarea class="form-control" id="google_embed_map" name="google_embed_map" rows="2">{{ old('google_embed_map') }}</textarea>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            value="{{ old('meta_title') }}">
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control select_2" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="is_featured">Is Featured</label>
                                        <select class="form-control select_2" id="is_featured" name="is_featured">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="read_btn">Create Listing</button>
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
    <script></script>
@endpush
