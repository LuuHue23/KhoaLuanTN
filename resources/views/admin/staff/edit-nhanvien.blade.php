@extends('admin.master')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cập nhật thông tin nhân viên</h4>

          <form class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
              @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="row">
              <div class="col-md-6">

               <div class="form-group">
                <label for="exampleFormControlSelect13">Chức vụ</label>
                <select class="form-control" name="Id_Position">
                 @foreach($posit as $row)
                 <option value="{{$row->Id_Position}}" {{($row->Id_Position == $staf->Id_Position)?'selected':''}}>{{$row->Position_Name}}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" value="{{$staf->email}}">
            </div>
          </div>

        </div>


        <!-- <form class="forms-sample"> -->


          <div class="row">

            <div class="col-md-6">
             <div class="form-group">
              <label for="exampleFormControlSelect14">Phòng ban</label>
              <select class="form-control" name="Id_Depart">
               @foreach($depart as $value)
               <option value="{{$value->Id_Depart}}" {{($value->Id_Depart==$staf->Id_Depart)?'selected':''}}">{{$value->Depart_Name}}</option>
               @endforeach
             </select>
           </div>
         </div>
         <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Họ và tên</label>
            <input type="text" class="form-control" name="Staff_Name" value="{{$staf->Staff_Name}}">
          </div>
        </div>
        <!--  <div class="col-md-6">

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="Password" value="{{$staf->password}}">
          </div>
        </div> -->

      </div>
      <div class="row">
        
        
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Chức danh</label>
            <div class="col-sm-4">
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="Status" value="1" {{($staf->Status==1)?'checked':''}} >
                  Quản trị
                </label>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="Status"  value="0" {{($staf->Status==0)?'checked':''}}>
                  Nhân viên
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="file" name="file">
            <img src="{{url('/')}}/uploads/{{$staf->image}}" alt="">
          </div>
        </div>
      </div>
    
      <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
      <button class="btn btn-outline-danger"  href="{{url()->previous()}}">Hủy</button>
    </form>
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
<!-- content-wrapper ends -->

@stop