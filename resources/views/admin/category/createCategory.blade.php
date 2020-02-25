@extends('admin.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
			<hr>
			<div class="well">
				
				<form method="POST" action="{{ url('/category/save') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="categoryName" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="categoryName">
                                <span class="text-danger">{{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoryDescription" class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="categoryDescription">
                                <span class="text-danger">{{ $errors->has('categoryDescription') ? $errors->first('categoryDescription') : '' }}</span>
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
                                    {{ __('Save Category Info') }}
                                </button>
                            </div>
                        </div>
                    </form>

			</div>
		</div>
	</div>
</div>
@endsection