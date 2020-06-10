@extends('member.master')
@section('main')
  <div class="content-wrapper">
          <div class="row">
           <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center" style='text-transform: uppercase;'>Mục tiêu đã đánh giá</h5>
                  <div class="row grid-margin">
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table"  cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>STT</th>
                                <th>Tên mục tiêu</th>
                                <th>Nhóm mục tiêu</th>
                                <th>Hạn hoàn thành</th>
                                <th>Ngày hoàn thành</th>
                                <td>Đánh giá (%)</td>
                               
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->todo->workpro->target->Tar_Name}}</td>
                                <td>{{$row->todo->workpro->target->targetgroup->TarG_Name}}</td>
                                <td>{{$row->todo->workpro->Date_End}}</td>
                                <td>{{$row->todo->updated_at}}</td>
                                <td>{{$row->Rate}}</td>
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