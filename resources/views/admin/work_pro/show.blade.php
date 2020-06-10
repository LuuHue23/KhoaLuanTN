@extends('admin.master')
@section('main')
<div class="content-wrapper">
  <div class="row grid-margin">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">{{$workpro->target->Tar_Name}} </h3>
          <h5 class="normal">Thời hạn: {{$workpro->Date_Start}}-{{$workpro->Date_End}}</h5>
          <h5>Nhân viên: {{$workpro->staff->Staff_Name}}</h5>
        @if($workpro->target->process==0)
          <div class=" badge badge-primary badge-fw" style="line-height: 2; margin-bottom: 8px">  Đang thực hiện  </div>
        @else
            <div class=" badge badge-success badge-fw" style="line-height: 2; margin-bottom: 8px">  Đang thực hiện  </div>
        @endif
          <h6>Tiến độ thực hiện</h6>
          
          <div class="d-flex justify-content-between mt-2">
            <small></small>           
            <small>{{$percent}}%</small>
          </div>
          <div class="progress progress-sm-6">
            <div class="progress-bar bg-info" role="progressbar" style="width: {{$percent}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
         


          <div class="col-md-6" style="margin-top:8px">
     
              @foreach($data as $row)
              
              <div class="list-wrapper ">
                <ul class="d-flex flex-column-reverse todo-list">
                  @if($row->status==1)
                  <div class="completed">
                  <li>                   
                    <div class="form-check" >
                      <label class="form-check-label" >
                        <input class="checkbox" type="checkbox" value="{{$row->id}}" name="status[]" checked="checked">
                        {{$row->todo_name}} 
                      </label>
                    </div>
                    <!-- <i class="remove mdi mdi-close-circle-outline"></i> -->
                  </li>
                </div>
                  @else
                 <li>                   
                    <div class="form-check" >
                      <label class="form-check-label" >
                        <input class="checkbox" type="checkbox" value="{{$row->id}}" name="status[]">
                        {{$row->todo_name}} 
                      </label>
                    </div>
                    <!-- <i class="remove mdi mdi-close-circle-outline"></i> -->
                  </li>
                  @endif
                </ul>
              </div>               
              @endforeach  

   
          </div>       
        </div>
        @stop
