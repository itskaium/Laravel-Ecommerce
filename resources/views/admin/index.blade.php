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
            @include('admin.body')
    </div>
    

    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>