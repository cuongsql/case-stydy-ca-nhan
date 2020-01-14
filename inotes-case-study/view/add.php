<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Add Note</h1>
            <form method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="form-control" rows="10" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type_id">
                        <?php foreach($noteType as $value){ ?>
                        <option value="<?php echo $value->getId(); ?>" selected><?php echo $value->getName(); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>