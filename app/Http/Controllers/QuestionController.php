<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Image;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Question::where('user_id', Auth::user()->id)->get();
        return view('question.index', compact('items'));
    }

    public function myquestion()
    {
        $items = Question::with('category','user')->where('user_id', Auth::user()->id)->get();
        return view('question.myquestion', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category','id')->toArray();
        return view('question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        
        if($request->hasFile('images')){
            $file = $request->file('images');
            $nama_file = time() . "_" . $file->getClientOriginalName();
    
            $destinationPath = public_path('/berkas');
            $img = Image::make($file->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nama_file);
            $data['image'] = $nama_file;
        }
       
        $data = $request->all();
        $data['user_id'] =  Auth::user()->id;
        Question::create($data);

        return redirect()->route('homepage');
    }

    public function answer(AnswerRequest $request,$id)
    {
        if($request->hasFile('images')){
            $file = $request->file('images');
            $nama_file = time() . "_" . $file->getClientOriginalName();
    
            $destinationPath = public_path('/jawaban');
            $img = Image::make($file->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nama_file);
            $data['image'] = $nama_file;
        }
       
        $data['answer'] =  $request->answer;
        $data['question_id'] =  $id;
        $data['user_id'] =  Auth::user()->id;
        Answer::create($data);

        return redirect()->route('question.show',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Question::where('id', $id)->first();
        $answers = Answer::where('question_id', $id)->get();
        return view('question.show', compact('items','answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $categories = Category::pluck('category','id')->toArray();
        return view('question.edit',['question' => $question,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        dd($question);
        $item = Question::findOrFail($question);
        $item->delete();

        Answer::where('question_id',$question->id)->delete();
        return redirect()->route('homepage');
    }
}
