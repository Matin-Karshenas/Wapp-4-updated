<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Sql_php.php" method="post">
        <table>
            <tr>
                <td>NAME</td>
                <td><input type="name" name="NAME" ></td>
            </tr>
                
            <tr>
                <td>EMAIL</td>
                <td><input type="email" name="EMAIL" ></td>
            </tr>


            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="PASSWORD" ></td>
            </tr>

            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Sign Up"></td>
            </tr>
        </table>
    </form>
     
    <br>
    
    <form action="Login.php" method="post">
        <table>
            <tr>
                <td>NAME or EMAIL</td>
                <td><input type="name" name="NAME_login" ></td>
            </tr>
            

            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="PASSWORD_login" ></td>
            </tr>

            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>