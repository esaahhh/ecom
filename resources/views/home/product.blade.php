
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach($product as $products)





        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            


              <div class="img-box">


                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$products->title}}</h6>
                <h6>Price</h6>
                  <span>Rs:{{$products->price}}</span>
                </h6>
              </div>

              <div style="padding:20px">
              <a class="btn btn-danger" href="{{ url('product_details', $products->id) }}">Details</a>
              
              <a class="btn btn-primary" href="{{ url('add_cart', $products->id) }}">Add to Cart</a>

              <div style="padding:10px; margin-left: 35px;";>
              
              <a class="btn btn-success " href="{{ url('wishlist_details', $products->id) }}">Wishlist</a>


                </div>

                </div>
             
          </div>

        </div>
        
        
     @endforeach

    </div>
  </section>

