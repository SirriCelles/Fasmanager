@extends('layouts.ndesign')

@section('main_content')


 
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3" style="background-color:lavender;">

                <div class="list-group">
                    <a href='http://localhost/Fasmanager/public/cam/campus' class="list-group-item active">
                    <h4 class="list-group-item-heading">Campus</h4>
                    <p class="list-group-item-text"></p>
                    </a>
                    {{-- <a href='http://localhost/Fasmanager/public/addblocks' class="list-group-item list-group-item-info">
                    <h4 class="list-group-item-heading hover">Add Block</h4>
                    <p class="list-group-item-text"></p>
                    </a> --}}
                </div>
        </div>
                <div  style="padding: 50px; ">
                    <div class="container col-sm-4">
                        <form action="{{action('CampusController@UpdateCampus')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="campus_id" value="{{$campus->campus_id}}">
                                <fieldset>
                                <legend>Edit</legend>
                                    
                                    <div class="form-group">
                                        <label for="room_name">Campus/Branch Name:</label>
                                        <input type="text" class="form-control" name="campus_name" value="{{ $campus->campus_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="room_capacity">Number of Blocks:</label>
                                        <input type="number" class="form-control" name="num_of_blocks" value="{{ $campus->numof_blocks}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="room_capacity"> Location:</label>
                                        <input type="text" class="form-control" name="location" value="{{ $campus->location}}"/>
                                    </div>

                                    
                                    <div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </fieldset>
                        
                        </form>
                        
                </div>


                </div>
    

    



       

        
        
    </div>


</div>





@endsection

