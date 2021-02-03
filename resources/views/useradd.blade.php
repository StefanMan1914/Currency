<html>
<body>
 <!-- Creating the form for submitting the user data to the database -->
    <form action="submit" method="POST" enctype="multipart/form-data">
    @csrf
        <br>User Name</br>
        <input type="text" name="name">
        <!-- Adding a field for the hour rate for the salary as a float number -->
        <br>Hour Rate</br>
        <input type="float" name="hour_rate">
        <!-- Adding a dropdown field for the user to choose the currency for their salary -->
        <br>Currency</br>
        <select name="currency">
        <option value="GBP">GBP</option>
        <option value="EUR">EUR</option>
        <option value="USD">USD</option>
        </select>
        <br></br>
        <!-- Button for submition of the form -->
        <button type="submit">Add User</button>
    </form>

    <div>
        
    <table>
        
        <tr>
            <td>Name</td>
            <td>Rate Per Hour</td>
            <td>Currency</td>
            <td>Button</td>
        </tr>
        @foreach($data as $record)
        @foreach($record as $r)
        <tr>
            <td>{{ $r->name }}</td>
            <td>{{ $r->hour_rate }}</td>
            <td>{{ $r->currency }}</td>
            <td>Smth</td>
        </tr>
        @endforeach
        @endforeach
        
    </table>    
    </div>
</body>
</html>