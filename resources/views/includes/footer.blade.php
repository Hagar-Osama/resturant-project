<div id="footer">
    <div class="container text-center">
        @foreach($information as $key => $value)
        @if($key == "Address")
        @foreach($value as $data)
        <div class="col-md-4">
            <h3>Address</h3>
            <div class="contact-item">
                <p>{{$data->value}}</p>
            </div>
        </div>
        @endforeach

        @elseif ($key == "Opening Hours")
        @foreach($value as $data)
        <div class="col-md-4">
            <h3>Opening Hours</h3>
            <div class="contact-item">
                <p>{{$data->value}}</p>
            </div>
        </div>
        @endforeach

        @elseif($key == "Phone")
        @foreach($value as $data)
        <div class="col-md-4">
            <h3>Contact Info</h3>
            <div class="contact-item">
                <p>Phone: {{$data->value}}</p>
            </div>
        </div>
        @endforeach
        
        @elseif ($key == "Email")
        @foreach($value as $data)
        <div class="contact-item">
            <p>Email: {{$data->value}}</p>
        </div>
        @endforeach
        @endif
        @endforeach
    </div>





    <div class="container-fluid text-center copyrights">
        <div class="col-md-8 col-md-offset-2">
            <div class="social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <p>&copy; 2016 Touché. All rights reserved. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('endUserAssets/js/jquery.1.11.1.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/SmoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/nivo-lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/jqBootstrapValidation.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/contact_me.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/main.js')}}"></script>
</body>

</html>
