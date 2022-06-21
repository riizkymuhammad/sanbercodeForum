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
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                                <div class="media-body">
                                    <div class="media-right">
                                        <div class="text-primary">Approved</div>
                                    </div>
                                    <div class="media-title mb-1">{{Auth::user()->name}}</div>
                                    <div class="text-time">Yesterday</div>
                                    <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                    <div class="media-links">
                                        <a href="#">View</a>
                                        <div class="bullet"></div>
                                        <a href="#">Edit</a>
                                        <div class="bullet"></div>
                                        <a href="#" class="text-danger">Trash</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection