<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp/SignIn</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color:black;
        }
        .form{
            width:400px;
            height:400px;
            border: 10px inset;
            padding: 40px;
            border-radius: 10px;
            background-color: lightgreen;
            position: absolute;
            top: 50%;
            left: 50%;
            transform:translate(-50%,-50%);
        }
        h1{
            margin-bottom: 30px;
            color:blue;
            font-weight: bold;
        }
        #name,#email,#password{
            width: 290px;
            height: 30px;
        } 
        .btn{
            width: 80px;
            height: 40px;
            margin-left: 30px;
            margin-top: 15px;
            border-radius: 30px;
            border: 5px inset white;
            cursor: pointer;
            background-color:lightsalmon;
        }
    </style>
</head>
<body>
    <div class="form">
        <h1>User SignUp/SignIn</h1>
        <form action="" method="post">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" class="btn" value="SignUp" name="signup" id="signup">
            <input type="submit" class="btn" value="SignIn" name="signin" id="signin">
        </form>
    </div>   

    <?php

            if(isset($_POST['signup']))
            {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $mycon=mysqli_connect('localhost','root',"",'webp');
            $q="insert into users values ('$name','$email','$password')";
            $res=mysqli_query($mycon,$q);
            echo "SignUP Completed!";
            mysqli_close($mycon);
            }



             if(isset($_POST['signin']))
            {
               $name=$_POST['name'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                echo $email.$password;
                $mycon=mysqli_connect("localhost","root","","dataline");
                $q="select * from users where email='$email' and password ='$password'";
                $rec=mysqli_query($mycon,$q);
                echo "<pre>";
                print_r($rec);
                echo "</pre>";
                if(mysqli_num_rows($rec)>0)
                {
                    echo "Login!";
                }
                else{
                    echo "login Fail because invalid email or password!";
                }
            }
    ?>
</body>
</html>
