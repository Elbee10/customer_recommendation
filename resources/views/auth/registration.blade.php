@extends('layouts.app') 
@section('content') 
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="{{route('register-user')}}" method ="post">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            


                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="first_name">First Name</div>
                                <div class="col-md-6">
                                    <input type="text"  id="first_name" name="first_name" class="form-control" required autofocus
                                    value="{{old("first_name") }}">
                                    <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="last_name">Last Name</div>
                                <div class="col-md-6">
                                    <input type="text" id="last_name" name="last_name" class="form-control" required autofocus
                                    value="{{old("last_name") }}">
                                    <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="email">Email</div>
                                <div class="col-md-6">
                                    <input type="email" id="email" name="email" class="form-control" required autofocus
                                    value="{{old("email") }}">
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="username">Username</div>
                                <div class="col-md-6">
                                    <input type="text" id="username" name="username" class="form-control" required autofocus
                                    value="{{old("username") }}">
                                    <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="password">Pasword</div>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control" required autofocus
                                    value="{{old("password") }}">
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                
                                   
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="repeat_password">Re-enter password</div>
                                <div class="col-md-6">
                                    <input type="password" id="repeat_password" name="repeat_password" class="form-control" required autofocus>
                                    <span class="text-danger">@error('repeat_password') {{$message}} @enderror</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="address">Address</div>
                                <div class="col-md-6">
                                    <input type="text" id="address" name="address" class="form-control" required autofocus
                                    value="{{old("address") }}">
                                    <span class="text-danger">@error('address') {{$message}} @enderror</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right" for="dob">Date of birth</div>
                                <div class="col-md-6">
                                    <input type="text" id="dob" name="dob" class="form-control" required autofocus
                                    value="{{old("dob") }}">
                                    <span class="text-danger">@error('dob') {{$message}} @enderror</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input  type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                    <a href="#" class="btn btn-link">
                                        Forgot Your Password?
                                    </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection 


@section('css') 
@endsection 

@section('scripts') 
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var $submitBtn = $("#form input[type='submit']");
        var $passwordBox = $("#password");
        var $confirmBox = $("#repeat_password");
        var $errorMsg =  $('<span class="text-danger" id="error_msg">Passwords do not match.</span>');

        // This is incase the user hits refresh - some browsers will maintain the disabled state of the button.
        $submitBtn.removeAttr("disabled");

        function checkMatchingPasswords(){
            if($confirmBox.val() != "" && $passwordBox.val != ""){
                if( $confirmBox.val() != $passwordBox.val() ){
                    $submitBtn.attr("disabled", "disabled");
                    $errorMsg.insertAfter($confirmBox);
                }
            }
        }

        function resetPasswordError(){
            $submitBtn.removeAttr("disabled");
            var $errorCont = $("#error_msg");
            if($errorCont.length > 0){
                $errorCont.remove();
            }  
        }


        $("#repeat_password, #password")
             .on("keydown", function(e){
                /* only check when the tab or enter keys are pressed
                 * to prevent the method from being called needlessly  */
                if(e.keyCode == 13 || e.keyCode == 9) {
                    checkMatchingPasswords();
                }
             })
             .on("blur", function(){                    
                // also check when the element looses focus (clicks somewhere else)
                checkMatchingPasswords();
            })
            .on("focus", function(){
                // reset the error message when they go to make a change
                resetPasswordError();
            })

    });
</script>
@endsection