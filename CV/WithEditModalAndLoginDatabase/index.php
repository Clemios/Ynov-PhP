<?php
// Basic routing with GET and POST method support

$routes = [
    'GET' => [
        '/' => 'home',
        '/home' => 'home',
        '/login' => 'login',
        '/logout' => 'logout',
        '/edit' => 'editProfile'
    ],
    'POST' => [
        '/login' => 'processLogin',
        '/edit' => 'processEditProfile'
    ]
];

// Get the request URI and request method
$requestUri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
if (empty($requestUri)) {
    $requestUri = '/';
}
$requestMethod = $_SERVER['REQUEST_METHOD'];
// Handle routing based on request method
if (isset($routes[$requestMethod][$requestUri])) {
    $function = $routes[$requestMethod][$requestUri];
    if (function_exists($function)) {
        call_user_func($function);
    } else {
        echo "The function $function does not exist!";
    }
} else {
    echo $requestUri;
    // If no route matches, display a 404 error page
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 - Page Not Found</h1>";
}

// Functions for different routes

function home()
{
    echo "<h1>Welcome to the Home Page</h1>";
}

function login()
{
    echo '<form method="POST" action="/login">
              <label>Username: <input type="text" name="username"></label><br>
              <label>Password: <input type="password" name="password"></label><br>
              <input type="submit" value="Login">
          </form>';
}

function processLogin()
{
    echo "<h1>Processing Login...</h1>";
    // Validate login form and handle authentication
}

function editProfile()
{
    echo "<h1>Edit Profile Page</h1>";
}

function processEditProfile()
{
    echo "<h1>Processing Profile Edit...</h1>";
    // Handle profile update
}

function logout()
{
    echo "<h1>Logged Out</h1>";
    // Handle logout logic here
}
