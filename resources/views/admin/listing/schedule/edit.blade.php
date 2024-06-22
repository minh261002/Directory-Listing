@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing-schedule.index', ['id' => $listing->id]) }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listing Schedule</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a
                        href="{{ route('admin.listing-schedule.index', ['id' => $listing->id]) }}">Listing
                        Schedule</a></div>
                <div class="breadcrumb-item">Edit</div>

            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Schedule For <span class="text-primary">{{ $listing->title }}</span></h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-schedule.update', $schedule->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Day</label>
                                    <select name="day" class="form-control select2">
                                        <option value="">Choose</option>
                                        @foreach (config('listing.schedule.day') as $day)
                                            <option value="{{ $day }}"
                                                {{ $schedule->day == $day ? 'selected' : '' }}>{{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Start Time</label>
                                            <input type="text" class="form-control timepicker" name="start_time"
                                                value="{{ $schedule->start_time }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">End Time</label>
                                            <input type="text" class="form-control timepicker" name="end_time"
                                                value="{{ $schedule->end_time }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Status </label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $schedule->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $schedule->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
@endpush
