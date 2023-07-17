@if(session("success"))
    <h1>{{ session("success") }}</h1>
@endif
<form action="{{route("test.import")}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Import excel : </label>
    <input type="file" name="xlsx">
    <button type="submit">Send</button>
    <table>
        <thead>
        <th>Name</th>
        <th>last name</th>
        <th>Age</th>
        </thead>
        <tbody>
        @isset($tests)
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->prenom }}</td>
                    <td>{{ $test->age }}</td>
                </tr>
            @endforeach
        @endisset
        </tbody>

    </table>
</form>
