@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Project Analytics and Reports Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Project Analytics & Reports</h2>
        </div>
        <div class="card-body">

            <!-- Introduction Section -->
            <div class="mb-4 text-center">
                <p class="text-muted">Gain insights into your project performance through detailed analytics and reports. Here you can track progress, evaluate outcomes, and make informed decisions.</p>
            </div>

            <!-- Key Metrics Section -->
            <div class="row mb-4">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Projects</h5>
                            <h2 class="text-primary">15</h2>
                            <p class="text-muted">Projects Completed</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Average Completion Time</h5>
                            <h2 class="text-primary">30 Days</h2>
                            <p class="text-muted">Average per Project</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Client Satisfaction</h5>
                            <h2 class="text-primary">92%</h2>
                            <p class="text-muted">Based on Surveys</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Performance Charts Section -->
            <div class="mb-5">
                <h2 class="mb-4">Project Performance Overview</h2>
                <canvas id="performanceChart" style="height: 400px;"></canvas>
                <!-- Chart.js Script -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var ctx = document.getElementById('performanceChart').getContext('2d');
                        var performanceChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Project A', 'Project B', 'Project C', 'Project D', 'Project E'],
                                datasets: [{
                                    label: 'Completion Rate (%)',
                                    data: [75, 90, 85, 95, 70],
                                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

            <!-- Detailed Reports Section -->
            <div class="mt-5">
                <h2 class="mb-4">Detailed Project Reports</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Client Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project A</td>
                            <td>Jan 1, 2024</td>
                            <td>Feb 15, 2024</td>
                            <td>Completed</td>
                            <td>Excellent</td>
                        </tr>
                        <tr>
                            <td>Project B</td>
                            <td>Feb 20, 2024</td>
                            <td>Mar 30, 2024</td>
                            <td>In Progress</td>
                            <td>Good</td>
                        </tr>
                        <tr>
                            <td>Project C</td>
                            <td>Mar 5, 2024</td>
                            <td>Apr 20, 2024</td>
                            <td>Completed</td>
                            <td>Very Good</td>
                        </tr>
                        <tr>
                            <td>Project D</td>
                            <td>Apr 15, 2024</td>
                            <td>May 25, 2024</td>
                            <td>Pending</td>
                            <td>N/A</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Download Reports Section -->
            <div class="mt-5 text-center">
                <h3>Download Project Reports</h3>
                <p>Access comprehensive reports for your projects in various formats.</p>
                <a href="#" class="btn btn-primary">Download PDF Report</a>
                <a href="#" class="btn btn-secondary">Download Excel Report</a>
            </div>

        </div>
    </div>
</div>

@endsection
