
								
										<table  class="table table-bordered">
											
											<thead>
												<tr>
													<th>STT</th>
													<th>Mã nhân viên</th>
													<th>Nhân viên</th>									
													<th>Tổng hiệu suất (%)</th>
													<th>Lương cơ bản</th>								
													<th>Tổng lương (VNĐ)</th>
													<th>Ngày cập nhật</th>
												</tr>
											</thead>
											<tbody>

												@foreach($staff as $row)
												<tr>
													<td>{{$loop->index+1}}</td>
													<td>{{$row->Id_Staff}}</td>
													<td>{{$row->Staff_Name}}</td>
													<td>{{$row->total_rate}}</td>  
													<td>{{number_format($row->position->Salary,0)}}</td>
												
													<td>{{number_format($row->Salary,0)}}</td> 
													<td>{{$row->updated_at}}</td>        
												</tr>
												@endforeach
											</tbody>
										</table>
								