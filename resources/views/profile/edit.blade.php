@extends('templates.default')

@section('content')
<section class="section">


    <div class="section-body">
        <h2 class="section-title">Edit Profil</h2>
        <p class="section-lead">Ubah profil Tanggal lahir dan Alamat</p>

        <form method="POST" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input name="name" type="text" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" readonly class="form-control" placeholder="Masukkan Nama Lengkap" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="birth" type="date" class="form-control" placeholder="Masukkan Tanggal Lahir" value="{{$user->birth ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input name="address" type="text" class="form-control" placeholder="Masukkan Alamat Lengkap" value="{{$user->address ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input name="image" type="file" class="form-control" placeholder="Masukkan Alamat Lengkap" accept="image/*">
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Tambah kategori</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

@endsection