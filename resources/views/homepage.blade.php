@extends('templates.default')

@section('content')
<section class="section">

  <div class="section-body">
    <h2 class="section-title">Forum Diskusi</h2>
    <p class="section-lead">Tempat diskusi para developer dengan cara mengajukan pertannyaan atau menjawab sebuah pertanyaan.</p>

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-8 col-md-9 col-lg-9">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketik disini untuk mencari pertanyaan" aria-label="">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4 col-md-3 col-lg-3 ">
                <div class="form-group">
                <a href="{{route('question.create')}}" class="btn btn-primary text-white">Tambah Pertanyaan</a>
                </div>          
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @forelse($items as $item)
    <div class="card">
      <a href="{{route('question.show',$item->id)}}" class="text-decoration-none">
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
            <li class="media">
              <img alt="image" class="mr-3 rounded-circle" width="70" @if(isset($item->user->avatar))  src="{{ asset('avatar/'.$item->user->avatar) }}" @else  src="{{asset('assets/img/avatar/avatar-1.png')}}" @endif >
              <div class="media-body">
                <div class="media-right">
                  <span class="badge badge-primary">{{$item->category->category}}</span>
                </div>
                <div class="media-title mb-1">{{$item->title}}</div>
                <div class="text-time">{{$item->updated_at->diffForHumans()}}</div>
                <div class="media-links">
                  <a href="#">View</a>
                  <div class="bullet"></div>
                  <a href="#">Edit</a>
                  <div class="bullet"></div>
                  <form action="{{route('question.destroy',$item->id)}}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-outline-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                  <!-- <a href="{{route('question.destroy',$item->id)}}" class="text-danger">Trash</a> -->
                </div>
              </div>
            </li>

          </ul>

        </div>
      </a>
    </div>
    @empty
    <div class="card">
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
          Anda belum mengirimkan pertanyaan
        </ul>
      </div>
    </div>
    @endforelse



  </div>
</section>
@endsection