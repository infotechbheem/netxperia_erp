@extends('auth.admin.layouts.app')

@section('main-container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header text-center">
                    <h2 class="card-title">Project Invoice Registration Form</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.client.invoice.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $invoiceDetails->client_id }}">
                        <input type="hidden" name="project_id" value="{{ $invoiceDetails->project_id }}">
                        <input type="hidden" name="title" value="{{ $invoiceDetails->title }}">
                        <input type="hidden" name="client_name" value="{{ $invoiceDetails->client_name }}">
                        <input type="hidden" name="address" value="{{ $invoiceDetails->client_address }}">
                        <input type="hidden" name="email" value="{{ $invoiceDetails->client_email }}">
                        <input type="hidden" name="phone_number" value="{{ $invoiceDetails->client_phone_number }}">

                        <div id="invoice-rows">
                            <!-- Invoice Row Template -->
                            <div class="row invoice-row">
                                <div class="col-md-4 col-sm-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="">Service Name</label>
                                        <input class="form-control" type="text" name="service_name[]" value="{{ old('service_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-7">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="service_description[]" cols="30" rows="1" class="form-control">{{ old('service_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12 col-lg-2">
                                    <div class="form-group">
                                        <label for="">Total Amount</label>
                                        <input type="number" name="total_amount[]" class="form-control" value="{{ old('total_amount') }}">
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-danger remove-row"><i class="fas fa-trash-alt"></i> Delete</button>
                                </div>
                            </div>
                        </div>

                        <!-- Add Row Button -->
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-info" id="add-row"><i class="fas fa-plus mr-2"></i>Add More</button>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Discount In %</label>
                                    <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" required>
                                    @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Tax in %</label>
                                    <input type="number" class="form-control" id="tax" name="tax" value="{{ old('tax') }}" required>
                                    @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript to add and delete rows -->
<script>
    document.getElementById('add-row').addEventListener('click', function() {
        // Select the invoice row to clone
        let invoiceRow = document.querySelector('.invoice-row');

        // Clone the row
        let newRow = invoiceRow.cloneNode(true);

        // Reset the input values of the cloned row
        newRow.querySelectorAll('input, textarea').forEach(input => input.value = '');

        // Append the cloned row to the invoice-rows container
        document.getElementById('invoice-rows').appendChild(newRow);

        // Add event listener to the new row's delete button
        newRow.querySelector('.remove-row').addEventListener('click', function() {
            deleteRow(this);
        });
    });

    // Add event listener to the initial delete button
    document.querySelectorAll('.remove-row').forEach(button => {
        button.addEventListener('click', function() {
            deleteRow(this);
        });
    });

    function deleteRow(button) {
        // Ensure there's more than one row before allowing deletion
        if (document.querySelectorAll('.invoice-row').length > 1) {
            button.closest('.invoice-row').remove();
        } else {
            alert("At least one invoice row is required.");
        }
    }

</script>
@endsection
