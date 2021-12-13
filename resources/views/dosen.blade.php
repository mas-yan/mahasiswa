@extends('layout.main')
@section('title','home')
@section('main')
<div class="container">
	<div class="row">
		<div class="col-md-3 mt-5">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<p>Tambah Mahasiswa</p>
				</div>
				<div class="card-body">
					<form action="" method="post">
						@csrf
						<div class="form-group">
							<label for="nim">nim</label>
							<input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
						</div>
						<div class="form-group">
							<label for="fakultas">fakultas</label>
							<input type="text" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror" id="fakultas">
						</div>
						<div class="form-group">
							<label for="prodi">prodi</label>
							<input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" id="prodi">
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-9 mt-5">
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">NIM</th>
						<th scope="col">Nama</th>
						<th scope="col">Fakultas</th>
						<th scope="col">Prodi</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection()