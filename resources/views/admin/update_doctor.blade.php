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
      <div class="container" align="center" style="padding:100px;">
      @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        {{session()->get('message')}}   
      </div>
      @endif
        <form action="{{url('editdoctor',$data->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div style="padding:15px;">
            <label>Doctor Name</label>
            <input type="text" name="name" value="{{$data->name}}" style="color: black;">
          </div>
          <div style="padding:15px;">
            <label>Phone</label>
            <input type="text" name="phone" value="{{$data->phone}}" style="color: black;">
          </div> 
          <div style="padding:15px;">
            <label>Speciality</label>
            <input type="text" name="specialty" value="{{$data->specialty}}" style="color: black;">
          </div>
          <div style="padding:15px;">
            <label>Room No</label>
            <input type="text" name="room" value="{{$data->room}}" style="color: black;">
          </div>
          <div style="padding:15px;">
            <label>Old Image</label>
            <img src="doctorimages/{{$data->image}}" height="150" width="150">
          </div>
          <div style="padding:15px;">
            <label>Change Image</label>
            <input type="file" name="image">
          </div>
          <div style="padding:15px;">
            <input type="submit" class="btn btn-primary">
          </div>
        </form>
        
      </div>
     </div>   
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>