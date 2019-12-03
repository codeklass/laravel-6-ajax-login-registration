@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                <div class="LoginMsg"></div>
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required >

                                
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
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
      $( document ).on('submit','#loginForm',function(e) {
    e.preventDefault();

    

    var url=$('#loginForm').attr('action');
      $.post( url, $( "#loginForm" ).serialize())
            .done(function( data ) {
              

              if (data['response']['auth']==true) {
                $('.LoginMsg').empty();
                $('.LoginMsg').append('<div class="alert alert-success text-center">'+data['message']+'</div>');
                setTimeout(function(){ 
                   $('.LoginMsg').empty();
                   location.href= data['response']['intended'];
                 }, 3000);
              };
              
              
            })
            .fail(function(data) {
                var errors = data.responseJSON;
                
                $('.LoginMsg').empty();
                $('.LoginMsg').append('<div class="alert alert-danger text-center errorMsg"></div>');
                var errorsHtml='';
                $.each(errors.errors, function( key, value ) {
                  errorsHtml += '<p >' + value[0] + '</p>';
                });
                $('.errorMsg').append(errorsHtml);
                setTimeout(function(){ 
                   $('.LoginMsg').empty();
                   
                 }, 3000);
                //alert( "error" );
              })
              
    
   
});
</script>
@endsection
