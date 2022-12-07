<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../resources/css/style.css">
    <title>ProtuctX</title>
</head>
<body class ="h-max">
    <div class="padL2rem flex listBox header w-max bgs1">
        <div class="flex alignCenter gap1">
            <h1>ProductX</h1>
            <img class = "logo" src="../resources/imgs/box.png" alt="djjdj">
        </div>
    </div>
    <div class="flex space-between col w-max loginDiv padT10rem alignCenter">
        <div class="box1 bgs2 flex">
            <div class = "login-logo pad2rem flex alignCenter justifyCenter" id="logo">
                <h1>ProductX</h1>
            </div>
            <div>
                <form action="http://localhost:8888/products/public/loginUser" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="login loginBox alignCenter flex col gap1 padL5rem padR5rem padB2rem">
                        <h1>Login</h1>
                        <div class="flex col">
                            <label for="Username">Username:</label>
                            <input type="text" name ="user">
                        </div>
                        <div class="flex col">
                            <label for="Username">Password:</label>
                            <input type="text" name = "pass">
                        </div> 
                        <button class = "btn" type = "submit">LogIn</button>
                        <p id = "register">Register</p>
                    </div>
                    <div class="padT2rem">
                        <?php if($errors->any()): ?>
                        <div class="red">
                            something went wrong
                            <ul class ="red">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class ="geen">
                                    <?php echo e($error); ?>

                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>  
                </form>
                <div class="registerBox none register padL5rem padR5rem padB2rem">
                    <form action="register" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="col alignCenter gap1 flex">
                            <h1>Register</h1>
                            <div class="flex col">
                                <label for="Username">Username:</label>
                                <input type="text" name ="username">
                            </div>
                            <div class="flex col">
                                <label for="Username">Password:</label>
                                <input type="text"name ="password">
                            </div> 
                            <div class="flex col">
                                <label for="Username">Confirm:</label>
                                <input type="text" name ="confirm">
                            </div> 
                            <button class = "btn" type="submit">Register</button>
                            <p id = "login">LogIn</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src ="../resources/js/script.js"></script>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/products/resources/views/userLogin.blade.php ENDPATH**/ ?>