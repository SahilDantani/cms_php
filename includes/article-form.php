<?php if(!empty($errors)): ?>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>    
<form method="post">

    <div>
        <label for="title">Title</label>
        <input name="title" id="title" placeholder="Article Title" value="<?=htmlspecialchars($title); ?>">
    </div>

    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="40" rows="4" placeholder="Article content"><?=htmlspecialchars($content); ?></textarea>
    </div>

    <div>
        <label for="publish_at">Publication date and time</label>
        <input type="datetime-local" name="publish_at" id="publish_at" value="<?=htmlspecialchars($publish_at); ?>">
    </div>

    <button>Save</button>
</form>