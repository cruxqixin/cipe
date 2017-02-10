<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Page;
class ArticleController extends BaseController{

	//列表显示
	public function index(){
		$art = M('infos');
		$list=M('infos')->order("id desc")->select();
		$this->assign("manu",$list);
		$this->display();
		
	}
	
	
	
	//修改
	public function edit(){
	   if($_GET['id']){
			$vo=M('Infos')->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
	   }
	   if($_POST){
		   $data=$_POST;
		   if($_POST['id']==''){
			  $data['addtime']=time();
			  M('Infos')->add($data);
		   }else{
			 M('Infos')->where("id=".$_POST['id'])->save($data);
		   }
		   $this->success('操作成功',U('Article/index'));
	   }
	   $this->display('edit');
	}
	
	//删除
	public function delete(){
		if (!isset($_POST['id'])){
			$this->error('请选择要删除的商品！');
		}
		$del_id = $_POST['id'];
		$_articleCollect = M('infos');
		
		foreach ($del_id as $id){
			$_articleCollect->where('id='.$id)->delete();
		}
		$this->success('删除成功！');
	}
	

	//排序
	public function order(){
		if ($_POST['order']){
			$_articleCollect = M('ArticleCollect');
			foreach ($_POST['orders'] as $id => $ord) {
				$data['ord'] = $ord;
				$_articleCollect->where('id='.$id)->save($data);
			}
			$this->success('修改成功！');
		}
	}
	
	
	//列表页链接
	public function _gainlinks($info){
		foreach ($info as $k => $v){
			$$k=$v;
		}
		$list_urls=array();
		if ($s_url=='auto' && isset($start_match_nums) && $end_match_nums && $inc_nums){
			for ($i=$start_match_nums;$i<=$end_match_nums;$i=$i+$inc_nums){
				$list_urls[]=preg_replace('/\(\*\)/', $i, $match_urls);
			}
		}
		if ($urls){
			$urls = str_replace("\r\n", "\n", $urls);
			$urls = trim(str_replace("\r", "\n", $urls));
			$list_urls=array_merge($list_urls,explode("\n", $urls));
		}
		$start_html=str_replace('/', '\\/', $start_html);
		$end_html=str_replace('/', '\\/', $end_html);
		$pattern='/'.$start_html.'(.*)'.$end_html.'/si';
		$article_urls=array();
		foreach ($list_urls as $url){
			$links=$this->_formatlinks($url,$pattern,$char_code);
			if ($links){
				$article_urls=array_merge($article_urls,$links);
			}
		}
		$article_urls=array_unique($article_urls);
		$must=explode(',', $include);
		$never=explode(',', $no_include);
		foreach ($article_urls as $k => $v){
			foreach ($must as $val){
				$val=trim($val);
				if ($val){
					if (false === strpos($v, $val)){
						unset($article_urls[$k]);
					}
				}
			}	
			foreach ($never as $val){
				$val=trim($val);
				if ($val){
					if (!false === strpos($v, $val)){
						unset($article_urls[$k]);
					}
				}
			}
		}
		$links['list_urls']=$list_urls;
		$links['article_urls']=$article_urls;
		return $links;
	}
	
	public function _formatlinks($url,$pattern,$char_code){
		$u=parse_url($url);
		$host=$u['scheme'].'://'.$u['host'].'/';
		$content=mb_convert_encoding(file_get_contents($url), 'UTF-8', $char_code);
		preg_match($pattern, $content, $result);
		if ($result){
			$re=$this->_striplinks($result[1]);
			foreach ($re as $k => $v){
				if (false === strpos($v, 'http')){
					$re[$k]=$host.$v;
				}
			}
			return $re;
		}
	}
	
}