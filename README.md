idnavalidator-laravel
=====================

Updated URL validation methods for Laravel that allow linking to International Domain Names (IDN)

## Installation

#### Install the bundle

	php artisan bundle:install idnavalidator

#### Activate in ```application/bundles.php```

	return array(
		...
		'idnavalidator' => array('auto' => 'true')
		...
	);

## Usage
IDNAValidator can be used just like any Laravel\URL method;
	print IDNAValidator\URL::to($intlurl);


## Replacing Laravel\URL

Since IDNAValidator\URL directly extends Laravel\URL, you can alias it so that any Laravel class that uses URL will use IDNAValidator\URL instead. This is necessary if you want HTML::link (or others) to use international validation as well.

To do the alias replacement, find the 'aliases' array in ```application/config/application.php```, and replace
	'URL'        => 'Laravel\\URL',

with
	'URL'        => 'IDNAValidator\\URL',

Once you've replaced the alias, you should be able to use URL methods like normal:
	URL::to_route($route);


