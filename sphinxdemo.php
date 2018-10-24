<?php

require('sphinxapi.php'); // 这个文件在sphinx的api目录里

// $sc = new SphinxClient(); // 生成客户端

// $sc->setServer('127.0.0.1',9312); // 设置服务器
//  //SPH_MATCH_ALL, 匹配所有查询词(默认模式); SPH_MATCH_ANY, 匹配查询词中的任意一个; SPH_MATCH_EXTENDED2, 支持特殊运算符查询    
// // $sc->setMatchMode(SPH_MATCH_ALL);    
// $sc->setMaxQueryTime(30);                             //设置最大搜索时间    
// $sc->SetArrayResult(false);                           //是否将Matches的key用ID代替    
// $sc->SetSelect ( "*" );                               //设置返回信息的内容,等同于SQL    
// $sc->SetRankingMode(SPH_RANK_BM25);                   //设置评分模式，SPH_RANK_BM25可能使包含多个词的查询的结果质量下降。     
// //$sc->SetSortMode(SPH_SORT_EXTENDED);                //发现增加此参数会使结果不准确    
// //$sc->SetSortMode(SPH_SORT_EXTENDED,"from_id asc,id desc");  //设置匹配项的排序模式, SPH_SORT_EXTENDED按一种类似SQL的方式将列组合起来，升序或降序排列。    
// $weights = array ('company_name' => 20);    
// $sc->SetFieldWeights($weights);                        //设置字段权重    
// $sc->SetLimits ( 0, 30, 1000, 0 );      //设置结果集偏移量  SetLimits (便宜量,匹配项数目,查询的结果集数默认1000,阀值达到后停止)    
// //$sc->SetFilter ( $attribute, $values, $exclude=false );     //设置属性过滤    
// //$sc->SetGroupBy ( $attribute, $func, $groupsort="@group desc" );    //设置分组的属性    
// $res = $sc->query("test",'*'); #[宝马]关键字，[news]数据源source  
$cl = new SphinxClient();    
$cl->setServer('127.0.0.1',9312);    
// $cl->SetMatchMode(SPH_MATCH_ALL);
$cl->SetArrayResult(true);    
$res = $cl->Query("第99999","*");  
echo '<pre>';  
print_r($res);  