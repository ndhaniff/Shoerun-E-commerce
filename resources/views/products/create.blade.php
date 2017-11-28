@extends('layouts.app')
@section('head')
    {{--  <link rel="stylesheet" href="{{asset('plugins/fineuploader/fine-uploader-gallery.css')}}">  --}}
@endsection
@section('content')
@include('inc.banner')
    <div class="container p-5">
        <ul class="preview"></ul>
    <form id="submit-form" action="{{route('products.save')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_img">Product Gallery</label>
            <input id="fileinput" name="product_img[]" accept=".jpg,.jpeg,.png" class="form-control" type="file" multiple="true">
        </div>
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input class="form-control" type="text" name="product_name" placeholder="Nike Air">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="article-ckeditor" class="textarea form-control" name="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price RM</label>
            <input class="form-control" min="1" step="any" type="number" name="price" placeholder="0.00">
        </div>

        <div class="form-group">
            <label for="sku">Product Identifier</label>
            <input class="form-control" type="text" name="sku" placeholder="NIKE556">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="">
                @foreach($attributes['categories'] as $category)
                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <select class="form-control" name="brand" id="">
                @foreach($attributes['brands'] as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="types">Type</label>
            <select class="form-control" name="types" id="">
                @foreach($attributes['types'] as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size">Sizes</label>
            <input class="form-control" type="text" name="size" placeholder="MEN 8, WOMAN 10">
            <small class="helpblock">separate sizes with commas</small>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input class="form-control" type="text" name="color" placeholder="RED, GREEN">
            <small class="helpblock">separate sizes with commas</small>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input class="form-control" min="0" max="999" type="number" name="stock" placeholder="0">
        </div>
        <div class="form-group">
            <label for="shipping_details">Shipping Details</label>
            <textarea class="textarea form-control" name="shipping_details" cols="30" rows="5"></textarea>
        </div>
        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
        <button id="trigger-upload" type="submit" class="btn btn-primary">Submit</button>
        <input id="postUrl" type="hidden" value="{{route('products.save')}}">
    </form>

</div>
@endsection

@section('footer')
{{--  <script src="{{asset('plugins/fineuploader/fine-uploader.js')}}"></script>  --}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'article-ckeditor' );
        var form = document.getElementById('submit-form');
        var request = new XMLHttpRequest();
        var fileUpload = document.getElementById('fileinput');

        fileUpload.addEventListener('change', function(){
            if(fileUpload.files.length > 4){
                alert('we can allow only 4 images')
            }
        })

        form.addEventListener('submit',function(e){
            e.preventDefault();
            if(fileUpload.files.length > 4){
                return false;
            }

            else{
            formdata = new FormData(form);

            request.open('post','/products/save');
            request.addEventListener('load',function(data){
                response = JSON.parse(data.currentTarget.response);
                if(response.success){
                    location.href = response.redirect;
                }
            });
            request.send(formdata);
            }


        });
</script>
@endsection