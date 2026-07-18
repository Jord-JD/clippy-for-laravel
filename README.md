
# 📎 Clippy for Laravel

<img src="assets/clippy-for-laravel-demo.gif"></img>

This package brings possibly the most important feature of all time to the Laravel
framework. With this easy to use package, anyone can make use of the all powerful
Clippy assistant within their Laravel applications.

It supports Laravel 5.1 through 13. Speech is JSON-encoded before it reaches JavaScript, so quotes and HTML in application text cannot break out of the generated script. Browser assets are pinned to jQuery 3.7.1 and an exact clippy.js commit rather than mutable upstream branches.

## Installation

Just run the following Composer command from the root of your project.

```bash
composer require jord-jd/clippy-for-laravel
```

## Usage

Just add the following to any Blade file.

```blade
@clippy('It looks like you are writing a Laravel app. Would you like help with that?')
``` 

It also works with variables so you pass all important data down from your controllers
or view composers.

```blade
@clippy($earthShatteringlyImportantMessage);
```
