<?php
header ('Content-Type: text/html;charset="UTF-8"');
if(empty($_GET)){
    echo "<form action='' method='get'>
         请输入关键词:<input type='text' name='con'><input type='submit'></form> ";
}else{
    require('sphinxapi.php');
    $s = new SphinxClient;
    $s->setServer("127.0.0.1", 9312);

    $name=$_GET['con'];

    $s->setMaxQueryTime(30);
    
    // $res1 = $s->query($name,'*');  //全表检索
    
    //设置搜索模式
    // $s->SetMatchMode(SPH_MATCH_EXTENDED); //将查询看作一个Sphinx内部查询语言的表达式
    // $s->SetMatchMode(SPH_MATCH_EXTENDED2); //类似 SPH_MATCH_EXTENDED ，并支持评分和权重.
    $s->SetMatchMode(SPH_MATCH_ALL); //匹配所有查询词（默认模式）
    // $s->SetMatchMode(SPH_MATCH_ANY); // 匹配查询词中的任意一个.
    if (trim($name) != '') {
            //设置搜索字段(只搜索某个字段)
            $res1 = $s->Query('@power' . $name, '*');
    } else {
            $res1 = $s->Query("$name", '*');
    }
    
    $err = $s->GetLastError();
   //var_dump(array_keys($res['matches']));
   // echo "<br>"."通过获取的ID来读取数据库中的值即可。"."<br>";
    
    echo '<pre>';
    
    $products=!empty($res1['matches'])?$res1['matches']:"";


    print_r($products);
    
    if(!empty($err)){
        print_r($err);
    }

    $s->close();
}
