<?php $form  = app\core\form\Form::begin("POST", "/register");?>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control<?= $model && $model->hasError('firstname') ? ' is-invalid' : '' ?>" id="firstname" name="firstname" value="<?= $model ? $model->firstname : '' ?>">
                <?php
                if ($model && $model->hasError('firstname')) {
                    echo '<div class="invalid-feedback">';
                    echo $model->getFirstError('firstname');
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $model ? $model->lastname : '' ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $model ? $model->email : '' ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end()?>