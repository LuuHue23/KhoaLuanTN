@extends('admin.master')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thông tin nhân viên</h4>
          <div class="row grid-margin">
            <div class="col-12">



                <form action="{{route('search_staf')}}" method="GET" >
                  @csrf
                  <div class="form-group">
                    <label class="sr-only" for="">label</label>
                    <input type="text " class="form-control search" placeholder="Nhập tên nhân viên" name="search" style="width: 24%; float: left; margin-bottom: 10px"> 

                 
                  </div>
                  <button type="submit" class="btn btn-success" style=" padding-left: 6px;
    margin-top: 2px;"><i class="fa fa-search" aria-hidden="true" ></i>  Tìm kiếm</button>
                </form>
            


            </div>
          </div>
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
                          @foreach($staf as $value)
                          <tr>
                            <td>{{$loop->index+1}}</td>
                              <td><img src="{{url('')}}/uploads/{{$value->image}}" alt=""></td>
                            <td>{{$value->position->Position_Name}}</td>
                            <td>{{$value->depart->Depart_Name}}</td>
                            <td>{{$value->Staff_Name}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                              <button class="btn btn-light">
                               <a href="{{route('edit_staff',['Id_Staff'=>$value->Id_Staff])}} " style="text-decoration: none"> <i class="mdi mdi-eye text-primary"></i>Sửa</a>
                             </button>
                             <button class="btn btn-light" >
                              <a  href="{{route('delete_staff',['Id_Staff'=>$value->Id_Staff])}}" style="text-decoration: none" onclick="return confirm('Bạn có chắc muốn xóa không?')" ><i class="mdi mdi-close text-danger"></i>Xóa bỏ</a> 
                            </button>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>   
                    {{$staf->links()}}                    
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
    <script src="{{url('public/Admin')}}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{url('public/Admin')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{url('public/Admin')}}/js/data-table.js"></script>