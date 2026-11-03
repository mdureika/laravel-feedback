<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    input,
    textarea {
        width: 300px;
        box-sizing: border-box;
    }
    label {
    display: inline-block;
    width: 100px;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Feedback</h1>
    @if (session('success'))
    <p>{{ session('success') }}</p>
@endif
    <form action="/feedback" method="POST">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input id="name" name="name" type="text" required>
    </div>
    <div>
        <label for="message">Feedback:</label>
        <textarea id="message" name="message" required></textarea>
    </div>

    <button type="submit">Submit</button>
</form>
<h2>Submitted feedback</h2>

@foreach ($feedback as $entry)
    <article>
        <strong>{{ $entry->name }}</strong>
        <p>{{ $entry->message }}</p>
    </article>
@endforeach
</body>
</html>