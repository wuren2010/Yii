<?php

class Tool {

    public static function sendMail($message, $to, $subject) {
        
        Yii::app()->mailer->Host = 'smtp.qq.com';
        Yii::app()->mailer->IsSMTP();
        Yii::app()->mailer->SMTPAuth = true; //設定SMTP需要驗證
        Yii::app()->mailer->Username = '444511314@qq.com';
        Yii::app()->mailer->Password = 'honoer.com';
        Yii::app()->mailer->From = '444511314@qq.com';
        Yii::app()->mailer->FromName = 'Bily';
        //Yii::app()->mailer->AddReplyTo('55015221@qq.com');
        if (is_array($to)) {
            Yii::app()->mailer->AddAddress(explode(';', $to));
        } else {
            Yii::app()->mailer->AddAddress($to);
        }
        Yii::app()->mailer->Subject = $subject;
        Yii::app()->mailer->Body = $message;
        return Yii::app()->mailer->Send();
    }

    /**
     * KindEditor
     * @return type
     */
    public static function kindeditor($id) {
        return Yii::app()->controller->widget('ext.kindeditor.KindEditorWidget', array(
                    'id'    => $id, //Textarea id
                    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
                    'items' => array(
                        'width'            => '700px',
                        'height'           => '300px',
                        'themeType'        => 'simple',
                        'allowImageUpload' => true,
                        'allowFileManager' => true,
                        'items'            => array(
                            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
                            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
                            'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
                            'emoticons', 'image', 'link',),
                    ),
                ));
    }

    /**
     * 全局分页函数
     * @param object $dataProvider
     * @param string $itemView
     * @return type
     */
    public static function pages($dataProvider, $itemView) {
        return Yii::app()->controller->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider, //数据
                    'itemView'     => $itemView, //显示的模版
                    'id'           => Yii::app()->controller->id,
                    //'itemsTagName' => 'ul',
                    'ajaxVar'      => '', //默认为page或ajax 去掉后url更简洁
                    'htmlOptions'  => array('class'           => Yii::app()->controller->id),
                    'loadingCssClass' => 'loading', //默认为list-view-loading
                    //'template' => '{summary}{sorter}{items}{pager}',//显示的顺序
                    //'ajaxUpdate' => false, //是否ajax分页  false或分页显示的容器id
                    //'beforeAjaxUpdate' => 'before_ajax_update',   //回调函数 在common.js里完成
                    //'afterAjaxUpdate' => 'after_ajax_update',  
                    'emptyText'       => '<div class="alert alert-waning">暂无数据！</div>', //无数据时显示内容
                    'pagerCssClass'   => 'pagination', //分页的class
                    'pager'           => array(
                        'selectedPageCssClass' => 'active', //当前页的class
                        'hiddenPageCssClass'   => 'disabled', //禁用页的class
                        'header'               => '', //分页前显示的内容
                        'maxButtonCount'       => 10, //显示分页数量
                        'htmlOptions'          => array('class'          => ''),
                        'firstPageLabel' => '首页',
                        'nextPageLabel'  => '下一页',
                        'prevPageLabel'  => '上一页',
                        'lastPageLabel'  => '末页',
                    ),
                ));
    }

    /**
     * 循环创建目录
     * @param type $path
     * @param type $mode
     * @return boolean
     */
    public static function makedir($dir, $mode = 0777) {
        if (is_dir($dir) || @mkdir($dir, $mode))
            return true;
        if (!Tool::makedir(dirname($dir), $mode))
            return false;
        return @mkdir($dir, $mode);
    }

    /**
     * 文件上传
     * @param object $model  
     * @param string $upload_field
     * @param string $type
     * @return string|null
     */
    public static function uploadFile($model, $upload_field, $type = 'images') {
        $upload = CUploadedFile::getInstance($model, $upload_field);
        if (is_object($upload) && get_class($upload) === 'CUploadedFile') {
            //上传目录
            $upload_path = Yii::app()->params['upload_path'] . '/' . $type . '/' . date('Ymd', time());
            self::makedir(dirname(Yii::app()->basePath) . '/' . $upload_path);
            //文件名称
            $filename = time() . '_' . mt_rand(10000, 99999) . '.' . $upload->extensionName;
            $file_path = $upload_path . '/' . $filename; //保存在数据库中的路径
            if ($upload->saveAs(dirname(Yii::app()->basePath) . '/' . $file_path)) {
                return $file_path;
            } else {
                return null;
            }
        }
    }

    /**
     * 成功或失败时转跳
     * @param type $message
     * @param type $status
     * @param type $time
     * @param type $url
     */
    public static function tips($message = '成功', $status = 'success', $time = 3, $url = false) {
        $back_color = '#ff0000';
        if ($status == 'success') {
            $back_color = 'blue';
        }
        if (is_array($url)) {
            $route = isset($url[0]) ? $url[0] : '';
            $url = $this->createUrl($route, array_splice($url, 1));
        }
        if ($url) {
            $url = "window.location.href='{$url}'";
        } else {
            $url = "history.back();";
        }
        echo <<<HTMLEOF
                <div style="position:fixed;top:40%;left:20%">
                <div style="background:#C9F1FF; margin:0 auto; height:100px; width:600px; text-align:center;">
                                        <div style="margin-top:50px;">
                                        <h5 style="color:{$back_color};font-size:14px; padding-top:20px;" >{$message}</h5>
                                        页面正在跳转请等待<span id="sec" style="color:blue;">{$time}</span>秒
                                        </div>
                </div>
                </div>
                                        <script type="text/javascript">
                                        function run(){
                                                var s = document.getElementById("sec");
                                                if(s.innerHTML == 0){
                                                {$url}
                                                        return false;
                                                }
                                                s.innerHTML = s.innerHTML * 1 - 1;
                                        }
                                        window.setInterval("run();", 1000);
                                        </script>
HTMLEOF;
    }

}

?>
