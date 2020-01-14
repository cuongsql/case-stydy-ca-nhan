<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Note</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $value->getTitle() ?>">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="form-control" rows="10" name="content"><?php echo $value->getContent() ?></textarea>
                </div>
                <div class="form-group">
                    <label>Store</label>
                    <select class="form-control" name="type_id">
                        <?php foreach($noteType as $item){ ?>
                        <option value="<?php echo $item->getId(); ?>"
                        <?php if ($value->getType_id() == $item->getId()): ?>selected<?php endif; ?> >
                            <?php echo $item->getName(); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>