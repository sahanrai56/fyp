<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Products <span>on sale</span>
               </h2>
            </div>
            <div class="row">
               @foreach($product as $products)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Product Details
                           </a>
                           <form action="{{url('add_cart',$products->id)}}" method="Post">

                              @csrf

                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" class="" name="quantity" value="1" min="1" style="width: 100"/>
                                    
                                 </div>

                                 <div class="col-md-4">
                                    <input type="submit" class="" value="Add To Cart" />
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        <h6 style=" color:blue;">
                           Rs.{{$products->price}}
                        </h6>
                        <br>
                        <h6>
                           {{$products->condition}}
                        </h6>
                     </div>
                  </div>
               </div>

               @endforeach

               
         </div>
      </section>