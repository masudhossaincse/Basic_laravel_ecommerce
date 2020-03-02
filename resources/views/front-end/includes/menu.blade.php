<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
	<ul class="nav navbar-nav">
		<li class="active"><a href="#" class="act">Home</a></li>	
		<!-- Mega Menu -->
		
		@foreach ($publishedCategories as $publishedCategory)
		<li class="dropdown">
			<a href="{{ url('category-product/'.$publishedCategory->id) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $publishedCategory->categoryName }}</a>
			
		</li>
		@endforeach
		
		
	</ul>
</div>