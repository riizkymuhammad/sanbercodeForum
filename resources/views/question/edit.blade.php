@extends('templates.default')
@push('after-style')
<link rel="stylesheet" href="{{ asset('/assets/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/node_modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
<section class="section">


    <div class="section-body">
        <h2 class="section-title">Tanya Pertanyaanmu</h2>
        <p class="section-lead">Ubah pertanyaan secara ringkas dan jelas.</p>

        <form method="post" action="{{route('question.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="title" type="text" class="form-control" placeholder="Masukkan judul pertanyaan" value="{{$question->title}}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="summernote-simple">{{$question->description}} </textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Pendukung</label>
                                <input name="images" type="file" class="form-control" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="category_id" class="form-control select2">
                                    <option>Masukkan Kategori Pertanyaan</option>
                                    @foreach($categories as $key => $value)
                                    <option value="{{$key}}" {{ ($key == $question->category_id) ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{ asset('/assets/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
@endpush