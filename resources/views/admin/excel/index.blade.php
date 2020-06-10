@extends('admin.master')
@section('main')
<div class="content-wrapper">
	<div class="row">		
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body ">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title text-center">LƯƠNG NHÂN VIÊN</h3>								
								@include('admin.excel.table',$staff);
									<button class="btn btn-success" style="margin-top:10px" type="submit">Cập nhật</button>
									<button class="btn btn-success"  style="margin-top:10px" > <a href="{{route('export_view')}}">Xuat</a></button>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@stop