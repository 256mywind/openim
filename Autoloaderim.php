<?php
class Autoloaderim{
  /**
     * 类库自动加载，写死路径，确保不加载其他文件。
     * @param string $class 对象类名
     * @return void
     */
    public static function autoload($class) {
        $name = $class;
        if(false !== strpos($name,'\\')){
          $name = strstr($class, '\\', true);
        }
        
        $filename = TOP_AUTOLOADER_PATH_IM."/top/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH_IM."/top/request/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }
        $filename = TOP_AUTOLOADER_PATH_IM."/top/domain/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH_IM."/aliyun/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH_IM."/aliyun/request/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH_IM."/aliyun/domain/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }         
    }
}
//spl_autoload_register('Autoloader::autoload');
?>