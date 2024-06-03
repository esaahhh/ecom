<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">
    .div_deg
    {
        display:flex;
        justify-content:center;
        align-item:center;
        margin:60px;
    }
    table
    {
        border:2px solid black;
        text-align:center;
        width:800px;
    }
    th
    {
        height:20px;
        
        border:1px solid black;
        text-align:center;
        color:white;
        font:10px;
        font-weight:bold;
        background-color:black;

    }
    td
    {
        border:1px solid black;
    }
.order_deg
{
    padding-right:100px;
    margin-top:20px;
}
label
{
    display:inline-block;
    width:150px;
}
.dev_gap
{
    padding:20px;
}
</style>
</head>


<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    </div>
    <div class="div_deg">
        <div class="order_deg">
            <form action="{{url('confirm_order')}}" method="Post">
                @csrf
                <div class="dev_gap">
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>

                <div class="dev_gap">
                    <label>Receiver Address</label>
                  <textarea name="address"> {{Auth::user()->address}}  </textarea>
                </div> 
                
                <div class="dev_gap">
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div> 
                
                <div class="dev_gap">
                    
                <input class="btn btn-primary" type="submit" value="Place Order">
                </div>



            </form>



        </div>





   <table>
    <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Delete</th>
    </tr>
    
    
    <?php
    $value=0;
    ?>


@foreach($cart as $cart)
    <tr>
        <td>{{$cart->product->title}}</td>
        <td>{{$cart->product->price}}</td>
        <td>
            <img width="150" src="/products/{{$cart->product->image}}">


        </td>
        <td>
            <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Delete</a>
        </td>
        

        
    </tr>
    <?php
    $value=$value + $cart->product->price;
    ?>
@endforeach



   </table>

    

</div>
<div>
    <h3>Total value of items in the Cart :Rs:{{$value}}</h3>


</div>


 
  <!-- end hero area -->

@include('home.footer')

</body>

</html>