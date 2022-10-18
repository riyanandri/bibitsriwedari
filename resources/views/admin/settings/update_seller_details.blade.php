@extends('admin.layouts.master')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengaturan Penjual</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Penjual</li>
            </ol>
        </nav>

        @if ($slug=="personal")
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Detail Penjual</h6>
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
                        <form class="forms-sample" action="{{ url('admin/update-seller-details/personal') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="sellerEmail" class="form-label">Email</label>
                                        <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="sellerName" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="sellerName"
                                            value="{{ Auth::guard('admin')->user()->name }}" name="sellerName" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="sellerAddress" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="sellerAddress"
                                            value="{{ $sellerDetails['address'] }}" name="sellerAddress" placeholder="Alamat Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="sellerCity" class="form-label">Kota</label>
                                        <input type="text" class="form-control" id="sellerCity"
                                            value="{{ $sellerDetails['city'] }}" name="sellerCity" placeholder="Kota asal" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="sellerState" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" id="sellerState"
                                            value="{{ $sellerDetails['state'] }}" name="sellerState" placeholder="Provinsi asal" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="sellerCountry" class="form-label">Negara</label>
                                        <input type="text" class="form-control" id="sellerCountry"
                                            value="{{ $sellerDetails['country'] }}" name="sellerCountry" placeholder="Negara asal" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="sellerPinCode" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control" id="sellerPinCode"
                                            value="{{ $sellerDetails['pincode'] }}" name="sellerPinCode" placeholder="Kode pos" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="sellerPhone" class="form-label">No Handphone</label>
                                        <input type="text" class="form-control" id="sellerPhone"
                                            value="{{ $sellerDetails['phone'] }}" name="sellerPhone" maxlength="12"
                                            minlength="10" placeholder="No handphone" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="sellerPhoto" class="form-label">Foto Penjual</label>
                                        <input type="file" class="form-control" id="sellerPhoto" name="sellerPhoto">
                                        @if(!empty(Auth::guard('admin')->user()->image))
                                            <a target="_blank" href="{{ url('admin/assets/images/photos/'.Auth::guard('admin')->user()->image) }}">lihat foto</a>
                                            <input type="hidden" name="oldSellerImage" value="{{ Auth::guard('admin')->user()->image }}">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button class="btn btn-secondary">Kembali</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @elseif ($slug=="business")

        @elseif ($slug=="bank")

        @endif
    </div>
@endsection
