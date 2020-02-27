@extends('admin.master')
@section('content')
    
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<div class="container">
	<table class="table table-bordered table-hover">
		<tbody>
			<tr>
				
				<th>Product Name</th>
				<th>Category Name</th>
				<th>Manufacturer Name</th>
				<th>Product Price</th>
				<th>Product Quantity</th>
				
				<th>Publication Status</th>
				<th>Action</th>
			</tr>
			@foreach($products as $product)
			<tr>
				
				<td>{{ $product->productName }}</td>
				<td>{{ $product->categoryName }}</td>
				<td>{{ $product->manufacturerName }}</td>
				<td>TK. {{ $product->productPrice }}</td>
				<td>{{ $product->productQuantity }}</td>

				<td>{{ $product->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
				<td>
					<a href="{{ url('/product/view/'.$product->id) }}" title="Product Info" class="btn btn-sm btn-info">
						<i class="fas fa-eye"></i>
					</a>
					<a href="{{ url('/product/edit/'.$product->id) }}" title="Product Edit" class="btn btn-sm btn-success">
						<i class="fas fa-edit"></i>
					</a>
					<a href="{{ url('/product/delete/'.$product->id) }}" title="Product Delete" onclick="return confirm('Are yor sure to delete');" class="btn btn-sm btn-danger">
						<i class="fas fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>




@endsection

