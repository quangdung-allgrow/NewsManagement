
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          {!! Form::open(['route' => 'user.postLogin', 'class' => 'mar-top-50']) !!}
            <h2 class="form-signin-heading">{{ __('auth.messages.please sign in') }}</h2>

            <div class="form-group {{ has_error($errors, 'email') }}">
              <label for="email">Email address</label>
              <input name="email" type="email" id="email" class="form-control" placeholder="Email address" autofocus>
            </div>
            <div class="form-group {{ has_error($errors, 'password') }}">
              <label for="password" class="sr-only">Password</label>
              <input name="password" type="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="" name="remember_me"> {{ __('auth.messages.remember me') }}
              </label>
            </div>
            <button class="btn btn-primary btn-block width-100 pointer" type="submit">{{ __('auth.messages.sign in') }}</button>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
  </body>
</html>
