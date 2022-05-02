<h3 style="text-decoration: underline;"><?=$category['title']?></h3>
<?php foreach($newsList as $news): ?>
    <div>
        <a href="<?=route('news.show',['idCategory' => $category['id'], 'id' => $news['id']]) ?>"><?=$news['title']?></a>
        <br>
        <img src="<?=$news['image']?>" style="width:200px;"><br>
        <p><strong>Author:</strong> <?=$news['author']?></p>
        <p><?=$news['description']?></p>
    </div>
    <br><hr>
<?php endforeach; ?>
<a href="<?=route('news')?>">News categories</a>
