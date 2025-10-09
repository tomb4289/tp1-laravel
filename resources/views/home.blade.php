@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">
                <i class="bi bi-speedometer2 me-2 text-primary"></i>
                Dashboard
            </h1>
            <p class="text-muted mb-0">Welcome to the Student Management System</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="card-title">{{ $totalStudents }}</h2>
                            <p class="card-text">Total Students</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-people-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="card-title">{{ $totalCities }}</h2>
                            <p class="card-text">Total Cities</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-geo-alt-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-lightning-fill me-2"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Add New Student
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('students.index') }}" class="btn btn-outline-primary btn-lg w-100">
                                <i class="bi bi-people-fill me-2"></i>
                                View All Students
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('cities.index') }}" class="btn btn-outline-success btn-lg w-100">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                Manage Cities
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Students -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-clock-history me-2"></i>
                        Recent Students
                    </h5>
                </div>
                <div class="card-body">
                    @if($recentStudents->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentStudents as $student)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                                    </div>
                                                    {{ $student->name }}
                                                </div>
                                            </td>
                                            <td>{{ $student->email }}</td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $student->city->name }}</span>
                                            </td>
                                            <td>{{ $student->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-info">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">No students found. Add your first student to get started!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Top Cities -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-trophy-fill me-2"></i>
                        Top Cities
                    </h5>
                </div>
                <div class="card-body">
                    @if($citiesWithStudentCount->count() > 0)
                        @foreach($citiesWithStudentCount as $city)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h6 class="mb-0">{{ $city->name }}</h6>
                                    <small class="text-muted">{{ $city->students_count }} students</small>
                                </div>
                                <div class="progress" style="width: 60px; height: 8px;">
                                    <div class="progress-bar" role="progressbar" 
                                         style="width: {{ ($city->students_count / $totalStudents) * 100 }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-geo-alt text-muted" style="font-size: 2rem;"></i>
                            <p class="text-muted mt-2">No cities with students found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.avatar-sm {
    width: 32px;
    height: 32px;
    font-size: 0.875rem;
    font-weight: 600;
}

.progress {
    background-color: #e9ecef;
}

.progress-bar {
    background-color: #0d6efd;
}
</style>
@endpush
@endsection
