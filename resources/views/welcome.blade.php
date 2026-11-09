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
    .feedback-row {
        display: flex;
        align-items: center;
        gap: 12px;
        width: fit-content;
        max-width: 100%;
        margin-bottom: 12px;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .feedback-delete {
        margin: 0;
    }

    .feedback-content {
        flex: 0 1 auto;
        max-width: 60ch;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .feedback-content p {
        margin-bottom: 0;
    }

    .feedback-edit {
        white-space: nowrap;
    }
    .feedback-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
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
    <div class="feedback-row">
        <div class="feedback-actions">
            <a href="/feedback/{{ $entry->id }}/edit">Edit</a>

            <form action="/feedback/{{ $entry->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </div>

        <article class="feedback-content">
            <strong>{{ $entry->name }}</strong>
            <p>{{ $entry->message }}</p>
        </article>
    </div>
@endforeach

</body>
</html>