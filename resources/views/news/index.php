<h3>News categories</h3>
<?php foreach($categoriesList as $category): ?>
    <div>
        <br>
        <a href="<?=route('news.category',['idCategory' => $category['id']]) ?>"><?=$category['title']?></a>
        <br>
    </div>
    <br><hr>
<?php endforeach; ?>
<br>
<br>
<a href="<?=route('admin.news.create')?>">Add news</a>
<br>
<br>
<a href="<?=route('info')?>">Info</a>
