


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" action="{{route('addQuestion')}}" method="POST" id="InsertFormQuestion">
                    {{ csrf_field() }}

                    <div class="row">
                         <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Select Category<er style="color: red">*</er></label>
                                <select id="formrow-inputState" class="form-select" name="category_id">
                                    <option selected="">Select</option>
                                     @php
                                    use Illuminate\Support\Facades\DB;
                                    $categories=DB::table('categories')->select('id','name')->get();
                                @endphp
                                @foreach( $categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formrow-password-input" class="form-label">Question</label>
                                <textarea  name="question_name" class="form-control" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Option One</label>
                                <input type="text" name="option_one" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3" style="    margin-top: 38px;">
                                <input type="radio" name="correct" value="option_one">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Option Two</label>
                                <input type="text" name="option_two" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3" style="    margin-top: 38px;">
                                <input type="radio" name="correct" value="option_two">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Option Three</label>
                                <input type="text" name="option_three" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3" style="    margin-top: 38px;">
                                <input type="radio" name="correct" value="option_three">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Option Four</label>
                                <input type="text" name="option_four" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3" style="    margin-top: 38px;">
                                <input type="radio" name="correct" value="option_four">
                                </div>
                            </div>
                        </div>


                    <div class="mt-3 mb-2 text-center">
                        <button type="reset" class="btn btn-primary w-md">Reset</button>
                        <button class="btn btn-success w-md" name="submitBtnQuestion" id="submitBtnQuestion" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
