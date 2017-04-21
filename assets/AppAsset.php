<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
		'datatables/jquery.dataTables.min.js',
        'datatables/dataTables.bootstrap.min.js',
        'daterangepicker/moment.min.js',
        'daterangepicker/daterangepicker.js',
		'datepicker/bootstrap-datepicker.js',
		'colorpicker/bootstrap-colorpicker.min.js',
		'timepicker/bootstrap-timepicker.min.js',
        // more plugin Js here
    ];
    public $css = [
//'datatables/jquery.dataTables.css',
        'datatables/dataTables.bootstrap.css',
        'datepicker/datepicker3.css',
		'timepicker/bootstrap-timepicker.min.css',
		'daterangepicker/daterangepicker.css',
		'colorpicker/bootstrap-colorpicker.min.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
