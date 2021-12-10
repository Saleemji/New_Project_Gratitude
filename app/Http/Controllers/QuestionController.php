<?php

namespace App\Http\Controllers;


use App\Question;
use App\AnswerLinking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
     public function allQuestion()
    {
        $output = array('data' => array());
        $question = DB::table('question')
            ->join('categories', 'categories.id', '=', 'question.category_id')
            ->join('answer_linking', 'answer_linking.question_id', '=', 'question.id')
            ->select('question.*',
                'categories.name as category_name',
                'answer_linking.answer as answer')
            ->orderBy('question.id', 'DESC')
            ->get();

        $x = 1;
        foreach ($question as $row)
        {
            $actionButton = '
 <td>

      <div class="btn-group mt-4 mt-md-0" role="group" aria-label="Basic example">

        <a title="Remove Employee" href="#" data-bs-toggle="modal" data-bs-target="#modalConfirmDelete" onclick="removeItemDeleted('.$row->id.')" >
        <button type="button" class="btn btn-primary"><i class="bx bx-trash"></i></button>
        </a>

    </div>

</td>


            ';

            

            $output['data'][] = array(
                $row->category_name,
                $row->question_name,
                $row->option_one,
                $row->option_two,
                $row->option_three,
                $row->option_four,
                $row->answer,
                $actionButton
            );
            $x++;
        }

        $data= response()->json($output);
        return $data;
    }




    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'category_id' => 'required',
            'question_name' => 'required',
            'option_one' => 'required',
            'option_two' => 'required',
            'option_three' => 'required',
            'option_four' => 'required',
            'correct' => 'required',
            
        ]);

        if ($validators->fails()){
            $validator['success'] = false;
            $validator['messages'] = $validators->errors()->all();
            return json_encode($validator);
        }

        $question = new Question($request->input());
        $question->category_id = $request['category_id'];
        $question->question_name = $request['question_name'];
        $question->option_one = $request['option_one'];
        $question->option_two = $request['option_two'];
        $question->option_three = $request['option_three'];
        $question->option_four = $request['option_four'];
        $question->save();

        $question_id = $question->id;

        $answer = new AnswerLinking($request->input());
        $answer->question_id = $question_id;
        $answer->answer = $request['correct'];
        $query = $answer->save();
    

        if($query === TRUE) {
            $validator['success'] = true;
            $validator['messages'] = "Question Added successfully";
        }
        else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Adding Question";
        }
        // close the database connection
        echo json_encode($validator);
    }




     public function searchQuestion(Request $request)
    {
        $output = array('data' => array());

        $category_id = $request['category_id'];
      

        $question =DB::table('question')
            ->join('categories', 'categories.id', '=', 'question.category_id')
            ->join('answer_linking', 'answer_linking.question_id', '=', 'question.id')
            ->select('question.*',
                'categories.name as category_name',
                'answer_linking.answer as answer');

       

        if ($category_id != null)
        {
            $question = $question
                ->where('question.category_id',$category_id);
        }


        $question = $question->orderBy('question.id', 'DESC')->get();

        $x = 1;
        foreach ($question as $row)
        {
            $actionButton = '

          <td>

      <div class="btn-group mt-4 mt-md-0" role="group" aria-label="Basic example">

        <a title="Remove Employee" href="#" data-bs-toggle="modal" data-bs-target="#modalConfirmDelete" onclick="removeItemDeleted('.$row->id.')" >
        <button type="button" class="btn btn-primary"><i class="bx bx-trash"></i></button>
        </a>

    </div>

</td>


            ';
        

            $output['data'][] = array(
                $row->category_name,
                $row->question_name,
                $row->option_one,
                $row->option_two,
                $row->option_three,
                $row->option_four,
                $row->answer,
                $actionButton
            );
            $x++;
        }

        if (count($output['data'])>0)
        {
            $output['success']= true;
            $output['messages']= 'Data Found';
            return response()->json($output);
        }
        else{
            $output['success']= false;
            $output['messages']= 'Data not Found';
            return response()->json($output);

        }
    }


      public function removeQuestion(Request $request)
    {
        $id = $request['question'];
        $question = Question::find($id)->delete();
        DB::table('answer_linking')
            ->where('question_id', '=', $id)
            ->delete();

        if($question == TRUE) {
            $response['success'] = true;
            $response['messages'] = "Deleted Successfully";
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Error while Delete!";
        }
        echo json_encode( $response);
    }


}
