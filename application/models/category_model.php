<?php
/**
 * Created by wumengshi on 2015/3/3
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    const TBL_CATE = 'cz_category';

    public function list_cate($pid = 0) {
        //获取所有的记录
        $query = $this->db->get(self::TBL_CATE);
        $cates = $query->result_array();
        //对类别进行重组 , 并返回
        return $this->_tree($cates, $pid);
    }

    /**
     * @access private
     * @param $arr array 要遍历的数组
     * @param int $pid 节点的pid , 默认为 0 , 表示从顶级节点开始
     * @param int $level 表示层级 , 默认为 0
     * @param array $tree 排好序之后的所有后代节点
     */
    private function _tree($arr, $pid = 0, $level = 0) {

        //用于保存重组的结果 , 使用静态变量
        static $tree = array();

        foreach ($arr as $v) {
            if ($v['parent_id'] == $pid) {
                //说明找到了以$pid为父节点的子节点 , 将其保存
                $v['level'] = $level;
                $tree[] = $v;
                //然后以该节点为父节点 , 继续找其后代节点
                $this->_tree($arr, $v['cat_id'], $level + 1);
            }
        }
        return $tree;
    }
}