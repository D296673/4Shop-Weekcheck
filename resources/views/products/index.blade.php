@extends('layouts.app')

@section('content')
		<div class="filter">
            <form action="" method="GET">
                <label for="category-filter">Filter op type:</label>
                <select name="type" id="type">
                    <option value="">-kies een type-</option>
					@foreach($categories as $category)
						<option value="{{$category->name}}">{{ $category->name }}</option>
					@endforeach
                </select>
			</form>
        </div>

	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link product-List" href="{{ route('products.show', $product) }}">
				<p class="hidden">{{$product->Category()->first()->name}}</p>
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
						@endunless

						@if ($product->discount > 0)
							<span style="color:red;">Nu <strong>{{ $product->discount }}</strong>% Korting!</span>
							<div>Orginele prijs: €{{$product->getRawOriginal('price')}}</div>
							</br>
						@endif
					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

	<script>
		var select = document.getElementById("type");
		const products = document.querySelectorAll(".product-List");

		select.addEventListener("change", function(){
			var selectOption = select.options[select.selectedIndex].text;

			products.forEach(element => {
				const child = element.firstElementChild;

				if(child.textContent != selectOption && selectOption != "-kies een type-"){
					element.classList.add("hidden");
				}
				else{
					element.classList.remove("hidden");
				}				
			});
		});
	</script> 


@endsection