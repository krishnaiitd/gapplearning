<?php
        use google\appengine\api\users\User;
        use google\appengine\api\users\UserService;
        // Looks for current Google account session
        $user = UserService::getCurrentUser();
        if ($user) {
        	echo 'Hello, ' . htmlspecialchars($user->getNickName());
        	echo '<br>';
        	echo 'Since you are google user you can\'t view the phpinfo for google';
        	echo "<br>";

                include 'test.php';
        	
        	//phpinfo();
        } else {
        	header('Location: ' . UserService::createLoginURL($_SERVER['REQUEST_URI']));
        }

        echo '<br>'."Hello, Testing the user login from gogle api!!!";


?>
