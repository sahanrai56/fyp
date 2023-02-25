<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top:40px;
        }
        .title_font{
            font-size:40px;
            padding-bottom:40px;
        }
        .text_font{
            padding-bottom:20px;
            color:black;
        }

        .v-align{
            display: inline-block;
            vertical-align:middle;
            outline:1px dashed lime;
        }

        .div_container{
            padding-bottom:15px;

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
                    <div class="title_font">Add product</div>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_container">
                            <label class="v-align"> Product Title:</label>
                            <input class="text_font"type="text" name="title" placeholder="write a title" required="">
                        </div>
                        <div class="div_container">
                            <label class="v-align"> Product Description:</label>
                            <input class="text_font"type="text" name="description" placeholder="Write a Description" required="">
                        </div>
                        <div class="div_container">
                            <label class="v-align"> Product Category:</label>  
                            <select  class="text_font" name="category" required="">
                                <option value="" selected="">Add a Category here</option>
                              
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach

                            <select>
                        </div>
                        <div class="div_container">
                            <label class="v-align"> Product Price:</label>
                            <input class="text_font"type="number" name="price" min="1" placeholder="write the product Price" required="">
                        </div>

                        <div class="div_container">
                            <label class="v-align"> Product Quantity:</label>
                            <input class="text_font" type="number" name="quantity" min="1" placeholder="write The number of Quantity" required="">
                        </div>

                        <div class="div_container">
                            <label class="v-align"> Product Image Here:</label>
                            <input class="text_font" type="file" name="image" placeholder="write a title" required="">
                        </div>

                        <div class="div_container">
                            <label class="v-align"> Product Condition:</label>  
                            <select  class="text_font" name="condition" required="">
                                <option>Heavily Used</option>
                                <option>Well Used</option>
                                <option>Lightly Used</option>
                                <option>Brand new</option>
                            <select>
                        </div>

                        <div class="div_container">
                            <input type="submit" value="Add Product" class="btn btn-primary" >
                        </div>
                    </form>
                </div>   
            </div>

        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>