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
            <form action="gotoadd" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Button for submition of the form -->
                <button type="gotoadd">Create User</button>
            </form>
    </body>
</html>