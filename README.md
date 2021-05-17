# Secret Page
This plugin brings the ability easily protect individual CMS pages.
.

## Installation
For the time being, use composer to install:
```
composer mercator/wn-secretpage-plugin
php artisan winter:up
```

## Usage
The plugin provides a single component (for CMS) and a single snippet (for Static Pages) with two fields:
- Passphrase: The secret the user has to provide in order to access the page. By default, a random string is generated.
- Forward URL: The URL the user is directed to if an incorrect passphrase is supplied.

Once the component or snippet has been placed on the page and the passphrase as well as the Forward URL
as been supplied, a user can access the page by passing a parameter as follows 
``https://myhost.com/mypage?__secretpage=<passphrase>``. 

For example, to display the page **xyz** on host **mercator.li** with secret **aszhim12as0AmoArtZR** call

```
https://mercator.li/xyz?__secretpage=aszhim12as0AmoArtZR
```

**Please consider donating to support the ongoing development if you find this plugin useful.**
