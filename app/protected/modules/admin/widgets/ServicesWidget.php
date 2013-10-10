<?php

class ServicesWidget extends CWidget {

    public $htmlOptions = array();

    public function init() {
        !isset($this->htmlOptions['class']) && $this->htmlOptions['class'] = 'table table-hover table-bordered';
    }

    public function run() {
        $server = array(
            '网站URL'   => Yii::app()->request->hostInfo,
            '主机信息'    => Yii::app()->request->serverName . '[' . apache_getenv("server_addr") . ':' . Yii::app()->request->serverPort . ']',
            '系统目录'    => Yii::app()->basePath,
            '系统时间'    => date('Y-m-d H:i:s', time()),
            '用户系统'    => Yii::app()->request->userAgent, //用户浏览器信息
            //'网站名称'        => Yii::app()->name,
            '字符集'     => Yii::app()->charset,
            '系统语言'    => Yii::app()->sourceLanguage,
            'PHP环境'   => apache_get_version(),
            'MySql版本' => mysql_get_server_info(),
            //'系统支持'        => implode(',', apache_get_modules()),
            'Yii'     => Yii::powered() . '&nbsp;&nbsp;&nbsp;' . Yii::getVersion(),
        );

        $html = '<table class="' . $this->htmlOptions['class'] . '">';
        foreach ($server as $key => $value) {
            $html.='<tr>';
            $html.='<td>' . $key . '</td>';
            $html.='<td>' . $value . '</td>';
            $html.='</tr>';
        }
        $html.='</table>';
        echo $html;
    }

}

?>
