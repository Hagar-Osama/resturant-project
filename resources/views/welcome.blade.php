@extends('layouts.app')
@section('content')
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 ">
                @foreach($about as $about)
                <div class="about-img"><img src="{{asset('images/about'). '/'.$about->image}}" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>Our Restaurant</h2>
                    <hr>
                    <p>{{$about->body}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Menu</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">Breakfast & Starters</h2>
                    <hr>
                    @foreach($menus as $menu)
                    @if ($menu->category->name == "BREAKFAST")
                    <div class="menu-item">
                        <div class="menu-item-name">{{$menu->name}}</div>
                        <div class="menu-item-price"> ${{$menu->price}}</div>
                        <div class="menu-item-description">{{$menu->description}} </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">Main Course</h2>
                    <hr>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $45 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">Dinner</h2>
                    <hr>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $45 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $350 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">Coffee & Drinks</h2>
                    <hr>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $35 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-name"> Delicious Dish </div>
                        <div class="menu-item-price"> $30 </div>
                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Gallery</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            @isset($categories)
                            @if($categories->count() > 0)
                            @foreach($categories as $category)
                            <li><a href="#" data-filter="*" class="active">{{$category->name}}</a></li>
                            @endforeach
                            @endif
                            @endisset
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

        </div>
        <div class="row">
            <div class="portfolio-items">
                <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/01-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/01-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 dinner">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/02-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/02-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/03-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/03-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/04-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/04-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 dinner">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/05-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/05-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/06-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/06-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/07-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/07-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/08-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/08-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 dinner">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/09-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/09-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/10-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/10-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/11-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/11-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset('endUserAssets/img/portfolio/12-large.jpg')}}" title="Dish Name" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Dish Name</h4>
                                </div>
                                <img src="{{asset('endUserAssets/img/portfolio/12-small.jpg')}}" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Section -->
<div id="team" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="col-md-10 col-md-offset-1 section-title">
                <h2>Meet Our Chefs</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
            </div>
            <div id="row">
                @foreach($chefs as $chef)
                <div class="col-md-4 team">
                    <div class="thumbnail">
                        <div class="team-img"><img src="{{asset('images/chefs'). '/' .$chef->image}}" alt="..."></div>
                        <div class="caption">
                            <h3>{{$chef->name}}</h3>
                            <p>{{$chef->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Call Reservation Section -->
<div id="call-reservation" class="text-center">
    <div class="container">
        <h2>Want to make a reservation? Call <strong>1-887-654-3210</strong></h2>
    </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
    <div class="container">
        <div class="section-title text-center">
            <h2>Contact Form</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form method="POST" action="{{route('contact.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div id="success"></div>
                <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
            </form>
        </div>
    </div>
</div>




@endsection
