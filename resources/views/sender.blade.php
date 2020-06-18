<form action="/sender" method="POST">
    {{ csrf_field() }}
    <input type="text" name="text" />
    <button type="submit">save</button>
</form>