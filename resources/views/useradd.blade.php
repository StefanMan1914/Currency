<html>
<body>
 <!-- Creating the form for submitting the user data to the database -->
    <form action="submit" method="POST">
    @csrf
        <br>User Name</br>
        <input type="text" name="name">
        <br>Hour Rate</br>
        <input type="number" name="hour_rate">
        <br>Currency</br>
        <select name="currency">
        <option value="GBP">GBP</option>
        <option value="EUR">EUR</option>
        <option value="USD">USD</option>
        </select>
        <br></br>
        <button type="submit">Add User</button>
    </form>
</body>
</html>