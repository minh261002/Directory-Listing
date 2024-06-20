@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.category.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Categories</a></div>
                <div class="breadcrumb-item">Edit Category</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
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
                                    <div class="col-12 mb-4">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') ?? $category->name }}">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="">Background Image</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="background" id="image-upload" />
                                            <input type="hidden" name="old_background"
                                                value="{{ $category->background_image }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="">Icon Image</label>
                                        <div id="image-preview-2" class="image-preview">
                                            <label for="image-upload-2" id="image-label-2">Choose File</label>
                                            <input type="file" name="icon" id="image-upload-2" />
                                            <input type="hidden" name="old_icon" value="{{ $category->image_icon }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="show_at_home">Show At Home</label>
                                        <select name="show_at_home" id="show_at_home" class="form-control">
                                            <option value="1" {{ $category->show_at_home == 1 ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="0" {{ $category->show_at_home == 0 ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add Category</button>
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

            $('#image-preview').css('background-image', 'url( {{ asset($category->background_image) }} )');
            $('#image-preview').css('background-repeat', 'no-repeat');
            $('#image-preview').css('background-size', 'cover');
            $('#image-preview').css('background-position', 'center');
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

            $('#image-preview-2').css('background-image', 'url( {{ asset($category->image_icon) }} )');
            $('#image-preview-2').css('background-repeat', 'no-repeat');
            $('#image-preview-2').css('background-size', 'cover');
            $('#image-preview-2').css('background-position', 'center');
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
