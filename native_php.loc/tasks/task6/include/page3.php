
<div class="form-group">
    <label class="col-sm-4 control-label">Любимый цвет</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="colour" placeholder="Любимый цвет" value="<?php
        echo isset($_SESSION['colour']) ? $_SESSION['colour'] : '';
        ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Любимое число</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="number" placeholder="Любимое число" value="<?php
        echo isset($_SESSION['number']) ? $_SESSION['number'] : '';
        ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Любимая игра</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="game" placeholder="Любимая игра" value="<?php
        echo isset($_SESSION['game']) ? $_SESSION['game'] : '';
        ?>">
    </div>
</div>
<div class="form-group">
    <div class="col-md-8 pull-right">
        <input type="submit" class="btn btn-info" value="Назад" name="page2">
        <input type="submit" class="btn btn-info pull-right" value="Далее" name="page4">
    </div>
</div>