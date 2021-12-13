@extends('layout.main')
@section('title','mahasiswa')
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
					@foreach($mahasiswa as $mhs)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $mhs->nim }}</td>
						<td>{{ $mhs->nama }}</td>
						<td>{{ $mhs->fakultas }}</td>
						<td>{{ $mhs->prodi }}</td>
						<td>
							<button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah{{ $mhs->id }}"><i class="far fa-edit"></i></button>
							<a href="mahasiswa/{{ $mhs->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
					<!-- Modal tambah -->
<div class="modal fade" id="modal-tambah{{ $mhs->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="">
				@method('put')
				@csrf
					<input type="hidden" name="id" value="{{ $mhs->id }}"></input>
					<div class="card-body">
						<div class="form-group">
							<label for="nim">NIM</label>
							<input name="nim" value="{{ $mhs->nim }}" type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="NIS">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input name="nama" value="{{ $mhs->nama }}" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama">
						</div>
						<div class="form-group">
							<label for="fakultas">Fakultas</label>
							<input name="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror" id="fakultas" value="{{ $mhs->fakultas }}">
						</div>
						<div class="form-group">
							<label for="prodi">Prodi</label>
							<input name="prodi" value="{{ $mhs->prodi }}" type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" placeholder="prodi">
						</div>
					</div>
					<!-- /.card-body -->
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="tombol_tambah" class="btn btn-primary">Tambah Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal tambah -->
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection()