
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <section class="register-section">
  <div class="register-container">
    <h2>Create Account</h2>
    <p class="register-subtitle">Join us and start your journey</p>

    <form method="POST" action="{{ route('userRegister') }}" class="register-form">
      @csrf

      <!-- Name -->
      <div class="form-group">
        <label for="name">Full Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name') <small class="error">{{ $message }}</small> @enderror
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <small class="error">{{ $message }}</small> @enderror
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password') <small class="error">{{ $message }}</small> @enderror
      </div>

      <!-- Country -->
      <div class="form-group">
        <label for="country">Country</label>
        <select id="country" name="country" required></select>
        @error('country') <small class="error">{{ $message }}</small> @enderror
      </div>

      <!-- Phone -->
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required>
        @error('phone') <small class="error">{{ $message }}</small> @enderror
      </div>

      <!-- Submit -->
      <button type="submit" class="register-btn">Register</button>

    </form>
      <div class="extra-links">
        <button data-bs-toggle="modal" data-bs-target="#login">Log in</button>
      </div>
  </div>
</section>
</div>
</div>
</div>


<!-- Script to load all countries dynamically -->
<script>
  document.addEventListener("DOMContentLoaded", async () => {
    const countrySelect = document.getElementById("country");
    try {
      const response = await fetch("https://restcountries.com/v3.1/all/?fields=name");
      const countries = await response.json();

      countries.sort((a, b) => a.name.common.localeCompare(b.name.common));
      countries.forEach(country => {
        const option = document.createElement("option");
        option.value = country.name.common;
        option.textContent = country.name.common;
        option.selected = country.name.common === "Morocco"; // default example
        countrySelect.appendChild(option);
      });
    } catch (error) {
      console.error("Error loading countries:", error);
    }
  });
</script>
