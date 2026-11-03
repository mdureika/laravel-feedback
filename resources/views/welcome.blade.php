<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Feedback</h1>
    <form action="/feedback" method="POST">
        @csrf

<label for="name">Name:</label>
<input id="name" name="name" type="text" required>
<ol>
<label for="name">Feedback:</label>
<input id="name" name="name" type="text" required>
        <button type="submit" class="add-button">Submit</button>
    </form>
</body>
</html>