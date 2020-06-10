@extends('admin/master')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">THÊM MỚI NHÂN VIÊN</h4>

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
               <option value="{{$row->Id_Position}}">{{$row->Position_Name}}</option>
               @endforeach
             </select>
           </div>
         </div>
         <div class="col-md-6">
          <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập vào Email nhân viên">
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
             <option value="{{$value->Id_Depart}}">{{$value->Depart_Name}}</option>
             @endforeach
           </select>
         </div>
       </div>
       <div class="col-md-6">

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Họ và tên</label>
          <input type="text" class="form-control" name="Staff_Name" placeholder="Nhập vào tên nhân viên">
        </div>
      </div>
   <div class="col-md-6">
      <div class="form-group">
        <label for="">Chọn ảnh</label>
        <input type="file" name="file">
      </div>
    </div>
      
    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Chức danh</label>
          <div class="col-sm-4">
            <div class="form-radio">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="Status" value="1" checked>
                Quản trị
              </label>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="form-radio">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="Status"  value="0">
                Nhân viên
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>



    <button type="submit" class="btn btn-success mr-2">Thêm mới</button>
    <!-- <button class="btn btn-light" onclick="window.location='{{ URL::previous()}}'">Hủy</button> -->
    <!-- </form> -->
  </form>
</div>

</div>
</div>

<div class="col-12 ">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center">THÔNG TIN NHÂN VIÊN</h4>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table" cellspacing="0" width="100%">
              <thead>
                <tr class="bg-primary text-white">
                  <th>STT</th>
                  <th>Ảnh</th>
                  <th>Chức vụ</th>
                  <th>Phòng ban</th>
                  <th>Họ và tên</th>
                  <th>Email</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
               @foreach($staff as $row)
               <tr>
                <td>{{$loop->index+1}}</td>
                <td><img src="{{url('')}}/uploads/{{$row->image}}" alt=""></td>
                <td>{{$row->position->Position_Name}}</td>
                <td>{{$row->depart->Depart_Name}}</td> 	
                <td>{{$row->Staff_Name}}</td>
                <td>{{$row->email}}</td>
                
                <td>
                  <button class="btn btn-light">
                    <a href="{{route('edit_staff',['Id_Staff'=>$row->Id_Staff])}}"><i class="mdi mdi-eye text-primary"></i>Sửa</a>
                  </button>
                  <button class="btn btn-light">
                    <a href="{{route('delete_staff',['Id_Staff'=>$row->Id_Staff])}}" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="mdi mdi-close text-danger"></i>Xóa bỏ</a>
                  </button>
                </td>
              </tr>
              @endforeach


            </tbody>
          </table>       
        {{$staff->links()}}
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
<!-- content-wrapper ends -->
</div>
@stop