# read-file
Read a file.

```php
use Jstewmc\ReadFile\Read;

file_put_contents('/path/to/foo.txt', 'foo');

(new Read())('/path/to/foo.txt');  // returns 'foo'
```

This library is a very simple _read_ file service (see [jstewmc/write-file]() for a simple _write_ file service).

This library wraps PHP's native [`file_get_contents()`](http://php.net/manual/en/function.file-get-contents.php) with a little robust error checking. If the file does not exist, the path is not actually a file, or the file is not readable, an `InvalidArgumentException` will be thrown.

That's it!

## Author

[Jack Clayton](mailto:clayjs0@gmail.com)

## License

[MIT](https://github.com/jstewmc/read-file/blob/master/LICENSE)

## Version

### 0.1.0, August 31, 2016

* Initial release
