@extends('admin.layouts.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengaturan Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Detail</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Admin Detail</h6>
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

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ url('admin/update-admin-details') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="adminType" class="form-label">Tipe Admin</label>
                                <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="adminName" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="adminName"
                                    value="{{ Auth::guard('admin')->user()->name }}" name="adminName" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminPhone" class="form-label">No Handphone</label>
                                <input type="text" class="form-control" id="adminPhone"
                                    value="{{ Auth::guard('admin')->user()->phone }}" name="adminPhone" maxlength="12"
                                    minlength="10" placeholder="Masukkan no handphone" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminPhoto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="adminPhoto" name="adminPhoto" required>
                                @if (!empty(Auth::guard('admin')->user()->image))
                                    <a target="_blank" href="{{ url('admin/assets/images/photos/'.Auth::guard('admin')->user()->image) }}">lihat foto</a>
                                    <input type="hidden" name="oldImage" value="{{ Auth::guard('admin')->user()->image }}">
                                @endif
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
