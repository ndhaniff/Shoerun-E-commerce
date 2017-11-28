                    <div class="tab-pane active" id="description">
                        <h4>Details</h4>
                        <hr>
                        {!!$product->product_desc!!}
                    </div>
                    <div class="tab-pane" id="delivery">
                        <h4>Delivery Details</h4>
                        <hr>
                        <p>{{$product->shipping}}</p>
                    </div>
                    <div class="tab-pane" id="review">
                        <h4>What Customers Say</h4>
                        <hr>
                        <div class="review">
                            <span class="rating">
                                <i class="text-red ion-ios-star"></i>
                                <i class="text-red ion-ios-star"></i>
                                <i class="text-red ion-ios-star"></i>
                                <i class="text-red ion-ios-star"></i>
                                <i class="ion-ios-star-half"></i>
                                </span>&nbsp;
                            <p class="m-0">Great Products! I am satisfied with this shoe</p>
                            <small>By: Ndhaniff on 2017/11/20 </small>
                            <hr>
                        </div>
                    </div>