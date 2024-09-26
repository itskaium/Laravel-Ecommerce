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
            <div class="text-center">

                <h1>Add Product</h1>

                <form action="{{url('/admin/products')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" name="title" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                      <label>Product Category</label>
                      <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label >File input</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Product">
                    </div>
                  </form>

            </div>
            



    </div>
    

    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>



