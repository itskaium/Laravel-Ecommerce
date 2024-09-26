<!DOCTYPE html>
<html>
  @include('admin.css')
  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>
                Products
            </h1>

            <ul>
                @foreach($products as $product)
                    <li>{{ $product->title }} - ${{ $product->price }}</li>
                @endforeach
            </ul>
    </div>
    

    <!-- JavaScript files-->

    {{-- <script type="text/javascript">
    
        function confirmation(event){
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            swal({
                title : 'Are You Sure To Delete This',
                text : 'This delete will be permanent',
                icon : 'warning',
                buttons : true,
                dangerMode : true,
            })

            .then((willCancel)=> {
                if (willCancel) {
                    window.location.href=urlToRedirect;
                }
            });
        }

    </script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    @include('admin.js')
  </body>
</html>