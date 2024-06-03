<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  
    <!-- slider section -->

    @include('home.slider')


@include('home.product');
  <!-- end shop section -->
  
  <!-- contact section -->

  @include('home.contact');

  <!-- end contact section -->

   

  <!-- info section -->
@include('home.footer')

</body>

</html>