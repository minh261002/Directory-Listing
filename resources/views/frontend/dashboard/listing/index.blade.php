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
                        <div class="my_listing p_xm_0">
                            <!-- <h4>listing type</h4> -->
                            <div class="row">
                                <div class="col-xxl-6 col-xl-12">
                                    <div class="active_inactive">
                                        <h6>Active <span>{{ $listingActive->count() }}</span></h6>
                                        @foreach ($listingActive as $item)
                                            <div class="active_inactive_item">
                                                <div class="active_inactive_img">
                                                    <img src="{{ asset($item->image) }}" alt="photo" class="custom-img">
                                                </div>
                                                <div class="active_inactive_text">
                                                    <h3>
                                                        <a
                                                            href="{{ route('listing.show', $item->id) }}">{{ $item->title }}</a>
                                                    </h3>
                                                    <p><i class="far fa-map-marker-alt"></i> {{ $item->location->name }}</p>
                                                    <div class="color_text">

                                                        @if ($item->is_featured == 1)
                                                            <a href="#"><i class="far fa-star"></i> Featured</a>
                                                        @endif

                                                        @if ($item->is_verified == 1)
                                                            <a class="red" href="#"><i class="far fa-check"></i>
                                                                Verified</a>
                                                        @endif
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('listing.show', $item->id) }}">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li><a href="{{ route('listing.edit', $item->id) }}">
                                                                <i class="fal fa-edit"></i></a></li>
                                                        <li><a href="{{ route('listing.destroy', $item->id) }}"
                                                                class="delete"><i class="fal fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-12">
                                    <div class="active_inactive">
                                        <h6>Inactive <span class="red">{{ $listingPending->count() }}</span></h6>
                                        @foreach ($listingPending as $item)
                                            <div class="active_inactive_item">
                                                <div class="active_inactive_img">
                                                    <img src="{{ $item->image }}" alt="photo" class="custom-img">
                                                </div>
                                                <div class="active_inactive_text">
                                                    <h3>
                                                        <a
                                                            href="{{ route('listing.show', $item->id) }}">{{ $item->title }}</a>
                                                    </h3>
                                                    <p><i class="far fa-map-marker-alt"></i> {{ $item->location->name }}
                                                    </p>
                                                    <div class="color_text">

                                                        @if ($item->is_featured == 1)
                                                            <a href="#"><i class="far fa-star"></i> Featured</a>
                                                        @endif

                                                        @if ($item->is_verified == 1)
                                                            <a class="red" href="#"><i class="far fa-check"></i>
                                                                Verified</a>
                                                        @endif
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('listing.show', $item->id) }}">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li><a href="{{ route('listing.edit', $item->id) }}">
                                                                <i class="fal fa-edit"></i></a></li>
                                                        <li><a href="{{ route('listing.destroy', $item->id) }}"
                                                                class="delete"><i class="fal fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
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
    <script></script>
@endpush
