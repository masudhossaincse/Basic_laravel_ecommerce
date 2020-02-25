@extends('admin.master')

@section('content')
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<div class="container">
	<table class="table table-bordered table-hover">
		<tbody>
			<tr>
				<th>ID</th>
				<th>Manufacturer Name</th>
				<th>Manufacturer Description</th>
				<th>Publication Status</th>
				<th>Action</th>
			</tr>
			@foreach($manufacturers as $manufacturer)
			<tr>
				<th scope="row">{{ $manufacturer->id }}</th>
				<td>{{ $manufacturer->manufacturerName }}</td>
				<td>{{ $manufacturer->manufacturerDescription }}</td>
				<td>{{ $manufacturer->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
				<td>
					<a href="{{ url('/manufacturer/edit/'.$manufacturer->id) }}" class="btn btn-sm btn-success">
						<i class="fas fa-edit"></i>
					</a>
					<a href="{{ url('/manufacturer/delete/'.$manufacturer->id) }}" onclick="return confirm('Are yor sure to delete');" class="btn btn-sm btn-danger">
						<i class="fas fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
	
		
	

@endsection