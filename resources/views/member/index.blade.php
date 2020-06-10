@extends('member.master')
@section('main')
<div class="content-wrapper">

  <div class="row">
    <div class="col-lg-4 d-flex flex-column">
      <div class="row flex-grow">
      </div>
    </div>
    
    
  </div>
  
  <div class="row grid-margin">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Mục tiêu</h6>
          <div class="d-flex table-responsive">
            <div class="btn-group mr-2">
              <button class="btn btn-sm btn-info"><i class="mdi mdi-plus-circle-outline"></i> Add</button>
            </div>
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-light"><i class="mdi mdi-alert-circle-outline"></i></button>
              <button type="button" class="btn btn-light"><i class="mdi mdi-delete-empty"></i></button>
            </div>
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-light"><i class="mdi mdi-printer"></i></button>
            </div>
          <form action="{{route('search')}}">
            <div class="btn-group ml-auto mr-2 border-0">
              <input type="text" class="form-control" placeholder="Search Y-M-D" name="search">
            </div>
            <input type="submit" hidden>
          </form >
            <div class="btn-group">
              <button type="button" class="btn btn-light"><i class="mdi mdi-cloud"></i></button>
              <button type="button" class="btn btn-light"><i class="mdi mdi-dots-vertical"></i></button>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table mt-3 border-top">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã mục tiêu </th>
                  <th>Nhóm mục tiêu</th>
                  <th>Tiến độ</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($workpro as $row)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$row->target->Tar_Name}}</td>
                  <td >{{$row->target->targetgroup->TarG_Name}}</td>
                  <td>
                   <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$row->target->percent}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  @if($row->target->process==0)
                  <div class="badge badge-danger badge-fw">Đang tiến hành</div>
                  @else
                    <div class="badge badge-success badge-fw">Đã hoàn thành</div>
                  @endif
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
          <p class="mb-3 mb-sm-0">Showing 1 to 20 of 20 entries</p>
          <nav>
           
           <!--  <ul class="pagination pagination-info mb-0">
              <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
              <li class="page-item active"><a class="page-link">1</a></li>
              <li class="page-item"><a class="page-link">2</a></li>
              <li class="page-item"><a class="page-link">3</a></li>
              <li class="page-item"><a class="page-link">4</a></li>
              <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
            </ul> -->
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-md-flex align-items-center justify-content-center text-center text-md-left">
          <i class="mdi mdi-facebook icon-lg text-facebook"></i>
          <div class="wrapper ml-md-3">
            <p class="text-facebook mb-0 font-weight-medium">15k Likes</p>
            <small class="text-muted mb-0">You main list growing !</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-md-flex align-items-center justify-content-center text-center text-md-left">
          <i class="mdi mdi-twitter icon-lg text-twitter"></i>
          <div class="wrapper ml-md-3">
            <p class="text-twitter mb-0 font-weight-medium">18k followers</p>
            <small class="text-muted mb-0">There you are !</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-md-flex align-items-center justify-content-center text-center text-md-left">
          <i class="mdi mdi-linkedin icon-lg text-linkedin"></i>
          <div class="wrapper ml-md-3">
            <p class="text-linkedin mb-0 font-weight-medium">5k connections</p>
            <small class="text-muted mb-0">Going good !</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-flex align-items-center justify-content-start justify-content-sm-center">
          <img class="img-md rounded" src="{{url('public/Admin')}}/images/faces/face1.jpg" alt="">
          <div class="wrapper ml-4">
            <p class="mb-0 font-weight-medium">Tim Cook</p>
            <small class="text-muted mb-0">timcook@gmail.com</small>
            <p class="text-success mb-0 font-weight-medium">Designer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-flex align-items-center justify-content-start justify-content-sm-center">
          <img class="img-md rounded" src="{{url('public/Admin')}}/images/faces/face2.jpg" alt="">
          <div class="wrapper ml-4">
            <p class="mb-0 font-weight-medium">Sarah Graves</p>
            <small class="text-muted mb-0">Sarahgraves@gmail.com</small>
            <p class="text-success mb-0 font-weight-medium">Developer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-flex align-items-center justify-content-start justify-content-sm-center">
          <img class="img-md rounded" src="{{url('public/Admin')}}/images/faces/face3.jpg" alt="">
          <div class="wrapper ml-4">
            <p class="mb-0 font-weight-medium">David Grey</p>
            <small class="text-muted mb-0">David@gmail.com</small>
            <p class="text-success mb-0 font-weight-medium">Support Lead</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial:partials/_footer.html -->
<!-- PHẦN CHÂN TRANG CHUNG -->
<footer class="footer">
  <div class="container-fluid clearfix">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2017 <a href="#">UrbanUI</a>. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
  </div>
</footer>
<!-- partial -->
</div>
@stop