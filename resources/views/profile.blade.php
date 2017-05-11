@extends('layouts.app')

@section('content')

    <div class="feed">
        <div class="choose-image">
            <input id="portrait_upload" type="file" accept="image/*"/>
            <label for="img_input"></label>
            <div class="preview_box"></div>
        </div>
    </div>

    <p>{{$user->id}}</p>
@endsection


@section('script')

    <script  type="text/javascript" src="{{ asset('js/image_process.js') }}"></script>

    <script type="text/javascript">

        $("#img_input").on("change", function(e){

            var file = e.target.files[0]; //获取图片资源

            // 只选择图片文件
            if (!file.type.match('image.*')) {
                return false;
            }

            var reader = new FileReader();

            reader.readAsDataURL(file); // 读取文件

            // 渲染文件
            reader.onload = function(arg) {

                var img = '<img class="preview" src="' + arg.target.result + '" alt="preview"/>';
                $(".preview_box").empty().append(img);
            }
        });
    </script>
@endsection
