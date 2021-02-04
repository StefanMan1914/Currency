<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="submit_table" method="POST" enctype="multipart/form-data">
            <br>Name: {{$data['user_name']}}</br>
            <br>Hour Rate: {{$data['user_hour_rate']}}</br>
            <br>Currency: {{$data['user_currency']}}</br>
            
           @csrf
            <!-- Adding a dropdown field for the user to choose the currency converter -->
            <br>Exchange Provider</br>
            <select name="exchange_type">
                <option value="Default">Default</option>
                <option value="Fixer">Fixer</option>
            </select>
            <!-- Adding a dropdown field for the user to choose the currency for conversion -->
            <br>Currency Type</br>
            <select name="currency">
                <option value="GBP">GBP</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
            </select>
            <br></br>
            <!-- Button for submition of the form -->
            <button type="submit">Convert</button>  
            <button type="cancel">Cancel</button>  
        </form>
    </body>
</html>