
    <div class="form-group">
        <label class="col-sm-4 control-label">Имя</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="name" placeholder="Имя" value="<?php
            echo isset($_SESSION['name']) ? $_SESSION['name'] : '';
            ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Фамилия</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="surname" placeholder="Фамилия" value="<?php
            echo isset($_SESSION['surname']) ? $_SESSION['surname'] : '';
            ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
            <input type="submit" class="btn btn-info pull-left" value="Далее" name="page2">
        </div>
    </div>
