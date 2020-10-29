<?php

namespace app\core\form;

class Field
{
    public function __toString()
    {
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
    }
}