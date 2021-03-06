<?php
namespace lulubin\devicedetect;

use Yii;
use Detection\MobileDetect;

class DeviceDetect extends \yii\base\Component
{
	private $_mobileDetect;
	public $setParams = true;
	public $setAlias = true;

	public function __call($name, $parameters)
	{
		return call_user_func_array(array($this->_mobileDetect, $name),$parameters);
	}

	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	public function init()
	{
		$this->_mobileDetect = new MobileDetect();
		parent::init();
		if ($this->setParams){
			Yii::$app->params['devicedetect'] = [
				'isMobile' => $this->_mobileDetect->isMobile(),
				'isTablet' => $this->_mobileDetect->isTablet()
			];
			Yii::$app->params['devicedetect']['isDesktop'] =
				!Yii::$app->params['devicedetect']['isMobile'] &&
				!Yii::$app->params['devicedetect']['isTablet'];
		}
		if ($this->setAlias){
			if ($this->_mobileDetect->isMobile()) {
                Yii::setAlias('@device', 'mobile');
			} else if ($this->_mobileDetect->isTablet()) {
			    Yii::setAlias('@device', 'tablet');
			} else {
                Yii::setAlias('@device', 'desktop');
			}
		}
	}
}