<!DOCTYPE html>
<html lang="en">
  <head>
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
      <div align="center" style="padding-top:100px;">
        <table>
          <tr style="background-color: black;">
            <th style="padding:10px;">Doctor Name</th>
            <th style="padding:10px;">Phone</th>
            <th style="padding:10px;">Speciality</th>
            <th style="padding:10px;">Room No</th>
            <th style="padding:10px;">Image</th>
            <th style="padding:10px;">Delete</th>
            <th style="padding:10px;">Update</th>
          </tr>
          @foreach($data as $doctor)
          <tr align="center" style="background-color: skyblue;">
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->phone}}</td>
            <td>{{$doctor->specialty}}</td>
            <td>{{$doctor->room}}</td>
            <td><img height="100" width="100" src="doctorimages/{{$doctor->image}}"></td>
            <td><a href="{{url('deletedoctor',$doctor->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this ?')">Delete</a></td>
            <td><a href="{{url('updatedoctor',$doctor->id)}}" class="btn btn-primary">Update</a></td>
          </tr>
          @endforeach
      </div>  
    </div>  
    
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>