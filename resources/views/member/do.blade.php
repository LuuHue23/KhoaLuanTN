@extends('member.master')
@section('main')
<div class="content-wrapper">
  <div class="row grid-margin">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">{{$target->target->Tar_Name}} </h3>
          <h5>Thời hạn: {{$target->Date_Start}} - {{$target->Date_End}}</h5>
             <div class="col-md-6">
              <form action="{{route('doo')}}" method="POST">
                @csrf
                <input type="hidden" name="Id_Tar" value="{{$target->Id_Tar}}">
                 <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <select name="process" class="form-control"  >
                      <option  value="0" {{($target->target->process==0)?'selected':''}}>Đang tiến hành</option>
                      <option  value="1" {{($target->target->process==1)?'selected':''}}>Đã hoàn thành</option>
                      
                    </select>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-success">
                      <i class="mdi mdi-loop"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            
          </div>


 

            <h6>Tiến độ thực hiện</h6>

            <div class="d-flex justify-content-between mt-2">
              <small></small>           
              <small>{{$percent}}%</small>
            </div>
            <div class="progress progress-sm-6">
              <div class="progress-bar bg-info" role="progressbar" style="width: {{$percent}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="col-md-6" style="margin-top:8px">
              <form action="{{route('do',['Id_Tar'=>$target->Id_Tar])}}" method="POST"> 
                @csrf
              <div class="add-items d-flex">
                <!-- <input type="hidden" name="Id_Tar" value="{{$target->Id_Tar}}"> -->

                <input type="text" class="form-control todo-list-input" name="todo_name"  placeholder="Công việc cần tiến hành">
                <button class="add btn btn-primary font-weight-bold todo-list-btn " type="submit">Thêm</button>
              </div>      
            </form>
          </div>


            <form action="{{route('do_list')}}" method="POST">
              @csrf
              @foreach($data as $row)
              <!-- <input type="hidden" name="id" value="{{$row->id}}">  -->

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

              <button class="btn btn-success" type="submit" style="margin-top: 17px">Lưu</button>
            </form>
          </div>       
        </div>
        @stop
