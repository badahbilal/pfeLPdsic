<form action="/test/go" method="post">

@csrf

    <input type="text" name="noms1"><br>
    <input type="text" name="noms[]"><br>
    <input type="text" name="noms[]"><br>
    <input type="text" name="noms[]"><br>
    <input type="submit" value="submit">
</form>