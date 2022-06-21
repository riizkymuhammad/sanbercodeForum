@extends('templates.default')

@section('content')
<section class="section">


  <div class="section-body">
    <h2 class="section-title">Profile</h2>
   


    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
     
        <div class="card profile-widget">
        <div class=" ml-auto">
                      <a href="{{route('profile.create')}}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-pencil-alt"></i> Edit Biodata </a>
        </div>
          <div class="profile-widget-header">
            <img alt="image" src="{{ asset('avatar/'.$user->avatar) }}" class="rounded-circle profile-widget-picture">

            <div class="profile-widget-items">
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">{{$user->birth ?? '-'}}</div>
                <div class="profile-widget-item-value"><i class="fa fa-birthday-cake fa-lg text-primary"></i></div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">{{$user->address ?? '-'}}</div>
                <div class="profile-widget-item-value"><i class="fa fa-map-marked-alt fa-lg text-primary"></i></div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description pb-0">
            <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal">
                <div class="slash"></div> <small> {{$user->email}} </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection