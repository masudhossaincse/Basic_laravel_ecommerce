@extends('admin.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
			<hr>
			<div class="well">
				
				<form method="POST" name="editManufacturerForm" action="{{ url('/manufacturer/update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="manufacturerName" class="col-md-4 col-form-label text-md-right">{{ __('Manufacturer Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" value="{{ $manufacturerById->manufacturerName }}" type="text" class="form-control"  name="manufacturerName">
                                <input type="hidden" name="id" value="{{ $manufacturerById->id }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="manufacturerDescription" class="col-md-4 col-form-label text-md-right">{{ __('Manufacturer Description') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $manufacturerById->manufacturerName }}" class="form-control" name="manufacturerDescription">
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
                                    {{ __('Update Manufacturer Info') }}
                                </button>
                            </div>
                        </div>
                    </form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.forms['editManufacturerForm'].elements['publicationStatus'].value={{ $manufacturerById->publicationStatus }}
</script>

@endsection