## 1.Install
composer require --prefer-dist lulubin/yii2-component-devicedetect "dev-master"

## 2.configuration
```php
'bootstrap' => ['devicedetect'],
'components' => [
	'devicedetect' => [
		'class' => 'lulubin\devicedetect\DeviceDetect'
	],
]
```

## 3.Usage
```php
var_dump(Yii::$app->params['devicedetect']);
array (size=3)
  'isMobile' => boolean false
  'isTablet' => boolean false
  'isDesktop' => boolean true
```

```php
var_dump(Yii::$app->devicedetect->isMobile());
var_dump(Yii::$app->devicedetect->isTablet());
/*Check all available methods here: http://demo.mobiledetect.net/ */
```

```php
var_dump(Yii::getAlias('@device')); //return 'mobile', 'tablet' or 'desktop'
```
