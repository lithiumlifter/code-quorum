@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert" style="position: relative; z-index: 9999;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-3">
            <div class="d-flex align-item-center">
                <div class="d-flex">
                    <div class="fs-2 fw-bold me-2 mb-0">
                        Setting
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg8 mb-5 mb-lg-0">
                <div class="card card-discussion mb-5 p-3">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('profile.updatePassword', ['profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password:</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="current_password" name="current_password">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password:</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new_password" name="new_password">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm New Password:</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-blue-main-color">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
        <script>
            // Fungsi untuk menampilkan atau menyembunyikan karakter password
            function togglePasswordVisibility(inputId) {
                const input = document.getElementById(inputId);
                input.type = input.type === 'password' ? 'text' : 'password';
            }

            // Toggle current password visibility
            document.getElementById('toggleCurrentPassword').addEventListener('click', function () {
                togglePasswordVisibility('current_password');
            });

            // Toggle new password visibility
            document.getElementById('toggleNewPassword').addEventListener('click', function () {
                togglePasswordVisibility('new_password');
            });

            // Toggle confirm new password visibility
            document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
                togglePasswordVisibility('new_password_confirmation');
            });
        </script>
@endpush