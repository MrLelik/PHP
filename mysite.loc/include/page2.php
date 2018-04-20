
    <div class="form-group">
        <label class="col-sm-4 control-label">Число рождения</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="day" placeholder="Число рождения" value="<?php
            echo isset($_SESSION['day']) ? $_SESSION['day'] : '';
            ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Месяц рождения</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="month" placeholder="Месяц рождения" value="<?php
            echo isset($_SESSION['month']) ? $_SESSION['month'] : '';
            ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Год рождения</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="year" placeholder="Год рождения" value="<?php
            echo isset($_SESSION['year']) ? $_SESSION['year'] : '';
            ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8 pull-right">
            <input type="submit" class="btn btn-info" value="Назад" name="page1">
            <input type="submit" class="btn btn-info pull-right" value="Далее" name="page3">
        </div>
    </div>
