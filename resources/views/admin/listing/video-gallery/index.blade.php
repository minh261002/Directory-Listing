@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listing Video Gallery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Listing Video Gallery</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Video For
                                <span class="text-primary">{{ $listing->title }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-video-gallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach

                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="video">Video</label>
                                        <input type="file" name="video" id="video" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <button id="show_input" class="btn btn-sm btn-outline-black my-3">Add Video
                                            URL</button>
                                    </div>

                                    <div class="col-md-12 d-none">
                                        <label for="">Video URL</label>
                                        <input type="text" id="video_url" name="video_url" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Listing Video Gallery Of
                                <span class="text-primary">{{ $listing->title }}</span>
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($videos as $item)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <video width="100%" controls>
                                                    <source src="{{ asset($item->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('admin.listing-video-gallery.destroy', $item->id) }}"
                                                    class="btn btn-danger delete">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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

            $('#show_input').click(function(e) {
                e.preventDefault();
                $('#video_url').parent().toggleClass('d-none');
                $('#video').parent().toggleClass('d-none');
            });
        });
    </script>
@endpush
