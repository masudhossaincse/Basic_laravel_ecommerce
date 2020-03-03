@extends('admin.master')

@section('content')
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<div class="container">
	<table class="table table-bordered table-hover">
		<tbody>
			<tr>
				<th>ID</th>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
			<?php $i=1; ?>
			@foreach($users as $user)
			
			<tr>
				<th scope="row">{{ $i++ }}</th>
				<th scope="row">{{ $user->id }}</th>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->password }}</td>
				<td>
					<a href="{{ url('/user/edit/'.$user->id) }}" class="btn btn-sm btn-success">
						<i class="fas fa-edit"></i>
					</a>
					<a href="{{ url('/user/delete/'.$user->id) }}" onclick="return confirm('Are yor sure to delete');" class="btn btn-sm btn-danger">
						<i class="fas fa-trash"></i>
					</a>
				</td>
			</tr>

			@endforeach

		</tbody>

	</table>
</div>
<div>
	{{ $users->links() }}
</div>
	
		
	

@endsection