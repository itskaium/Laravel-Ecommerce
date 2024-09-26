<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->



    <!-- end slider section -->
  </div>
  <!-- end hero area -->
<div class="py-3">
    <table class="table table-dark text-center">
        <thead>
          <tr>
            {{-- <th scope="col">Id</th> --}}
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>

            <?php
                $value = 0
            ?>
            

            @foreach ($cart as $cart)
                <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>
                        {{$cart->product->price}}
                    </td>
                    <td>
                        {{$cart->product->image}}
                    </td>
                    <td>
                        <a href="{{url('delete_cart', $cart->id)}}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <?php
                    $value = $value + $cart->product->price
                ?>
                
            @endforeach
        </tbody>
    </table>
</div>

<h3 class="text-center">Total Value of your product : ${{$value}}</h3>
  <!-- shop section -->


  <!-- end shop section -->
  <div class="text-center">
    <form action="{{url('confirm_order')}}" method="POST">
      @csrf
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{Auth::user()->name}}">
      </div>
      <div class="form-group">
        <label>Address</label>
        <textarea type="text" class="form-control" placeholder="Enter Address"  name="address" value="{{Auth::user()->address}}"></textarea>
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Enter Phone" name="phone" value="{{Auth::user()->phone}}">
      </div>
      <button type="submit" class="btn btn-primary">Cash On Delivery</button>
      <a href="{{url('stripe',$value)}}" class="btn btn-success">Pay Using Card</a>
    </form>
  </div>







  <!-- contact section -->

  

  <br><br><br>

  <!-- end contact section -->

   

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  

</body>

</html>