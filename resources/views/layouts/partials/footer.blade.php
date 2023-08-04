<footer class="main_footer">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-3">
            <div class="quick_links">
              <h3>Quick Links</h3>
              <ul>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('discountandcoupons') }}">Discount and Coupons</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="footer_cntnt">
              <div class="footer_logo">
                <img src="{{ setting('footer_logo') != null ? url('/storage/site/logo/'.setting('footer_logo').'') : '' }}" alt="" />
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="quick_links">
              <h3>Menu</h3>
              <ul>
            @foreach ( Menuhelper() as $key => $menu )
            @if ($key < 5)
            <li><a href="#" menu_slug ="{{ __(ucfirst( $menu->menu_slug)) }}">{{ __(ucfirst( $menu->menu_name)) }}</a></li>
            @endif
            @endforeach
            </ul>
            </div>
          </div>
        </div>
        <div class="open_hr">
          <h3>Opening Hours</h3>
          <p>{{ setting('opening_hour') != null ?__(setting('opening_hour')) : '' }}</p>
        </div>
      </div>

      <div class="copy_right">
        <div class="container">
          <div class="copy_right_txt">
            <p>{{ setting('copyright_text') != null ? __(setting('copyright_text')) : '' }}</p>
            <ul>
            @foreach(explode(',', setting('footer_image_2')) as $info)
            <li><img src="{{ url('/storage/site/footer/otherImage/'.$info.'')}}" alt="{{$info}}" /></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </footer>
  @include('layouts.partials.footer_scripts')
