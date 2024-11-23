$(document).ready(function () {
    $('#department').on('change', function () {
        var department = $(this).val();

        if (department) {
            $.ajax({
                // Use Blade's route() helper here
                url: "project/department/get-employee", // Correct route
                type: "GET",
                data: { department: department },
                success: function (response) {
                    $('#employee').empty();
                    $('#employee').append('<option value="">--Select Employee--</option>');

                    $.each(response, function (key, employee) {
                        $('#employee').append('<option value="' + employee.id + '">' + employee.name + '</option>');
                    });
                },
                error: function () {
                    alert('Error occurred while fetching employees!');
                }
            });
        } else {
            $('#employee').empty();
            $('#employee').append('<option value="">--Select Employee--</option>');
        }
    });

     // Attach a click event listener to all delete buttons 
     document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function (event) {
            // alert("clicked");
            event.preventDefault(); // Prevent the default link behavior

            // Use SweetAlert2 to show a confirmation dialog
            Swal.fire({
                title: 'Are you sure you want to proceed?',
                text: 'Once you delete this project, it will be permanently removed and cannot be recovered.!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to the delete URL
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });

    // Project Details Section Start
    $('#submit-btn').on('click', function (e) {
        e.preventDefault();

        var employeeId = $('#employee').val();
        var empIdInput = $('#emp_id').val();

        // Priority given to Employee ID if filled
        if (empIdInput) {
            employeeId = empIdInput;
        }

        if (!employeeId) {
            alert("Please select an employee or enter an employee ID");
            return;
        }

        // Fetch project details for the selected employee
        $.ajax({
            url: "project/project-details", // Add your route to get project details
            type: "GET",
            data: { employee_id: employeeId },
            success: function (response) {
                // Show the project details section and populate the data
                $('#project-details').show();

                $('#project-details').html(`
                    <div class="col-md-4">
                        <p><strong>Employee ID : </strong>${response.employee.id}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Employee Name : </strong>${response.employee.name}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Department : </strong>${response.employee.department}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Total Project : </strong>${response.total_projects}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Total Completed Project : </strong>${response.completed_projects}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Total Pending Project : </strong>${response.pending_projects}</p>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Project Name</th>
                                    <th>Assign Date</th>
                                    <th>Deadline</th>
                                    <th>Completed Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${response.projects.map((project, index) => `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>${project.name}</td>
                                        <td>${project.assign_date}</td>
                                        <td>${project.deadline}</td>
                                        <td>${project.completed_time ? project.completed_time : '-'}</td>
                                        <td>${project.status}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                `);
            },
            error: function () {
                alert('Error fetching project details.');
            }
        });
    });

});
