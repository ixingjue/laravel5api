<?php

namespace App\Http\Controllers;

use App\TransForm\LessonTransForm;
use Illuminate\Http\Request;
use App\Lesson;

class LessonsController extends Controller
{
    protected $lessonTransformer;

    /**
     * LessonsController constructor.
     * @param LessonTransForm $lessonTransformer
     */
    public function __construct(LessonTransForm $lessonTransformer)
    {
        $this->lessonTransformer=$lessonTransformer;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        //all
        //没有提示信息
        //直接展示我们的数据结构
        //没有错误信息
//        return Lesson::all();//bad
        $lessons=Lesson::all();

        return \Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->lessonTransformer->transFormCollection($lessons->toArray())
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
//        $lessons = Lesson::findOrFail($id);
        $lessons = Lesson::find($id);//404
        if(!$lessons){
            return \Response::json([
                'status'=>'failed',
                'status_code'=>404,
                'message'=>'lesson not found'
            ]);
        }
        return \Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->lessonTransformer->transForm($lessons)
        ]);

    }


}
