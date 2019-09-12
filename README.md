# replacerFramework
Replacer Framework , Help you put your data into .html file

BEFORE
```html
Hello {NAME}, Welcome to {WEB_NAME}!!
```
AFTER
```html
Hello Steve, Welcome to Github!
```

Example (PHP)
```php
require 'helper.php';
$helper = new replacer();
$helper->render("yourfile.html",true,array("NAME"=>"Steve", "WEB_NAME"=>"Github"));
```

More example in index.php file! Let's go!!
