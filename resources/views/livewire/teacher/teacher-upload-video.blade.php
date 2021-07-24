{{-- Add Product page css --}}

<div style="padding: 100px 30px;">
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    @endif
    <form action="#" method="POST" wire:submit.prevent="addCourse">
        @csrf
        <div class="form-group">
            <label class="col-12 control-label">課程名稱</label>
            <div class="col-12">
                <input type="text" placeholder="Course Name" class="form-control input-md"
                       wire:model="name" wire:keyup="generateSlug" required autofocus/>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-12 control-label">課程英文網址</label>
            <div class="col-12">
                <input type="text" placeholder="Course Slug" class="form-control input-md"
                       wire:model="slug" required autofocus/>
                @error('slug')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-12 control-label">課程簡介</label>
            <div class="col-12" wire:ignore>
                                        <textarea class="form-control" id="description" placeholder="Description"
                                                  wire:model="description" required autofocus></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">單元</label>
            <div class="col-auto">
                <input type="number" placeholder="Lesson" class="form-control input-md"
                       wire:model="lesson" value="1" min="0"/>
                @error('regular_price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <label class="col-auto control-label">上課日期</label>
            <div class="col-auto">
                <input type="date" placeholder="Class Date" class="form-control input-md"
                       wire:model="class_date"/>
                @error('sale_price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-12 control-label">封面圖片</label>
            <div class="col-12">
                <input type="file" class="input-file" wire:model="image"/>
                @if ($image)
                    <img src="{{$image->temporaryUrl()}}" width="120"/>
                @endif
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-12 control-label">課程分類</label>
            <div class="col-12">
                <select class="form-control" wire:model="category_id">
                    @foreach ($categories as $key=>$category)
                        @if($key == 0)
                            <option value="{{$category->id}}" selected> {{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}"> {{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                影片
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>影片名稱</th>
                        <th>網址</th>
                        <th>影片描述</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($video_info as $index => $info)
                        <tr>
                            <td>
                                <input type="text"
                                       name="video_info[{{$index}}][name]"
                                       class="form-control"
                                       wire:model.debounce.1000ms="video_info.{{$index}}.name"/>
                            </td>
                            <td>
                                <input type="url"
                                       name="video_info[{{$index}}][url]"
                                       class="form-control"
                                       wire:model.debounce.1000ms="video_info.{{$index}}.url"/>
                            </td>
                            <td>
                                <input type="text"
                                       name="video_info[{{$index}}][description]"
                                       class="form-control"
                                       wire:model.debounce.1000ms="video_info.{{$index}}.description"/>
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeVideoField({{$index}})">刪除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                                wire:click.prevent="addVideoField">增加影片
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div>
            <input class="btn btn-primary" type="submit" value="新增課程">
        </div>
    </form>
</div>


{{--<div>--}}
{{--    <div class="container" style="padding:100px;">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <p class="text-4xl font-semibold md:font-bold">上傳新課程</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <a href="{{route('course.course-list')}}" class="btn btn-success pull-right">所有課程</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    <div class="panel-body">--}}
{{--                        @if (Session::has('message'))--}}
{{--                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>--}}
{{--                        @endif--}}
{{--                        <form class="form-horizontal" enctype="multipart/form-data"--}}
{{--                              wire:submit.prevent="addProduct">--}}


{{--                            <div class="form-group">--}}
{{--                                <label class="col-6 control-label">影片網址</label>--}}
{{--                                <div class="col-12">--}}
{{--                                    <input type="text" placeholder="Youtube URL" class="form-control input-md"--}}
{{--                                           wire:model="video_url"/>--}}
{{--                                    @error('SKU')--}}
{{--                                    <p class="text-danger">{{$message}}</p>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="col-12 pull-right">--}}
{{--                                    <a href="#" class="btn btn-success" style="float: inherit;"--}}
{{--                                       wire:click="addVideoField">ADD Video</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    Products--}}
{{--                                </div>--}}

{{--                                <div class="card-body">--}}
{{--                                    <table class="table" id="products_table">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Product</th>--}}
{{--                                            <th>Quantity</th>--}}
{{--                                            <th></th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach ($orderProducts as $index => $orderProduct)--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <select name="orderProducts[{{$index}}][product_id]"--}}
{{--                                                            wire:model="orderProducts.{{$index}}.product_id"--}}
{{--                                                            class="form-control">--}}
{{--                                                        <option value="">-- choose product --</option>--}}
{{--                                                        @foreach ($allProducts as $product)--}}
{{--                                                            <option value="{{ $product->id }}">--}}
{{--                                                                {{ $product->name }}--}}
{{--                                                                (${{ number_format($product->price, 2) }})--}}
{{--                                                            </option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="number"--}}
{{--                                                           name="orderProducts[{{$index}}][quantity]"--}}
{{--                                                           class="form-control"--}}
{{--                                                           wire:model="orderProducts.{{$index}}.quantity"/>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <a href="#"--}}
{{--                                                       wire:click.prevent="removeProduct({{$index}})">Delete</a>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <button class="btn btn-sm btn-secondary"--}}
{{--                                                    wire:click.prevent="addProduct">+ Add Another Product--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            --}}


{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-4 control-label"></label>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            tinymce.init({--}}
{{--                selector: '#short_description',--}}
{{--                setup: function (editor) {--}}
{{--                    editor.on('Change', function (e) {--}}
{{--                        tinyMCE.triggerSave();--}}
{{--                        var sd_data = $('#short_description').val();--}}
{{--                    @this.set('short_description', sd_data);--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--            tinymce.init({--}}
{{--                selector: '#description',--}}
{{--                setup: function (editor) {--}}
{{--                    editor.on('Change', function (e) {--}}
{{--                        tinyMCE.triggerSave();--}}
{{--                        var d_data = $('#description').val();--}}
{{--                    @this.set('description', d_data);--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}
