@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                <div class="RegisterMsg"></div>
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="" required  autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required >

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
      $( document ).on('submit','#registerForm',function(e) {
    e.preventDefault();

    

    var url=$('#registerForm').attr('action');
      $.post( url, $( "#registerForm" ).serialize())
            .done(function( data ) {
              

              if (data['response']['auth']==true) {
                $('.RegisterMsg').empty();
                $('.RegisterMsg').append('<div class="alert alert-success text-center">'+data['message']+'</div>');
                setTimeout(function(){ 
                   $('.LoginMsg').empty();
                   location.href= data['response']['intended'];
                 }, 3000);
              };
              
              
            })
            .fail(function(data) {
                var errors = data.responseJSON;
                
                $('.RegisterMsg').empty();
                $('.RegisterMsg').append('<div class="alert alert-danger text-center errorMsg"></div>');
                var errorsHtml='';
                $.each(errors.errors, function( key, value ) {
                  errorsHtml += '<p >' + value[0] + '</p>';
                });
                $('.errorMsg').append(errorsHtml);
                setTimeout(function(){ 
                   $('.RegisterMsg').empty();
                   
                 }, 3000);
                //alert( "error" );
              })
              
    
   
});
</script>
@endsection