@extends('admin.master')
@section('main')
  <div class="content-wrapper">
          <div class="row">
           <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-center">Mục tiêu</h4>
                 <!--  -->
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table"  cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>STT</th>
                                <th>Tên mục tiêu</th>
                                <th>Nhóm mục tiêu</th>
                                <th>Ngày kết thúc</th>
                                <th>Trọng số</th>
                                <td>Tiến độ</td>
                                <th>Hành động </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->target->Tar_Name}}</td>
                                <td>{{$row->target->targetgroup->TarG_Name}}</td>
                                <td>{{$row->Date_End}}</td>
                                <td>{{$row->target->Impor}}</td>

                                <td>
                                 <div class="progress progress-sm">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: {{$row->target->percent}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                                <td>
                                  <button class="btn btn-light">
                                   <a href="{{route('work',['Id_Tar'=>$row->Id_Tar])}}" style="text-decoration: none" > <i class="mdi mdi-eye text-primary"></i>Thực hiện</a>
                                  </button>
                                <!--   <button class="btn btn-light">
                                   <a href="" style="text-decoration: none" type="submit"> <i class="mdi mdi-check text-danger"></i>Hoàn thành</a>
                                  </button> -->
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
        </div>
@stop