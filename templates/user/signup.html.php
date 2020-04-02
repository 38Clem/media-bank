<?php include __DIR__ . ('/../_header.html.php') ?>
<div class="signup d-flex justify-content-center">
    <div class="card border-secondary shadow p-3 mb-5 bg-white rounded">
        <img src="/assets/images/clapperSignUp.png" class="justify-item-center"/>
        <div class="card-body">
            <form method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input value="<?php echo filter_var( $user->getName(), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ?>" name="name" type="text" class="form-control" id="pseudo" placeholder="Enter pseudo">
                        <?php if($userForm->getError()["name"]) {?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $userForm->getError()["name"] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?php echo filter_var( $user->getEmail()->getEmail(), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ?>" name="email" class="form-control" id="email" placeholder="Enter email">
                        <?php if($userForm->getEmailForm()->getError()["email"]) {?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $userForm->getEmailForm()->getError()["email"] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?php echo filter_var( $user->getPassword()->getValue(), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ?>" name="password" class="form-control" id="password" placeholder="Enter password">
                    <?php if($userForm->getPasswordForm()->getError()["password"]) {?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $userForm->getPasswordForm()->getError()["password"] ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="confirmation">Confirm Password</label>
                    <input name="password_confirmation" class="form-control" id="confirmation" placeholder="Confirm password">
                    <?php if($userForm->getPasswordForm()->getError()["confirm"]) {?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $userForm->getPasswordForm()->getError()["confirm"] ?>
                        </div>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . ('/../_footer.html.php') ?>
