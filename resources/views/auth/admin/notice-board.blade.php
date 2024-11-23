@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notice Board</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Notice Board</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="m-0 text-center">Recently Notice Posted</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <marquee style="height: 60vh" scrollamount="3" behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                        @foreach ($notices as $notice)
                        <div class="text-randiring mb-2" data-created-at="{{ $notice->created_at }}" style="background: #ffe09b; color: black; padding: 11px; border-radius: 12px;">
                            <i class="fa fa-bell" style="margin-right: 12px; font-size:20px"></i>
                            <strong style="color: purple">{{ $notice->title }} :</strong>
                            <span>{{ $notice->description }}</span>
                            <p class="m-0 d-flex" style="justify-content: space-between">
                                <span style="color: #0804f5">Best Regards : {{ $notice->regards_by }}</span>
                                <span id="time-{{ $notice->id }}"></span>
                            </p>
                        </div>
                        @endforeach
                    </marquee>
                </div>
                <hr>
                <div class="row bg-primary justify-content-center" style="padding: 12px 0px">
                    <h4 class="m-0">Post your notice</h4>
                </div>
                <form action="{{ route('admin.notice.store') }}" class="mt-4" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Notice Title</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Notice title">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Description</label><span class="text-danger">*</span>
                                <textarea name="description" id="description" cols="30" rows="1" class="form-control"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="flashing-start" class="form-label">Notices Flashing Start Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="flashing-start" name="flashing_start" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                @error('flashing_start')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Notices Flashing Ending Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="flashing-ending" name="flashing_ending" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                @error('flashing_ending')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Select Notice Status</label><span class="text-danger">*</span>
                                <select name="notice_status" id="notice-status" class="form-control">
                                    <option value="">--Select Notice Status--</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="archived">Archived</option>
                                </select>
                                @error('notice_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Regards By</label><span class="text-danger">*</span>
                                <input type="text" id="regards_by" name="regards_by" class="form-control">
                                @error('regards_by')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="button text-right mt-2">
                        <input type="submit" value="Post" class="btn btn-success mr-4">
                    </div>
                </form>
                <hr>
                <div class="row bg-primary justify-content-center" style="padding: 12px 0px">
                    <h4 class="m-0 text-center">Recently Notices Posted Activity</h4>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Notice Id</th>
                                    <th>Title</th>
                                    <th>Posted Date</th>
                                    <th>flash Start</th>
                                    <th>flash End</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($notices as $notice)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td>{{ $notice->notice_id }}</td>
                                    <td>{{ $notice->title }}</td>
                                    <td>{{ $notice->created_at }}</td>
                                    <td>{{ $notice->flashing_start }}</td>
                                    <td>{{ $notice->flashing_ending }}</td>
                                    <td>
                                        <button class="btn btn-primary view-btn" onclick="openModal('{{ $notice->description }}')">View</button>
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-{{ $notice->status == "active" ? "success" : ($notice->status == "inactive" ? "danger" : "warning") }}">{{ $notice->status }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete-btn ">Delect</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noticeModalLabel">Notice Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="noticeDescription"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function openModal(description) {
        document.getElementById('noticeDescription').textContent = description; // Set the description in the modal
        const modal = new bootstrap.Modal(document.getElementById('noticeModal')); // Create a new modal instance
        modal.show(); // Show the modal
    }

    function closeModal() {
        const modal = new bootstrap.Modal(document.getElementById('noticeModal')); // Create a new modal instance
        modal.hide(); // Hide the modal
    }

    function timeAgo(date) {
        const now = new Date();
        const seconds = Math.floor((now - new Date(date)) / 1000);
        let interval = Math.floor(seconds / 31536000); // Years
        if (interval >= 1) return interval + " year" + (interval > 1 ? "s" : "") + " ago";
        interval = Math.floor(seconds / 2592000); // Months
        if (interval >= 1) return interval + " month" + (interval > 1 ? "s" : "") + " ago";
        interval = Math.floor(seconds / 86400); // Days
        if (interval >= 1) return interval + " day" + (interval > 1 ? "s" : "") + " ago";
        interval = Math.floor(seconds / 3600); // Hours
        if (interval >= 1) return interval + " hour" + (interval > 1 ? "s" : "") + " ago";
        interval = Math.floor(seconds / 60); // Minutes
        if (interval >= 1) return interval + " minute" + (interval > 1 ? "s" : "") + " ago";
        return "just now";
    }

    document.addEventListener("DOMContentLoaded", () => {
        const noticeElements = document.querySelectorAll('.text-randiring');

        noticeElements.forEach((notice) => {
            const createdAt = notice.dataset.createdAt;
            const timeSpan = notice.querySelector('span[id^="time-"]');
            timeSpan.textContent = timeAgo(createdAt);
        });
    });

</script>
@endsection
