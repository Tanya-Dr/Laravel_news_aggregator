<h2>Authorization</h2>
<form method="POST">
    <label for="nickname">
        <span>Your login</span>
        <input
            required
            id="nickname"
            type="text"
            placeholder="Name"
        />
    </label>
    <br>
    <br>
    <label for="pass">
        <span>Your password</span>
        <input
            type="password"
            placeholder="Password"
            required
            id="pass"
        />
    </label>
    <br>
    <br>
    <label>
        <span>Remember me</span>
        <input type="checkbox">
    </label>
    <br>
    <br>
    <button type="submit">
        SIGNUP
    </button>
</form>
<br>
<a href="<?=route('info')?>">Back</a>
