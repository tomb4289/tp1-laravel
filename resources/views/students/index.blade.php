@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">
                        <i class="bi bi-people-fill me-2 text-primary"></i>
                        Students Management
                    </h1>
                    <p class="text-muted mb-0">Manage and view all student records</p>
                </div>
                <div>
                    <a href="{{ route('students.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>
                        Add New Student
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $students->total() }}</h4>
                            <p class="card-text">Total Students</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-people-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $students->count() }}</h4>
                            <p class="card-text">Showing</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-eye-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $students->currentPage() }}</h4>
                            <p class="card-text">Current Page</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-file-earmark-text-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $students->lastPage() }}</h4>
                            <p class="card-text">Total Pages</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-collection-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="search-container">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" class="form-control table-search" placeholder="Search students by name, email, or city...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="cityFilter">
                                <option value="">All Cities</option>
                                @foreach(\App\Models\City::all() as $city)
                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="sortBy">
                                <option value="name">Sort by Name</option>
                                <option value="email">Sort by Email</option>
                                <option value="created_at">Sort by Date Added</option>
                                <option value="city">Sort by City</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-table me-2"></i>
                        Students List
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($students->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">
                                            <input type="checkbox" class="form-check-input" id="selectAll">
                                        </th>
                                        <th scope="col">
                                            <i class="bi bi-person-fill me-1"></i>Name
                                        </th>
                                        <th scope="col">
                                            <i class="bi bi-envelope-fill me-1"></i>Email
                                        </th>
                                        <th scope="col">
                                            <i class="bi bi-telephone-fill me-1"></i>Phone
                                        </th>
                                        <th scope="col">
                                            <i class="bi bi-geo-alt-fill me-1"></i>City
                                        </th>
                                        <th scope="col">
                                            <i class="bi bi-calendar-fill me-1"></i>Date of Birth
                                        </th>
                                        <th scope="col">
                                            <i class="bi bi-gear-fill me-1"></i>Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="form-check-input student-checkbox" value="{{ $student->id }}">
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $student->name }}</h6>
                                                        <small class="text-muted">ID: {{ $student->id }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $student->email }}" class="text-decoration-none">
                                                    {{ $student->email }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $student->phone_number }}" class="text-decoration-none">
                                                    {{ $student->phone_number }}
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-geo-alt me-1"></i>
                                                    {{ $student->city->name }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-muted">
                                                    {{ \Carbon\Carbon::parse($student->date_of_birth)->format('M d, Y') }}
                                                </span>
                                                <br>
                                                <small class="text-muted">
                                                    ({{ \Carbon\Carbon::parse($student->date_of_birth)->age }} years old)
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('students.show', $student) }}" 
                                                       class="btn btn-sm btn-outline-info" 
                                                       title="View Details">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('students.edit', $student) }}" 
                                                       class="btn btn-sm btn-outline-primary" 
                                                       title="Edit Student">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('students.destroy', $student) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger btn-delete" 
                                                                title="Delete Student">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                            <h4 class="text-muted mt-3">No Students Found</h4>
                            <p class="text-muted">Get started by adding your first student.</p>
                            <a href="{{ route('students.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i>
                                Add First Student
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($students->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>

@push('styles')
<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 1rem;
    font-weight: 600;
}

.search-container {
    position: relative;
}

.search-container .search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    z-index: 10;
}

.search-container .form-control {
    padding-left: 40px;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

.btn-group .btn {
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

.pagination {
    justify-content: center !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select All functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const studentCheckboxes = document.querySelectorAll('.student-checkbox');
    
    selectAllCheckbox.addEventListener('change', function() {
        studentCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
    
    // Individual checkbox change
    studentCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedCount = document.querySelectorAll('.student-checkbox:checked').length;
            selectAllCheckbox.checked = checkedCount === studentCheckboxes.length;
            selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < studentCheckboxes.length;
        });
    });
    
    // Search functionality
    const searchInput = document.querySelector('.table-search');
    const tableRows = document.querySelectorAll('tbody tr');
    
    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // City filter
    const cityFilter = document.getElementById('cityFilter');
    cityFilter.addEventListener('change', function() {
        const filterValue = this.value.toLowerCase();
        
        tableRows.forEach(row => {
            const cityCell = row.querySelector('td:nth-child(5)');
            if (cityCell) {
                const cityName = cityCell.textContent.toLowerCase();
                if (filterValue === '' || cityName.includes(filterValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
});
</script>
@endpush
@endsection
