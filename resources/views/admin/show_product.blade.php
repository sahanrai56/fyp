<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
    <style type="text/css">

        .center{
            margin:auto;
            width:60%;
            border:2px solid white;
            text-align:center;
            margin-top: 40px;
        }
        .title_font{
            text-align:center;
            font-size:40px;
            padding-top: 20px;
        }
        .img_size{
            width: 270px;
            height: 150px;
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
                

                <h2 class="title_font">All products</h2>
                <table class="center">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Condition</th>
                        <th>Image</th>     
                        <th>Update</th>
                        <th>Delete</th>                       
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->condition}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td> 

                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}"> update </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone')" href="{{url('delete_product',$product->id)}}"> Delete </a>
                        </td>                       
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>