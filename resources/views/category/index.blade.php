@extends('templates.default')

@push('after-style')
<link rel="stylesheet" href="{{ asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">


    <div class="section-body">
        <h2 class="section-title">List Kategori Pertanyaan</h2>
        <p class="section-lead">List kategori pertanyaan ada disini!</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List kategori</h4>
                        <div class="card-header-action">
                            <a href="{{route('category.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Kategori </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Kategori</th>
                                        <th>Detail Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $item)
                                    <tr>
                                        <td>
                                            {{$item->id}}
                                        </td>
                                        <td>{{$item->category}}</td>
                                        <td>
                                            {!! $item->detail !!}
                                        </td>
                                        <td><a href="#" class="btn btn-primary">List Pertanyaan</a></td>
                                    </tr>
                                    @empty
                                    <td>Data kategori tidak tersedia</td>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-script')
<script src="{{ asset('/assets/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/page/modules-datatables.js') }}"></script>
@endpush