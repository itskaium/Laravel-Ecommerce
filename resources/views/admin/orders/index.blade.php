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
        <div class="py-3">
            <table class="table table-dark text-center">
                <thead>
                  <tr>
                    {{-- <th scope="col">Id</th> --}}
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $orders)
                        <tr>
                            {{-- <th scope="row">{{$categories->id}}</th> --}}
                            <td>{{$orders->name}}</td>
                            <td>{{$orders->rec_add}}</td>
                            <td>{{$orders->phone}}</td>
                            <td>{{$orders->product->title}}</td>
                            <td>{{$orders->product->price}}</td>
                            <td>{{$orders->status}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{url('onTheWay', $orders->id)}}">On The Way</a>
                                <a class="btn btn-success" href="{{url('delivered', $orders->id)}}">Delivered</a>
                            </td>
                            {{-- <td>
                                <a class="btn btn-success" href="{{url('admin/edit_category', $categories->id)}}">Edit</a>
                            </td>
                            <td>
                                <a onclick="confirmation(event)" href="{{url('admin/delete_category', $categories->id)}}" class="btn btn-danger">Delete</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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