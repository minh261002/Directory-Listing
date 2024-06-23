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
                            <h4>{{ $listing->title }}</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5>Listing Schedule</h5>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <table class="table table-stripe">
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Action</th>
                                                </tr>

                                                @forelse ($listingSchedule as $schedule)
                                                    <tr>
                                                        <td>{{ $schedule->day }}</td>
                                                        <td>{{ $schedule->start_time }}</td>
                                                        <td>{{ $schedule->end_time }}</td>
                                                        <td>
                                                            <a href="{{ route('listing-schedule.destroy', $schedule->id) }}"
                                                                class="btn btn-danger btn-sm delete">
                                                                <i class="fal fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">No schedule found</td>
                                                    </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('listing-schedule.store', ['id' => $listing->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group mb-4">
                                                    <label for="">Day</label>
                                                    <select name="day" class="form-control select2">
                                                        <option value="">Choose</option>
                                                        @foreach (config('listing.schedule.day') as $day)
                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="">Start Time</label>
                                                            <input type="text" class="form-control timepicker"
                                                                name="start_time">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="">End Time</label>
                                                            <input type="text" class="form-control timepicker"
                                                                name="end_time">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Status </label>
                                                    <select name="status" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>


                                                <div class="form-group mt-4">
                                                    <button type="submit" class="read_btn">Create</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5>Image Gallery</h5>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-5">
                                        @forelse ($listingImageGallery as $image)
                                            <div class="col-lg-3">
                                                <div class="card position-relative">
                                                    <img src="{{ asset($image->image) }}" alt="photo" class="custom-img">

                                                    <a href="{{ route('listing-gallery.destroy', $image->id) }}"
                                                        class="position-absolute btn btn-danger top-0 end-0 delete">
                                                        <i class="fal fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-lg-12">
                                                <p>No image found</p>
                                            </div>
                                        @endforelse
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('listing-gallery.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                                <div class="form-group mb-4">
                                                    <label for="images">Image</label>
                                                    <input type="file" name="images[]" class="form-control" multiple>
                                                </div>

                                                <button type="submit" class="read_btn">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5>Video Gallery</h5>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-5">
                                        @forelse ($listingVideoGallery as $item)
                                            <div class="col-lg-3">
                                                <div class="card position-relative">
                                                    <video src="{{ asset($item->video) }}" controls
                                                        class="custom-img"></video>

                                                    <a href="{{ route('listing-video-gallery.destroy', $item->id) }}"
                                                        class="position-absolute btn btn-danger top-0 end-0 delete">
                                                        <i class="fal fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-lg-12">
                                                <p>No video found</p>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-12">
                                            <form action="{{ route('listing-video-gallery.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="video">Video</label>
                                                        <input type="file" name="video" id="video"
                                                            class="form-control">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button id="show_input"
                                                            class="btn btn-sm btn-outline-black my-3">Add Video
                                                            URL</button>
                                                    </div>

                                                    <div class="col-md-12 d-none">
                                                        <label for="">Video URL</label>
                                                        <input type="text" id="video_url" name="video_url"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group mt-4">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="read_btn">Upload</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
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

        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            defaultTime: '11',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
