@extends('layouts.main')
@section('title') - Sign in @parent @stop

@section('content')
<form class="form-signin text-center">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
</form>
@endsection

<!--<h2>Authorization</h2>-->
<!--<form method="POST">-->
<!--    <label for="nickname">-->
<!--        <span>Your login</span>-->
<!--        <input-->
<!--            required-->
<!--            id="nickname"-->
<!--            type="text"-->
<!--            placeholder="Name"-->
<!--        />-->
<!--    </label>-->
<!--    <br>-->
<!--    <br>-->
<!--    <label for="pass">-->
<!--        <span>Your password</span>-->
<!--        <input-->
<!--            type="password"-->
<!--            placeholder="Password"-->
<!--            required-->
<!--            id="pass"-->
<!--        />-->
<!--    </label>-->
<!--    <br>-->
<!--    <br>-->
<!--    <label>-->
<!--        <span>Remember me</span>-->
<!--        <input type="checkbox">-->
<!--    </label>-->
<!--    <br>-->
<!--    <br>-->
<!--    <button type="submit">-->
<!--        SIGNUP-->
<!--    </button>-->
<!--</form>-->
<!--<br>-->
<!--<a href="--><?//=route('info')?><!--">Back</a>-->
