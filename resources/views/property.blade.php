@extends('layouts.app')

@section('content')

	<!-- Hero section -->
	<section class="py-5 text-center container">
		<div class="row py-lg-5 text-white">
			<div class="col-lg-6 col-md-8 mx-auto">
				<h1 class="fw-light">Album  yapilcakkk</h1>
				<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
				<p>
					<a href="#" class="btn btn-warning my-2">Main call to action</a>
					<a href="#" class="btn btn-secondary my-2">Secondary action</a>
				</p>
			</div>
		</div>
	</section>

	<!-- Properties list -->
	<div class="album py-5 bg-dark">
		<div class="container">
			@if (request()->segment(1) == 'search')
				<h2>Properties in {{request()->address}}</h2>
			@else
				<h2>Recent Properties</h2>
			@endif

			<!-- SEARCH -->
			<form class="row row-cols-lg-auto g-3 align-items-center mb-4" action="{{ route('search') }}" method="get">
				@csrf
        <!-- Filter by address -->
				<div class="col-12 ">
					<input class="form-control" type="text" name="address" placeholder="Enter a location" value="{{request()->address}}">
				</div>
        <!-- Filter by category -->
				<div class="col-12 ">
					<select name="category" class="form-select @error('category') is-invalid @enderror">
						<option value="" selected>{{request()->category ? App\Models\Category::find(request()->category)->name : 'All Home Types'}}</option>
						@foreach (App\Models\Category::all() as $category)
							<option value="{{$category->id}}">
								{{$category->name}}
							</option>
						@endforeach
					</select>
				</div>
        <!-- Filter by bedrooms -->
				<div class="col-12 ">
					<select name="bedrooms" class="form-select @error('bedrooms') is-invalid @enderror">
						<option value="" selected>{{request()->bedrooms ? request()->bedrooms . ' ' . 'All Bedrooms' : 'Bedrooms'}}</option>
						<option value="2">
							2
						</option>
						<option value="3">
							3
						</option>
						<option value="4">
							4
						</option>
						<option value="5">
							5
						</option>
					</select>
				</div>
        <!-- Filter by price -->
				<div class="col-12">
					<input value="{{request()->min}}" type="text" name="min" class="form-control" placeholder="min price">
				</div>
				<div class="col-12">
					<input value="{{request()->max}}" type="text" name="max" class="form-control" placeholder="max price">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-success">Search</button>
				</div>
			</form>

			<div class="col-12">
				<a href="{{request()->url()}}" class="btn btn-success">Reset Search</a>
			</div>

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				@if (count($properties) > 0)

					@foreach($properties as $property)
						<div class="col">
							<div class="card shadow-sm">
								<img src="{{Storage::url($property->image)}}">

								<div class="card-body bg-dark text-white">
									<p class="card-text">
										${{$property->price}}
									</p>
									<p class="card-text">
										{{$property->address}}
									</p>
									<p class="card-text">
                                        <label for="Home-icon"><i class="fa fa-building" style="font-size:31px;color:rgb(9, 196, 108);" id="fa-build"></i></label>
										{{$property->bedrooms}} bedrooms
									</p>
									<p class="card-text">
                                        <label for="Home-icon"><i class="fa fa-building" style="font-size:31px;color:rgb(9, 196, 108);" id="fa-build"></i></label>
										{{$property->bathrooms}} bathrooms
									</p>
									<a href="{{route('frontproperty.show', [$property->id])}}" class="btn btn-success">View</a>

									<like-button
										property-id="{{ $property->id }}"
										likes={{ $likes = auth()->user() ? auth()->user()->like->contains($property->id) : false }}
									></like-button>

								</div>
							</div>
						</div>
					@endforeach
				@else
					<p>No properties found.</p>
				@endif

			</div>

		</div>
	</div>

	<!-- Carousel -->
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

		<!-- Carousel images -->
		{{-- <div class="carousel-inner">
			<div class="carousel-item active">
				<div class="row">
					@foreach($randomProperties as $property)
						<div class="col-4">
							<div class="card mb-4 shadow-sm">
								<img src="{{Storage::url($property->image)}}" height="200" width="100%" class="">
								<div class="card-body">
									<p>{{$property->address}}</p>
								</div>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="{{route('property.view', [$property->id])}}" type="button" class="btn btn-sm btn-outline-success">View</a>
										<button type="button" class="btn btn-sm btn-outline-success">Edit</button>
									</div>
									<small class="text-muted">${{$property->price}}</small>
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>

			<div class="carousel-item">
				<div class="row">
					@foreach($randomItemProperties as $property)
						<div class="col-4">
							<div class="card mb-4 shadow-sm">
								<img src="{{Storage::url($property->image)}}" height="200" width="100%" class="">
								<div class="card-body">
									<p>{{$property->address}}</p>
								</div>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="{{route('property.view', [$property->id])}}" type="button" class="btn btn-sm btn-outline-success">View</a>
										<button type="button" class="btn btn-sm btn-outline-success">Edit</button>
									</div>
									<small class="text-muted">${{$property->price}}</small>
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>
		</div> --}}

		<!-- Carousel controls -->
		{{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button> --}}
	</div>

	<footer class="text-muted py-5">
		<div class="container">
			<p class="float-end mb-1">
				<a href="#">Back to top</a>
			</p>
			<p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
			<p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.1/getting-started/introduction/">getting started guide</a>.</p>
		</div>
	</footer>

@endsection
