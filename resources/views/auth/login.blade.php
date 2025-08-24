
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <section class="modal-body login-section">
    <div class="login-container">
      <h2>Welcome Back</h2>
      <p class="login-subtitle">Please login to your account</p>
      <form action={{ route('userLogin') }} method="POST" class="login-form">
        @csrf
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
          @error('email') <small class="error">{{ $message }}</small> @enderror
        </div>
  
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password">
          @error('password') <small class="error">{{ $message }}</small> @enderror
        </div>
  
        <button type="submit" class="login-btn">Login</button>
  
      </form>
        <div class="extra-links">
                  <button data-bs-toggle="modal" data-bs-target="#register">Create Account</button>

        </div>
    </div>
  </section>
</div>
</div>
</div>