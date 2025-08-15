# Laravel Temporary Download Links

Generate secure, temporary download links with expiry and max download limits.

## Installation
```bash
composer require nicxon/temp-download-links
```

## Publish Migration & Config
```bash
php artisan vendor:publish --provider="Nicxon\\TempDownload\\TempDownloadServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="Nicxon\\TempDownload\\TempDownloadServiceProvider" --tag="config"
php artisan migrate
```

## Usage
```php
use Nicxon\TempDownload\TempDownloadLinkService;

$service = app(TempDownloadLinkService::class);

$link = $service->make(
    '/path/to/your/file.zip', // path to a file in your public folder
    120,  // expires in 2 hours
    5     // allow max 5 downloads
);

echo $link;
```

## License
[MIT](LICENSE) © 2025 Robert Nicjoo, [PT. Nicxon International Solutions](https://nicxonsolutions.com)
