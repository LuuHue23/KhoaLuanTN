@extends('member.master')
@section('main')
<div class="content-wrapper">
	<div class="row user-profile">
		<div class="col-lg-4 side-left d-flex align-items-stretch">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body avatar">
							<h4 class="card-title">Thông tin</h4>
							@foreach($staff as $row)
							<img src="{{url('')}}/uploads/{{Auth::guard('acc')->user()->image}}" alt="">           
							 <p class="name">{{$row->Staff_Name}}</p>
							<p class="designation">-  UI/UX  -</p>
							<p class="d-block text-center text-dark" href="#">{{$row->email}}</p>
							<p class="d-block text-center text-dark" href="#">{{$row->position->Position_Name}}</p>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-12 stretch-card">
					<div class="card">
						<div class="card-body overview">
							<ul class="achivements">
								<li><p>{{$count}}</p><p>Tổng KPI</p></li>
								<li><p>{{$targetdo}}</p><p>Hoàn thành</p></li>
								<li><p>{{$target}}</p><p>Chưa HT</p></li>
							</ul>
                   <!--    <div class="wrapper about-user">
                        <h4 class="card-title mt-4 mb-3">About</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam consectetur ex quod.</p>
                      </div> -->
                      <div class="info-links">
                        <a class="website" href="http://urbanui.com/">
                          <i class="mdi mdi-earth text-gray"></i>
                          <span>http://urbanui.com/</span>
                        </a>
                        <a class="social-link" href="#">
                          <i class="mdi mdi-facebook text-gray"></i>
                          <span>https://www.facebook.com/johndoe</span>
                        </a>
                        <a class="social-link" href="#">
                          <i class="mdi mdi-linkedin text-gray"></i>
                          <span>https://www.linkedin.com/johndoe</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 side-right stretch-card">
	<div class="card">
		<div class="card-body">
			<div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
				<h4 class="card-title mb-0">Chi tiết</h4>
				<ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Thông tin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Ảnh</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Bảo mật</a>
					</li>
				</ul>
			</div>
			<div class="wrapper">
				<hr>
				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
						<form action="{{route('edit_acc')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="name">Họ và tên</label>
								<input type="text" class="form-control" name="Staff_Name" value="{{$staf->Staff_Name}}">
							</div>

							<!-- <div class="form-group">
								<label for="exampleFormControlSelect13">Chức vụ</label>
								<select class="form-control" name="Id_Position">
									@foreach($posit as $row)
									<option value="{{$row->Id_Position}}" {{($row->Id_Position == $staf->Id_Position)?'selected':''}}>{{$row->Position_Name}}</option>
									@endforeach
								</select>
							</div> -->
								<div class="form-group">
								<label for="">Chức vụ</label>
								<input type="text" class="form-control" name="Id_Position" readonly="" value="{{$staf->position->Position_Name}}">
							</div>

						<!-- 	<div class="form-group">
								<label for="exampleFormControlSelect14">Phòng ban</label>
								<select class="form-control" name="Id_Depart">
									@foreach($depart as $value)
									<option value="{{$value->Id_Depart}} {{($value->Id_Depart==$staf->Id_Depart)?'selected':''}}">{{$value->Depart_Name}}</option>                        		
									@endforeach
								</select>
							</div> -->
							<div class="form-group">
								<label for="">Phòng ban</label>
								<input type="text" class="form-control" name="depart" readonly="" value="{{$staf->depart->Depart_Name}}">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" value="{{$staf->email}}">
							</div>

							<div class="form-group mt-5">
								<button type="submit" class="btn btn-success mr-2">Cập nhật</button>
								<!-- <button class="btn btn-outline-danger">Hủy bỏ</button> -->
								<a href="{{url()->previous()}}" class="btn btn-outline-danger">Hủy bỏ</a>
							</div>
						</form>
					</div><!-- tab content ends -->
					<div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
						<div class="wrapper mb-5 mt-4">
							<span class="badge badge-warning text-white">Note : </span>
							<p class="d-inline ml-3 text-muted">Image size is limited to not greater than 1MB .</p>
						</div>
						@if(Session::has('succes_message'))
						<div class="alert alert-success alert-dismisible fade show" role="alert" >
							{{Session::get('succes_message')}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>

							</button>

						</div>
						@endif
						<form action="{{route('update_img')}}" method="POST" enctype="multipart/form-data">
							@csrf

							<input type="file" name="file" >
							<img src="{{url('/')}}/uploads/{{$staf->image}}" alt="">
							<div class="form-group mt-5">
								<button type="submit" class="btn btn-success mr-2">Cập nhật</button>
								<a href="{{url()->previous()}}" class="btn btn-outline-danger">Hủy bỏ</a>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						@if(Session::has('error_message'))
						<div class="alert alert-danger alert-dismisible fade show" role="alert" >
							{{Session::get('error_message')}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>

							</button>

						</div>
						@endif
							@if(Session::has('success_message'))
						<div class="alert alert-success alert-dismisible fade show" role="alert" >
							{{Session::get('success_message')}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>

							</button>

						</div>
						@endif
						<form action="{{route('update_pas')}}" method="POST" enctype="multipart/form-data">	
							@csrf
							<div class="form-group">
								<label for="change-password">Đổi mật khẩu</label>
								<input type="password" class="form-control" name="password" placeholder="Mật khẩu hiện tại">
							
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="newpas" placeholder="Nhập mật khẩu mới">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="updatepas" placeholder="Nhập lại mật khẩu mới">
							</div>

							<div class="form-group mt-5">
								<button type="submit" class="btn btn-success mr-2">Cập nhật</button>
								<a href="{{url()->previous()}}" class="btn btn-outline-danger">Hủy bỏ</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
	<div class="container-fluid clearfix">
		<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2017 <a href="#">UrbanUI</a>. All rights reserved.</span>
		<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
	</div>
</footer>
<!-- partial -->
</div>
@stop