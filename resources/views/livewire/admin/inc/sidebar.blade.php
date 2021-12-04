<div wire:ignore class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            <a href="{{route('home')}}" class="logo"><img src="@if(isset($setting->logo)){{asset('uploads/logo').'/'.$setting->logo}} @else{{asset('defaults/logo.png')}} @endif" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <!-- dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard')}}" class="{{request()->is('fda/admin/dashboard')?'itemactive':''}} waves-effect">
                        <i class="dripicons-home"></i>
                        <span> Dashboard</span>
                    </a>
                </li>
                <!-- dashboard end -->
                <!-- category start -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/category','fda/admin/subcategory','child-category')?'itemactive':''}}">
                        <i class="dripicons-tags"></i><span> Categorys </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.category')}}">Category</a></li>
                        <li><a href="{{route('admin.subcategory')}}">SubCategory</a></li>
                        <li><a href="{{route('admin.childcategory')}}">Child Category</a></li>
                        <li><a href="{{route('admin.baby_category')}}">Baby Category</a></li>
                        <li><a href="{{route('admin.new_born_category')}}">New Born Category</a></li>
                        <li><a href="{{route('admin.before_born_category')}}">Before Born Category</a></li>
                    </ul>
                </li>
                <!-- category end -->
                <li>
                    <a href="{{ route('admin.brands')}}" class="{{request()->is('fda/admin/brands')?'itemactive':''}} waves-effect">
                        <i class="ion ion-ios-apps"></i>
                        <span>Brands</span>
                    </a>
                </li>
                <!-- product start -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/products','fda/admin/products/create','fda/admin/products/edit','fda/admin/products/campaign') ? 'itemactive':''}}">
                        <i class="dripicons-view-thumb"></i><span> Products
                        </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.products')}}">Products</a></li>
                        <li><a href="{{route('admin.onsellProducts')}}">On Sell Products</a></li>
                        <li><a href="{{route('admin.products.campaign')}}">Campaign Products</a></li>
                        <li><a href="{{route('admin.products.create')}}">+ New Product</a></li>
                    </ul>
                </li>
                <!-- product end -->
                <!-- shipping product start -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/shipping-products*')?'itemactive':''}}">
                        <i class="ion ion-md-git-compare"></i><span> Shipping Products </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.shipping')}}">All Products</a></li>
                        <!-- <li><a href="{{route('admin.products.create')}}">+ New Product</a></li> -->
                    </ul>
                </li>
                <!-- shipping product end -->
                <!-- product start -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/products/merchant*')?'itemactive':''}}">
                        <i class="mdi dripicons-store"></i><span> Merchant </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.products.merchant')}}">All Products</a></li>
                        <li><a href="{{route('admin.products.merchant.onsell')}}">On sell Products</a></li>
                        <li><a href="{{route('admin.products.merchant.campaign')}}">Campaign</a></li>
                        <li><a href="{{route('admin.products.merchant.category')}}">Category</a></li>
                        <li><a href="{{route('admin.products.merchant.brands')}}">Brands</a></li>
                    </ul>
                </li>
                <!-- product end -->

                <!-- order start -->
                <li>
                    <a href="{{ route('admin.order')}}" class="{{request()->is('fda/admin/orders')?'itemactive':''}} waves-effect">
                        <i class="dripicons-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <!-- order endS-->
                <!-- order start -->
                <li>
                    <a href="{{ route('admin.order.shipping')}}" class="{{request()->is('fda/admin/order/shipping')?'itemactive':''}} waves-effect">
                        <i class="mdi mdi-truck-fast"></i>
                        <span>Shipping Orders</span>
                    </a>
                </li>
                <!-- order endS-->
                <!-- order start -->
                <li>
                    <a href="{{ route('admin.customers')}}" class="{{request()->is('fda/admin/customers')?'itemactive':''}} waves-effect">
                        <i class="dripicons-user-group"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <!-- order end -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/user','fda/admin/user/merchent/merchent-user')?'itemactive':''}}">
                        <i class="dripicons-pin"></i><span> Users </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.user')}}">Users</a></li>
                        <li><a href="{{route('admin.user.merchent_user')}}">Merchent</a></li>
                    </ul>
                </li>

                <!-- messages start -->
                <li>
                    <a href="{{ route('admin.messages')}}" class="{{request()->is('fda/admin/messages')?'itemactive':''}} waves-effect">
                        <i class="dripicons-message"></i>
                        <span>Messages</span>
                        @if($message->count()>0)
                        <span class="badge badge-success badge-pill float-right">{{$message->count()}}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.subscribers')}}" class="{{request()->is('fda/admin/subscribers')?'itemactive':''}} waves-effect">
                        <i class="dripicons-to-do"></i>
                        <span>Subscribers</span>
                    </a>
                </li>
                <!-- messages end -->
                <li>
                    <!-- review  -->
                <li>
                    <a href="{{ route('admin.reviews')}}" class="{{request()->is('fda/admin/products-reviews')?'itemactive':''}} waves-effect">
                        <i class="mdi mdi-star"></i>
                        <span>Reviews</span>
                        @if($productReview->count()>0)
                        <span class="badge badge-success badge-pill float-right">{{$productReview->count()}}</span>
                        @endif
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/notification','order/notification')?'itemactive':''}}">
                        <i class="dripicons-bell"></i>
                        <span> Notification </span>
                        <span class="menu-arrow float-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.notification')}}">Make Notification</a></li>
                        <li><a href="{{route('admin.order.notification')}}">Order Cancel Notification </a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/settings','fda/admin/social','fda/admin/topbar','fda/admin/footer-payment-image','fda/admin/headline') ? 'itemactive':''}}">
                        <i class="dripicons-gear"></i> <span> Settings </span>
                        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.settings')}}">Default Settings</a></li>
                        <li><a href="{{ route('admin.settings.category_index')}}">Category Indexing</a></li>
                        <li><a href="{{ route('admin.topbar')}}">Topbar</a></li>
                        <li><a href="{{ route('admin.social')}}">Social Network</a></li>
                        <li><a href="{{route('admin.products.style')}}">Products Card Style</a></li>
                        <li><a href="{{route('admin.footer-payment-image')}}">Footer Payment Image</a></li>
                        <li><a href="{{ route('admin.headmine')}}">Headline</a></li>
                        <li><a href="{{ route('admin.settings.system')}}">System Setting</a></li>
                    </ul>
                </li>

                <!-- social start -->
                <li>
                    <a href="{{ route('admin.service')}}" class="{{request()->is('fda/admin/service')?'itemactive':''}} waves-effect">
                        <i class="dripicons-list"></i>
                        <span>Services</span>
                    </a>
                </li>
                <!-- social end -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/slider*')?'itemactive':''}}"><i class="dripicons-briefcase"></i> <span> Sliders </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{route('admin.homeslider')}}">Home Slider</a></li>
                        <li><a href="{{route('admin.bannerslider')}}">Banner Slider</a></li>
                        <li><a href="{{route('admin.campaignSlider')}}">Campaign Slider</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.askQuestions')}}" class="{{request()->is('fda/admin/ask-questions')?'itemactive':''}} waves-effect">
                        <i class="dripicons-question"></i>
                        <span>Ask Questions</span>
                        @if($askQuestion->count()>0)
                        <span class="badge badge-success badge-pill float-right">{{$askQuestion->count()}}</span>
                        @endif
                    </a>
                </li>
                <!-- pages start -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{request()->is('fda/admin/pages/campaign','fda/admin/pages/campaign/create','fda/admin/pages/campaign/edit')?'itemactive':''}}"><i class="dripicons-view-thumb"></i><span> Pages </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.aboutus')}}">About Us</a></li>
                        <li><a href="{{route('admin.privacyPolicy')}}">Privacy and Policy</a></li>
                        <li><a href="{{route('admin.tarmsandcondition')}}">Terms & Conditions</a></li>
                        <li><a href="{{route('admin.returnPolicy')}}">Return Policy</a></li>
                        <li><a href="{{route('admin.healps')}}">Healps</a></li>
                    </ul>
                </li>
                <!-- pages end -->
                <li>
                    <a href="{{ route('faq')}}" class="{{request()->is('fda/admin/faq')?'itemactive':''}} waves-effect">
                        <i class="dripicons-question"></i>
                        <span>FAQ</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>