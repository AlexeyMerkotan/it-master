<?php require_once __DIR__ .'./blocks/header.php'?>
<body>
<div class="row">
    <div class=".col-md-12">
                <div class="container " style="width: 430px;">
                    <form class="form-signin" action="?page=enter&list=enter" method="post">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="" autofocus="">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required="">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                </div>
    </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>