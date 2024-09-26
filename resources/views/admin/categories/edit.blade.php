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
                Update Category
            </h1>

            <div>
                <form action="{{url('/admin/update_category',$data->id)}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="category" value="{{$data->category_name}}">
                        <input class="btn btn-primary" type="submit" value="category">
                    </div>
                </form>
            </div>
    </div>
    

    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>