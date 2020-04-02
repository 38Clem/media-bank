<?php include __DIR__ . ('/../_header.html.php') ?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h1 class="card-title">Log In</h1>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php if($emailForm->getError()["email"]){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $emailForm->getError()["email"] ?>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" class="form-control" id="exampleInputPassword1">
                <?php if($passwordForm->getError()["password"]){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $passwordForm->getError()["password"] ?>
                </div>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php include __DIR__ . ('/../_footer.html.php') ?>
