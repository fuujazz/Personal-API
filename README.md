
Setting up 


    USER 

1- php artisan tinker
    User::create(['name'=>'...', 'email'=>'...', 'password'=>Hash::make('...')]);
2- php artisan passport:install

    TOKEN 

POST request to <url>/oauth/token

Body parameters :
    grant_type      password
    client_id       -taken from passport-
    client_secret   -taken from passport-
    username        -given email when creating User-
    password        -given password when creating User-
    scope
    
    
![Screenshot_2](https://user-images.githubusercontent.com/94568439/176841155-6d178f9f-452c-48cc-9f15-115061d7c67e.png)

Request Header

![Screenshot_3](https://user-images.githubusercontent.com/94568439/176841267-e7eec478-ba64-4b1a-9bed-c309f0e650aa.png)
