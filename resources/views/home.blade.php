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
        <form action="gotoadd" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Button for submition of the form -->
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
            @foreach($data as $record)
            @foreach($record as $r)
            <form action="displayuser" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>{{ $r->name }}</td>
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