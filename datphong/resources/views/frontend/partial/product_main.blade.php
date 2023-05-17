<div class="product-layout">
    <div class="product-thumb">
        <div class="image">
            <a href="{{ route('product/detail') }}">
               <img src="{{ asset('frontend/assets/image/product/'.rand(1,10).'.jpg') }}" alt="product" title="product" class="img-responsive" />
            </a>
         </div>
         <div class="caption mb-2">
            <h4><a href="{{ route('product/detail') }}">Nexera series</a></h4>
         </div> 
        <p class="price"> 
            <span class="price-new mr-1">$110.00</span> 
            <span class="price-old">$122.00</span> 
            <span class="saving">-10%</span> 
            <span class="price-tax">Ex Tax: $90.00</span> 
        </p>
		<div class="button-group">
			<button class="btn-primary" type="button" onclick="window.location.href='{{ route('product/detail') }}'"><span>Read more</span></button>
		</div>
    </div>
 </div>