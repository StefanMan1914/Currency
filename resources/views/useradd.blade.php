<html>
<body>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center; 
  vertical-align: middle;
}
</style>
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

    
</body>
</html>