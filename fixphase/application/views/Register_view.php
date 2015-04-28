<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
  </head>
  <body>
    <!--
    this the form but made in php
    you will need to use codeigniter functions like
    form_input('username', )
    -->
    <?php
    echo form_open('Register/validate');
    echo validation_errors();

    echo "<p>Username:";
    echo form_input('username');
    echo " Must be at least 4 characters long</p>";

    echo "<p>First Name:";
    echo form_input('Fname');
    echo " Must be at least 4 characters long</p>";

    echo "<p>Last Name:";
    echo form_input('Lname');
    echo " Must be at least 4 characters long</p>";

    echo "<p>Password:";
    echo form_password('password');
    echo " Must be at least 8 characters long</p>";

    echo "<p>Confirm Password:";
    echo form_password('cpassword');
    echo " Must match the password</p>";

    echo "<p>Email:";
    echo form_input('email');
    echo " Must be a valid E-Mail</p>";

    echo "<p>Role:";
    $options = array(
            'Developer'         => 'Developer',
            'Tester'           => 'Tester',
    );
    echo form_dropdown('role',$options );
    echo "</p>";

    echo form_submit('Submit', 'Submit');
    echo form_close();
    ?>

  </body>
</html>
