@extends('templates.default')

@section('content')
<section class="section">


    <div class="section-body">
        <h2 class="section-title">List Pertanyaanmu</h2>
        <p class="section-lead">Pertanyaanmu ada disini, silahkan lihat apakah terdapat diskusi dipertanyaanmu</p>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pertanyaan</h4>
                        <div class="card-header-action">
                            <a href="{{route('question.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Buat Pertanyaan </a>
                        </div>
                    </div>

                    @forelse($items as $item)
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            <a href="{{route('question.show',$item->id)}}" class="text-decoration-none">
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <span class="badge badge-primary">{{$item->category->category}}</span>
                                        </div>
                                        <div class="media-title mb-1">{{$item->title}}</div>
                                        <div class="text-time">{{$item->updated_at->diffForHumans()}}</div>
                                        <div class="media-links">
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
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
                            Anda belum mengirimkan pertanyaan
                        </ul>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
</section>
@endsection