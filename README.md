# version-master

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Version Master is a git based versioning tool for PHP projects with Laravel Service Providers.
This package uses the `.git` storage file to read the current hash for the specified project or folder.

Since, the `GitHashReader` uses file access, it does not need to have access to the `git` command or `exec` privileges which may not be available in production environments.

## Install

Via Composer

``` bash
$ composer require rtablada/version-master
```

## Usage

The basic class for this package is the `GitHashReader`.
It requires two arguments:

* `required` - An instance of `Illuminate\Filesystem` - Used to read from the Git File Tree
* `required` - A string path for the root of the git project.
* `optional` - A string path for the name of the git storage folder (defaults to `.git`)

``` php
$reader = new Rtablada\VersionMaster\GitHashReader();

echo $reader->getFullVersion(); // Outputs latest hash on git HEAD
```

## Laravel Usage

This package also includes a Service Provider to allow use in Laravel Applications.

This Service Provider acts in two ways:

* Registers a singleton so that `Rtablada\VersionMaster\GitHashReader` can be injected.
* Registers a `@version()` helper in Blade to output the short version number.

To install this Service Provider just add `Rtablada\VersionMaster\GitHashReader::class` in your `providers` array in `config/app.php`.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email ryan.tablada@gmail.com instead of using the issue tracker.

## Credits

- [Ryan Tablada][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/rtablada/version-master.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephprtablada/version-master/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephprtablada/version-master.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephprtablada/version-master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rtablada/version-master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/rtablada/version-master
[link-travis]: https://travis-ci.org/thephprtablada/version-master
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephprtablada/version-master/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephprtablada/version-master
[link-downloads]: https://packagist.org/packages/rtablada/version-master
[link-author]: https://github.com/rtablada
[link-contributors]: ../../contributors
