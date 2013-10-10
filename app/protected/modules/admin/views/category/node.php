<?php
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($this->module->assetsUrl . '/zTree/js/jquery.ztree.core-3.5.js');
$cs->registerScriptFile($this->module->assetsUrl . '/zTree/js/jquery.ztree.exedit-3.5.js');
$cs->registerCssFile($this->module->assetsUrl . '/zTree/css/zTreeStyle/zTreeStyle.css');
?>
<span id="expand">全部展开</span>
<ul id="category" class="ztree"></ul>


<script type="text/javascript">
    <!--
    var setting = {
        view: {
            addHoverDom: addHoverDom,
            removeHoverDom: removeHoverDom,
            selectedMulti: false
        },
        edit: {
            enable: true,
            editNameSelectAll: true,
            showRemoveBtn: showRemoveBtn,
            showRenameBtn: showRenameBtn
        },
        data: {
            simpleData: {
                enable: true
            }
        },
        callback: {
            beforeDrag: beforeDrag,
            beforeEditName: beforeEditName,
            beforeRemove: beforeRemove,
            beforeRename: beforeRename,
            onRemove: onRemove,
            onRename: onRename
        }
    };

    $(document).ready(function(){
        $.fn.zTree.init($("#category"), setting, <?php echo $list; ?>);
        $("#expand").toggle(function(){
            expandNode('expandAll');
            $(this).html('全部折叠');
        },function(){
            expandNode('collapseAll');
            $(this).html('全部展开');
        });
    });
    
    function expandNode(type) {
        var zTree = $.fn.zTree.getZTreeObj("category"),
        //type = e.data.type,
        nodes = zTree.getSelectedNodes();
        if (type.indexOf("All")<0 && nodes.length == 0) {
            alert("请先选择一个父节点");
        }

        if (type == "expandAll") {
            zTree.expandAll(true);
        } else if (type == "collapseAll") {
            zTree.expandAll(false);
        } else {
            var callbackFlag = $("#callbackTrigger").attr("checked");
            for (var i=0, l=nodes.length; i<l; i++) {
                zTree.setting.view.fontCss = {};
                if (type == "expand") {
                    zTree.expandNode(nodes[i], true, null, null, callbackFlag);
                } else if (type == "collapse") {
                    zTree.expandNode(nodes[i], false, null, null, callbackFlag);
                } else if (type == "toggle") {
                    zTree.expandNode(nodes[i], null, null, null, callbackFlag);
                } else if (type == "expandSon") {
                    zTree.expandNode(nodes[i], true, true, null, callbackFlag);
                } else if (type == "collapseSon") {
                    zTree.expandNode(nodes[i], false, true, null, callbackFlag);
                }
            }
        }
    }
    var log, className = "dark";
    function beforeDrag(treeId, treeNodes) {
        return false;
    }
    function beforeEditName(treeId, treeNode) {
        className = (className === "dark" ? "":"dark");
        showLog("[ "+getTime()+" beforeEditName ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
        var zTree = $.fn.zTree.getZTreeObj("category");
        zTree.selectNode(treeNode);
        return confirm("进入节点 -- " + treeNode.name + " 的编辑状态吗？");
    }
    function beforeRemove(treeId, treeNode) {
        className = (className === "dark" ? "":"dark");
        showLog("[ "+getTime()+" beforeRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
        var zTree = $.fn.zTree.getZTreeObj("category");
        zTree.selectNode(treeNode);
        return confirm("确认删除 节点 -- " + treeNode.name + " 吗？");
    }
    function onRemove(e, treeId, treeNode) {
        showLog("[ "+getTime()+" onRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
    }
    function beforeRename(treeId, treeNode, newName, isCancel) {
        className = (className === "dark" ? "":"dark");
        showLog((isCancel ? "<span style='color:red'>":"") + "[ "+getTime()+" beforeRename ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name + (isCancel ? "</span>":""));
        if (newName.length == 0) {
            alert("节点名称不能为空.");
            var zTree = $.fn.zTree.getZTreeObj("category");
            setTimeout(function(){zTree.editName(treeNode)}, 10);
            return false;
        }
        return true;
    }
    function onRename(e, treeId, treeNode, isCancel) {
        showLog((isCancel ? "<span style='color:red'>":"") + "[ "+getTime()+" onRename ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name + (isCancel ? "</span>":""));
    }
    function showRemoveBtn(treeId, treeNode) {
        return !treeNode.isFirstNode;
    }
    function showRenameBtn(treeId, treeNode) {
        return !treeNode.isLastNode;
    }
    function showLog(str) {
        if (!log) log = $("#log");
        log.append("<li class='"+className+"'>"+str+"</li>");
        if(log.children("li").length > 8) {
            log.get(0).removeChild(log.children("li")[0]);
        }
    }
    function getTime() {
        var now= new Date(),
        h=now.getHours(),
        m=now.getMinutes(),
        s=now.getSeconds(),
        ms=now.getMilliseconds();
        return (h+":"+m+":"+s+ " " +ms);
    }

    var newCount = 1;
    function addHoverDom(treeId, treeNode) {
        var sObj = $("#" + treeNode.tId + "_span");
        if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
        var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
            + "' title='add node' onfocus='this.blur();'></span>";
        sObj.after(addStr);
        var btn = $("#addBtn_"+treeNode.tId);
        if (btn) btn.bind("click", function(){
            var zTree = $.fn.zTree.getZTreeObj("category");
            zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
            return false;
        });
    };
    function removeHoverDom(treeId, treeNode) {
        $("#addBtn_"+treeNode.tId).unbind().remove();
    };
    function selectAll() {
        var zTree = $.fn.zTree.getZTreeObj("category");
        zTree.setting.edit.editNameSelectAll =  $("#selectAll").attr("checked");
    }
    
    //-->
</script>