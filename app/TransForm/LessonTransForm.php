<?php
/**
 * Created by PhpStorm.
 * User: IT-XIA-PC
 * Date: 2018/5/27
 * Time: 20:08
 */

namespace App\TransForm;


class LessonTransForm extends TransForm
{
    /**
     * @param $lesson
     * @return array|mixed
     */
    public function transForm($lesson)
    {
        return [
            'title' => $lesson['title'],
            'content' => $lesson['body'],
            'is_free' => (boolean)$lesson['free'],
        ];
    }
}