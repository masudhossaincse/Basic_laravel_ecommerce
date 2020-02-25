@extends('admin.master')

@section('content')
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<div class="container">
	<table class="table table-bordered table-hover">
		<tbody>
			<tr>
				<th>ID</th>
				<th>Category Name</th>
				<th>Category Description</th>
				<th>Publication Status</th>
				<th>Action</th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<th scope="row">{{ $category->id }}</th>
				<td>{{ $category->categoryName }}</td>
				<td>{{ $category->categoryDescription }}</td>
				<td>{{ $category->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
				<td>
					<a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-success">
						<i class="fas fa-edit"></i>
					</a>
					<a href="{{ url('/category/delete/'.$category->id) }}" onclick="return confirm('Are yor sure to delete');" class="btn btn-sm btn-danger">
						<i class="fas fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
	
		
	

@endsection