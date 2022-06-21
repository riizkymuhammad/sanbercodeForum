@extends('templates.default')
@push('after-style')
<link rel="stylesheet" href="{{ asset('/assets/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('content')
<section class="section">


    <div class="section-body">
        <h2 class="section-title">Tambah Kategori</h2>
        <p class="section-lead">Tambahkan kategori dan detail kategori.</p>

        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kategori</label>
                                <input name="category" type="text" class="form-control" placeholder="Masukkan judul kategori">
                            </div>
                            <div class="form-group">
                                <label>Detail Kategori</label>
                                <textarea name="detail" class="summernote-simple"></textarea>
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

@push('after-script')
<script src="{{ asset('/assets/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('/assets/js/page/forms-advanced-forms.js') }}"></script>
@endpush