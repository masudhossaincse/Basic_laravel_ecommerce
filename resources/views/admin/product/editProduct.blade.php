@extends('admin.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
			<hr>
			<div class="well">
				
				<form method="POST" name="editProductForm" enctype="multipart/form-data" action="{{ url('/product/update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $productById->productName }}" class="form-control"  name="productName">
                                <input id="name" type="hidden" value="{{ $productById->id }}" class="form-control"  name="productId">
                                <span class="text-danger">{{ $errors->has('productName') ? $errors->first('productName') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="categoryId">
                                	<option>Select Category Name</option>
                                    @foreach($categories as $category)

                                	<option value="{{ $category->id }}">{{ $category->categoryName }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Manufacturer Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="manufacturerId">
                                	<option>Select Manufacturer Name</option>
                                    @foreach($manufacturers as $manufacturer)

                                	<option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="productPrice" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" value="{{ $productById->productPrice }}" class="form-control"  name="productPrice">
                                <span class="text-danger">{{ $errors->has('productPrice') ? $errors->first('productPrice') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productQuantity" class="col-md-4 col-form-label text-md-right">{{ __('Product Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" value="{{ $productById->productQuantity }}" class="form-control"  name="productQuantity">
                                <span class="text-danger">{{ $errors->has('productQuantity') ? $errors->first('productQuantity') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="productShortDescription" class="col-md-4 col-form-label text-md-right">{{ __('Product Short Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="productShortDescription" class="form-control" rows="5">{{ $productById->productShortDescription }}</textarea>
                                <span class="text-danger">{{ $errors->has('productShortDescription') ? $errors->first('productShortDescription') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productLongDescription" class="col-md-4 col-form-label text-md-right">{{ __('Product Long Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="productLongDescription" class="form-control" rows="5">{{ $productById->productLongDescription }}</textarea>
                                <span class="text-danger">{{ $errors->has('productLongDescription') ? $errors->first('productLongDescription') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="productImage" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>
                            <img src="{{ asset($productById->productImage) }}" width="300" height="300" alt="{{ $productById->productName }}">
                            <div class="col-md-6">
                                <input id="name" type="file" name="productImage" accept="image/*">
                                <span class="text-danger">{{ $errors->has('productImage') ? $errors->first('productImage') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Publication Status') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="publicationStatus">
                                	<option>Publication Status</option>
                                	<option value="1">Published</option>
                                	<option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>

                        
                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Product Info') }}
                                </button>
                            </div>
                        </div>
                    </form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.forms['editProductForm'].elements['publicationStatus'].value={{ $productById->publicationStatus }}
	document.forms['editProductForm'].elements['categoryId'].value={{ $productById->categoryId }}
	document.forms['editProductForm'].elements['manufacturerId'].value={{ $productById->manufacturerId }}
	
</script> 

@endsection