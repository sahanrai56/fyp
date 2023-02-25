<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style type="text/css">
    .div_center
    {
        text-align: center;
        padding-top:40px;
    }
    .div_h2{
        font-size: 40px;
    }
    .input_color{
        color:black;
    }
    .center{
        margin:auto;
        width:50%;
        text-align:center;
        margin-top:30px;
        border:1px solid white;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" area-hidden+"true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif
                <div class="div_center">
                    <h1 class="div_h2">Add category</h1>
                    <form action="{{url('/add_category')}}" method="POST">

                    @CSRF

                        <input class="input_color" type="text" name="category" placeholder="Write category name">
                        <input type="submit" class="btn btn-primary"name="submit" value="Add Category">
                    </from>

                    <div>
                        <table class="center">
                            <tr>
                                <td>Category Name</td>
                                <td>Action</td>
                            </tr>
                        @foreach($data as $data)
                            <tr>
                                <td>{{$data->category_name}}</td>

                                <td>
                                    <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger"href="{{url('delete_category',$data->id)}}"> Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </table>

                    </div>

                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>