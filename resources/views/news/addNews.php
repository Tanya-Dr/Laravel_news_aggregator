<h2>Add news</h2>
<form action="<?=route('admin.news.store')?>" method="POST">
    <label for="title">
        <span>News title</span>
    </label>
    <br>
    <input
        required
        id="title"
        type="text"
        placeholder="title"
    />
    <br>
    <br>
    <label for="file-fullInfo">
        <span>Full description of news</span>
    </label>
    <br>
    <textarea
        name="fullInfo"
        rows="10"
        id="file-fullInfo"
        required
        placeholder="fullInfo"
    ></textarea>
    <br>
    <br>
    <label for="file-shortInfo">
        <span>Short description of news</span>
    </label>
    <br>
    <textarea
        name="shortInfo"
        id="file-shortInfo"
        required
        placeholder="shortInfo"
    ></textarea>
    <br>
    <br>
    <button type="submit">
        SIGNUP
    </button>
</form>
<br>
<a href="<?=route('news')?>">Back</a>
