<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/3
 * Time: 17:25
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class ListNode
{
    public $val  = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $dummy = new ListNode( 0 );
        $ptr   = $dummy;
        while ($l1 != null || $l2 != null) {
            if ($l1 == null) {
                $ptr->next = $l2;
                break;
            } elseif ($l2 == null) {
                $ptr->next = $l1;
                break;
            } else {
                if ($l1->val <= $l2->val) {
                    $ptr->next = new ListNode( $l1->val );
                    $l1        = $l1->next;
                    $ptr       = $ptr->next;
                } else {
                    $ptr->next = new ListNode( $l2->val );
                    $l2        = $l2->next;
                    $ptr       = $ptr->next;
                }
            }
        }
        return $dummy->next;
    }

    /**
     * 遍历两个链表 进行排序
     *
     * @param $l1
     * @param $l2
     *
     * @return null
     */
    function one($l1, $l2){
        $temp = [];
        while ($l1){
            $temp[]=$l1->val;
            $l1 = $l1->next;
        }
        while ($l2){
            $temp[] = $l2->val;
            $l2 = $l2->next;
        }
        sort($temp);
        $list = new ListNode(-1);
        $p =$list;
        foreach ($temp as $value){
            $size = new ListNode($value);
            $p->next =$size;
            $p=$p->next;
        }
        return $list->next;
    }
}


$a       = new ListNode( 1 );
$b       = new ListNode( 2 );
$c       = new ListNode( 4 );
$b->next = $c;
$a->next = $b;
var_dump( $a );
$aa       = new ListNode( 1 );
$b        = new ListNode( 3 );
$c        = new ListNode( 4 );
$b->next  = $c;
$aa->next = $b;
var_dump( $aa );
$solution = new Solution();
$list     = $solution->one( $a, $aa );
print_r( $list );


