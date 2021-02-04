<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center; 
                vertical-align: middle;
            }
        </style>
        <div>
        <!-- Creating a table where the button will display the user information in another page for conversion of hour rate to different currency -->
        <form action="gotoadd" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Button for switching through tabs -->
                <button type="gotoadd">Create User</button>
        </form>
        
        <table class="container">
            <thead>
            <tr>
                <td>Name</td>
                <td>Hourly Rate</td>
                <td>Currency</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <!-- Creating a foreach loop to retrieve all of the records from the database users table-->
            @foreach($data as $record)
            @foreach($record as $r)
            <form action="displayuser" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>{{ $r->name }}</td>
                <!-- Hidden fields to pass information to the controller on submition of the form -->
                <input type="hidden" name="name_table" value= {{ $r->name }}>
                <input type="hidden" name="hour_rate_table" value= {{ $r->hour_rate }}>
                <input type="hidden" name="currency_table" value= {{ $r->currency }}>
                <td>{{ $r->hour_rate }}</td>
                <td>{{ $r->currency }}</td>
                <!-- Button trigger to display user information and select for currency exchange-->
                <td><button type="displayuser" class="btn btn-primary">Convert salary</button></td>
            </tr>
            </form>
            @endforeach
            @endforeach
            </tbody>
            
        </table>    
        </div>
        </body>
</html>