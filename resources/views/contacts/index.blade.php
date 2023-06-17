<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All contacts</h1>
    <div>
        <a href='{{ route('contacts.create') }}'>Add contact</a>

        @foreach ($contacts as $id => $contact)
            <p>{{$contact['name']}} | {{ $contact['phone']}}</p>
            <a href='{{ route('contacts.show', $id) }}'>Show</a>
        @endforeach


        
    </div>
</body>

</html>