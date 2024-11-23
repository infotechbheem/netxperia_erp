@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center  p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-5">
                    <p class="mb-2">Total Project</p>
                    <h6 class="mb-0">{{ $totalProject }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center  p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-5">
                    <p class="mb-2">Total Completed Project </p>
                    <h6 class="mb-0">{{ $totalCompletedProject }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-5">
                    <p class="mb-2">Today Project Received</p>
                    <h6 class="mb-0">{{ $todayProjectReceived }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center  p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-5">
                    <p class="mb-2">Total Pending Project</p>
                    <h6 class="mb-0">{{ $totalPendingProject }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center  p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-5">
                    <p class="mb-2">Total Earning</p>
                    <h6 class="mb-0">₹ {{ $totalPendingProject }}.00</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                    <a href="">Show All</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-8">
            <div class="h-100 bg-light rounded p-4">
                <div class="card" style="height: 50vh">
                    <div class="card-header">
                        <h4 class="text-center m-0">Notice Board</h4>
                    </div>
                    <div class="card-body">
                        <marquee style="height: 38vh" scrollamount="3" behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->
<script>
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
