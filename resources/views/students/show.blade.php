@extends('layouts.app')

@section('title', 'Student Details - ' . $student->name)

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $student->name }}</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">
                        <i class="bi bi-person-fill me-2 text-primary"></i>
                        Student Details
                    </h1>
                    <p class="text-muted mb-0">Complete information for {{ $student->name }}</p>
                </div>
                <div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-1"></i>
                            Edit Student
                        </a>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Student Information Card -->
        <div class="col-lg-8">
            <!-- Personal Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Personal Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="avatar-xl bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                            <h4 class="mb-1">{{ $student->name }}</h4>
                            <p class="text-muted mb-0">Student ID: #{{ $student->id }}</p>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bold text-muted">Full Name</label>
                                    <p class="mb-0">{{ $student->name }}</p>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bold text-muted">Email Address</label>
                                    <p class="mb-0">
                                        <a href="mailto:{{ $student->email }}" class="text-decoration-none">
                                            <i class="bi bi-envelope me-1"></i>
                                            {{ $student->email }}
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bold text-muted">Phone Number</label>
                                    <p class="mb-0">
                                        <a href="tel:{{ $student->phone_number }}" class="text-decoration-none">
                                            <i class="bi bi-telephone me-1"></i>
                                            {{ $student->phone_number }}
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bold text-muted">Date of Birth</label>
                                    <p class="mb-0">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                                    </p>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bold text-muted">Age</label>
                                    <p class="mb-0">
                                        <i class="bi bi-person-badge me-1"></i>
                                        {{ \Carbon\Carbon::parse($student->date_of_birth)->age }} years old
                                    </p>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bold text-muted">City</label>
                                    <p class="mb-0">
                                        <span class="badge bg-primary">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            {{ $student->city->name }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Address Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fw-bold text-muted">Complete Address</label>
                            <div class="p-3 bg-light rounded">
                                <i class="bi bi-house me-2"></i>
                                {{ $student->address }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        System Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-bold text-muted">Created</label>
                            <p class="mb-0">
                                <i class="bi bi-calendar-plus me-1"></i>
                                {{ $student->created_at->format('F d, Y \a\t g:i A') }}
                            </p>
                            <small class="text-muted">{{ $student->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-bold text-muted">Last Updated</label>
                            <p class="mb-0">
                                <i class="bi bi-calendar-check me-1"></i>
                                {{ $student->updated_at->format('F d, Y \a\t g:i A') }}
                            </p>
                            <small class="text-muted">{{ $student->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="bi bi-lightning-fill me-2"></i>
                        Quick Actions
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>
                            Edit Student
                        </a>
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="bi bi-telephone me-2"></i>
                            Contact Student
                        </button>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#emailModal">
                            <i class="bi bi-envelope me-2"></i>
                            Send Email
                        </button>
                        <hr>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100" 
                                    onclick="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                                <i class="bi bi-trash me-2"></i>
                                Delete Student
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- City Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        City Information
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="avatar-lg bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            {{ strtoupper(substr($student->city->name, 0, 1)) }}
                        </div>
                        <h5 class="mb-1">{{ $student->city->name }}</h5>
                        <p class="text-muted mb-3">Student's City</p>
                        <a href="{{ route('cities.show', $student->city) }}" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-eye me-1"></i>
                            View City Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="bi bi-bar-chart-fill me-2"></i>
                        Statistics
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <h4 class="text-primary mb-0">{{ $student->city->students->count() }}</h4>
                            <small class="text-muted">Students in {{ $student->city->name }}</small>
                        </div>
                        <div class="col-6">
                            <h4 class="text-success mb-0">{{ \App\Models\Student::count() }}</h4>
                            <small class="text-muted">Total Students</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">
                    <i class="bi bi-telephone-fill me-2"></i>
                    Contact {{ $student->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </div>
                    <h5>{{ $student->name }}</h5>
                    <p class="text-muted">{{ $student->email }}</p>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="tel:{{ $student->phone_number }}" class="btn btn-success">
                        <i class="bi bi-telephone me-2"></i>
                        Call {{ $student->phone_number }}
                    </a>
                    <a href="mailto:{{ $student->email }}" class="btn btn-primary">
                        <i class="bi bi-envelope me-2"></i>
                        Send Email
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">
                    <i class="bi bi-envelope-fill me-2"></i>
                    Send Email to {{ $student->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </div>
                    <h5>{{ $student->name }}</h5>
                    <p class="text-muted">{{ $student->email }}</p>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $student->email }}?subject=Hello from Student Management System" class="btn btn-primary">
                        <i class="bi bi-envelope me-2"></i>
                        Send Email
                    </a>
                    <a href="mailto:{{ $student->email }}?subject=Welcome to our program" class="btn btn-outline-primary">
                        <i class="bi bi-envelope-open me-2"></i>
                        Send Welcome Email
                    </a>
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
.avatar-xl {
    width: 100px;
    height: 100px;
    font-size: 2.5rem;
    font-weight: 600;
}

.avatar-lg {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
    font-weight: 600;
}

.form-label {
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.bg-light {
    background-color: #f8f9fa !important;
}

@media (max-width: 768px) {
    .avatar-xl {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
    
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-group {
        width: 100%;
    }
    
    .btn-group .btn {
        flex: 1;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactButtons = document.querySelectorAll('[data-bs-target="#contactModal"], [data-bs-target="#emailModal"]');
    contactButtons.forEach(button => {
        button.addEventListener('click', function() {
            console.log('Contact action initiated for student: {{ $student->name }}');
        });
    });
    
    const deleteButton = document.querySelector('button[type="submit"]');
    if (deleteButton) {
        deleteButton.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete {{ $student->name }}? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    }
});
</script>
@endpush
@endsection
