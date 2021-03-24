<?php

namespace App\Validations;

class Validation
{
    /**
     * Function validate course level source
     *
     * @param $request
     */
    public static function validateCourseLevelSource($request)
    {
        $request->validate([
            'source' => 'required',
            'drought' => 'required',
            'chinese' => 'required',
            'meaning' => 'required',
        ], [
            'source.required' => config('langVN.validation.course_level_source.source_required'),
            'drought.required' => config('langVN.validation.course_level_source.drought_required'),
            'chinese.required' => config('langVN.validation.course_level_source.chinese_required'),
            'meaning.required' => config('langVN.validation.course_level_source.meaning_required'),
        ]);
    }

    /**
     * Function validate course level quiz
     *
     * @param $request
     */
    public static function validateCourseLevelQuiz($request)
    {
        $request->validate([
            'quiz' => 'required|min:3',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'correct_answer' => 'required',
        ], [
            'quiz.required' => config('langVN.validation.course_level_quiz.quiz_required'),
            'quiz.min' => config('langVN.validation.course_level_quiz.quiz_min'),
            'answer1.required' => config('langVN.validation.course_level_quiz.answer1_required'),
            'answer2.required' => config('langVN.validation.course_level_quiz.answer2_required'),
            'answer3.required' => config('langVN.validation.course_level_quiz.answer3_required'),
            'answer4.required' => config('langVN.validation.course_level_quiz.answer4_required'),
            'correct_answer.required' => config('langVN.validation.course_level_quiz.correct_answer_required'),
        ]);
    }

    /**
     * Validation form page web
     *
     * @param $request
     */
    public static function validatePageWeb($request)
    {
        $request->validate([
            'content' => 'required',
        ], [
            'content' => config('langVN.validation.page.content.required'),
        ]);
    }

    /**
     * Validation form page web
     *
     * @param $request
     */
    public static function validateCourseOnline($request)
    {
        $request->validate([
            'description' => 'required',
        ], [
            'description' => config('langVN.validation.page.content.required'),
        ]);
    }

    /**
     * Validation form page web
     *
     * @param $request
     */
    public static function validateCourseLevel($request)
    {
        $request->validate([
            'description' => 'required',
        ], [
            'description' => config('langVN.validation.page.content.required'),
        ]);
    }

    /**
     * Validation form page web
     *
     * @param $request
     */
    public static function validateCourseThematic($request)
    {
        $request->validate([
            'description' => 'required',
        ], [
            'description' => config('langVN.validation.page.content.required'),
        ]);
    }

    /**
     * Validation form page web
     *
     * @param $request
     */
    public static function validateCourseFree($request)
    {
        $request->validate([
            'description' => 'required',
        ], [
            'description' => config('langVN.validation.page.content.required'),
        ]);
    }
}
