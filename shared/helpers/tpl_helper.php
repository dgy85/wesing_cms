<?php

if (!function_exists('tpl')) {
    /**
     * 模版搜索调用方法
     * 根据传入的文件名称，从调用的文件上级开始逐层往下查找模版文件的位置
     * @author Ding
     * @param string $viewFile 加载的模版文件
     * @param string $tplfolder 放置模版的文件夹
     */
    function tpl($viewFile, $vars = array() , $tplfolder = 'template')
    {
        $fileInfo = pathinfo($viewFile);//文件分析
        $viewpath = realpath(VIEWPATH) . DS . $tplfolder.DS;//路径
        if (isset($fileInfo['extension'])) {
            $ext = '.' . $fileInfo['extension'];
        } else {
            $ext = '.php';
        }

        if (!is_dir($viewpath)) {
            show_error('模版目录不存在！', 200, '错误');
        }

        $viewFile = $viewpath . $viewFile . $ext;
        if (!file_exists($viewFile)) {
            show_error('模版不存在！', 404, '错误');
        }
        //加载模版文件
        $CI = &get_instance();
        $CI->load->view(substr($viewFile, strpos($viewFile, 'views') + 6),$vars);
    }
}

/**
 * 控制台页面左侧导航栏生成
 */
if(!function_exists('menuShow')){
    function menuShow($menu,$selectedItem='',$sub=false) {
        if(!is_array($menu)) return;
        if($sub){
            printf('<ul class="submenu">');
        }
        foreach($menu as $_menuItem){
            if(!$_menuItem['show']) continue;
            $hasChild = is_array($_menuItem['children'])&&$_menuItem['children'];
            $linktar = $_menuItem['target'] ? $_menuItem['target'] : 'home/error';
            printf('<li class="%s">',$selectedItem ==$_menuItem['text'] ? 'active' : '');
//            printf('<a href="%s" class="%s">',site_url($linktar),$hasChild?'dropdown-toggle':'');
            printf('<a _href="%s" class="%s" style="cursor: pointer">',$linktar,$hasChild?'dropdown-toggle':'ace_tabs');
            printf('<i class="%s"></i>',$_menuItem['icon']);
            printf('<span class="menu-text"> %s </span>',$_menuItem['text']);
            if($hasChild){
                printf('<b class="arrow icon-angle-down"></b>');
            }
            printf('</a>');
            if($hasChild){
                menuShow($_menuItem['children'],'',true);
            }
            printf('</li>');
        }
        if($sub){
            printf('</ul>');
        }
    };
}


if(!function_exists('tableHeadRender')){
    function tableHeadRender(array $headers,$trAttrs='',$tdAttrs=''){
        printf('<thead><tr %s>'.PHP_EOL,strip_tags($trAttrs));
        if($headers){
            foreach ($headers as $_key=>$hItem){
                printf('<th _key="%s" %s>%s</th>'.PHP_EOL,strip_tags($_key),strip_tags($tdAttrs),strip_tags($hItem));
            }
        }else{
            printf('<th>未指定表头字段</th>'.PHP_EOL);
        }
        printf('</tr></thead>'.PHP_EOL);
    }
}
if(!function_exists('tableBodyRender')){
    function tableBodyRender(array $body,$trAttrs='',$tdAttrs=''){
        $CI = &get_instance();
        $primaryKey = $CI->getPrimaryKey();
        printf('<tbody><tr %s>'.PHP_EOL,strip_tags($trAttrs));
        if($body){
            foreach ($body as $_key=>$hItem){
                printf('<td _key="%s" %s>%s</td>'.PHP_EOL,strip_tags($_key),strip_tags($tdAttrs),strip_tags($hItem));
            }
        }else{
            printf('<td colspan="%d" class="text-center">未获取到数据</td>'.PHP_EOL,$CI->getHeaderLength());
        }
        printf('</tr></tbody>'.PHP_EOL);
    }
}

function actLink($recid)
{
    return sprintf('<a class="editItem" _id="%s">编辑</a><span class="seprate">|</span><a class="deleteitem" _id="%s">删除</a>',$recid,$recid);
}

function trimTitle($title)
{
    return htmlentities(strip_tags($title));
}

function saveTpl($tplString,$filename)
{
    if(strlen(trim($tplString))==0) return;
    $DS = DIRECTORY_SEPARATOR;
    $viewpath = realpath(APPPATH) . $DS . "views" . $DS . 'tpl' . $DS . 'prods' .$DS;//路径
    file_put_contents($viewpath . $filename.'.php',$tplString);
}