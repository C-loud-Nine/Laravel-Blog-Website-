<x-header />
      <!-- contact section start -->
      <div class="contact_section layout_padding">
        <div class="container">
          <h1 class="contact_taital">Register Here !</h1>

          <form action="{{ URL::to('/registerUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
          <div class="email_text">
             <div class="form-group">
                  <input type="text" class="email-bt" name="fullname" placeholder="Name" required>
             </div>
             <div class="form-group">
                  <input type="email" class="email-bt" name="email" placeholder="Email" required>
             </div>
             <div class="form-group">
                  <input type="password" class="email-bt" name="password" placeholder="Password" required>
             </div>
             <div class="form-group">
                <input type="file" class="massage-bt" name="file" required>
             </div>
             <div class="send_btn">
                <button type="submit" name="register" style="background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 10px;">Sign up</button>
            </div>

          </div>
        </div>
      </div>
      </form>
      <!-- contact section end -->
<x-footer />