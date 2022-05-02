<div>
    <h3><?=$news['title']?></h3>
    <br>
    <img src="<?=$news['image']?>" style="width:200px;">
    <br>
    <p><strong>Author:</strong> <?=$news['author']?></p>
    <p><?=$news['description']?></p>
</div>
<a href="<?=route('news.category',['idCategory' => $idCategory]) ?>">Back to category</a>
