<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Search Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('searchQuestion')}}" method="POST" id="searchForm">
                    {{csrf_field()}}
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

                    <div class="mt-3 mb-2 text-center">
                        <button id="searchBtn" type="submit" class="btn btn-success w-md">Search</button>
                        <button type="reset" onclick="resetSearchForm()" class="btn btn-primary w-md">Reset</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
