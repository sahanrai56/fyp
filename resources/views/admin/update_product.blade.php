<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
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
                    <div class="title_font">Update product</div>

                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_container">
                            <label class="v-align"> Product Title:</label>
                            <input class="text_font"type="text" name="title" placeholder="write a title" required="" value="{{$product->title}}">
                        </div>
                        <div class="div_container">
                            <label class="v-align"> Product Description:</label>
                            <input class="text_font"type="text" name="description" placeholder="Write a Description" required="" value="{{$product->description}}">
                        </div>
                        <div class="div_container">
                            <label class="v-align"> Product Category:</label>  
                            <select  class="text_font" name="category" required="" >
                                <option value="{{$product->category}}" selected=""> {{$product->category}}</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                              

                            <select>
                        </div>
                        <div class="div_container">
                            <label class="v-align"> Product Price:</label>
                            <input class="text_font"type="number" name="price" min="1" placeholder="write the product Price" required="" value="{{$product->price}}">
                        </div>

                        <div class="div_container">
                            <label class="v-align"> Product Quantity:</label>
                            <input class="text_font" type="number" name="quantity" min="1" placeholder="write The number of Quantity" required="" value="{{$product->quantity}}">
                        </div>

                        <div class="div_container">
                            <label class="v-align"> Current Product Image Here:</label>
                            <img style="margin:auto" height="100" width="100" src="/product/{{$product->image}}"
                        </div>

                        <div class="div_container">
                            <label class="v-align"> Change Product Image Here:</label>
                            <input class="text_font" type="file" name="image" placeholder="">
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
                            <input type="submit" value="Update Product" class="btn btn-primary" >
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