# Custom Email validation Laravel 8

#### A test driven approach for custom email validation rules.

Laravel provides the email validation rule and its functions as already mentioned in the [documentation](https://laravel.com/docs/8.x/validation#rule-email).
By default the RFCValidation validator is applied, but you can apply other validation styles as well like so:
```php
EMAIL_RULES = ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'];
```

So, why bothering do your own thing here? Well, the need was to avoid the extra API call that the dns function curries but also prevent as much as possible invalid email registration.

And then What?

After a little search I stopped in this post: ["How to Find or Validate an Email Address"](https://www.regular-expressions.info/email.html) that explains really well the logic behind validation. 
So it convinced me to create that regural expression that will do our job.

The Test Driven approach helped a lot here and the [data provider](https://tighten.co/blog/tidying-up-your-phpunit-tests-with-data-providers/) approach too.
