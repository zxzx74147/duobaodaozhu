<div class="feed">
    <div class="row">
        <div id="custom-search-input">
            <form action="{{route('/search')}}">
                <div class="input-group col-md-12">
                    <input type="text" class="  search-query form-control" placeholder="Search" name="key"/>
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="submit" >
                               <span class=" glyphicon glyphicon-search"></span>
                        </button>
                </span>
                </div>
            </form>
        </div>
    </div>
</div>
