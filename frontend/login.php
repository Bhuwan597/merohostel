<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<body class="bg-secondary p-4">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-6 col-md-10 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 ">
<form>

    <h3 class="mb-5 text-center">Log in</h3>
    
    <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" class="form-control form-control-lg" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="phone">Phone</label>
                <input type="number" id="phone" class="form-control form-control-lg" />
            </div>
            
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-lg" />
            </div>
            
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>
            <div class="container text-center">Forgot Password? <a href="#">Reset</a></div>
            <hr class="my-2">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <hr class="my-2">
            <div class="container text-center">Don't have an account <a href="#">Signup</a></div>     
        </form>
          </div>
        </div>
      </div>
    </div>
      
</body>