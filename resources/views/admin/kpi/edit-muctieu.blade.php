<!-- @extends('Admin.master') -->
@section('main')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sửa mục tiêu</h4>

          <form class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- <input type="hidden" name="method" value="PUT"> -->
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="form-group">
              <label for="exampleFormControlSelect2">Nhóm mục tiêu</label>

              <select class="form-control" name="Id_TarG">
                @foreach($kpi as $row)
                <option value="{{$row->Id_TarG}}" {{($row->Id_TarG==$target->Id_TarG)?'selected':''}}>{{$row->TarG_Name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputName10">Tên mục tiêu</label>
              <input type="text" class="form-control" name="Tar_Name" placeholder="Nhập vào tên mục tiêu" value="{{$target->Tar_Name}}">
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Mức độ</label>
                <input type="number" name="Impor" class="form-control" value="{{$target->Impor}}">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Mô tả</label>
              <textarea class="form-control" name="Description" rows="2" >{{$target->Description}}</textarea>
            </div>


            <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
            <button class="btn btn-light"  href="{{url()->previous()}}">Hủy</button>
          </form>
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

<!-- content-wrapper ends -->
</div>



@stop