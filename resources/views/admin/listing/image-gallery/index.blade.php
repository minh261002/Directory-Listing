@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listing Image Gallery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.listing-gallery.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Listing Image Gallery</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Image For
                                <span class="text-primary">{{ $listing->title }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-gallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach

                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="image">Image
                                            <code>(Multiple Image Supported)</code>
                                        </label>
                                        <input type="file" name="images[]" id="image" class="form-control" multiple>
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
                            <h4>Listing Image Gallery Of
                                <span class="text-primary">{{ $listing->title }}</span>
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($images as $image)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset($image->image) }}" alt="" class="img-fluid">
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('admin.listing-gallery.destroy', $image->id) }}"
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
