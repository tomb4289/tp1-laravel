@extends('layouts.app')

@section('title', 'Add New Student')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Student</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">
                        <i class="bi bi-person-plus-fill me-2 text-primary"></i>
                        Add New Student
                    </h1>
                    <p class="text-muted mb-0">Fill in the information below to create a new student record</p>
                </div>
                <div>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back to Students
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Form -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Student Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="bi bi-person-fill me-2"></i>
                                    Personal Information
                                </h6>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label required">Full Name</label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       placeholder="Enter student's full name"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label required">Email Address</label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="student@example.com"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label required">Phone Number</label>
                                <input type="tel" 
                                       class="form-control @error('phone_number') is-invalid @enderror" 
                                       id="phone_number" 
                                       name="phone_number" 
                                       value="{{ old('phone_number') }}" 
                                       placeholder="(123) 456-7890"
                                       pattern="^\(\d{3}\) \d{3}-\d{4}$"
                                       title="Canadian phone format: (123) 456-7890"
                                       required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label required">Date of Birth</label>
                                <input type="date" 
                                       class="form-control @error('date_of_birth') is-invalid @enderror" 
                                       id="date_of_birth" 
                                       name="date_of_birth" 
                                       value="{{ old('date_of_birth') }}" 
                                       max="{{ date('Y-m-d', strtotime('-18 years')) }}"
                                       required>
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Student must be at least 18 years old</small>
                            </div>
                        </div>

                        <!-- Address Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="bi bi-geo-alt-fill me-2"></i>
                                    Address Information
                                </h6>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="address" class="form-label required">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" 
                                          id="address" 
                                          name="address" 
                                          rows="3" 
                                          placeholder="Enter complete address"
                                          required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="city_id" class="form-label required">City</label>
                                <select class="form-select @error('city_id') is-invalid @enderror" 
                                        id="city_id" 
                                        name="city_id" 
                                        required>
                                    <option value="">Select a city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" 
                                                {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    <i class="bi bi-info-circle me-1"></i>
                                    {{ $cities->count() }} cities available
                                </small>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-1"></i>
                                        Cancel
                                    </a>
                                    <div>
                                        <button type="button" class="btn btn-outline-info me-2" id="previewBtn">
                                            <i class="bi bi-eye me-1"></i>
                                            Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Create Student
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar with Help and Tips -->
        <div class="col-lg-4">
            <!-- Help Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="bi bi-question-circle-fill me-2"></i>
                        Form Help
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <strong>Name:</strong> Enter the student's full legal name
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <strong>Email:</strong> Must be a valid, unique email address
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <strong>Phone:</strong> Canadian format: (123) 456-7890
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <strong>Date of Birth:</strong> Student must be at least 18 years old
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <strong>Address:</strong> Complete street address
                        </li>
                        <li class="mb-0">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <strong>City:</strong> Select from available cities
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="bi bi-bar-chart-fill me-2"></i>
                        Current Statistics
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <h4 class="text-primary mb-0">{{ \App\Models\Student::count() }}</h4>
                            <small class="text-muted">Total Students</small>
                        </div>
                        <div class="col-6">
                            <h4 class="text-success mb-0">{{ $cities->count() }}</h4>
                            <small class="text-muted">Available Cities</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">
                    <i class="bi bi-eye-fill me-2"></i>
                    Student Preview
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span id="previewInitial">?</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 id="previewName">Student Name</h4>
                        <p class="text-muted mb-3">Student Information Preview</p>
                        
                        <div class="row">
                            <div class="col-6">
                                <strong>Email:</strong><br>
                                <span id="previewEmail">-</span>
                            </div>
                            <div class="col-6">
                                <strong>Phone:</strong><br>
                                <span id="previewPhone">-</span>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-6">
                                <strong>Date of Birth:</strong><br>
                                <span id="previewDob">-</span>
                            </div>
                            <div class="col-6">
                                <strong>Age:</strong><br>
                                <span id="previewAge">-</span>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-12">
                                <strong>Address:</strong><br>
                                <span id="previewAddress">-</span>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-12">
                                <strong>City:</strong><br>
                                <span id="previewCity">-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.required::after {
    content: " *";
    color: #dc3545;
    font-weight: bold;
}

.avatar-lg {
    width: 80px;
    height: 80px;
    font-size: 2rem;
    font-weight: 600;
}

.form-control:focus,
.form-select:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.border-bottom {
    border-bottom: 2px solid #dee2e6 !important;
}

.text-primary {
    color: #0d6efd !important;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .d-flex.justify-content-between > div {
        width: 100%;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone_number');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
        } else if (value.length >= 3) {
            value = value.replace(/(\d{3})(\d{0,3})/, '($1) $2');
        }
        e.target.value = value;
    });

    const dobInput = document.getElementById('date_of_birth');
    dobInput.addEventListener('change', function() {
        const dob = new Date(this.value);
        const today = new Date();
        const age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        if (age < 18) {
            this.setCustomValidity('Student must be at least 18 years old');
        } else {
            this.setCustomValidity('');
        }
    });

    const previewBtn = document.getElementById('previewBtn');
    const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
    
    previewBtn.addEventListener('click', function() {
        const name = document.getElementById('name').value || 'Student Name';
        const email = document.getElementById('email').value || '-';
        const phone = document.getElementById('phone_number').value || '-';
        const dob = document.getElementById('date_of_birth').value;
        const address = document.getElementById('address').value || '-';
        const citySelect = document.getElementById('city_id');
        const city = citySelect.options[citySelect.selectedIndex].text || '-';
        
        let age = '-';
        if (dob) {
            const birthDate = new Date(dob);
            const today = new Date();
            age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            age += ' years old';
        }
        
        document.getElementById('previewInitial').textContent = name.charAt(0).toUpperCase();
        document.getElementById('previewName').textContent = name;
        document.getElementById('previewEmail').textContent = email;
        document.getElementById('previewPhone').textContent = phone;
        document.getElementById('previewDob').textContent = dob ? new Date(dob).toLocaleDateString() : '-';
        document.getElementById('previewAge').textContent = age;
        document.getElementById('previewAddress').textContent = address;
        document.getElementById('previewCity').textContent = city;
        
        previewModal.show();
    });

    const form = document.querySelector('.needs-validation');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
});
</script>
@endpush
@endsection
