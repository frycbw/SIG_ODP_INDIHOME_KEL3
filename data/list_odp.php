
<div class="container">
	<div class="box">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-body">

							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Lokasi ODP</th>
										<th>Pelanggan</th>
										<th>Latitude</th>
										<th>Longtitude</th>
										<th width="200px">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 

        			//Query
					
									$sql = $conn->query("SELECT * from presensi order by id desc");
									$nomor=1;

									while ($data = $sql->fetch_array()) {            
										?>
										<tr>
											<td><?php echo $nomor++; ?></td>
											<td><?php echo $data['nim']; ?></td>
											<td><?php echo $data['pelanggan']; ?></td>
											<td><?php echo $data['x']; ?></td>
											<td><?php echo $data['y']; ?></td>
											<td>
												<a href="?page=delete&nim=<?php echo $data['nim'] ?>" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i> hapus</a>
												<a href="?page=edit&nim=<?php echo $data['nim'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
</div>
      <!-- /.row -->