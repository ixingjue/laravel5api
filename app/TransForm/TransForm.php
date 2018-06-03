<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2018/5/27
 * Time: 20:03
 */

namespace App\TransForm;


abstract class TransForm
{
    /**
     * @param $items
     * @return array
     */
    public function transFormCollection($items){
        return array_map([$this,'transForm'],$items);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transForm($item);
}