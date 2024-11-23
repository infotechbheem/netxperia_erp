@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center m-0 p-2">Create New Project</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('client.project.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Project Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                    @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                    @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="budget" class="form-label">Budget</label>
                    <input type="number" class="form-control" id="budget" name="budget" required min="0" step="0.01">
                    @error('budget')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-select" id="priority" name="priority" required>
                        <option value="">Select Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    @error('priority')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div id="documentSection" class="mb-3">
                    <label class="form-label">Upload Documents (optional)</label>
                    <div class="document-field mb-2">
                        <input type="file" class="form-control" name="documents[]" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                        <button type="button" class="btn btn-danger remove-document mt-2" style="display:none;">Remove</button>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary" id="addDocument">Add More Documents</button>

                <button type="submit" class="btn btn-primary">Create Project</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addDocumentButton = document.getElementById("addDocument");
        const documentSection = document.getElementById("documentSection");

        // Add more document fields
        addDocumentButton.addEventListener("click", function() {
            const newDocumentField = document.createElement("div");
            newDocumentField.classList.add("document-field", "mb-2");
            newDocumentField.innerHTML = `
                <input type="file" class="form-control" name="documents[]" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                <button type="button" class="btn btn-danger remove-document mt-2">Remove</button>
            `;
            documentSection.appendChild(newDocumentField);
        });

        // Remove document fields
        documentSection.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-document")) {
                e.target.parentElement.remove();
            }
        });
    });

    $(document).ready(function() {
        // Function to validate the form
        $('#projectForm').on('submit', function(e) {
            let isValid = true;

            // Clear previous error messages
            $('.text-danger').remove();

            // Validate required fields
            $(this).find(':input[required]').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).after('<span class="text-danger">This field is required</span>');
                }
            });

            // Validate budget
            const budget = $('#budget').val();
            if (budget < 0) {
                isValid = false;
                $('#budget').after('<span class="text-danger">Budget must be a positive number</span>');
            }

            // Validate document uploads
            let documentFields = $('input[type="file"][name="documents[]"]');
            let validFileTypes = /(\.pdf|\.doc|\.docx|\.jpg|\.jpeg|\.png)$/i;

            documentFields.each(function() {
                if ($(this).val() && !validFileTypes.exec($(this).val())) {
                    isValid = false;
                    $(this).after('<span class="text-danger">Invalid file type. Please upload PDF, DOC, DOCX, JPG, JPEG, or PNG.</span>');
                }
            });

            // Prevent form submission if not valid
            if (!isValid) {
                e.preventDefault();
            }
        });
    });

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
