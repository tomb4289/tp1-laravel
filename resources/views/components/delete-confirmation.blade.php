<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $student->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel{{ $student->id }}">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Confirm Deletion
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <div class="avatar-lg bg-danger text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                        <i class="bi bi-person-x-fill fs-1"></i>
                    </div>
                    <h4 class="text-danger">Are you sure?</h4>
                </div>
                
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Warning:</strong> This action cannot be undone. The following student will be permanently deleted:
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="mb-1">{{ $student->name }}</h6>
                                <small class="text-muted">{{ $student->email }}</small><br>
                                <small class="text-muted">{{ $student->city->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <p class="text-muted mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Student ID: #{{ $student->id }} | Created: {{ $student->created_at->format('M d, Y') }}
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>
                    Cancel
                </button>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i>
                        Delete Student
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-lg {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
    font-weight: 600;
}

.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 1rem;
    font-weight: 600;
}
</style>
