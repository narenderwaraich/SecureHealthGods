<footer class="background-image-style">
  <div class="container-fluid footer background-opacity-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="footer-text">
                About {{config('app.name')}}
              </div>
              <center style="padding: 30px 0;">
              <a style="color: #fff;font-size: 35px;font-weight: 900;line-height: 30px !important;font-family: cursive;text-shadow: 0 0 30px rgb(0 0 0 / 62%);" href="{{ url('/') }}">
                {{ config('app.name') }}
              </a>
            </center>
             <!-- <div class="social-icon">
                  <a href=""><i class="fa fa-facebook-f"></i></a>
                  <a href=""><i class="fa fa-instagram"></i></a>
            </div> -->
            <a class="footer-email-address" href="mailto:hello@securehealthgods.in">hello@securehealthgods.in</a>
            </div>

            <div class="col-md-4">
              <div class="footer-text">
                Links
              </div>
              <div class="footer-text2">
               <!--  <div class="menu-link {{ (request()->is('about-us')) ? 'active' : '' }}">
                  <a href="/about-us" class="footer-nav">About</a>
                </div> -->
                <div class="menu-link {{ (request()->is('privacy-policy')) ? 'active' : '' }}">
                  <a href="/privacy-policy" class="footer-nav">Privacy Policy</a>
                </div>
              </div>
              <div>
                
              </div>
            </div>

            <div class="col-md-4 footer-form">
              <div class="footer-text">
                CONTACT
              </div>
              <form action="/contact-us" method="post">
                        {{ csrf_field() }}
              <div class="form-group" style="margin-top: 15px;">
                <label for="name" class="dis-none">Name</label>
                  <input type="text" id="name" class="form-control footer-input-filed {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  placeholder="Name" required value="{{ old('name') }}">
                  @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('name') }}</strong>
                    </span>
                 @endif
              </div>
              <div class="form-group">
                <label for="email" class="dis-none">Email</label>
                  <input type="text" id="email" class="form-control footer-input-filed {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Email" required value="{{ old('email') }}">
                  @if ($errors->has('email'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                 @endif
              </div>
              <div class="form-group">
                <label for="message" class="dis-none">Message</label>
                  <textarea id="message" class="form-control footer-text-filed {{ $errors->has('message') ? ' is-invalid' : '' }}" rows="3"  name="message"  placeholder="Message" required></textarea>
                   @if ($errors->has('message'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('message') }}</strong>
                   </span>
               @endif
              </div>
              <center>
                <button type="submit" class="btn btn-block btn-lg footer-sub-btn">Send</button>
              </center>
            </form>
              </div>
            </div>
          </div>
        </div>
</footer>