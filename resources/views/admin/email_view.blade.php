<!DOCTYPE html>
<html lang="en">
  <head>
   <base href="/public"> 
   <style type="text/css">
     label{
      display: inline-block;
      width: 200px;
     }
   </style> 
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="container" align="center" style="padding-top: 100px;">
      @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        {{session()->get('message')}}   
      </div>
      @endif
        <form action="{{url('sendemail',$data->id)}}" method="post">
          @csrf
          <div style="padding: 15px;">
            <label>Greeting</label>
            <input type="text" name="greeting" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>Body</label>
            <input type="text" name="body" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>Action Text</label>
            <input type="text" name="actiontext" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>Action Url</label>
            <input type="text" name="actionurl" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>End Part</label>
            <input type="text" name="endpart" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <input type="submit" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>  
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>