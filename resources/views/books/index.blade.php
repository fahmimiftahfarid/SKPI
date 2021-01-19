@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h2>Data Buku</h2>

			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Tambah</button>

			<div class="modal fade" id="exampleModal">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <form action="{{ route('book.store') }}" method="post">
			        	@csrf

			        	<div class="form-group">
			        		<label for="judul">Judul:</label>
			        		<input name="judul" type="text" class="form-control" placeholder="Judul Buku">
			        	</div>
				    </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				        <button type="submit" class="btn btn-primary">Simpan</button>
				      </div>
			        </form>
			    </div>
			  </div>
			</div>

			<hr>

			<table class="table table-bordered">
				<thead>
					<tr>
						<td>No.</td>
						<td>Judul</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					@foreach($books as $book)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $book->judul }}</td>
						<td>
							<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-{{ $book->_id }}">Edit</button>
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $book->_id }}">Hapus</button>
						</td>
					</tr>

					<div class="modal fade" id="modal-{{ $book->_id }}">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					        <form action="{{ route('book.update', ['book' => $book->_id]) }}" method="post">
					        	@csrf

					        	@method('patch')

					        	<div class="form-group">
					        		<label for="judul">Judul:</label>
					        		<input name="judul" type="text" class="form-control" value="{{ $book->judul }}">
					        	</div>
						    </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						        <button type="submit" class="btn btn-primary">Update</button>
						      </div>
					        </form>
					    </div>
					  </div>
					</div>

					<div class="modal fade" id="delete-{{ $book->_id }}">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					      	Anda yakin ingin menghapus buku dengan judul: {{ $book->judul }}?
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					        <form action="{{ route('book.destroy', ['book' => $book->_id]) }}" class="d-inline" method="post">
					        	@csrf

					        	@method('delete')

						        <button type="submit" class="btn btn-danger">Hapus</button>	
					        </form>
					      </div>
					    </div>
					  </div>
					</div>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection