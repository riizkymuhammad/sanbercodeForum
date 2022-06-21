@extends('templates.default')

@push('after-style')
<link rel="stylesheet" href="{{ asset('/assets/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/node_modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
<section class="section">


    <div class="section-body">
        <h2 class="section-title">Pertanyaan</h2>
        <p class="section-lead">Pertanyaan tentang</p>


        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pertanyaan</h4>
                    </div>

                  
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            <a href="{{route('question.show',$items->id)}}" class="text-decoration-none">
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="70" @if(isset($items->user->avatar))  src="{{ asset('avatar/'.$items->user->avatar) }}" @else  src="{{asset('assets/img/avatar/avatar-1.png')}}" @endif >
                                    <div class="media-body">
                                        <div class="media-right">
                                        <span class="badge badge-primary">{{$items->category->category}}</span>
                                        </div>
                                        <div class="media-title mb-1">{{$items->title}}</div>
                                        <div class="text-time">{{$items->updated_at->diffForHumans()}}</div>
                                        <div class="media-links">
                                            <a href="{{route('question.edit',$items->id)}}">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jawaban</h4>
                    </div>

                    @forelse($answers as $answer)
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            <a href="{{route('question.show',$items->id)}}" class="text-decoration-none">
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <span class="badge badge-primary">{{$answer->category_id}}</span>
                                        </div>
                                        <div class="media-description">{!!$answer->answer!!}</div>
                                        <div class="text-time">{{$answer->updated_at->diffForHumans()}}</div>
                                        <div class="media-links">
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>
                    @empty
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            Belum ada yang menjawab pertanyaan anda!
                        </ul>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>

        <form method="post" action="{{route('question.answer',$items->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                    <div class="card-header">
                    <h4>Jawab Pertanyaan</h4>
                  </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jawaban Anda</label>
                                <textarea name="answer" class="summernote-simple"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Pendukung</label>
                                <input name="images" type="file" class="form-control" accept="image/*">
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