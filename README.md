# Service which retrieves the profile of one facebook user.

## Download the entire source code in the repository

## Download "vendor" folder

Run this command from the directory in which you download the source code.

    composer install
    
## Run the Application

Run this command into the same directory.

    php -S [localhost] -t public public/index.php

Replace `[localhost]` with the desired localhost address and port for the application. For example: "127.0.0.1:8080".

## Run in web browser

    http://[localhost]/profile/facebook/[facebook_user_id]
    
Replace `[facebook_user_id]` with the facebook id of some user. For example: http://127.0.0.1:8080/profile/facebook/100001328417593
