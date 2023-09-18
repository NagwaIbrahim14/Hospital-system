
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div  align="center" style="padding-top: 100px">
            <table>
                <tr style="background-color: black;">
                    <th style="padding: 10px;color:white">Doctor Name</th>
                    <th style="padding: 10px;color:white">Phone</th>
                    <th style="padding: 10px;color:white"> Speciality</th>
                    <th style="padding: 10px;color:white">  Room No</th>
                    <th style="padding: 10px;color:white">Image</th>
                    <th style="padding: 10px;color:white">Delete</th>
                    <th style="padding: 10px;color:white">Update</th>

                </tr>
                @foreach ( $datas as  $data)

                <tr align="center" style="background: skyblue">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->speciality }}</td>
                    <td>{{ $data->room}}</td>
                    <td> <img src="doctorimage/{{ $data->image }}" alt="" width="100px" height="100px"></td>
                    <td><a href="{{ url('deletedoctor',$data->id) }}" class="btn btn-danger" onclick="return confirm'are you sure to delete this ?'">Delete</a></td>
                    <td><a href="{{ url('updatedoctor',$data->id) }}" class="btn btn-primary">Update</a></td>
                </tr>
                @endforeach


            </table>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
