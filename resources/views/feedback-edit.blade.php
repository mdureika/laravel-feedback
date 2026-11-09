<form action="/feedback/{{ $entry->id }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input id="name" name="name" value="{{ $entry->name }}" required>

    <label for="message">Feedback:</label>
    <textarea id="message" name="message" required>{{ $entry->message }}</textarea>

    <button type="submit">Save changes</button>
</form>