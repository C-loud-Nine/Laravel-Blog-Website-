<!DOCTYPE html>
<html>
  <head> 
        <base href="/public">
        @include('admin.css')
  </head>
  <body>
        @include('admin.header')
    
    
        <div class="d-flex align-items-stretch">
        
            @include('admin.sidebar')
      
            

            @include('admin.body')


            @include('admin.footer')
  </body>
</html>