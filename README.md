
# Laravel To-Do Lists API with JWT Authentication

This project contains JWT authentication for API routes protection.

## How to generate JWT Tokens for testing

To generate a valid JWT token for 2 hours, execute the following artisan comand below in the project's root:

```bash
php artisan api:token
```
After generating the token, place it in LocalStorage using the code in /public/js/index.js file

    localStorage.setItem('jwt_token', 'YOUR_GENERATED_TOKEN_HERE')
    
    const  token  =  localStorage.getItem('jwt_token')

  

