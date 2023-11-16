<!DOCTYPE html>
<html lang="en">
  <head>
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
        <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px;">
            <label>Doctor Name</label>
            <input type="text" name="name" placeholder="write the name" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>Phone</label>
            <input type="text" name="number" placeholder="write the number" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>Speciality</label>
            <select name="specialty" required style="color:black; width: 200px;">
              <option>--Select--</option>
              <option value="skin">skin</option>
              <option value="heart">heart</option>
              <option value="eye">eye</option>
              <option value="nose">nose</option>
            </select>
          </div>
          <div style="padding: 15px;">
            <label>Room No</label>
            <input type="text" name="room" placeholder="write the room number" required style="color:black;">
          </div>
          <div style="padding: 15px;">
            <label>Doctor Image</label>
            <input type="file" name="file">
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