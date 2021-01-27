# Custom Email validation Laravel 8

#### A test driven approach for custom email validation rules.

Laravel provides the email validation rule and its functions as already mentioned in the 
[documentation](https://laravel.com/docs/8.x/validation#rule-email).
By default, the RFCValidation validator is applied, but you can apply other validation 
styles as well. For example:
```php
EMAIL_RULES = ['required', 'string', 'email:rfc,dns', 'my_valid_email', 'max:255', 'unique:users'];
```
Checkout a really quick block post that I wrote for the story behind that code.
https://ckaloodee.medium.com/custom-email-validation-laravel-8-b37b8350ddf2
