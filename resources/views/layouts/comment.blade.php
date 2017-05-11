<div class="feed">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">评论：</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('/post/jd/submit') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="jd_id" value="{{ $item->jd_item_id }}">

                    <div class="form-group">
                        <div class="col-md-6 ">
                            <textarea cols="70" rows="3" name="content" class="textarea_comment" id="textareaComment"
                                      default_data="说点什么吧"
                                      style="color: rgb(102, 102, 102);"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                发布
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>