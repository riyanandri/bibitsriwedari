@extends('admin.layouts.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengaturan Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Admin Password</h6>
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erorr :</strong> {{ Session::get('error_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success :</strong> {{ Session::get('success_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input class="form-control" value="{{ $adminDetails['email'] }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="adminType" class="form-label">Tipe Admin</label>
                                <input class="form-control" value="{{ $adminDetails['type'] }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="oldPassword"
                                    placeholder="Masukan password lama" name="oldPassword" required>
                                <span id="check-password"></span>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="newPassword"
                                    placeholder="Masukkan password baru" name="newPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPassword" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="confirmNewPassword"
                                    placeholder="Konfirmasi password baru" name="confirmNewPassword" required>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button class="btn btn-secondary">Kembali</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
