@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.amenity.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Amenities</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.amenity.index') }}">Amenities</a></div>
                <div class="breadcrumb-item">Edit Amenity</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Amenity</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.amenity.update', $amenity->id) }}" method="POST">
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
                                        <label for="name">Amenity Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') ?? $amenity->name }}">
                                    </div>

                                    <div class="col-12 col-md-1 mb-4">
                                        <label for="icon">Icon</label><br>

                                        <button role="iconpicker" class="btn btn-primary " data-icon="{{ $amenity->icon }}"
                                            name="icon">{{ $amenity->icon }}</button>
                                    </div>


                                    <div class="col-12 col-md-11 mb-4">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $amenity->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $amenity->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add Amenity</button>
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
