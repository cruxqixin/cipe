<?php
namespace Home\Model;
use Think\Model;
    class ArticleModel extends Model{
 
	protected  $fields = array( 
             
      'ID',
'CATE_ID',
'TITLE',
'IMG',
'URL',
'ABST',
'INFO',
'ADD_TIME',
'ORD',
'IS_BEST',
'STATUS',
'SEO_TITLE',
'SEO_KEYS',
'SEO_DESC',
'IS_DEL',
'REMARK1',
'REMARK2',
'PICS',
'_pk' => 'ID', '_autoinc' => true   
        ); 
}
	 