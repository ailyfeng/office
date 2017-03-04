<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

/**
 * 基本控制器  CMS中模块都要继承它
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @version V.d.0.1
 */
class CMSController extends Controller
{
    
    /**
     * 过滤sql（where\order）、pagerh参数
     *
     * @param Array     $input          表单提交的参数
     
             $whereField    = [
                            'sort'          =>['field'=>'sort',           'value'=>false, 'name'=>'产品分类'    ,'sortUrl'=>false],
                            'chineseBrand'  =>['field'=>'chineseBrand' ,  'value'=>false, 'name'=>'中文品牌'    ,'sortUrl'=>false],
                            'englishBrand'  =>['field'=>'englishBrand' ,  'value'=>false, 'name'=>'英文品牌'    ,'sortUrl'=>false],
                            'number'        =>['field'=>'number',         'value'=>false, 'name'=>'货号'       ,'sortUrl'=>false],
                            'brandName'     =>['field'=>'brandName',      'value'=>false, 'name'=>'品名'       ,'sortUrl'=>false],
                            'standard'      =>['field'=>'standard',       'value'=>false, 'name'=>'规格'       ,'sortUrl'=>false],
                            'color'         =>['field'=>'color',          'value'=>false, 'name'=>'颜色'       ,'sortUrl'=>false]
                        ];
     * @param Array     $whereField         需要显示的字段
     * @param Array     $masterTable        主表名称
     * @param Array     $slaveTable         从表名称
     * @param Array     $input              表单提交的参数
     * @param Array    $slaveTableField     表单提交的参数从表字段
     * @access protected
     * @static function
     *
     * @return array | boolean
     */
    protected static function filterWhere(
                                            $input, 
                                            $whereField, 
                                            $masterTable, 
                                            $slaveTable=null, 
                                            $slaveTableField=array(),
                                            $orderFiled,
                                            $currRouter
                                        )
    {


        //传给分页适用的参数
        $pageParam = array();

        $where = array();

        $orderbyTemp = array();

        $fieldUrl = false;

        $orderbyCurr = array();

        //当前地址参数
        $url = false;

        //父子窗口使用的参数
        $sonId = isset($input['sonId'])?$input['sonId']:false;

        $selectSupplier = isset($input['selectSupplier'])?$input['selectSupplier']:false;

        $sonName = isset($input['sonName'])?$input['sonName']:false;

        if(($sonId  && $sonName ) || $selectSupplier){

            $pageParam = array('selectSupplier'=>$selectSupplier,'sonId'=>$sonId,'sonName'=>$sonName);

            $url = "?sonId=$sonId&selectSupplier=$selectSupplier&sonName=$sonName";//当前地址参数

        }



        foreach ($input as $key => $value) {

            //筛选
            if(isset($whereField[$key])){

                $value = isset($value)?trim($value):false;

                if(!empty($value) &&  isset($whereField[$key])){
                    
                    $pageParam[$key] = $value; 
                    
                    $url = empty($url)?'?':$url.'&';

                    $url.= $key.'='.$value;

                    $fieldUrl = empty($fieldUrl)?'?':$fieldUrl.'&';
                    $fieldUrl .= $key.'='.$value;  

                    $whereField[$key]['value']=$value;
                    switch ($value) {
                        case is_numeric($value):
                            $regexp = '=';
                            break;
                        default:
                            $regexp = 'regexp';
                            break;
                    }

                    if (in_array($key, $slaveTableField)) {

                        $where[] =[$slaveTable . '.' . $key, $regexp, $value];

                    }else{

                        $where[] =[$masterTable.'.'.$key , $regexp, $value];

                    }

                }
            }

            //排序
            $keySort = substr($key,0,-4);

            if(isset($whereField[$keySort])){
                $pageParam[$key]=$value;
                
                $url = empty($url)?'?':$url.'&';

                $url.= $key.'='.$value;

                $orderbyTemp[$keySort]=$value;

            }

        }

        foreach ($orderbyTemp as $key => $value) {
                    $orderbyCurr[$key]= [
                            'name'=>$whereField[$key]['name'],
                            'sortOne'=>$value
                    ];
        }

        $orderby = array();
        foreach ($orderbyTemp as $key => $value) {

            if(in_array($key, $slaveTableField)){

                $orderby[] = [
                                'field'=>$slaveTable . '.' .$key,
                                'sort'=>$value?'asc':'desc'
                            ];

            }else{

                $orderby[] = [
                                'field'=>$masterTable.'.'.$key,
                                'sort'=>$value?'asc':'desc'
                            ];

            }
        }

        $tmpI = count($orderby);

        for ($i=$tmpI; $i < 8; $i++) { 
            $orderby[$i] = [
                            'field'=>$orderFiled,
                            'sort'=>'asc'
                            ]; 
        }

        //组装当前排序
        foreach ($orderbyCurr as $keyOne=>&$list) {

                $newOrt= $list['sortOne']?0:1;
                $sortUrl = $fieldUrl;
                $sortX = $fieldUrl;
                
                //当前排序
                foreach ($orderbyTemp as $keyTwo => $value) {

                    $keyTwoSort = $keyTwo.'Sort';

                    if($keyOne==$keyTwo){

                        $sortUrl .= $sortUrl?'&'.$keyTwoSort.'='.$newOrt:'?'.$keyTwoSort.'='.$newOrt;

                    }else{
                        $sortUrl .= $sortUrl?'&'.$keyTwoSort.'='.$value:'?'.$keyTwoSort.'='.$value;

                        $sortX .= $sortX?'&'.$keyTwoSort.'='.$value:'?'.$keyTwoSort.'='.$value;

                    }
                }

                //当前排序为空
                if(!$sortX){
                    if($fieldUrl){
                        $sortX = $fieldUrl;
                    }else{
                        $sortX = url($currRouter);
                    }
                }

                $list['value'] = $newOrt;
                $list['sortOne'] = $sortUrl;
                $list['sortX'] = $sortX;
        }


        //选择要排序的字段
        foreach ($whereField as $key=>&$list) {

                if(!$url){
                    $u = '?';
                }else{
                    $u = '&';
                }
            if(isset($orderbyCurr[$key])){
                $tmp = $url;
            }else{
                $tmp = $url .$u.$list['field'].'Sort'.'=1';
            }

            $list['sortUrl'] = $tmp ;

        }

        $data = array(
                        'where'         => $where,
                        'orderby'       => $orderby,
                        'orderbyCurr'   => $orderbyCurr,
                        'whereField'    => $whereField,
                        'sonId'         => $sonId,
                        'sonName'       => $sonName,
                        'selectSupplier'=> $selectSupplier,
                        'pageParam'     => $pageParam
                    );

        return $data ;
    }


    /**
     * 过滤sql（where\order）、pagerh参数
     *
     * @param Array     $input          表单提交的参数
     
             $whereField    = [
                            'sort'          =>['field'=>'sort',           'value'=>false, 'name'=>'产品分类'    ,'sortUrl'=>false],
                            'chineseBrand'  =>['field'=>'chineseBrand' ,  'value'=>false, 'name'=>'中文品牌'    ,'sortUrl'=>false],
                            'englishBrand'  =>['field'=>'englishBrand' ,  'value'=>false, 'name'=>'英文品牌'    ,'sortUrl'=>false],
                            'number'        =>['field'=>'number',         'value'=>false, 'name'=>'货号'       ,'sortUrl'=>false],
                            'brandName'     =>['field'=>'brandName',      'value'=>false, 'name'=>'品名'       ,'sortUrl'=>false],
                            'standard'      =>['field'=>'standard',       'value'=>false, 'name'=>'规格'       ,'sortUrl'=>false],
                            'color'         =>['field'=>'color',          'value'=>false, 'name'=>'颜色'       ,'sortUrl'=>false]
                        ];
     * @param Array     $whereField         需要显示的字段
     * @param Array     $masterTable        主表名称
     * @param Array     $slaveTable         从表名称
     * @param Array     $input              表单提交的参数
     * @param Array    $slaveTableField     表单提交的参数从表字段
     * @access protected
     * @static function
     *
     * @return array | boolean
     */
    protected static function filterWhereExt(
                                            $input, 
                                            $whereField, 
                                            $defaultOrderFiled,
                                            $currRouter
                                        ){

        //传给分页适用的参数
        $pageParam = array();

        $select = array();

        $where = array();

        $orderbyTemp = array();

        $fieldUrl = false;

        $orderbyCurr = array();

        $orderby = array();

        //当前地址参数
        $url = false;



        //父子窗口使用的参数
        $sonId = isset($input['sonId'])?$input['sonId']:false;

        $selectSupplier = isset($input['selectSupplier'])?$input['selectSupplier']:false;

        $sonName = isset($input['sonName'])?$input['sonName']:false;

        if(($sonId  && $sonName ) || $selectSupplier){

            $pageParam = array('selectSupplier'=>$selectSupplier,'sonId'=>$sonId,'sonName'=>$sonName);

            $url = "?sonId=$sonId&selectSupplier=$selectSupplier&sonName=$sonName";//当前地址参数

        }

        //需要查询的字段
        foreach ($whereField as $table=>$fieldArr) {
            foreach ($fieldArr as $field => $fieldValue) {
                $select[] = $table.'.'.$field.' as '.$table.'_'.$field;

                if(!empty($fieldValue)){
                    $whereField[$table][$field]['sortUrl']= '?'.$table.'['.$field.'Sort]=1';   
                }
            }
        }
        // dd($whereField);

        if(empty($input)){

            $data = array(
                        'select'        => $select,
                        'where'         => $where,
                        'orderby'       => $orderby,
                        'orderbyCurr'   => $orderbyCurr,
                        'whereField'    => $whereField,
                        'sonId'         => $sonId,
                        'sonName'       => $sonName,
                        'selectSupplier'=> $selectSupplier,
                        'pageParam'     => $pageParam
                    );
            return $data;
        }


        foreach ($input as $inputTable => $inputValue) {

            if(!is_array($inputValue)) continue 1;

             //筛选
            foreach ($inputValue as $key => $value) {

                foreach ($whereField as $table=>$fieldArr) {

                    if($inputTable!=$table) continue 1;

                    if(isset($fieldArr[$key])){

                        $value = isset($value)?trim($value):false;


                        if(!empty($value) &&  is_array($fieldArr[$key])){
              

                            $pageParam[$key] = $value; 
                            
                            $url = empty($url)?'?':$url.'&';

                            $url.= $table.'['.$key.']='.$value;

                            $fieldUrl = empty($fieldUrl)?'?':$fieldUrl.'&';
                            $fieldUrl .= $table.'['.$key.']='.$value;

                            $fieldArr[$key]['value']=$value;
                            
                            $whereField[$table][$key]['value'] = $value;

                            switch ($value) {
                                case is_numeric($value):
                                    $regexp = '='; 
                                    break 1;
                                default:
                                    $regexp = 'regexp';
                                    break 1;
                            }

                            $where[] =[$table . '.' . $key, $regexp, $value];

                        }
                    }
   
                    //排序
                    $keySort = substr($key,0,-4);

                    if(!empty($fieldArr[$keySort])){
                        $pageParam[$key]=$value;

                        $url = empty($url)?'?':$url.'&';

                        $url.= $table.'['.$key.']='.$value;

                        $orderbyTemp[$table.'['.$key.']']=$value;

                        $orderby[] = [
                                        'field'=>$table.'.'.$keySort,
                                        'sort'=>$value?'asc':'desc'
                                    ];

                        $orderbyCurr[$table.'['.$key.']'] =[

                                    'name'=>$fieldArr[$keySort]['name'],
                                    'sortOne'=>$value
                                ];

                    }

                }

            }

        }

        $tmpI = count($orderby);

        for ($i=$tmpI; $i < 8; $i++) { 
            $orderby[$i] = [
                            'field'=>$defaultOrderFiled,
                            'sort'=>'asc'
                            ]; 
        }
        // dd($orderbyCurr);
        //组装当前排序
        foreach ($orderbyCurr as $keyOne=>&$list) {

                $newOrt= $list['sortOne']?0:1;
                $sortUrl = $fieldUrl;
                $sortX = $fieldUrl;
                
                //当前排序
                foreach ($orderbyTemp as $keyTwo => $value) {

                    $keyTwoSort = $keyTwo.'Sort';

                    if($keyOne==$keyTwo){

                        $sortUrl .= $sortUrl?'&'.$keyTwoSort.'='.$newOrt:'?'.$keyTwoSort.'='.$newOrt;

                    }else{
                        $sortUrl .= $sortUrl?'&'.$keyTwoSort.'='.$value:'?'.$keyTwoSort.'='.$value;

                        $sortX .= $sortX?'&'.$keyTwoSort.'='.$value:'?'.$keyTwoSort.'='.$value;

                    }
                }

                //当前排序为空
                if(!$sortX){
                    if($fieldUrl){
                        $sortX = $fieldUrl;
                    }else{
                        $sortX = url($currRouter);
                    }
                }

                $list['value'] = $newOrt;
                $list['sortOne'] = $sortUrl;
                $list['sortX'] = $sortX;
        }

        //选择要排序的字段
        foreach ($whereField as $table=>&$fieldArr) {

            foreach ($fieldArr as $field => $fieldValue) {
                
                if(empty($fieldValue)) continue 1;

                    if(!$url){
                        $u = '?';
                    }else{
                        $u = '&';
                    }
                if(isset($orderbyCurr[$table.'['.$field.'Sort]'])){
                    $tmp = $url;
                }else{
                    $tmp = $url .$u.$table.'['.$field.'Sort]'.'=1';
                }
                
                $fieldArr[$field]['sortUrl'] = $tmp ;    
                
            }

        }

        $data = array(
                        'select'        => $select,
                        'where'         => $where,
                        'orderby'       => $orderby,
                        'orderbyCurr'   => $orderbyCurr,
                        'whereField'    => $whereField,
                        'sonId'         => $sonId,
                        'sonName'       => $sonName,
                        'selectSupplier'=> $selectSupplier,
                        'pageParam'     => $pageParam
                    );

        return $data ;
    }
}
