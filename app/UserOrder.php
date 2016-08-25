<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/8/21
 * Time: 下午8:57
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $table = 'user_order';

    public static rules = array(
        'divers'=>'required|alpha_num|min:1',
        'start_date'=>'required|alpha|between:10,10',
        'end_date'=>'required|alpha|between:10,10',
        'pid'=>'required|alpha|between:1,10',
        'type'=>'required|alpha|between:1,10',
    );

    /**
     * 创建新订单
     */
    public function new_order($params)
    {
        $user_order = new UserOrder;
        $user_order->uid = $params['uid'];
        $user_order->pid = $params['pid'];
//        $user_order->shop_id = $params['shop_id'];
        $user_order->type = $params['type'];
        $user_order->start_date = $params['start_date'];
        $user_order->end_date = $params['end_date'];
        $user_order->divers = $params['divers'];
        $user_order->money = $params['divers'] * $params['type'];
        $user_order->is_paid = 0;
        $user_order->need_pay = $user_order->money;
        $user_order->save();
    }

    public function calculate_money()
    {
        return;
    }

    /**
     * 支付
     */
    public function pay_order()
    {
        return;
    }

    /**
     * 行程单
     */
    public function journey_doc()
    {
        return
    }
}