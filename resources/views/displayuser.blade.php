<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="exchange" method="POST" enctype="multipart/form-data">
            <br>Name: {{$data['user_name']}}</br>
            <br>Hour Rate: {{$data['user_hour_rate']}}</br>
            <br>Currency: {{$data['user_currency']}}</br>
            
           @csrf
            <!-- Hidden fields to pass information to the controller on submition of the form -->
            <input type="hidden" name="user_n" value= {{ $data['user_name'] }}>
            <input type="hidden" name="user_hr" value= {{ $data['user_hour_rate'] }}>
            <input type="hidden" name="user_c" value= {{ $data['user_currency'] }}>
            <!-- Adding a dropdown field for the user to choose the currency converter -->
            <br>Exchange Provider</br>
            <select name="exchange_type">
                <option value="default">Default</option>
                <option value="fixer">Fixer</option>
            </select>
            <!-- Adding a dropdown field for the user to choose the currency for conversion -->
            <br>Currency Type</br>
            <select name="currency_type">
                <option value="GBP">GBP</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
            </select>
            <br></br>
            <!-- Button for submition of the form -->
            <button type="exchange">Convert</button>    
        </form>
        <br></br>
        <form action="cancel" method="POST" enctype="multipart/form-data">
        @csrf
            <button type="cancel">Cancel</button>
        </form>
    </body>
</html>