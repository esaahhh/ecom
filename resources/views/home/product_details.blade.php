<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style type="text/css">

.div_center
    {
        display:flex;
        justify-content:center;
        padding:30px;
        align-items:center;
    }
    .detail-box
    {
        padding:15px;

    }





</style>

</head>

<body>
  <div class="hero_area">
    @include('home.header')
    </header>
    
    
  </div>

  <!--Product details-->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
      
        <div class=" col-md-12">
          <div class="box">
           
              <div class="div_center">
                <img  width="400"src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$data->title}}</h6>
                <h6>Price:
                  <span>Rs:{{$data->price}}</span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>Category: {{$data->category}}</h6>

                <h6>Available Quantity:
                    <span>{{$data->quantity}}</span>

                    </h6>
              </div>

              <div class="detail-box">
                <p>{{$data->description}}</p>
              </div>

           

        </div>
 
    </div>
  </section>



   <!--Product details ends-->
  







  
@include('home.footer')

</body>

</html>