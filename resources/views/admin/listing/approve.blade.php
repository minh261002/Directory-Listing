@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Pending Listings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Listings</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pending Listings</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($approveListing as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->location->name }}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a class="change" data-type="approve"
                                                    href="{{ route('admin.listing.approve', $item->id) }}"
                                                    class="btn btn-success">Approve</a>
                                                <a class="change" data-type="reject"
                                                    href="{{ route('admin.listing.approve', $item->id) }}"
                                                    class="btn btn-danger">Reject</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $('body').on('click', '.change', function(e) {
            e.preventDefault();

            var type = $(this).data('type');
            var status;
            if (type == 'approve') {
                status = 1;
            } else {
                status = 0;
            }
            var url = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to " + type + " this listing!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ' + type + ' it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        data: {
                            status: status,
                            _token: '{{ csrf_token() }}'
                        },
                        type: 'PUT',
                        success: function(response) {
                            location.reload();
                        }
                    })
                }
            })
        })
    </script>
@endpush
