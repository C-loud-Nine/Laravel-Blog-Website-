<x-header />
      <!-- contact section start -->
      <div class="contact_section layout_padding">
        <div class="container">
          <h1 class="contact_taital">Login Here !</h1>
          @if(Session::has('success'))
                        <div class="alert alert-success">
                            <!-- Corrected syntax for displaying session message -->
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            <!-- Corrected syntax for displaying session message -->
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif
          <form action="{{ URL::to('/loginUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="email_text">
             <div class="form-group">
                    <input type="email" class="email-bt" name="email" placeholder="Email" required>
             </div>
            <div class="form-group">
                  <input type="password" class="email-bt" name="password" placeholder="Password" required>
             </div>
            
             <div class="send_btn">
                  <button type="submit" name="register" style="background-color: #007bff; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 10px;">Login</button>
              </div>

          </div>
        </div>
      </div>
      </form>
      <!-- contact section end -->
<x-footer />