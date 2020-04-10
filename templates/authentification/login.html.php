<?php include __DIR__ . ('/../_header.html.php') ?>


<div class="log-in d-flex justify-content-center">
    <div class="card border-secondary shadow p-3 mb-5 bg-white rounded" style="width:max-content">
        <img class="img-fluid" src="/assets/images/ticketLogIn.png"/>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input value="<?php echo filter_var( $email->getEmail(),FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" name="email" class="form-control" id="exampleInputEmail1">
                    <?php if($emailForm->getError()["email"]){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $emailForm->getError()["email"] ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input value="<?php echo filter_var( $password->getValue(),FILTER_SANITIZE_FULL_SPECIAL_CHARS)?>" name="password" class="form-control" id="exampleInputPassword1">
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
</div>

<?php include __DIR__ . ('/../_footer.html.php') ?>
