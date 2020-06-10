@extends('admin.master')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thêm mới KPI</h4>

          <form class="forms-sample" method="POST" action="" encytype='multipart/form-data'>
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
           
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Nhóm mục tiêu</label>

                      <select class="form-control" name="Id_TarG">
                        @foreach($kpi as $row)
                        <option value="{{$row->Id_TarG}}">{{$row->TarG_Name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputName10">Tên mục tiêu</label>
                      <input type="text" class="form-control" name="Tar_Name" placeholder="Nhập vào tên mục tiêu">
                    </div>
                    </div>

                

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Mức độ</label>
                      <input type="number" name="Impor" class="form-control" placeholder="15">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleTextarea1">Mô tả</label>
                      <textarea class="form-control" name="Description" rows="2"></textarea>
                    </div>
                  </div>


                    <button type="submit" class="btn btn-success mr-2">Thêm mới</button>
                  <!--   <button class="btn btn-light">Hủy</button> -->
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mục tiêu</h4>
                 <!--  <div class="row grid-margin">
                    <div class="col-12">
                      <div class="alert alert-warning" role="alert">
                        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>STT</th>
                              <th>Mã Mục tiêu</th>
                              <th>Mã nhóm mục tiêu</th>
                              <th>Tên mục tiêu</th>
                              <th>Mô tả</th>
                              <th>Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($kpii as $row)
                            <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$row->Id_Tar}}</td>
                              <td>{{$row->targetgroup->TarG_Name}}</td>
                              <td>{{$row->Tar_Name}}</td>
                              <td>{{$row->Description}}</td>
                              <td>
                                <button class="btn btn-light">
                                 <a href="{{route('edit_kpi',['Id_Tar'=>$row->Id_Tar])}}"> <i class="mdi mdi-eye text-primary"></i>Sửa</a>
                               </button>
                               <button class="btn btn-light">
                                 <a href="{{route('delete_kpi',['Id_Tar'=>$row->Id_Tar])}}" onclick="return confirm('Bạn chắc chắn xóa chứ?')"> <i class="mdi mdi-close text-danger"></i>Xóa</a>
                               </button>
                             </td>
                           </tr>
                           @endforeach
                      

                          
                        </tbody>
                      </table>                        
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

        <!-- content-wrapper ends -->
      </div>
      @stop